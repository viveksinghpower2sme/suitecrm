<?php

// custom/modules/Contacts/ContactsJjwg_MapsLogicHook.php
require_once('service/randomIdGenerator.php');
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('custom/include/global_logic_hook.php');

class ContactsJjwg_MapsLogicHook extends globalLogicHook {

	function contactNavId(&$bean, $event, $arguments)
	{
		
		if(empty($bean->fetched_row['id']))
		{
		
			$moduleName="CON";
			$length=7;
			$randomId = randomId($length,$moduleName);
			$bean->contactnavid_c=$randomId;
			
		}
		
		
	}
	

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
    
    function setContactId(&$bean, $event, $arguments) {
         
         //create_activity_c
         if(!empty($bean->create_activity_c))
         {
             $bean->id = $bean->create_activity_c;
             
             if($bean->description == "Visited Our Site")
             {
                  $bean->description = "Contact ". $bean->description;
             } 
             else
             {
                 $bean->description = "Contact tried to Contact";
             }
            
         }
       
         
    }
     function assignedTo(&$bean, $event, $arguments) {
        
      
        if($_REQUEST['module'] == "Leads" && $_REQUEST['action'] == "ConvertLead") // execute in case of convert lead to contact conversion case
        {
           
            if(!empty($bean->fetched_row))
             {
                $bean->assigned_user_id =$_SESSION['authenticated_user_id'];
             }
        }  
    

    }


}
