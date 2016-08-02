<?php
 // created: 2016-05-16 15:02:21
$layout_defs["FP_Event_Locations"]["subpanel_setup"]['vend_vendor_fp_event_locations_1'] = array (
  'order' => 100,
  'module' => 'vend_Vendor',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEND_VENDOR_FP_EVENT_LOCATIONS_1_FROM_VEND_VENDOR_TITLE',
  'get_subpanel_data' => 'vend_vendor_fp_event_locations_1',
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
