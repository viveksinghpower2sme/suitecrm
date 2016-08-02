<?php
 // created: 2016-05-18 15:33:48
$layout_defs["FP_Event_Locations"]["subpanel_setup"]['fp_event_locations_contacts_1'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENT_LOCATIONS_CONTACTS_1_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'fp_event_locations_contacts_1',
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
