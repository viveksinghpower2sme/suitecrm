<?php

// custom/modules/Leads/LeadsJjwg_MapsLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class LeadsJjwg_MapsLogicHook {

    function updateGeocodeInfo(&$bean, $event, $arguments) {
        // before_save
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $jjwg_Maps->updateGeocodeInfo($bean);
        }
    }

    function updateRelatedMeetingsGeocodeInfo(&$bean, $event, $arguments) {
        // after_save

        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $jjwg_Maps->updateRelatedMeetingsGeocodeInfo($bean);
        }
    }

 function savePhones(&$bean, $event, $arguments) {
        // after_save
        global $db;  
        // after_save
           $sqlDeleterelation="DELETE FROM phone_phone_leads_c WHERE phone_phone_leadsleads_ida='".$bean->id ."'";
          $db->query($sqlDeleterelation);
          $requestPhone=$_REQUEST['phone_count'];
        for($phone_count=1;$phone_count <= $_REQUEST['phone_count'];$phone_count++)
        {    
	if(empty($_REQUEST['phone_'.$phone_count])) continue;
            $sqlSelectPhoneId=" SELECT id FROM `phone_phone` where name='".$_REQUEST['phone_'.$phone_count]."'";
            $resultPhoneId=$db->query($sqlSelectPhoneId);
            if($db->getRowCount($resultPhoneId)==0)
            {
                  $sql="INSERT INTO phone_phone (id,name,date_entered,date_modified,assigned_user_id,modified_user_id,created_by)
                VALUES (uuid(),'".$_REQUEST['phone_'.$phone_count]."',NOW(),NOW(),'".$_REQUEST['assigned_user_id']."','".$_REQUEST['assigned_user_id']."','".$_REQUEST['assigned_user_id']."')";
                $db->query($sql);
                $resultPhoneId=$db->query($sqlSelectPhoneId);
            }             
            $dataPhoneId=$db->fetchRow($resultPhoneId);
            $optedout=0;
            $invalid_phone=0;
            $phoneradio=0;
            if(isset($_REQUEST['optedout_phone_'.$phone_count]))
            {
                 $optedout=1;
            }
            if(isset($_REQUEST['invalid_phone_'.$phone_count]))
            {
                 $invalid_phone=1;
            }
            if($_REQUEST['phoneradio']==$phone_count)
            {
              $phoneradio=1;  
            }
             $sql="INSERT INTO phone_phone_leads_c (id,date_modified,phone_phone_leadsleads_ida,phone_phone_leadsphone_phone_idb,primary_contact,opted_out,invalid,sel_type)
                VALUES (uuid(),NOW(),'".$bean->id ."','".$dataPhoneId['id']."','".$phoneradio."','".$optedout."','".$invalid_phone."',
'".$_REQUEST['sel_'.$phone_count]."')";
                $db->query($sql);                                
        }

    }


}
