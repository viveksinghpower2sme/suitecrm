<?php
$viewdefs ['Leads'] = 
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
            'customCode' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}<input title="{$MOD.LBL_CONVERTLEAD_TITLE}" accessKey="{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTLEAD}">{/if}',
            'sugar_html' => 
            array (
              'type' => 'button',
              'value' => '{$MOD.LBL_CONVERTLEAD}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_CONVERTLEAD_TITLE}',
                'accessKey' => '{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}',
                'class' => 'button',
                'onClick' => 'document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'',
                'name' => 'convert',
                'id' => 'convert_lead_button',
              ),
              'template' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}[CONTENT]{/if}',
            ),
          ),
          4 => 'FIND_DUPLICATES',
          5 => 
          array (
            'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'class' => 'button',
                'id' => 'manage_subscriptions_button',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';',
                'name' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              ),
            ),
          ),
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
          ),
        ),
        'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
          'file' => 'modules/Leads/Lead.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
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
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
          ),
          1 => 
          array (
            'name' => 'businesstype_c',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESSTYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'phone_home',
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
          0 => 'website',
          1 => 
          array (
            'name' => 'designation_c',
            'label' => 'LBL_DESIGNATION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'grade_c',
            'label' => 'LBL_GRADE',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALTERNATE_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
            ),
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'pan_c',
            'label' => 'LBL_PAN',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'vat_c',
            'label' => 'LBL_VAT',
          ),
          1 => 
          array (
            'name' => 'cst_c',
            'label' => 'LBL_CST',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'tan_c',
            'label' => 'LBL_TAN',
          ),
          1 => 
          array (
            'name' => 'servicetax_c',
            'label' => 'LBL_SERVICETAX',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'excise_c',
            'label' => 'LBL_EXCISE',
          ),
          1 => 
          array (
            'name' => 'ssi_c',
            'label' => 'LBL_SSI',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'epf_c',
            'label' => 'LBL_EPF',
          ),
          1 => 
          array (
            'name' => 'registration_c',
            'label' => 'LBL_REGISTRATION',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'year_of_incorporation_c',
            'studio' => 'visible',
            'label' => 'LBL_YEAR_OF_INCORPORATION',
          ),
          1 => 
          array (
            'name' => 'turn_over_c',
            'studio' => 'visible',
            'label' => 'LBL_TURN_OVER',
          ),
        ),
        13 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'abc12_data_leads_1_name',
            'label' => 'LBL_ABC12_DATA_LEADS_1_FROM_ABC12_DATA_TITLE',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'accounts_leads_1_name',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => 'lead_source',
        ),
        1 => 
        array (
          0 => 'status_description',
          1 => 'lead_source_description',
        ),
        2 => 
        array (
          0 => 'opportunity_amount',
          1 => 'refered_by',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'region_c',
            'label' => 'LBL_REGION_C',
          ),
          1 => 
          array (
            'name' => 'vertical_c',
            'studio' => 'visible',
            'label' => 'LBL_VERTICAL_C',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'disposition_c',
            'studio' => 'visible',
            'label' => 'LBL_DISPOSITION_C',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'referrer_name_c',
            'label' => 'LBL_REFERRER_NAME',
          ),
        ),
      ),
    ),
  ),
);
?>
