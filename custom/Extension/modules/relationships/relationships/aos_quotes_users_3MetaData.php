<?php
// created: 2016-06-13 16:15:41
$dictionary["aos_quotes_users_3"] = array (
  'true_relationship_type' => 'one-to-one',
  'from_studio' => true,
  'relationships' => 
  array (
    'aos_quotes_users_3' => 
    array (
      'lhs_module' => 'AOS_Quotes',
      'lhs_table' => 'aos_quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'aos_quotes_users_3_c',
      'join_key_lhs' => 'aos_quotes_users_3aos_quotes_ida',
      'join_key_rhs' => 'aos_quotes_users_3users_idb',
    ),
  ),
  'table' => 'aos_quotes_users_3_c',
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
      'name' => 'aos_quotes_users_3aos_quotes_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'aos_quotes_users_3users_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'aos_quotes_users_3spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'aos_quotes_users_3_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'aos_quotes_users_3aos_quotes_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'aos_quotes_users_3_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'aos_quotes_users_3users_idb',
      ),
    ),
  ),
);