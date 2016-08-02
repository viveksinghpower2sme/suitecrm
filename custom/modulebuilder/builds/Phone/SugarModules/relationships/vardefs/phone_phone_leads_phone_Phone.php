<?php
// created: 2016-01-07 16:35:43
$dictionary["phone_Phone"]["fields"]["phone_phone_leads"] = array (
  'name' => 'phone_phone_leads',
  'type' => 'link',
  'relationship' => 'phone_phone_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_PHONE_PHONE_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'phone_phone_leadsleads_ida',
);
$dictionary["phone_Phone"]["fields"]["phone_phone_leads_name"] = array (
  'name' => 'phone_phone_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PHONE_PHONE_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'phone_phone_leadsleads_ida',
  'link' => 'phone_phone_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["phone_Phone"]["fields"]["phone_phone_leadsleads_ida"] = array (
  'name' => 'phone_phone_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'phone_phone_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PHONE_PHONE_LEADS_FROM_PHONE_PHONE_TITLE',
);
