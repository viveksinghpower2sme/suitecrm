<?php
// created: 2016-06-27 13:54:27
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_2"] = array (
  'name' => 'fp_event_locations_aos_quotes_2',
  'type' => 'link',
  'relationship' => 'fp_event_locations_aos_quotes_2',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'id_name' => 'fp_event_locations_aos_quotes_2fp_event_locations_ida',
);
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_2_name"] = array (
  'name' => 'fp_event_locations_aos_quotes_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'fp_event_locations_aos_quotes_2fp_event_locations_ida',
  'link' => 'fp_event_locations_aos_quotes_2',
  'table' => 'fp_event_locations',
  'module' => 'FP_Event_Locations',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_2fp_event_locations_ida"] = array (
  'name' => 'fp_event_locations_aos_quotes_2fp_event_locations_ida',
  'type' => 'link',
  'relationship' => 'fp_event_locations_aos_quotes_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_AOS_QUOTES_TITLE',
);
