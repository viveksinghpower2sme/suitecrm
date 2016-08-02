<?php
// created: 2016-03-31 15:32:10
$dictionary["Lead"]["fields"]["abc12_data_leads_1"] = array (
  'name' => 'abc12_data_leads_1',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_1',
  'source' => 'non-db',
  'module' => 'abc12_Data',
  'bean_name' => 'abc12_Data',
  'vname' => 'LBL_ABC12_DATA_LEADS_1_FROM_ABC12_DATA_TITLE',
  'id_name' => 'abc12_data_leads_1abc12_data_ida',
);
$dictionary["Lead"]["fields"]["abc12_data_leads_1_name"] = array (
  'name' => 'abc12_data_leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_LEADS_1_FROM_ABC12_DATA_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_leads_1abc12_data_ida',
  'link' => 'abc12_data_leads_1',
  'table' => 'abc12_data',
  'module' => 'abc12_Data',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["abc12_data_leads_1abc12_data_ida"] = array (
  'name' => 'abc12_data_leads_1abc12_data_ida',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ABC12_DATA_LEADS_1_FROM_ABC12_DATA_TITLE',
);
