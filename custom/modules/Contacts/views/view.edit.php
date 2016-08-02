<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class ContactsViewEdit extends ViewEdit
{
 	public function __construct()
 	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 		$this->useModuleQuickCreateTemplate = true;
 	}

        
    function display(){

	global $db;
	//InCase of Edit record
	if(!empty($this->ev->focus->id))
	{
		$RecordID = $this->ev->focus->id;
		$query = "SELECT phone_phone.id,phone_phone.name,contacts_phone_phone_1_c.primary_contact,contacts_phone_phone_1_c.opted_out,contacts_phone_phone_1_c.invalid,contacts_phone_phone_1_c.sel_type FROM contacts_phone_phone_1_c JOIN phone_phone ON  contacts_phone_phone_1_c.contacts_phone_phone_1phone_phone_idb = phone_phone.id WHERE contacts_phone_phone_1_c.contacts_phone_phone_1contacts_ida = '$RecordID'";
		//echo $query;die;
                $resultPhonedetail=$db->query($query);
		$Records = array();
		while($dataPhoneId=$db->fetchRow($resultPhonedetail))
		{
			$Records[] = $dataPhoneId;
		}
		if(!empty($Records))
			$Record = json_encode($Records);
	}
     
        $phone_numbers = '<input type="hidden" id="phonerecordedit" name="phonerecordedit" value =\''.$Record.'\'>
        <table id="tbl_phone" style="width:62%;">
        <tr>
           <td> 
               <span style="width:71% !important;display:inline-block;">
                 <button type="button" id="add_email" onclick="javascript:add_phoneNumber()">
                 <img src="themes/default/images/id-ff-add.png?v=jlL480K5YkTHsr6Wx8BATQ" alt="Array.LBL_ID_FF_ADD">
                 </button>
               </span>
               Primary&nbsp;&nbsp; &nbsp;Opted out&nbsp; &nbsp;&nbsp;Invalid 
           </td>
        </tr>
        <tr>
           <td>
              <input type="hidden" name="phone_count" id="phone_count" value="0"/>
           </td>
        </tr>
       </table>
        <script>addRecords();</script>';

    // echo $phone_numbers;die;
        $this->ss->assign('PHONENUMBERS',$phone_numbers);
	

	parent::display();
    }
    


}
