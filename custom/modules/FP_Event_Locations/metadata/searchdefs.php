<?php
$module_name = 'FP_Event_Locations';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'contacts_fp_event_locations_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_FP_EVENT_LOCATIONS_1_FROM_CONTACTS_TITLE',
        'id' => 'CONTACTS_FP_EVENT_LOCATIONS_1CONTACTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_fp_event_locations_1_name',
      ),
      'vend_vendor_fp_event_locations_2_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_VEND_VENDOR_FP_EVENT_LOCATIONS_2_FROM_VEND_VENDOR_TITLE',
        'id' => 'VEND_VENDOR_FP_EVENT_LOCATIONS_2VEND_VENDOR_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'vend_vendor_fp_event_locations_2_name',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
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
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
