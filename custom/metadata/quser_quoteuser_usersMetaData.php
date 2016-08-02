<?php
// created: 2016-06-11 16:44:08
$dictionary["quser_quoteuser_users"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'quser_quoteuser_users' => 
    array (
      'lhs_module' => 'quser_QuoteUser',
      'lhs_table' => 'quser_quoteuser',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quser_quoteuser_users_c',
      'join_key_lhs' => 'quser_quoteuser_usersquser_quoteuser_ida',
      'join_key_rhs' => 'quser_quoteuser_usersusers_idb',
    ),
  ),
  'table' => 'quser_quoteuser_users_c',
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
      'name' => 'quser_quoteuser_usersquser_quoteuser_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quser_quoteuser_usersusers_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quser_quoteuser_usersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quser_quoteuser_users_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quser_quoteuser_usersquser_quoteuser_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quser_quoteuser_users_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quser_quoteuser_usersusers_idb',
      ),
    ),
  ),
);