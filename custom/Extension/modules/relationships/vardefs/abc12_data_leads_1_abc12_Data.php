<?php
// created: 2016-03-31 15:32:10
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_1"] = array (
  'name' => 'abc12_data_leads_1',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_ABC12_DATA_LEADS_1_FROM_LEADS_TITLE',
  'id_name' => 'abc12_data_leads_1leads_idb',
);
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_1_name"] = array (
  'name' => 'abc12_data_leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_LEADS_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_leads_1leads_idb',
  'link' => 'abc12_data_leads_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_1leads_idb"] = array (
  'name' => 'abc12_data_leads_1leads_idb',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ABC12_DATA_LEADS_1_FROM_LEADS_TITLE',
);
