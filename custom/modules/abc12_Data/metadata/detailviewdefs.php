<?php
$module_name = 'abc12_Data';
$_object_name = 'abc12_data';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 
          array (
            'customCode' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}<input title="{$MOD.LBL_CONVERTDATA_TITLE}" accessKey="{$MOD.LBL_CONVERTDATA_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=abc12_Data&action=ConvertData&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTDATA}">{/if}',
            'sugar_html' => 
            array (
              'type' => 'button',
              'value' => '{$MOD.LBL_CONVERTDATA}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_CONVERTDATA_TITLE}',
                'accessKey' => '{$MOD.LBL_CONVERTDATA_BUTTON_KEY}',
                'class' => 'button',
                'onClick' => 'document.location=\'index.php?module=abc12_Data&action=ConvertData&record={$fields.id.value}\'',
                'name' => 'convert',
                'id' => 'convert_data_button',
              ),
              'template' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}[CONTENT]{/if}',
            ),
          ),
          4 => 'FIND_DUPLICATES',
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account_name_c',
            'label' => 'LBL_ACCOUNT_NAME',
          ),
          1 => 
          array (
            'name' => 'businesstype_c',
            'label' => 'LBL_BUSINESSTYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'phone_office',
            'studio' => 'false',
            'label' => 'Phone Office',
            'customCode' => '{$DISPPHONENUMBERS}',
          ),
        ),
        3 => 
        array (
          0 => 'email1',
        ),
        4 => 
        array (
          0 => 'phone_alternate',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'lead_source_c',
            'studio' => 'visible',
            'label' => 'LBL_LEAD_SOURCE',
          ),
        ),
        6 => 
        array (
          0 => 'website',
          1 => 
          array (
            'name' => 'designation_c',
            'label' => 'LBL_DESIGNATION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'grade_c',
            'label' => 'LBL_GRADE',
          ),
          1 => 'assigned_user_name',
        ),
        8 => 
        array (
          0 => 'billing_address_street',
          1 => 'annual_revenue',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'pan_c',
            'label' => 'LBL_PAN',
          ),
          1 => 
          array (
            'name' => 'vat_c',
            'label' => 'LBL_VAT',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'cst_c',
            'label' => 'LBL_CST',
          ),
          1 => 
          array (
            'name' => 'tan_c',
            'label' => 'LBL_TAN',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'servicetax_c',
            'label' => 'LBL_SERVICETAX',
          ),
          1 => 
          array (
            'name' => 'excise_c',
            'label' => 'LBL_EXCISE',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'ssi_c',
            'label' => 'LBL_SSI',
          ),
          1 => 
          array (
            'name' => 'epf_c',
            'label' => 'LBL_EPF',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'turnover_c',
            'label' => 'LBL_TURNOVER',
          ),
          1 => 'description',
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        15 => 
        array (
          0 => 'ticker_symbol',
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'disposition_c',
            'label' => 'LBL_DISPOSITION_C',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'yearofincorporation_c',
            'label' => 'LBL_YEAROFINCORPORATION',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'abc12_data_leads_1_name',
          ),
        ),
        19 => 
        array (
          0 => 
          array (
            'name' => 'region_c',
            'studio' => 'visible',
            'label' => 'LBL_REGION',
          ),
          1 => 
          array (
            'name' => 'vertical_c',
            'studio' => 'visible',
            'label' => 'LBL_VERTICAL',
          ),
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'date_new_c',
            'label' => 'LBL_DATE_NEW',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
