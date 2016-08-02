<?php

$viewdefs ['Accounts'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
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
          'file' => 'modules/Accounts/Account.js',
        ),
        1 => 
        array (
          'file' => 'custom/modules/Accounts/js/edit.js',
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
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'website',
          ),
          1 => 
          array (
            'name' => 'pan_c',
            'label' => 'LBL_PAN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ecc_number_c',
            'label' => 'LBL_ECC_NUMBER',
          ),
          1 => 
          array (
            'name' => 'tin_c',
            'label' => 'LBL_TIN',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cin_c',
            'label' => 'LBL_CIN',
          ),
          1 => 
          array (
            'name' => 'cst_number_c',
            'label' => 'LBL_CST_NUMBER',
          ),
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
