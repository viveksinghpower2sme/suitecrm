<?php

// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1;
$hook_array = Array();
// position, file, function 
    $hook_array['after_retrieve'] = Array();
    $hook_array['after_retrieve'][] = Array(101, 'acl_fields', 'modules/acl_fields/fields_logic.php', 'acl_fields_logic', 'limit_views');

    $hook_array['process_record'] = Array();
    $hook_array['process_record'][] = Array(101, 'acl_fields', 'modules/acl_fields/logic_for_subpanelAndDashletsList.php', 'acl_fields_logic_sub_dash', 'limit_views_sub_dash');

?>