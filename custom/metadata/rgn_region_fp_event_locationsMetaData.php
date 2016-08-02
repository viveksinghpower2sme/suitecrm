<?php
// created: 2016-05-18 17:59:36
$dictionary["rgn_region_fp_event_locations"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'rgn_region_fp_event_locations' => 
    array (
      'lhs_module' => 'Rgn_Region',
      'lhs_table' => 'rgn_region',
      'lhs_key' => 'id',
      'rhs_module' => 'FP_Event_Locations',
      'rhs_table' => 'fp_event_locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rgn_region_fp_event_locations_c',
      'join_key_lhs' => 'rgn_region_fp_event_locationsrgn_region_ida',
      'join_key_rhs' => 'rgn_region_fp_event_locationsfp_event_locations_idb',
    ),
  ),
  'table' => 'rgn_region_fp_event_locations_c',
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
      'name' => 'rgn_region_fp_event_locationsrgn_region_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rgn_region_fp_event_locationsfp_event_locations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rgn_region_fp_event_locationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rgn_region_fp_event_locations_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'rgn_region_fp_event_locationsrgn_region_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'rgn_region_fp_event_locations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rgn_region_fp_event_locationsfp_event_locations_idb',
      ),
    ),
  ),
);