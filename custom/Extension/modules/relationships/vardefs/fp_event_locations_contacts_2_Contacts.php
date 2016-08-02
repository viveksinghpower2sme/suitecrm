<?php
// created: 2016-05-18 15:34:35
$dictionary["Contact"]["fields"]["fp_event_locations_contacts_2"] = array (
  'name' => 'fp_event_locations_contacts_2',
  'type' => 'link',
  'relationship' => 'fp_event_locations_contacts_2',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_CONTACTS_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'id_name' => 'fp_event_locations_contacts_2fp_event_locations_ida',
);
$dictionary["Contact"]["fields"]["fp_event_locations_contacts_2_name"] = array (
  'name' => 'fp_event_locations_contacts_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_CONTACTS_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'fp_event_locations_contacts_2fp_event_locations_ida',
  'link' => 'fp_event_locations_contacts_2',
  'table' => 'fp_event_locations',
  'module' => 'FP_Event_Locations',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["fp_event_locations_contacts_2fp_event_locations_ida"] = array (
  'name' => 'fp_event_locations_contacts_2fp_event_locations_ida',
  'type' => 'link',
  'relationship' => 'fp_event_locations_contacts_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_CONTACTS_2_FROM_CONTACTS_TITLE',
);
