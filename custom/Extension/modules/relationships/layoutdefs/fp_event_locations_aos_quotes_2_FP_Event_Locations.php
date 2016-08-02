<?php
 // created: 2016-06-27 13:54:27
$layout_defs["FP_Event_Locations"]["subpanel_setup"]['fp_event_locations_aos_quotes_2'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'fp_event_locations_aos_quotes_2',
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
