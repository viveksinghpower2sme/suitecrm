<?php
// created: 2016-05-25 15:59:26
$dictionary["FP_Event_Locations"]["fields"]["contacts_fp_event_locations_1"] = array (
  'name' => 'contacts_fp_event_locations_1',
  'type' => 'link',
  'relationship' => 'contacts_fp_event_locations_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_FP_EVENT_LOCATIONS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_fp_event_locations_1contacts_ida',
);
$dictionary["FP_Event_Locations"]["fields"]["contacts_fp_event_locations_1_name"] = array (
  'name' => 'contacts_fp_event_locations_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_FP_EVENT_LOCATIONS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_fp_event_locations_1contacts_ida',
  'link' => 'contacts_fp_event_locations_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["FP_Event_Locations"]["fields"]["contacts_fp_event_locations_1contacts_ida"] = array (
  'name' => 'contacts_fp_event_locations_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_fp_event_locations_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_FP_EVENT_LOCATIONS_1_FROM_FP_EVENT_LOCATIONS_TITLE',
);
