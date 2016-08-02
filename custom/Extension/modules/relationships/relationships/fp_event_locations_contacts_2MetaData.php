<?php
// created: 2016-05-18 15:34:35
$dictionary["fp_event_locations_contacts_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'fp_event_locations_contacts_2' => 
    array (
      'lhs_module' => 'FP_Event_Locations',
      'lhs_table' => 'fp_event_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'fp_event_locations_contacts_2_c',
      'join_key_lhs' => 'fp_event_locations_contacts_2fp_event_locations_ida',
      'join_key_rhs' => 'fp_event_locations_contacts_2contacts_idb',
    ),
  ),
  'table' => 'fp_event_locations_contacts_2_c',
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
      'name' => 'fp_event_locations_contacts_2fp_event_locations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'fp_event_locations_contacts_2contacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'fp_event_locations_contacts_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'fp_event_locations_contacts_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'fp_event_locations_contacts_2fp_event_locations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'fp_event_locations_contacts_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'fp_event_locations_contacts_2contacts_idb',
      ),
    ),
  ),
);