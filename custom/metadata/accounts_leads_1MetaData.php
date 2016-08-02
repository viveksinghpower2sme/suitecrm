<?php
// created: 2016-06-11 13:55:00
$dictionary["accounts_leads_1"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_leads_1' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_leads_1_c',
      'join_key_lhs' => 'accounts_leads_1accounts_ida',
      'join_key_rhs' => 'accounts_leads_1leads_idb',
    ),
  ),
  'table' => 'accounts_leads_1_c',
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
      'name' => 'accounts_leads_1accounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_leads_1leads_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_leads_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_leads_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_leads_1accounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_leads_1_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_leads_1leads_idb',
      ),
    ),
  ),
);