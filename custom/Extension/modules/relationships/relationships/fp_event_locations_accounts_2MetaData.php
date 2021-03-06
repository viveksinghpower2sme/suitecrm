<?php
// created: 2016-05-18 16:36:19
$dictionary["fp_event_locations_accounts_2"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fp_event_locations_accounts_2' => 
    array (
      'lhs_module' => 'FP_Event_Locations',
      'lhs_table' => 'fp_event_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fp_event_locations_accounts_2_c',
      'join_key_lhs' => 'fp_event_locations_accounts_2fp_event_locations_ida',
      'join_key_rhs' => 'fp_event_locations_accounts_2accounts_idb',
    ),
  ),
  'table' => 'fp_event_locations_accounts_2_c',
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
      'name' => 'fp_event_locations_accounts_2fp_event_locations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fp_event_locations_accounts_2accounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fp_event_locations_accounts_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fp_event_locations_accounts_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fp_event_locations_accounts_2fp_event_locations_ida',
        1 => 'fp_event_locations_accounts_2accounts_idb',
      ),
    ),
  ),
);