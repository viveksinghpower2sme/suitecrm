<?php
// created: 2016-03-16 17:12:25
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_3"] = array (
  'name' => 'abc12_data_leads_3',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_3',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_ABC12_DATA_LEADS_3_FROM_LEADS_TITLE',
  'id_name' => 'abc12_data_leads_3leads_idb',
);
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_3_name"] = array (
  'name' => 'abc12_data_leads_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ABC12_DATA_LEADS_3_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'abc12_data_leads_3leads_idb',
  'link' => 'abc12_data_leads_3',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["abc12_Data"]["fields"]["abc12_data_leads_3leads_idb"] = array (
  'name' => 'abc12_data_leads_3leads_idb',
  'type' => 'link',
  'relationship' => 'abc12_data_leads_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_ABC12_DATA_LEADS_3_FROM_LEADS_TITLE',
);
