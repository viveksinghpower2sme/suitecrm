<?php
// created: 2016-03-21 13:58:34
$dictionary["FP_events"]["fields"]["abc12_data_fp_events_3"] = array (
  'name' => 'abc12_data_fp_events_3',
  'type' => 'link',
  'relationship' => 'abc12_data_fp_events_3',
  'source' => 'non-db',
  'module' => 'abc12_Data',
  'bean_name' => 'abc12_Data',
  'vname' => 'LBL_ABC12_DATA_FP_EVENTS_3_FROM_ABC12_DATA_TITLE',
  'id_name' => 'abc12_data_fp_events_3abc12_data_ida',
);
$dictionary["FP_events"]["fields"]["abc12_data_fp_events_3_name"] = array (
  'name' => 'abc12_data_fp_events_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_FP_EVENTS_3_FROM_ABC12_DATA_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_fp_events_3abc12_data_ida',
  'link' => 'abc12_data_fp_events_3',
  'table' => 'abc12_data',
  'module' => 'abc12_Data',
  'rname' => 'name',
);
$dictionary["FP_events"]["fields"]["abc12_data_fp_events_3abc12_data_ida"] = array (
  'name' => 'abc12_data_fp_events_3abc12_data_ida',
  'type' => 'link',
  'relationship' => 'abc12_data_fp_events_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ABC12_DATA_FP_EVENTS_3_FROM_FP_EVENTS_TITLE',
);
