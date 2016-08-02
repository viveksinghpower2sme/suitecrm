<?php
$admin_option_defs = array();

$admin_option_defs['Administration']['Filter_on_history_activity_subpanel'] = array(
    '',
    'LBL_ENABLE_CUSTOM_FILTER_ON_HISTORY_ACTIVITY_SUBPANEL',
    'LBL_ENABLE_CUSTOM_FILTER_ON_HISTORY_ACTIVITY_SUBPANEL_DESCRITOPN',
    'index.php?module=Administration&action=filteronhistory_activity_subpanel'
);
$admin_group_header[] = array(
    'LBL_FILTER_ON_HISTORY_ACTIVITY_SUBAPNEL_SECTION',
    '',
    false,
    $admin_option_defs,
    'LBL_FILTER_ON_HISTORY_ACTIVITY_SUBAPNEL_SECTION_DESCRIPTION'
);

