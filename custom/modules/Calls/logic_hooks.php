<?PHP

$hook_version = 1;
$hook_array = Array();

$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'count', 'modules/Calls_Reschedule/reschedule_count.php', 'reschedule_count', 'count');
$hook_array['after_relationship_add'][] = Array(2, 'updateActivityStatus', 'custom/modules/Calls/CallsJjwg_MapsLogicHook.php','CallsJjwg_MapsLogicHook', 'updateActivityStatus'); 
$hook_array['after_save'][] = Array(3, 'updateAlert', 'custom/modules/Calls/CallsJjwg_MapsLogicHook.php','CallsJjwg_MapsLogicHook', 'updateAlert'); 

