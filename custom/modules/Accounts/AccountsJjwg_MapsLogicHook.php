<?php
// custom/modules/Accounts/AccountsJjwg_MapsLogicHook.php
require_once('service/randomIdGenerator.php');
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class AccountsJjwg_MapsLogicHook {

    function updateGeocodeInfo(&$bean, $event, $arguments) {
       // before_save
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $jjwg_Maps->updateGeocodeInfo($bean);
        }
              
    }

function updateSmeId(&$bean, $event, $arguments){
	if (empty($bean->fetched_row['id'])) {
    // Do custom logic for only a newly created record
		$moduleName="ACC";
		$length=17;
		$randomId = randomId($length,$moduleName);
		$bean->sme_id_c = $randomId;
	}	
	
}
    function updateRelatedProjectGeocodeInfo(&$bean, $event, $arguments) {
        global $db;  
        // after_save
          $sqlDeleterelation="DELETE FROM phone_phone_accounts_1_c WHERE phone_phone_accounts_1phone_phone_ida
              ='".$bean->id ."'";
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
            $sql="INSERT INTO phone_phone_accounts_1_c (id,date_modified,phone_phone_accounts_1phone_phone_ida,phone_phone_accounts_1accounts_idb,primary_contact,opted_out,invalid,sel_type)
                VALUES (uuid(),NOW(),'".$bean->id ."','".$dataPhoneId['id']."','".$phoneradio."','".$optedout."','".$invalid_phone."',
                '".$_REQUEST['sel_'.$phone_count]."')";
                $db->query($sql);                                
        }
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            // Find and Update the Related Projects - save() Triggers Logic Hooks
            require_once('modules/Project/Project.php');
            $projects = $bean->get_linked_beans('project', 'Project');
            foreach ($projects as $project) {
                $project->custom_fields->retrieve();
                $jjwg_Maps->updateGeocodeInfo($project, true);
                if ($project->jjwg_maps_address_c != $project->fetched_row['jjwg_maps_address_c']) {
                    $project->save(false);
                }
            }
        }       
    }

    function updateRelatedOpportunitiesGeocodeInfo(&$bean, $event, $arguments) {
        // after_save
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            // Find and Update the Related Opportunities - save() Triggers Logic Hooks
            require_once('modules/Opportunities/Opportunity.php');
            $opportunities = $bean->get_linked_beans('opportunities', 'Opportunity');
            foreach ($opportunities as $opportunity) {
                $opportunity->custom_fields->retrieve();
                $jjwg_Maps->updateGeocodeInfo($opportunity, true);
                if ($opportunity->jjwg_maps_address_c != $opportunity->fetched_row['jjwg_maps_address_c']) {
                    $opportunity->save(false);
                }
            }
        }
    }

    function updateRelatedCasesGeocodeInfo(&$bean, $event, $arguments) {
        // after_save
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            // Find and Update the Related Cases - save() Triggers Logic Hooks
            require_once('modules/Cases/Case.php');
            $cases = $bean->get_linked_beans('cases', 'aCase');
            foreach ($cases as $case) {
                $case->custom_fields->retrieve();
                $jjwg_Maps->updateGeocodeInfo($case, true);
                if ($case->jjwg_maps_address_c != $case->fetched_row['jjwg_maps_address_c']) {
                    $case->save(false);
                }
            }
        }
    }

    function updateRelatedMeetingsGeocodeInfo(&$bean, $event, $arguments) {
        // after_save
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $jjwg_Maps->updateRelatedMeetingsGeocodeInfo($bean);
        }
    }

    function addRelationship(&$bean, $event, $arguments) {
        // after_relationship_add
        $GLOBALS['log']->info(__METHOD__.' $arguments: '.print_r($arguments, true));
        // $arguments['module'], $arguments['related_module'], $arguments['id'] and $arguments['related_id'] 
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $focus = get_module_info($arguments['module']);
            if (!empty($arguments['id'])) {
                $focus->retrieve($arguments['id']);
                $focus->custom_fields->retrieve();
                $jjwg_Maps->updateGeocodeInfo($focus, true);
                if ($focus->jjwg_maps_address_c != $focus->fetched_row['jjwg_maps_address_c']) {
                    $focus->save(false);
                }
            }
        }
    }

    function deleteRelationship(&$bean, $event, $arguments) {
        // after_relationship_delete
        $GLOBALS['log']->info(__METHOD__.' $arguments: '.print_r($arguments, true));
        // $arguments['module'], $arguments['related_module'], $arguments['id'] and $arguments['related_id'] 
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $focus = get_module_info($arguments['module']);
            if (!empty($arguments['id'])) {
                $focus->retrieve($arguments['id']);
                $focus->custom_fields->retrieve();
                $jjwg_Maps->updateGeocodeInfo($focus, true);
                if ($focus->jjwg_maps_address_c != $focus->fetched_row['jjwg_maps_address_c']) {
                    $focus->save(false);
                }
            }
        }
    }
    
}
