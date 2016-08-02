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

require_once('include/MVC/View/views/view.detail.php');

class abc12_DataViewDetail extends ViewDetail {


 	function abc12_DataViewDetail(){
 		parent::ViewDetail();
 	}

 	/**
 	 * display
 	 * Override the display method to support customization for the buttons that display
 	 * a popup and allow you to copy the account's address into the selected contacts.
 	 * The custom_code_billing and custom_code_shipping Smarty variables are found in
 	 * include/SugarFields/Fields/Address/DetailView.tpl (default).  If it's a English U.S.
 	 * locale then it'll use file include/SugarFields/Fields/Address/en_us.DetailView.tpl.
 	 */
 	


    function display(){
				
	//print_r($this->bean->id);
        global $db;
	//InCase of Detail View
	if(!empty($this->bean->id))
	{
            
            $RecordID = $this->bean->id;
            $query = "SELECT phone_phone.id,phone_phone.name,abc12_data_phone_phone_1_c.primary_contact,abc12_data_phone_phone_1_c.opted_out,abc12_data_phone_phone_1_c.invalid,abc12_data_phone_phone_1_c.sel_type FROM abc12_data_phone_phone_1_c JOIN phone_phone ON  abc12_data_phone_phone_1_c.abc12_data_phone_phone_1phone_phone_idb = phone_phone.id WHERE abc12_data_phone_phone_1_c.abc12_data_phone_phone_1abc12_data_ida = '$RecordID'";
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
           // echo $disp_phone_numbers;die;
            $this->ss->assign('DISPPHONENUMBERS',$disp_phone_numbers);

	}

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

           //echo "<pre>";print_r($subpanel->subpanel_definitions->layout_defs['subpanel_setup']);die;
                
            $hideSubpanels=array(
                'abc12_data_fp_event_locations_1',
            
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

?>
