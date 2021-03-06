<?php
$module_name = 'FP_Event_Locations';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => '',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'address',
            'label' => 'LBL_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'address_type_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_postalcode',
            'label' => 'LBL_ADDRESS_POSTALCODE',
          ),
          1 => 
          array (
            'name' => 'rgn_region_fp_event_locations_name',
            'label' => 'LBL_RGN_REGION_FP_EVENT_LOCATIONS_FROM_RGN_REGION_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
