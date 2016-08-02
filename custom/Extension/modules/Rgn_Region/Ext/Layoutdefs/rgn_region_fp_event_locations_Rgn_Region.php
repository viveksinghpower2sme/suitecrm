<?php
 // created: 2016-05-18 17:59:36
$layout_defs["Rgn_Region"]["subpanel_setup"]['rgn_region_fp_event_locations'] = array (
  'order' => 100,
  'module' => 'FP_Event_Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RGN_REGION_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
  'get_subpanel_data' => 'rgn_region_fp_event_locations',
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
