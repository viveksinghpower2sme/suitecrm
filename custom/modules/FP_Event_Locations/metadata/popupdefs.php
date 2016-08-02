<?php
$popupMeta = array (
    'moduleMain' => 'FP_Event_Locations',
    'varName' => 'FP_Event_Locations',
    'orderBy' => 'fp_event_locations.name',
    'whereClauses' => array (
  'name' => 'fp_event_locations.name',
  'assigned_user_id' => 'fp_event_locations.assigned_user_id',
  'contacts_fp_event_locations_1_name' => 'fp_event_locations.contacts_fp_event_locations_1_name',
  'vend_vendor_fp_event_locations_2_name' => 'fp_event_locations.vend_vendor_fp_event_locations_2_name',
  'address_type_c' => 'fp_event_locations_cstm.address_type_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'assigned_user_id',
  5 => 'contacts_fp_event_locations_1_name',
  6 => 'vend_vendor_fp_event_locations_2_name',
  7 => 'address_type_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
  'contacts_fp_event_locations_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_FP_EVENT_LOCATIONS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_FP_EVENT_LOCATIONS_1CONTACTS_IDA',
    'width' => '10%',
    'name' => 'contacts_fp_event_locations_1_name',
  ),
  'address_type_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_TYPE',
    'width' => '10%',
    'name' => 'address_type_c',
  ),
  'vend_vendor_fp_event_locations_2_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEND_VENDOR_FP_EVENT_LOCATIONS_2_FROM_VEND_VENDOR_TITLE',
    'id' => 'VEND_VENDOR_FP_EVENT_LOCATIONS_2VEND_VENDOR_IDA',
    'width' => '10%',
    'name' => 'vend_vendor_fp_event_locations_2_name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'ADDRESS1_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ADDRESS1',
    'width' => '10%',
    'name' => 'address1_c',
  ),
  'ADDRESS_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_TYPE',
    'width' => '10%',
    'name' => 'address_type_c',
  ),
  'RGN_REGION_FP_EVENT_LOCATIONS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_RGN_REGION_FP_EVENT_LOCATIONS_FROM_RGN_REGION_TITLE',
    'id' => 'RGN_REGION_FP_EVENT_LOCATIONSRGN_REGION_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'rgn_region_fp_event_locations_name',
  ),
  'ADDRESS_CITY' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ADDRESS_CITY',
    'width' => '10%',
    'name' => 'address_city',
  ),
  'POSTCODE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_POSTCODE',
    'width' => '10%',
  ),
),
);
