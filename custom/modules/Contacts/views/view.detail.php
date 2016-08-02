<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

require_once('modules/Contacts/views/view.detail.php');

class CustomContactsViewDetail extends ContactsViewDetail{
    public function display(){
        global $sugar_config;

        $aop_portal_enabled = !empty($sugar_config['aop']['enable_portal']) && !empty($sugar_config['aop']['enable_aop']);

        $this->ss->assign("AOP_PORTAL_ENABLED", $aop_portal_enabled);

        require_once('modules/AOS_PDF_Templates/formLetter.php');
        formLetter::DVPopupHtml('Contacts');

        $this->dv->process();
        
         global $db;
	//InCase of Detail View
	if(!empty($this->bean->id))
	{
		$RecordID = $this->bean->id;
		$query = "SELECT phone_phone.id,phone_phone.name,contacts_phone_phone_1_c.primary_contact,contacts_phone_phone_1_c.opted_out,contacts_phone_phone_1_c.invalid,contacts_phone_phone_1_c.sel_type FROM contacts_phone_phone_1_c JOIN phone_phone ON  contacts_phone_phone_1_c.contacts_phone_phone_1phone_phone_idb = phone_phone.id WHERE contacts_phone_phone_1_c.contacts_phone_phone_1contacts_ida = '$RecordID'";
                
		$resultPhonedetail=$db->query($query);
            $Records = array();
            //$viewPhone="<table>";
            $Row ='';
            while($dataPhoneId=$db->fetchRow($resultPhonedetail))
            {
                    $url = "index.php?action=ajaxui#ajaxUILoc=".urlencode("index.php?module=phone_Phone&action=DetailView&record=".$dataPhoneId['id']);
                     if($dataPhoneId['primary_contact'] && $dataPhoneId['opted_out'] && $dataPhoneId['invalid'])
                    {
                            $data = '<span style="text-decoration: line-through;"><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></span>'.'<i class="error"> (Opted Out and Invalid) </i> </td>';
                    }
                    else if($dataPhoneId['primary_contact'] && $dataPhoneId['opted_out'])
                    {
                            $data = '<span style="text-decoration: line-through;"><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></span>'.'<i class="error"> (Opted Out) </i> </td>';
                    }

                    else if( $dataPhoneId['primary_contact'] && $dataPhoneId['invalid'])
                    {
                            $data = '<span style="text-decoration: line-through;"><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></span>'.'<i> (Invalid) </i> </td>';
                    }

                    else if($dataPhoneId['primary_contact'])
                    {
                            //$data = '<b>'.$dataPhoneId['name'].'</b>'.'<i> (Primary) </i> </td>';
                            $data = '<b><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></b>'.'<i> (Primary) </i> </td>';
                    }
                    else if($dataPhoneId['opted_out'] && $dataPhoneId['invalid'])
                    {
                            $data = '<span style="text-decoration: line-through;"><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></span>'.'<i class="error"> (Opted Out and Invalid) </i> </td>';
                    }
                    else if($dataPhoneId['opted_out'])
                    {
                            $data = '<span style="text-decoration: line-through;"><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></span>'.'<i class="error"> (Opted Out) </i> </td>';
                    }
                    else if($dataPhoneId['invalid'])
                    {
                            $data = '<span style="text-decoration: line-through;"><a href="'.$url.'" >'.$dataPhoneId['name'].'</a></span>'.'<i> (Invalid) </i> </td>';
                    }

                    else
                    {
                            $data = '<a href="'.$url.'" >'.$dataPhoneId['name'].'</a>';
                    }

                    //CreateRow
                    $Row = $Row. '<tr><td style="border:none;">'.$data.'</tr>';

            }

            $disp_phone_numbers = "<table>$Row</table>";
            //echo $disp_phone_numbers;die;
            $this->ss->assign('DISPPHONENUMBERS',$disp_phone_numbers);

	}
        
        echo $this->dv->display();
        parent::display();

    }

     /**
     * Override - Called from process(). This method will display subpanels.
     */
    protected function _displaySubPanels()
    {

        if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) 
        {

            $GLOBALS['focus'] = $this->bean;
            require_once ('include/SubPanel/SubPanelTiles.php');
            $subpanel = new SubPanelTiles($this->bean, $this->module);

          // echo "<pre>";print_r($subpanel->subpanel_definitions->layout_defs['subpanel_setup']);die;
                
            $hideSubpanels=array(
                'cases',
                'project',
		'documents',
		'opportunities',
		'bugs',
		'project',
		'campaigns',
		'project',
		'contact_aos_invoices',
		'contact_aos_contracts',
		'fp_events_contacts',
		//'direct_reports',
            
            );

            foreach ($hideSubpanels as $subpanelKey)
            {
                if (isset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelKey]))
                {
                    unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelKey]);
                }
            }
            echo $subpanel->display();
        }
    }

}
