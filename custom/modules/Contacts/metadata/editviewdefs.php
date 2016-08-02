<?php
$viewdefs ['Contacts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
          1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
          2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
          3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
          4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">',
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
          'file' => 'custom/modules/Leads/js/edit.js',
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
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'last_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_home',
            'comment' => 'Home phone number of the contact',
            'label' => 'LBL_HOME_PHONE',
            'customCode' => '{$PHONENUMBERS}',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'company_name_c',
            'label' => 'LBL_COMPANY_NAME',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'website_c',
            'label' => 'LBL_WEBSITE',
          ),
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
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        6 => 
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
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'service_tax_c',
            'label' => 'LBL_SERVICE_TAX',
          ),
          1 => 
          array (
            'name' => 'excise_c',
            'label' => 'LBL_EXCISE',
          ),
        ),
        9 => 
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
        10 => 
        array (
          0 => 
          array (
            'name' => 'registration_c',
            'label' => 'LBL_REGISTRATION',
          ),
          1 => 
          array (
            'name' => 'yearofincorporation_c',
            'studio' => 'visible',
            'label' => 'LBL_YEAROFINCORPORATION',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'turnover_c',
            'label' => 'LBL_TURNOVER',
          ),
          1 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'fp_event_locations_contacts_1_name',
          ),
          1 => 
          array (
            'name' => 'fp_event_locations_contacts_2_name',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'last_call_modification_c',
            'label' => 'LBL_LAST_CALL_MODIFICATION',
          ),
          1 => '',
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_source',
            'comment' => 'How did the contact come about',
            'label' => 'LBL_LEAD_SOURCE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'report_to_name',
            'label' => 'LBL_REPORTS_TO',
          ),
          1 => 'campaign_name',
        ),
      ),
    ),
  ),
);
?>
