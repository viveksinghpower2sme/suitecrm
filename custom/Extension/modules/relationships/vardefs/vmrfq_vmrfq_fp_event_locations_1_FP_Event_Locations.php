<?php
// created: 2016-05-25 13:56:10
$dictionary["FP_Event_Locations"]["fields"]["vmrfq_vmrfq_fp_event_locations_1"] = array (
  'name' => 'vmrfq_vmrfq_fp_event_locations_1',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_fp_event_locations_1',
  'source' => 'non-db',
  'module' => 'VMRFQ_VMRFQ',
  'bean_name' => 'VMRFQ_VMRFQ',
  'vname' => 'LBL_VMRFQ_VMRFQ_FP_EVENT_LOCATIONS_1_FROM_VMRFQ_VMRFQ_TITLE',
  'id_name' => 'vmrfq_vmrfq_fp_event_locations_1vmrfq_vmrfq_ida',
);
$dictionary["FP_Event_Locations"]["fields"]["vmrfq_vmrfq_fp_event_locations_1_name"] = array (
  'name' => 'vmrfq_vmrfq_fp_event_locations_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VMRFQ_VMRFQ_FP_EVENT_LOCATIONS_1_FROM_VMRFQ_VMRFQ_TITLE',
  'save' => true,
  'id_name' => 'vmrfq_vmrfq_fp_event_locations_1vmrfq_vmrfq_ida',
  'link' => 'vmrfq_vmrfq_fp_event_locations_1',
  'table' => 'vmrfq_vmrfq',
  'module' => 'VMRFQ_VMRFQ',
  'rname' => 'name',
);
$dictionary["FP_Event_Locations"]["fields"]["vmrfq_vmrfq_fp_event_locations_1vmrfq_vmrfq_ida"] = array (
  'name' => 'vmrfq_vmrfq_fp_event_locations_1vmrfq_vmrfq_ida',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_fp_event_locations_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VMRFQ_VMRFQ_FP_EVENT_LOCATIONS_1_FROM_FP_EVENT_LOCATIONS_TITLE',
);
