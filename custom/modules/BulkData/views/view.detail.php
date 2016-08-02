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

class LeadsViewDetail extends ViewDetail {


 	function LeadsViewDetail(){
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
				
		if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}
		
		require_once('modules/AOS_PDF_Templates/formLetter.php');
		formLetter::DVPopupHtml('Accounts');
		
		$this->dv->process();
		global $mod_strings;
		if(ACLController::checkAccess('Contacts', 'edit', true)) {
			$push_billing = '<input class="button" title="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_LABEL'] . 
								 '" type="button" onclick=\'open_contact_popup("Contacts", 600, 600, "&account_name=' .
								 $this->bean->name . '&html=change_address' .
								 '&primary_address_street=' . str_replace(array("\rn", "\r", "\n"), array('','','<br>'), urlencode($this->bean->billing_address_street)) . 
								 '&primary_address_city=' . $this->bean->billing_address_city . 
								 '&primary_address_state=' . $this->bean->billing_address_state . 
								 '&primary_address_postalcode=' . $this->bean->billing_address_postalcode . 
								 '&primary_address_country=' . $this->bean->billing_address_country .
								 '", true, false);\' value="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_TITLE']. '">';
			$push_shipping = '<input class="button" title="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_LABEL'] . 
								 '" type="button" onclick=\'open_contact_popup("Contacts", 600, 600, "&account_name=' .
								 $this->bean->name . '&html=change_address' .
								 '&primary_address_street=' . str_replace(array("\rn", "\r", "\n"), array('','','<br>'), urlencode($this->bean->shipping_address_street)) .
								 '&primary_address_city=' . $this->bean->shipping_address_city .
								 '&primary_address_state=' . $this->bean->shipping_address_state .
								 '&primary_address_postalcode=' . $this->bean->shipping_address_postalcode .
								 '&primary_address_country=' . $this->bean->shipping_address_country .
								 '", true, false);\' value="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_TITLE'] . '">';
		} else {
			$push_billing = '';
			$push_shipping = '';
		}

		$this->ss->assign("custom_code_billing", $push_billing);
		$this->ss->assign("custom_code_shipping", $push_shipping);
        
        if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}				
		

	//die;
global $db;
	//InCase of Detail View
	if(!empty($this->bean->id))
	{
		$RecordID = $this->bean->id;
		$query = "SELECT phone_phone.id,phone_phone.name,phone_phone_leads_c.primary_contact,phone_phone_leads_c.opted_out,phone_phone_leads_c.invalid,phone_phone_leads_c.sel_type FROM phone_phone_leads_c JOIN phone_phone ON  phone_phone_leads_c.phone_phone_leadsphone_phone_idb = phone_phone.id WHERE phone_phone_leads_c.phone_phone_leadsleads_ida = '$RecordID'";
		$resultPhonedetail=$db->query($query);
		$Records = array();
		//$viewPhone="<table>";
		$Row ='';
		while($dataPhoneId=$db->fetchRow($resultPhonedetail))
		{

			 if($dataPhoneId['primary_contact'] && $dataPhoneId['opted_out'] && $dataPhoneId['invalid'])
			{
				$data = '<span style="text-decoration: line-through;">'.$dataPhoneId['name'].'</span>'.'<i class="error"> (Opted Out and Invalid) </i> </td>';
			}
			else if($dataPhoneId['primary_contact'] && $dataPhoneId['opted_out'])
			{
				$data = '<span style="text-decoration: line-through;">'.$dataPhoneId['name'].'</span>'.'<i class="error"> (Opted Out) </i> </td>';
			}
			
			else if( $dataPhoneId['primary_contact'] && $dataPhoneId['invalid'])
			{
				$data = '<span style="text-decoration: line-through;">'.$dataPhoneId['name'].'</span>'.'<i> (Invalid) </i> </td>';
			}
						
			else if($dataPhoneId['primary_contact'])
			{
				$data = '<b>'.$dataPhoneId['name'].'</b>'.'<i> (Primary) </i> </td>';
			}
			else if($dataPhoneId['opted_out'] && $dataPhoneId['invalid'])
			{
				$data = '<span style="text-decoration: line-through;">'.$dataPhoneId['name'].'</span>'.'<i class="error"> (Opted Out and Invalid) </i> </td>';
			}
			else if($dataPhoneId['opted_out'])
			{
				$data = '<span style="text-decoration: line-through;">'.$dataPhoneId['name'].'</span>'.'<i class="error"> (Opted Out) </i> </td>';
			}
			else if($dataPhoneId['invalid'])
			{
				$data = '<span style="text-decoration: line-through;">'.$dataPhoneId['name'].'</span>'.'<i> (Invalid) </i> </td>';
			}
			
			else
			{
				$data = $dataPhoneId['name'];
			}

			//CreateRow
			$Row = $Row. '<tr><td style="border:none;">'.$data.'</tr>';
			
		}

		$disp_phone_numbers = "<table>$Row</table>";
		
		$this->ss->assign('DISPPHONENUMBERS',$disp_phone_numbers);

	}


	echo $this->dv->display();





 	}










/*function display(){

        	require_once('modules/AOS_PDF_Templates/formLetter.php');
		formLetter::DVPopupHtml('Leads');
		parent::display();				
 	}*/	
}

?>
