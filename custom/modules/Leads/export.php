<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

//Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
ini_set('zlib.output_compression', 'Off');

ob_start();
require_once('include/export_utils.php');
global $sugar_config;
global $locale;
global $current_user;
global $app_list_strings;

$the_module = clean_string($_REQUEST['module']);

if($sugar_config['disable_export'] 	|| (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($the_module)  && ACLAction::getUserAccessLevel($current_user->id,$the_module, 'access') == ACL_ALLOW_ENABLED &&
    (ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN ||
     ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN_DEV))))){
	die($GLOBALS['app_strings']['ERR_EXPORT_DISABLED']);
}

//check to see if this is a request for a sample or for a regular export
if(!empty($_REQUEST['sample'])){
    //call special method that will create dummy data for bean as well as insert standard help message.
    $content = exportSample(clean_string($_REQUEST['module']));

}else if(!empty($_REQUEST['uid'])){
	$content = export_custom_logic(clean_string($_REQUEST['module']), $_REQUEST['uid'], isset($_REQUEST['members']) ? $_REQUEST['members'] : false);
}else{
	$content = export(clean_string($_REQUEST['module']));
}
$filename = $_REQUEST['module'];
//use label if one is defined
if(!empty($app_list_strings['moduleList'][$_REQUEST['module']])){
    $filename = $app_list_strings['moduleList'][$_REQUEST['module']];
}

//strip away any blank spaces
$filename = str_replace(' ','',$filename);

$transContent = $GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset());

if($_REQUEST['members'] == true)
	$filename .= '_'.'members';
///////////////////////////////////////////////////////////////////////////////
////	BUILD THE EXPORT FILE
ob_clean();
header("Pragma: cache");
header("Content-type: application/octet-stream; charset=".$GLOBALS['locale']->getExportCharset());
header("Content-Disposition: attachment; filename={$filename}.csv");
header("Content-transfer-encoding: binary");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . TimeDate::httpTime() );
header("Cache-Control: post-check=0, pre-check=0", false );
header("Content-Length: ".mb_strlen($transContent, '8bit'));
if (!empty($sugar_config['export_excel_compatible'])) {
    $transContent=chr(255) . chr(254) . mb_convert_encoding($transContent, 'UTF-16LE', 'UTF-8');
}
print $transContent;

sugar_cleanup(true);

