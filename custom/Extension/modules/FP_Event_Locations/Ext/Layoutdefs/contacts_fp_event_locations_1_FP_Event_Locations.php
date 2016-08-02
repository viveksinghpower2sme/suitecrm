<?php
 // created: 2016-05-25 15:34:24
$layout_defs["FP_Event_Locations"]["subpanel_setup"]['contacts_fp_event_locations_1'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_FP_EVENT_LOCATIONS_1_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'contacts_fp_event_locations_1',
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
