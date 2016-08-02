<?php
// created: 2016-01-07 16:35:43
$dictionary["phone_phone_leads"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'phone_phone_leads' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'phone_Phone',
      'rhs_table' => 'phone_phone',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'phone_phone_leads_c',
      'join_key_lhs' => 'phone_phone_leadsleads_ida',
      'join_key_rhs' => 'phone_phone_leadsphone_phone_idb',
    ),
  ),
  'table' => 'phone_phone_leads_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'phone_phone_leadsleads_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'phone_phone_leadsphone_phone_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'phone_phone_leadsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'phone_phone_leads_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'phone_phone_leadsleads_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'phone_phone_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'phone_phone_leadsphone_phone_idb',
      ),
    ),
  ),
);