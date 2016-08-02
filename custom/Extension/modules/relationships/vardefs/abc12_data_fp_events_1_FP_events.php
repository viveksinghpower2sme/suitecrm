<?php
// created: 2016-03-22 16:02:48
$dictionary["FP_events"]["fields"]["abc12_data_fp_events_1"] = array (
  'name' => 'abc12_data_fp_events_1',
  'type' => 'link',
  'relationship' => 'abc12_data_fp_events_1',
  'source' => 'non-db',
  'module' => 'abc12_Data',
  'bean_name' => 'abc12_Data',
  'vname' => 'LBL_ABC12_DATA_FP_EVENTS_1_FROM_ABC12_DATA_TITLE',
  'id_name' => 'abc12_data_fp_events_1abc12_data_ida',
);
$dictionary["FP_events"]["fields"]["abc12_data_fp_events_1_name"] = array (
  'name' => 'abc12_data_fp_events_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_FP_EVENTS_1_FROM_ABC12_DATA_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_fp_events_1abc12_data_ida',
  'link' => 'abc12_data_fp_events_1',
  'table' => 'abc12_data',
  'module' => 'abc12_Data',
  'rname' => 'name',
);
$dictionary["FP_events"]["fields"]["abc12_data_fp_events_1abc12_data_ida"] = array (
  'name' => 'abc12_data_fp_events_1abc12_data_ida',
  'type' => 'link',
  'relationship' => 'abc12_data_fp_events_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ABC12_DATA_FP_EVENTS_1_FROM_FP_EVENTS_TITLE',
);
