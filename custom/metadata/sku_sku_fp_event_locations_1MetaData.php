<?php
// created: 2016-05-25 13:41:17
$dictionary["sku_sku_fp_event_locations_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'sku_sku_fp_event_locations_1' => 
    array (
      'lhs_module' => 'sku_SKU',
      'lhs_table' => 'sku_sku',
      'lhs_key' => 'id',
      'rhs_module' => 'FP_Event_Locations',
      'rhs_table' => 'fp_event_locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'sku_sku_fp_event_locations_1_c',
      'join_key_lhs' => 'sku_sku_fp_event_locations_1sku_sku_ida',
      'join_key_rhs' => 'sku_sku_fp_event_locations_1fp_event_locations_idb',
    ),
  ),
  'table' => 'sku_sku_fp_event_locations_1_c',
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
      'name' => 'sku_sku_fp_event_locations_1sku_sku_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'sku_sku_fp_event_locations_1fp_event_locations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'sku_sku_fp_event_locations_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'sku_sku_fp_event_locations_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'sku_sku_fp_event_locations_1sku_sku_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'sku_sku_fp_event_locations_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'sku_sku_fp_event_locations_1fp_event_locations_idb',
      ),
    ),
  ),
);