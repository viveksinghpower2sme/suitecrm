<?php
 // created: 2016-05-18 16:36:19
$layout_defs["Accounts"]["subpanel_setup"]['fp_event_locations_accounts_2'] = array (
  'order' => 100,
  'module' => 'FP_Event_Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENT_LOCATIONS_ACCOUNTS_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'get_subpanel_data' => 'fp_event_locations_accounts_2',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
