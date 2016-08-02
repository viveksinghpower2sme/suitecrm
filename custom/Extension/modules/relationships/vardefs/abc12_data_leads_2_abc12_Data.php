<?php
// created: 2016-03-30 10:59:30
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_2"] = array (
  'name' => 'abc12_data_leads_2',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_2',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_ABC12_DATA_LEADS_2_FROM_LEADS_TITLE',
  'id_name' => 'abc12_data_leads_2leads_idb',
);
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_2_name"] = array (
  'name' => 'abc12_data_leads_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_LEADS_2_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_leads_2leads_idb',
  'link' => 'abc12_data_leads_2',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_2leads_idb"] = array (
  'name' => 'abc12_data_leads_2leads_idb',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ABC12_DATA_LEADS_2_FROM_LEADS_TITLE',
);
