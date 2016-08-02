<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 

 $hook_version = 1; 
$hook_array = Array(); 

$hook_array['after_save'][0]= Array(77, 'savePhones', 'custom/modules/abc12_Data/abc12_DataJjwg_MapsLogicHook.php', 'abc12_DataJjwg_MapsLogicHook', 'savePhones'); 
$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(90, 'auditRelationship', 'custom/include/global_logic_hook.php','globalLogicHook', 'auditRelationship');
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(90, 'auditDeleteRelationship', 'custom/include/global_logic_hook.php','globalLogicHook', 'auditDeleteRelationship'); 


?>