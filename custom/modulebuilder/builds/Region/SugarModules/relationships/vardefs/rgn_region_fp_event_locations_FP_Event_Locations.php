<?php
// created: 2016-05-18 17:59:36
$dictionary["FP_Event_Locations"]["fields"]["rgn_region_fp_event_locations"] = array (
  'name' => 'rgn_region_fp_event_locations',
  'type' => 'link',
  'relationship' => 'rgn_region_fp_event_locations',
  'source' => 'non-db',
  'module' => 'Rgn_Region',
  'bean_name' => false,
  'vname' => 'LBL_RGN_REGION_FP_EVENT_LOCATIONS_FROM_RGN_REGION_TITLE',
  'id_name' => 'rgn_region_fp_event_locationsrgn_region_ida',
);
$dictionary["FP_Event_Locations"]["fields"]["rgn_region_fp_event_locations_name"] = array (
  'name' => 'rgn_region_fp_event_locations_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RGN_REGION_FP_EVENT_LOCATIONS_FROM_RGN_REGION_TITLE',
  'save' => true,
  'id_name' => 'rgn_region_fp_event_locationsrgn_region_ida',
  'link' => 'rgn_region_fp_event_locations',
  'table' => 'rgn_region',
  'module' => 'Rgn_Region',
  'rname' => 'name',
);
$dictionary["FP_Event_Locations"]["fields"]["rgn_region_fp_event_locationsrgn_region_ida"] = array (
  'name' => 'rgn_region_fp_event_locationsrgn_region_ida',
  'type' => 'link',
  'relationship' => 'rgn_region_fp_event_locations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RGN_REGION_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
);
