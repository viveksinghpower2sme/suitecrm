<?php
// created: 2016-05-17 10:37:23
$dictionary["phone_phone_calls_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'phone_phone_calls_1' => 
    array (
      'lhs_module' => 'phone_Phone',
      'lhs_table' => 'phone_phone',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'phone_phone_calls_1_c',
      'join_key_lhs' => 'phone_phone_calls_1phone_phone_ida',
      'join_key_rhs' => 'phone_phone_calls_1calls_idb',
    ),
  ),
  'table' => 'phone_phone_calls_1_c',
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
      'name' => 'phone_phone_calls_1phone_phone_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'phone_phone_calls_1calls_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'phone_phone_calls_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'phone_phone_calls_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'phone_phone_calls_1phone_phone_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'phone_phone_calls_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'phone_phone_calls_1calls_idb',
      ),
    ),
  ),
);