function export_custom_logic($type, $records = null, $members = false, $sample=false) {
    global $locale;
    global $beanList;
    global $beanFiles;
    global $current_user;
    global $app_strings;
    global $app_list_strings;
    global $timedate;
    global $mod_strings;
    global $current_language;
    $sampleRecordNum = 5;

    //Array of fields that should not be exported, and are only used for logic
    $remove_from_members = array("ea_deleted", "ear_deleted", "primary_address");
    $focus = 0;

    $bean = $beanList[$type];
    require_once($beanFiles[$bean]);
    $focus = new $bean;
    $searchFields = array();
    $db = DBManagerFactory::getInstance();

    if($records) {
        $records = explode(',', $records);
        $records = "'" . implode("','", $records) . "'";
        $where = "{$focus->table_name}.id in ($records)";
    } elseif (isset($_REQUEST['all']) ) {
        $where = '';
    } else {
        if(!empty($_REQUEST['current_post'])) {
            $ret_array = generateSearchWhere($type, $_REQUEST['current_post']);

            $where = $ret_array['where'];
            $searchFields = $ret_array['searchFields'];
        } else {
            $where = '';
        }
    }
    $order_by = "";
    if($focus->bean_implements('ACL')){
        if(!ACLController::checkAccess($focus->module_dir, 'export', true)){
            ACLController::displayNoAccess();
            sugar_die('');
        }
        if(ACLController::requireOwner($focus->module_dir, 'export')){
            if(!empty($where)){
                $where .= ' AND ';
            }
            $where .= $focus->getOwnerWhere($current_user->id);
        }
		/* BEGIN - SECURITY GROUPS */
    	if(ACLController::requireSecurityGroup($focus->module_dir, 'export') )
    	{
			require_once('modules/SecurityGroups/SecurityGroup.php');
    		global $current_user;
    		$owner_where = $focus->getOwnerWhere($current_user->id);
	    	$group_where = SecurityGroup::getGroupWhere($focus->table_name,$focus->module_dir,$current_user->id);
	    	if(!empty($owner_where)) {
				if(empty($where))
	    		{
	    			$where = " (".  $owner_where." or ".$group_where.")";
	    		} else {
	    			$where .= " AND (".  $owner_where." or ".$group_where.")";
	    		}
			} else {
				if(!empty($where)){
					$where .= ' AND ';
				}
				$where .= $group_where;
			}
    	}
    	/* END - SECURITY GROUPS */

    }
    // Export entire list was broken because the where clause already has "where" in it
    // and when the query is built, it has a "where" as well, so the query was ill-formed.
    // Eliminating the "where" here so that the query can be constructed correctly.
    if($members == true){
           $query = $focus->create_export_members_query($records);
    }else{
        $beginWhere = substr(trim($where), 0, 5);
        if ($beginWhere == "where")
            $where = substr(trim($where), 5, strlen($where));

        $query = custom_export_query($focus,$order_by,$where);
      //  print_r($query); die;
    }

    $result = '';
    $populate = false;
    if($sample) {
       $result = $db->limitQuery($query, 0, $sampleRecordNum, true, $app_strings['ERR_EXPORT_TYPE'].$type.": <BR>.".$query);
        if( $focus->_get_num_rows_in_query($query)<1 ){
            $populate = true;
        }
    }
    else {
        $result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'].$type.": <BR>.".$query);
    }


    $fields_array = $db->getFieldsArray($result,true);

    //set up the order on the header row
    $fields_array = get_field_order_mapping($focus->module_dir, $fields_array);



    //set up labels to be used for the header row
    $field_labels = array();
    foreach($fields_array as $key=>$dbname){
        //Remove fields that are only used for logic
        if($members && (in_array($dbname, $remove_from_members)))
            continue;
        
        //default to the db name of label does not exist
        $field_labels[$key] = translateForExport($dbname,$focus);
    }

    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    if ($locale->getExportCharset() == 'UTF-8' &&
        ! preg_match('/macintosh|mac os x|mac_powerpc/i', $user_agent)) // Bug 60377 - Mac Excel doesn't support UTF-8
    {
        //Bug 55520 - add BOM to the exporting CSV so any symbols are displayed correctly in Excel
        $BOM = "\xEF\xBB\xBF";
        $content = $BOM;
    }
    else
    {
        $content = '';
    }

    // setup the "header" line with proper delimiters
    $content .= "\"".implode("\"".getDelimiter()."\"", array_values($field_labels))."\"\r\n";
    $pre_id = '';

    if($populate){
        //this is a sample request with no data, so create fake datarows
         $content .= returnFakeDataRow($focus,$fields_array,$sampleRecordNum);
    }else{
        $records = array();

        //process retrieved record
    	while($val = $db->fetchByAssoc($result, false)) {

        	if ($members)
			$focus = BeanFactory::getBean($val['related_type']);
		else
		{ // field order mapping is not applied for member-exports, as they include multiple modules
            //order the values in the record array
            $val = get_field_order_mapping($focus->module_dir,$val);
		}

            $new_arr = array();
		if($members){
			if($pre_id == $val['id'])
				continue;
			if($val['ea_deleted']==1 || $val['ear_deleted']==1){
				$val['primary_email_address'] = '';
			}
			unset($val['ea_deleted']);
			unset($val['ear_deleted']);
			unset($val['primary_address']);
		}
		$pre_id = $val['id'];

		foreach ($val as $key => $value)
		{
            //getting content values depending on their types
            $fieldNameMapKey = $fields_array[$key];

            if (isset($focus->field_name_map[$fieldNameMapKey])  && $focus->field_name_map[$fieldNameMapKey]['type'])
            {
                $fieldType = $focus->field_name_map[$fieldNameMapKey]['type'];
                switch ($fieldType)
                {
                    //if our value is a currency field, then apply the users locale
                    case 'currency':
                        require_once('modules/Currencies/Currency.php');
                        $value = currency_format_number($value);
                        break;

                    //if our value is a datetime field, then apply the users locale
                    case 'datetime':
                    case 'datetimecombo':
                        $value = $timedate->to_display_date_time($db->fromConvert($value, 'datetime'));
                        $value = preg_replace('/([pm|PM|am|AM]+)/', ' \1', $value);
                        break;

                    //kbrill Bug #16296
                    case 'date':
                        $value = $timedate->to_display_date($db->fromConvert($value, 'date'), false);
                        break;

                    // Bug 32463 - Properly have multienum field translated into something useful for the client
                    case 'multienum':
			$valueArray = unencodeMultiEnum($value);

                        if (isset($focus->field_name_map[$fields_array[$key]]['options']) && isset($app_list_strings[$focus->field_name_map[$fields_array[$key]]['options']]) )
                        {
                            foreach ($valueArray as $multikey => $multivalue )
                            {
                                if (isset($app_list_strings[$focus->field_name_map[$fields_array[$key]]['options']][$multivalue]) )
                                {
                                    $valueArray[$multikey] = $app_list_strings[$focus->field_name_map[$fields_array[$key]]['options']][$multivalue];
                                }
                            }
                        }
			$value = implode(",",$valueArray);

                        break;

		case 'enum':
			if (	isset($focus->field_name_map[$fields_array[$key]]['options']) && 
				isset($app_list_strings[$focus->field_name_map[$fields_array[$key]]['options']]) &&
				isset($app_list_strings[$focus->field_name_map[$fields_array[$key]]['options']][$value])
			)
				$value = $app_list_strings[$focus->field_name_map[$fields_array[$key]]['options']][$value];

			break;
                }
            }


            // Keep as $key => $value for post-processing
            $new_arr[$key] = preg_replace("/\"/","\"\"", $value);
        }

        // Use Bean ID as key for records
        $records[$pre_id] = $new_arr;
    }

        // Check if we're going to export non-primary emails
        if ($focus->hasEmails() && in_array('email_addresses_non_primary', $fields_array))
        {
            // $records keys are bean ids
            $keys = array_keys($records);

            // Split the ids array into chunks of size 100
            $chunks = array_chunk($keys, 100);

            foreach ($chunks as $chunk)
            {
                // Pick all the non-primary mails for the chunk
                $query =
                    "
                      SELECT eabr.bean_id, ea.email_address
                      FROM email_addr_bean_rel eabr
                      LEFT JOIN email_addresses ea ON ea.id = eabr.email_address_id
                      WHERE eabr.bean_module = '{$focus->module_dir}'
                      AND eabr.primary_address = '0'
                      AND eabr.bean_id IN ('" . implode("', '", $chunk) . "')
                      AND eabr.deleted != '1'
                      ORDER BY eabr.bean_id, eabr.reply_to_address, eabr.primary_address DESC
                    ";

                $result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'] . $type . ": <BR>." . $query);

                while ($val = $db->fetchByAssoc($result, false)) {
                    if (empty($records[$val['bean_id']]['email_addresses_non_primary'])) {
                        $records[$val['bean_id']]['email_addresses_non_primary'] = $val['email_address'];
                    } else {
                        // No custom non-primary mail delimeter yet, use semi-colon
                        $records[$val['bean_id']]['email_addresses_non_primary'] .= ';' . $val['email_address'];
                    }
                }
            }
        }

        foreach($records as $record)
        {
            $line = implode("\"" . getDelimiter() . "\"", $record);
            $line = "\"" . $line;
            $line .= "\"\r\n";
            $content .= $line;
        }

    }

	return $content;

}

