<?php
// created: 2016-06-13 17:42:14
$dictionary["users_aos_quotes_3"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'users_aos_quotes_3' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Quotes',
      'rhs_table' => 'aos_quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'users_aos_quotes_3_c',
      'join_key_lhs' => 'users_aos_quotes_3users_ida',
      'join_key_rhs' => 'users_aos_quotes_3aos_quotes_idb',
    ),
  ),
  'table' => 'users_aos_quotes_3_c',
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
      'name' => 'users_aos_quotes_3users_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'users_aos_quotes_3aos_quotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'users_aos_quotes_3spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'users_aos_quotes_3_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'users_aos_quotes_3users_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'users_aos_quotes_3_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'users_aos_quotes_3aos_quotes_idb',
      ),
    ),
  ),
);