<?php
// created: 2016-02-10 16:46:56
$dictionary["phone_phone_accounts_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'phone_phone_accounts_1' => 
    array (
      'lhs_module' => 'phone_Phone',
      'lhs_table' => 'phone_phone',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'phone_phone_accounts_1_c',
      'join_key_lhs' => 'phone_phone_accounts_1phone_phone_ida',
      'join_key_rhs' => 'phone_phone_accounts_1accounts_idb',
    ),
  ),
  'table' => 'phone_phone_accounts_1_c',
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
      'name' => 'phone_phone_accounts_1phone_phone_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'phone_phone_accounts_1accounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'phone_phone_accounts_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'phone_phone_accounts_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'phone_phone_accounts_1phone_phone_ida',
        1 => 'phone_phone_accounts_1accounts_idb',
      ),
    ),
  ),
);