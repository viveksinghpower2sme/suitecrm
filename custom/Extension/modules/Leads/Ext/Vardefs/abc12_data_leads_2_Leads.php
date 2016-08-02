<?php
// created: 2016-03-30 10:59:30
$dictionary["Lead"]["fields"]["abc12_data_leads_2"] = array (
  'name' => 'abc12_data_leads_2',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_2',
  'source' => 'non-db',
  'module' => 'abc12_Data',
  'bean_name' => 'abc12_Data',
  'vname' => 'LBL_ABC12_DATA_LEADS_2_FROM_ABC12_DATA_TITLE',
  'id_name' => 'abc12_data_leads_2abc12_data_ida',
);
$dictionary["Lead"]["fields"]["abc12_data_leads_2_name"] = array (
  'name' => 'abc12_data_leads_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_LEADS_2_FROM_ABC12_DATA_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_leads_2abc12_data_ida',
  'link' => 'abc12_data_leads_2',
  'table' => 'abc12_data',
  'module' => 'abc12_Data',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["abc12_data_leads_2abc12_data_ida"] = array (
  'name' => 'abc12_data_leads_2abc12_data_ida',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ABC12_DATA_LEADS_2_FROM_ABC12_DATA_TITLE',
);
