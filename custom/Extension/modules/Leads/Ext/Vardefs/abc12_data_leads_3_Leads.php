<?php
// created: 2016-03-16 17:12:25
$dictionary["Lead"]["fields"]["abc12_data_leads_3"] = array (
  'name' => 'abc12_data_leads_3',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_3',
  'source' => 'non-db',
  'module' => 'abc12_Data',
  'bean_name' => 'abc12_Data',
  'vname' => 'LBL_ABC12_DATA_LEADS_3_FROM_ABC12_DATA_TITLE',
  'id_name' => 'abc12_data_leads_3abc12_data_ida',
);
$dictionary["Lead"]["fields"]["abc12_data_leads_3_name"] = array (
  'name' => 'abc12_data_leads_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_LEADS_3_FROM_ABC12_DATA_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_leads_3abc12_data_ida',
  'link' => 'abc12_data_leads_3',
  'table' => 'abc12_data',
  'module' => 'abc12_Data',
  'rname' => 'name',
);
$dictionary["Lead"]["fields"]["abc12_data_leads_3abc12_data_ida"] = array (
  'name' => 'abc12_data_leads_3abc12_data_ida',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ABC12_DATA_LEADS_3_FROM_ABC12_DATA_TITLE',
);
