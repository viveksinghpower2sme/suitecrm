<?php
 // created: 2016-05-18 16:37:22
$layout_defs["FP_Event_Locations"]["subpanel_setup"]['fp_event_locations_leads_1'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENT_LOCATIONS_LEADS_1_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'fp_event_locations_leads_1',
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
