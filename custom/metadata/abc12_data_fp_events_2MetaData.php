<?php
// created: 2016-03-21 13:57:51
$dictionary["abc12_data_fp_events_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'abc12_data_fp_events_2' => 
    array (
      'lhs_module' => 'abc12_Data',
      'lhs_table' => 'abc12_data',
      'lhs_key' => 'id',
      'rhs_module' => 'FP_events',
      'rhs_table' => 'fp_events',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'abc12_data_fp_events_2_c',
      'join_key_lhs' => 'abc12_data_fp_events_2abc12_data_ida',
      'join_key_rhs' => 'abc12_data_fp_events_2fp_events_idb',
    ),
  ),
  'table' => 'abc12_data_fp_events_2_c',
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
      'name' => 'abc12_data_fp_events_2abc12_data_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'abc12_data_fp_events_2fp_events_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'abc12_data_fp_events_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'abc12_data_fp_events_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'abc12_data_fp_events_2abc12_data_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'abc12_data_fp_events_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'abc12_data_fp_events_2fp_events_idb',
      ),
    ),
  ),
);