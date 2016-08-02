<?php
$module_name = 'FP_Event_Locations';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 
          array (
            'customCode' => '<input title="Save [Alt+S]" accessKey="S" onclick="var _form = document.getElementById(\'EditView\'); _form.action.value=\'Save\'; if(check_custom_data(\'EditView\'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="Save">',
          ),
          1 => 'CANCEL',
        ),
      ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/FP_Event_Locations/js/edit.js',
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
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => '',
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => '',
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'rgn_region_fp_event_locations_name',
          ),
          1 => 
          array (
            'name' => 'contacts_fp_event_locations_1_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contacts_fp_event_locations_2_name',
          ),
          1 => 
          array (
            'name' => 'sku_sku_fp_event_locations_1_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'vmrfq_vmrfq_fp_event_locations_1_name',
          ),
          1 => 
          array (
            'name' => 'vend_vendor_fp_event_locations_2_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'aos_quotes_fp_event_locations_1_name',
          ),
          1 => 
          array (
            'name' => 'aos_quotes_fp_event_locations_2_name',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'aos_quotes_fp_event_locations_3_name',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'address1_c',
            'label' => 'LBL_ADDRESS1',
          ),
          1 => 
          array (
            'name' => 'address2_c',
            'label' => 'LBL_ADDRESS2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'postcode_c',
            'label' => 'LBL_POSTCODE',
          ),
          1 => 
          array (
            'name' => 'state_c',
            'label' => 'LBL_STATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'city_c',
            'label' => 'LBL_CITY',
          ),
          1 => 
          array (
            'name' => 'country_c',
            'label' => 'LBL_COUNTRY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'tin_no_c',
            'label' => 'LBL_TIN_NO',
          ),
          1 => 
          array (
            'name' => 'cst_no_c',
            'label' => 'LBL_CST_NO',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'reason_c',
            'studio' => 'visible',
            'label' => 'LBL_REASON',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'ecc_no_c',
            'label' => 'LBL_ECC_NO',
          ),
          1 => 
          array (
            'name' => 'range_c',
            'label' => 'LBL_RANGE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'collectorate_c',
            'label' => 'LBL_COLLECTORATE',
          ),
          1 => 
          array (
            'name' => 'division_c',
            'label' => 'LBL_DIVISION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'address_type_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
