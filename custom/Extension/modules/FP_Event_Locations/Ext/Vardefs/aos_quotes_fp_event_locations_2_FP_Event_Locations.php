<?php
// created: 2016-06-27 13:42:41
$dictionary["FP_Event_Locations"]["fields"]["aos_quotes_fp_event_locations_2"] = array (
  'name' => 'aos_quotes_fp_event_locations_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_fp_event_locations_2',
  'source' => 'non-db',
  'module' => 'AOS_Quotes',
  'bean_name' => 'AOS_Quotes',
  'vname' => 'LBL_AOS_QUOTES_FP_EVENT_LOCATIONS_2_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes_fp_event_locations_2aos_quotes_ida',
);
$dictionary["FP_Event_Locations"]["fields"]["aos_quotes_fp_event_locations_2_name"] = array (
  'name' => 'aos_quotes_fp_event_locations_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_FP_EVENT_LOCATIONS_2_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_fp_event_locations_2aos_quotes_ida',
  'link' => 'aos_quotes_fp_event_locations_2',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["FP_Event_Locations"]["fields"]["aos_quotes_fp_event_locations_2aos_quotes_ida"] = array (
  'name' => 'aos_quotes_fp_event_locations_2aos_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_fp_event_locations_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_FP_EVENT_LOCATIONS_2_FROM_FP_EVENT_LOCATIONS_TITLE',
);
