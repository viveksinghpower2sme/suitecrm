<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'updateGeocodeInfo'); 
$hook_array['before_save'][] = Array(78, 'Leads push feed', 'modules/Leads/SugarFeeds/LeadFeed.php','LeadFeed', 'pushFeed');
$hook_array['early_before_save'][] = Array(79, 'checkLeadPhoneDuplicacy', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'checkLeadPhoneDuplicacy'); 
$hook_array['before_save'][] = Array(80, 'autoAssign', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'autoAssign'); 
$hook_array['before_save'][] = Array(81, 'removePreviousSecurityGroup', 'custom/include/global_logic_hook.php','globalLogicHook', 'removePreviousSecurityGroup'); 

$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'updateRelatedMeetingsGeocodeInfo', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php', 'LeadsJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo'); 
$hook_array['after_save'][] = Array(2, 'savePhones', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'savePhones'); 
$hook_array['after_save'][] = Array(3, 'deleteLead', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'deleteLead'); 
$hook_array['after_save'][] = Array(4, 'markActivityHeld', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'markActivityHeld'); 
$hook_array['after_save'][] = Array(82, 'removeLock', 'custom/modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'removeLock'); 
$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(90, 'auditRelationship', 'custom/include/global_logic_hook.php','globalLogicHook', 'auditRelationship');
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(90, 'auditDeleteRelationship', 'custom/include/global_logic_hook.php','globalLogicHook', 'auditDeleteRelationship'); 


?>