function custom_export_query($focus,$order_by, $where, $relate_link_join = '')
    {//print_r($focus); die;

        $custom_join = $focus->custom_fields->getJOIN(true, true, $where);
//print_r($custom_join); die;
        // For easier code reading, reused plenty of time
        $table = $focus->table_name;

        if($custom_join)
        {
            $custom_join['join'] .= $relate_link_join;
        }
        
        $query = "SELECT $table.*,GROUP_CONCAT(phone_phone.name SEPARATOR ', ') as phone_mobile,
                                       	email_addresses.email_address email_address,
					'' email_addresses_non_primary, " . // email_addresses_non_primary needed for get_field_order_mapping()
					"users.user_name as assigned_user_name ";
        if($custom_join)
        {
            $query .= $custom_join['select'];
        }
        
        

        $query .= " FROM $table ";


        $query .= "LEFT JOIN users
					ON $table.assigned_user_id=users.id ";


        //Join email address table too.
        $query .=  " LEFT JOIN email_addr_bean_rel on $table.id = email_addr_bean_rel.bean_id and email_addr_bean_rel.bean_module = '" . $focus->module_dir . "' and email_addr_bean_rel.deleted = 0 and email_addr_bean_rel.primary_address = 1";
        $query .=  " LEFT JOIN email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id ";
       
      //  Join phone no. too.
         $query .=  " LEFT JOIN phone_phone_leads_1_c on $table.id = phone_phone_leads_1_c.phone_phone_leads_1leads_idb	";
        $query .=  " LEFT JOIN phone_phone on phone_phone_leads_1_c.phone_phone_leads_1phone_phone_ida = phone_phone.id ";
       

        if($custom_join)
        {
            $query .= $custom_join['join'];
            
        }

        $where_auto = " $table.deleted=0 ";

        if($where != "")
        {
            $query .= "WHERE ($where) AND " . $where_auto;
            $query.="GROUP by leads.id";
        }
        else
        {
            $query .= "WHERE " . $where_auto;
        }

        $order_by = $focus->process_order_by($order_by);
        if (!empty($order_by)) {
            $query .= ' ORDER BY ' . $order_by;
        }
//echo $query;die;
        return $query;
    }

