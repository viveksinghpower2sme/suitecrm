<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
//$hook_array['before_save'][] = Array(1, 'removePreviousSecurityGroup', 'custom/include/global_logic_hook.php','globalLogicHook', 'removePreviousSecurityGroup'); 

$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(2, 'saveRfqInfo', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'saveRfqInfo'); 
$hook_array['after_save'][] = Array(3, 'removePreviousSecurityGroup', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'removePreviousSecurityGroup'); 
$hook_array['after_save'][] = Array(4, 'sendMMMNotification', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'sendMMMNotification'); 
$hook_array['after_save'][] = Array(5, 'updateWonRfqLocation', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'updateWonRfqLocation'); 
//$hook_array['after_save'][] = Array(6, 'posoCreationApi', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'posoCreationApi'); 
$hook_array['after_save'][] = Array(6, 'accountCreationApi', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'accountCreationApi'); 

$hook_array['before_save'][] = Array(1, 'createNewQuoteGroupForUser', 'custom/modules/AOS_Quotes/AOS_QuotesJjwg_MapsLogicHook.php', 'AOS_QuotesJjwg_MapsLogicHook', 'createNewQuoteGroupForUser'); 

$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(90, 'auditRelationship', 'custom/include/global_logic_hook.php','globalLogicHook', 'auditRelationship');
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(90, 'auditDeleteRelationship', 'custom/include/global_logic_hook.php','globalLogicHook', 'auditDeleteRelationship'); 


?>