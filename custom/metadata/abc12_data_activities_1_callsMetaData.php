<?php
// created: 2016-08-01 16:22:25
$dictionary["abc12_data_activities_1_calls"] = array (
  'relationships' => 
  array (
    'abc12_data_activities_1_calls' => 
    array (
      'lhs_module' => 'abc12_Data',
      'lhs_table' => 'abc12_data',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'abc12_Data',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);