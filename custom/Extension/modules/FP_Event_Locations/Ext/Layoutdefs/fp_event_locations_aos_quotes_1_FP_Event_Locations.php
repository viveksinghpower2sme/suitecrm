<?php
 // created: 2016-05-25 12:49:48
$layout_defs["FP_Event_Locations"]["subpanel_setup"]['fp_event_locations_aos_quotes_1'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'fp_event_locations_aos_quotes_1',
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
