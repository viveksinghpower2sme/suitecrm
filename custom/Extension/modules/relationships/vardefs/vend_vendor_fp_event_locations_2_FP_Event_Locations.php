<?php
// created: 2016-05-25 18:38:28
$dictionary["FP_Event_Locations"]["fields"]["vend_vendor_fp_event_locations_2"] = array (
  'name' => 'vend_vendor_fp_event_locations_2',
  'type' => 'link',
  'relationship' => 'vend_vendor_fp_event_locations_2',
  'source' => 'non-db',
  'module' => 'vend_Vendor',
  'bean_name' => 'vend_Vendor',
  'vname' => 'LBL_VEND_VENDOR_FP_EVENT_LOCATIONS_2_FROM_VEND_VENDOR_TITLE',
  'id_name' => 'vend_vendor_fp_event_locations_2vend_vendor_ida',
);
$dictionary["FP_Event_Locations"]["fields"]["vend_vendor_fp_event_locations_2_name"] = array (
  'name' => 'vend_vendor_fp_event_locations_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEND_VENDOR_FP_EVENT_LOCATIONS_2_FROM_VEND_VENDOR_TITLE',
  'save' => true,
  'id_name' => 'vend_vendor_fp_event_locations_2vend_vendor_ida',
  'link' => 'vend_vendor_fp_event_locations_2',
  'table' => 'vend_vendor',
  'module' => 'vend_Vendor',
  'rname' => 'name',
);
$dictionary["FP_Event_Locations"]["fields"]["vend_vendor_fp_event_locations_2vend_vendor_ida"] = array (
  'name' => 'vend_vendor_fp_event_locations_2vend_vendor_ida',
  'type' => 'link',
  'relationship' => 'vend_vendor_fp_event_locations_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEND_VENDOR_FP_EVENT_LOCATIONS_2_FROM_FP_EVENT_LOCATIONS_TITLE',
);
