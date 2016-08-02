<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
        //<input title="Save" accesskey="a" class="button primary" onclick="var _form = document.getElementById('EditView'); _form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="Save" id="SAVE_HEADER">
           0 => 
          array (
            'customCode' => '<input title="Save" accesskey="a" class="button primary" onclick="var _form = document.getElementById(\'EditView\'); _form.action.value=\'Save\'; if(check_custom_data(\'EditView\'))SUGAR.ajaxUI.submitForm(_form);return false;" name="button" id="SAVE_HEADER" type="submit" value="Save">',
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
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
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
          0 => 
          array (
            'name' => 'sme_id_c',
            'label' => 'LBL_SME_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pan_c',
            'label' => 'LBL_PAN',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cin_c',
            'label' => 'LBL_CIN',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'cust_post_grp_c',
            'studio' => 'visible',
            'label' => 'LBL_CUST_POST_GRP',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'gen_bus_pos_c',
            'studio' => 'visible',
            'label' => 'LBL_GEN_BUS_POS',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => '',
          1 => '',
        ),
        7 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => '',
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
          0 => '',
          1 => '',
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
        5 => 
        array (
          0 => '',
          1 => '',
        ),
        6 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
