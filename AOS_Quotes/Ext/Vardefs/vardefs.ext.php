<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2016-06-27 12:54:33
$dictionary['AOS_Quotes']['fields']['account_type_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['account_type_c']['labelValue']='Account Type';

 

 // created: 2016-06-17 16:23:58
$dictionary['AOS_Quotes']['fields']['customer_taxation_preference_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['customer_taxation_preference_c']['labelValue']='Customer Taxation Preference';

 

// created: 2016-05-25 12:49:48
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_1"] = array (
  'name' => 'fp_event_locations_aos_quotes_1',
  'type' => 'link',
  'relationship' => 'fp_event_locations_aos_quotes_1',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_1_FROM_FP_EVENT_LOCATIONS_TITLE',
  'id_name' => 'fp_event_locations_aos_quotes_1fp_event_locations_ida',
);
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_1_name"] = array (
  'name' => 'fp_event_locations_aos_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_1_FROM_FP_EVENT_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'fp_event_locations_aos_quotes_1fp_event_locations_ida',
  'link' => 'fp_event_locations_aos_quotes_1',
  'table' => 'fp_event_locations',
  'module' => 'FP_Event_Locations',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_1fp_event_locations_ida"] = array (
  'name' => 'fp_event_locations_aos_quotes_1fp_event_locations_ida',
  'type' => 'link',
  'relationship' => 'fp_event_locations_aos_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-06-23 13:26:40
$dictionary['AOS_Quotes']['fields']['date_entered']['comments']='Date record created';
$dictionary['AOS_Quotes']['fields']['date_entered']['merge_filter']='disabled';

 

 // created: 2016-06-17 16:22:49
$dictionary['AOS_Quotes']['fields']['stage']['required']=false;
$dictionary['AOS_Quotes']['fields']['stage']['inline_edit']=true;
$dictionary['AOS_Quotes']['fields']['stage']['merge_filter']='disabled';

 

 // created: 2016-07-26 12:29:05
$dictionary['AOS_Quotes']['fields']['lost_rfq_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['lost_rfq_c']['labelValue']='Lost RFQ';

 

 // created: 2016-06-21 13:50:47
$dictionary['AOS_Quotes']['fields']['opportunity_source_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['opportunity_source_c']['labelValue']='Opportunity Source';

 

 // created: 2016-07-22 11:39:55
$dictionary['AOS_Quotes']['fields']['b_country_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_country_c']['labelValue']='Country';

 

 // created: 2016-07-19 18:25:44
$dictionary['AOS_Quotes']['fields']['range_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['range_c']['labelValue']='Range';

 

// created: 2016-06-27 13:43:35
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_fp_event_locations_3"] = array (
  'name' => 'aos_quotes_fp_event_locations_3',
  'type' => 'link',
  'relationship' => 'aos_quotes_fp_event_locations_3',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_FP_EVENT_LOCATIONS_3_FROM_FP_EVENT_LOCATIONS_TITLE',
);


 // created: 2016-07-20 11:16:10
$dictionary['AOS_Quotes']['fields']['mode_of_payment_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['mode_of_payment_c']['labelValue']='Mode Of Payment';

 

 // created: 2016-07-19 18:27:05
$dictionary['AOS_Quotes']['fields']['division_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['division_c']['labelValue']='Division';

 

// created: 2016-06-13 17:42:14
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_3"] = array (
  'name' => 'users_aos_quotes_3',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_3',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_AOS_QUOTES_3_FROM_USERS_TITLE',
  'id_name' => 'users_aos_quotes_3users_ida',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_3_name"] = array (
  'name' => 'users_aos_quotes_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_AOS_QUOTES_3_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_aos_quotes_3users_ida',
  'link' => 'users_aos_quotes_3',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_3users_ida"] = array (
  'name' => 'users_aos_quotes_3users_ida',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_AOS_QUOTES_3_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-06-21 13:37:32
$dictionary['AOS_Quotes']['fields']['comments_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['comments_c']['labelValue']='Comments';

 

// created: 2016-05-25 18:32:20
$dictionary["AOS_Quotes"]["fields"]["vmrfq_vmrfq_aos_quotes_1"] = array (
  'name' => 'vmrfq_vmrfq_aos_quotes_1',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_aos_quotes_1',
  'source' => 'non-db',
  'module' => 'VMRFQ_VMRFQ',
  'bean_name' => 'VMRFQ_VMRFQ',
  'vname' => 'LBL_VMRFQ_VMRFQ_AOS_QUOTES_1_FROM_VMRFQ_VMRFQ_TITLE',
  'id_name' => 'vmrfq_vmrfq_aos_quotes_1vmrfq_vmrfq_ida',
);
$dictionary["AOS_Quotes"]["fields"]["vmrfq_vmrfq_aos_quotes_1_name"] = array (
  'name' => 'vmrfq_vmrfq_aos_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VMRFQ_VMRFQ_AOS_QUOTES_1_FROM_VMRFQ_VMRFQ_TITLE',
  'save' => true,
  'id_name' => 'vmrfq_vmrfq_aos_quotes_1vmrfq_vmrfq_ida',
  'link' => 'vmrfq_vmrfq_aos_quotes_1',
  'table' => 'vmrfq_vmrfq',
  'module' => 'VMRFQ_VMRFQ',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["vmrfq_vmrfq_aos_quotes_1vmrfq_vmrfq_ida"] = array (
  'name' => 'vmrfq_vmrfq_aos_quotes_1vmrfq_vmrfq_ida',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_aos_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VMRFQ_VMRFQ_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-05-27 17:25:11
$dictionary['AOS_Quotes']['fields']['form_type_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['form_type_c']['labelValue']='Form Type';

 

 // created: 2016-07-29 17:52:42
$dictionary['AOS_Quotes']['fields']['goods_confirmation_status_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['goods_confirmation_status_c']['labelValue']='Goods Confirmation Status';

 

 // created: 2016-06-08 18:21:56
$dictionary['AOS_Quotes']['fields']['warehouse_desc_country_c']['inline_edit']=1;

 

 // created: 2016-06-15 12:03:28
$dictionary['AOS_Quotes']['fields']['customer_loading_payment_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['customer_loading_payment_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['customer_loading_payment_c']['labelValue']='Customer Loading Payment';
$dictionary['AOS_Quotes']['fields']['customer_loading_payment_c']['enable_range_search']='1';

 

 // created: 2016-07-20 15:37:03
$dictionary['AOS_Quotes']['fields']['nbfc_partner_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['nbfc_partner_c']['labelValue']='NBFC Partner';

 

 // created: 2016-07-09 14:48:59
$dictionary['AOS_Quotes']['fields']['billing_contact']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['billing_contact']['merge_filter']='disabled';

 

 // created: 2016-07-09 15:07:37
$dictionary['AOS_Quotes']['fields']['total_amount']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['total_amount']['merge_filter']='disabled';

 

 // created: 2016-07-22 11:54:41
$dictionary['AOS_Quotes']['fields']['b_ecc_no_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_ecc_no_c']['labelValue']='ECC No';

 

 // created: 2016-07-22 20:43:17
$dictionary['AOS_Quotes']['fields']['address2_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['address2_c']['labelValue']='Address 2';

 

 // created: 2016-06-23 11:35:00
$dictionary['AOS_Quotes']['fields']['virtual_account_no_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['virtual_account_no_c']['labelValue']='Virtual Account No.';

 

// created: 2016-06-28 16:37:23
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_1"] = array (
  'name' => 'aos_quotes_documents_1',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


 // created: 2016-07-22 11:48:20
$dictionary['AOS_Quotes']['fields']['b_cst_no_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_cst_no_c']['labelValue']='CST No.';

 

 // created: 2016-07-22 11:33:40
$dictionary['AOS_Quotes']['fields']['b_city_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_city_c']['labelValue']='City';

 

 // created: 2016-07-22 11:30:04
$dictionary['AOS_Quotes']['fields']['b_address2_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['b_address2_c']['labelValue']='Address 2';

 

 // created: 2016-06-08 18:21:55
$dictionary['AOS_Quotes']['fields']['warehouse_desc_state_c']['inline_edit']=1;

 

// created: 2016-06-27 13:42:41
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_fp_event_locations_2"] = array (
  'name' => 'aos_quotes_fp_event_locations_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_fp_event_locations_2',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_FP_EVENT_LOCATIONS_2_FROM_FP_EVENT_LOCATIONS_TITLE',
);


 // created: 2016-06-17 16:18:02
$dictionary['AOS_Quotes']['fields']['customer_tax_percent_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['customer_tax_percent_c']['labelValue']='Customer Tax Percent';

 

$dictionary['AOS_Quotes']['fields']['file_mime_type'] = array(
  'name' => 'file_mime_type',
  'vname' => 'LBL_FILE_MIME_TYPE',
  'type' => 'varchar',
  'len' => '100',
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['file_url1'] = array(
  'name'=>'file_url',
  'vname' => 'LBL_FILE_URL',
  'type'=>'function',
  'function_class'=>'UploadFile',
  'function_name'=>'get_upload_url_1',
  'function_params'=> array('filename','id','module_dir'),
  'function_params_source'=>'this',
  'source'=>'function',
  'reportable'=>false,
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['filename'] = array(
  'name' => 'filename',
  'vname' => 'LBL_FILENAME',
  'type' => 'file',
  'dbType' => 'varchar',
  'len' => '255',
  'reportable'=>true,
  'docType'=> 'gaurav',
  'importable' => false,
);

$dictionary['AOS_Quotes']['fields']['file_mime_type_1'] = array(
  'name' => 'file_mime_type_1',
  'vname' => 'LBL_FILE_MIME_TYPE',
  'type' => 'varchar',
  'len' => '100',
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['file_url_1'] = array(
  'name'=>'file_url_1',
  'vname' => 'LBL_FILE_URL',
  'type'=>'function',
  'function_class'=>'UploadFile',
  'function_name'=>'get_upload_url',
  'function_params_source'=>'this',
  'function_params'=> array('$this'),
  'source'=>'function',
  'reportable'=>false,
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['filename_1'] = array(
  'name' => 'filename_1',
  'vname' => 'LBL_FILENAME',
  'type' => 'file',
  'dbType' => 'varchar',
  'docType'=> 'gaurav',
  'len' => '255',
  'reportable'=>true,
  'importable' => false,
);

 // created: 2016-06-17 16:15:05
$dictionary['AOS_Quotes']['fields']['expiration']['required']=false;
$dictionary['AOS_Quotes']['fields']['expiration']['inline_edit']=true;
$dictionary['AOS_Quotes']['fields']['expiration']['merge_filter']='disabled';
$dictionary['AOS_Quotes']['fields']['expiration']['display_default']='';

 

 // created: 2016-06-28 12:18:57
$dictionary['AOS_Quotes']['fields']['po_number_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['po_number_c']['labelValue']='PO Number';

 

 // created: 2016-06-08 18:21:56
$dictionary['AOS_Quotes']['fields']['warehouse_desc_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['warehouse_desc_c']['labelValue']='';

 

 // created: 2016-06-17 16:25:17
$dictionary['AOS_Quotes']['fields']['dispatch_from_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['dispatch_from_c']['labelValue']='Dispatch From';

 

 // created: 2016-07-11 15:29:27
$dictionary['AOS_Quotes']['fields']['save_only_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['save_only_c']['labelValue']='Save Only';

 

 // created: 2016-07-22 11:36:37
$dictionary['AOS_Quotes']['fields']['b_state_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_state_c']['labelValue']='State';

 

 // created: 2016-07-26 11:48:24
$dictionary['AOS_Quotes']['fields']['lost_comments_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['lost_comments_c']['labelValue']='Lost Comments';

 

 // created: 2016-07-22 12:17:57
$dictionary['AOS_Quotes']['fields']['tin_no_reasons_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['tin_no_reasons_c']['labelValue']='Reason for Non-Availability of TIN No.';

 

 // created: 2016-07-09 14:49:13
$dictionary['AOS_Quotes']['fields']['billing_account']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['billing_account']['merge_filter']='disabled';

 

 // created: 2016-07-22 11:57:30
$dictionary['AOS_Quotes']['fields']['b_division_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_division_c']['labelValue']='Division';

 

 // created: 2016-06-16 11:26:37
$dictionary['AOS_Quotes']['fields']['warehouse_location_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['warehouse_location_c']['labelValue']='Warehouse Code';

 

 // created: 2016-07-19 18:31:02
$dictionary['AOS_Quotes']['fields']['address_type_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['address_type_c']['labelValue']='Address Type';

 

 // created: 2016-07-20 10:50:43
$dictionary['AOS_Quotes']['fields']['price_status_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['price_status_c']['labelValue']='Price Status';

 

// created: 2016-06-13 17:37:35
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_2"] = array (
  'name' => 'users_aos_quotes_2',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_2',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_AOS_QUOTES_2_FROM_USERS_TITLE',
  'id_name' => 'users_aos_quotes_2users_ida',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_2_name"] = array (
  'name' => 'users_aos_quotes_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_AOS_QUOTES_2_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_aos_quotes_2users_ida',
  'link' => 'users_aos_quotes_2',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_2users_ida"] = array (
  'name' => 'users_aos_quotes_2users_ida',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_AOS_QUOTES_2_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-07-21 16:21:22
$dictionary['AOS_Quotes']['fields']['finance_approved_margin_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['finance_approved_margin_c']['labelValue']='finance approved margin';

 

 // created: 2016-07-19 18:34:40
$dictionary['AOS_Quotes']['fields']['address_code_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['address_code_c']['labelValue']='Address Code';

 

 // created: 2016-07-21 17:31:31
$dictionary['AOS_Quotes']['fields']['global_vendor_credit_days_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['global_vendor_credit_days_c']['labelValue']='Vendor Credit Days';

 

// created: 2016-06-27 13:54:27
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_2"] = array (
  'name' => 'fp_event_locations_aos_quotes_2',
  'type' => 'link',
  'relationship' => 'fp_event_locations_aos_quotes_2',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'id_name' => 'fp_event_locations_aos_quotes_2fp_event_locations_ida',
);
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_2_name"] = array (
  'name' => 'fp_event_locations_aos_quotes_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_FP_EVENT_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'fp_event_locations_aos_quotes_2fp_event_locations_ida',
  'link' => 'fp_event_locations_aos_quotes_2',
  'table' => 'fp_event_locations',
  'module' => 'FP_Event_Locations',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["fp_event_locations_aos_quotes_2fp_event_locations_ida"] = array (
  'name' => 'fp_event_locations_aos_quotes_2fp_event_locations_ida',
  'type' => 'link',
  'relationship' => 'fp_event_locations_aos_quotes_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FP_EVENT_LOCATIONS_AOS_QUOTES_2_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-07-21 17:43:19
$dictionary['AOS_Quotes']['fields']['dso_days_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['dso_days_c']['labelValue']='DSO Days';

 

 // created: 2016-07-22 12:50:01
$dictionary['AOS_Quotes']['fields']['b_address_code_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_address_code_c']['labelValue']='Address Code';

 

 // created: 2016-07-15 18:55:01
$dictionary['AOS_Quotes']['fields']['total_margin_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['total_margin_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['total_margin_c']['labelValue']='Markup Margin %';
$dictionary['AOS_Quotes']['fields']['total_margin_c']['enable_range_search']='1';

 

 // created: 2016-07-19 18:22:30
$dictionary['AOS_Quotes']['fields']['country_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['country_c']['labelValue']='Country';

 

 // created: 2016-07-22 20:54:45
$dictionary['AOS_Quotes']['fields']['postcode_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['postcode_c']['labelValue']='Postcode';

 

 // created: 2016-06-21 13:49:11
$dictionary['AOS_Quotes']['fields']['source_type_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['source_type_c']['labelValue']='Source Type';

 

// created: 2016-06-28 16:42:28
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_2"] = array (
  'name' => 'aos_quotes_documents_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_2',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_DOCUMENTS_TITLE',
  'id_name' => 'aos_quotes_documents_2documents_idb',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_2_name"] = array (
  'name' => 'aos_quotes_documents_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_DOCUMENTS_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_documents_2documents_idb',
  'link' => 'aos_quotes_documents_2',
  'table' => 'documents',
  'module' => 'Documents',
  'rname' => 'document_name',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_2documents_idb"] = array (
  'name' => 'aos_quotes_documents_2documents_idb',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_DOCUMENTS_TITLE',
);


 // created: 2016-06-17 16:15:23
$dictionary['AOS_Quotes']['fields']['goods_requirement_time_upto_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['goods_requirement_time_upto_c']['labelValue']='Goods Requirement Time Frame Upto';

 

 // created: 2016-05-27 17:39:15
$dictionary['AOS_Quotes']['fields']['total_sales_value_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['total_sales_value_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['total_sales_value_c']['labelValue']='Total Sales Value';
$dictionary['AOS_Quotes']['fields']['total_sales_value_c']['enable_range_search']='1';

 

 // created: 2016-05-27 12:36:58
$dictionary['AOS_Quotes']['fields']['vendor_loading_charge_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['vendor_loading_charge_c']['labelValue']='Vendor Loading Charge(inclusive taxes)';

 

 // created: 2016-07-22 11:29:04
$dictionary['AOS_Quotes']['fields']['b_address1_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_address1_c']['labelValue']='Address 1';

 

 // created: 2016-06-11 16:39:33
$dictionary['AOS_Quotes']['fields']['total_line_items_qty_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['total_line_items_qty_c']['labelValue']='Total Line Items Qty';

 

 // created: 2016-05-27 17:37:38
$dictionary['AOS_Quotes']['fields']['discount_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['discount_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['discount_c']['labelValue']='Discount';
$dictionary['AOS_Quotes']['fields']['discount_c']['enable_range_search']='1';

 

 // created: 2016-06-08 18:21:55
$dictionary['AOS_Quotes']['fields']['warehouse_desc_city_c']['inline_edit']=1;

 

 // created: 2016-06-17 16:16:05
$dictionary['AOS_Quotes']['fields']['goods_requirement_time_from_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['goods_requirement_time_from_c']['labelValue']='Goods Requirement Time Frame From';

 

 // created: 2016-07-20 10:47:41
$dictionary['AOS_Quotes']['fields']['finance_status_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['finance_status_c']['labelValue']='Finance Status';

 

 // created: 2016-07-22 11:55:38
$dictionary['AOS_Quotes']['fields']['b_range_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_range_c']['labelValue']='Range';

 

// created: 2016-07-29 16:44:58
$dictionary["AOS_Quotes"]["fields"]["leads_aos_quotes_1"] = array (
  'name' => 'leads_aos_quotes_1',
  'type' => 'link',
  'relationship' => 'leads_aos_quotes_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_AOS_QUOTES_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_aos_quotes_1leads_ida',
);
$dictionary["AOS_Quotes"]["fields"]["leads_aos_quotes_1_name"] = array (
  'name' => 'leads_aos_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_AOS_QUOTES_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_aos_quotes_1leads_ida',
  'link' => 'leads_aos_quotes_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["AOS_Quotes"]["fields"]["leads_aos_quotes_1leads_ida"] = array (
  'name' => 'leads_aos_quotes_1leads_ida',
  'type' => 'link',
  'relationship' => 'leads_aos_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
);


// created: 2016-06-13 17:35:47
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_1"] = array (
  'name' => 'users_aos_quotes_1',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_AOS_QUOTES_1_FROM_USERS_TITLE',
  'id_name' => 'users_aos_quotes_1users_ida',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_1_name"] = array (
  'name' => 'users_aos_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_AOS_QUOTES_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_aos_quotes_1users_ida',
  'link' => 'users_aos_quotes_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_1users_ida"] = array (
  'name' => 'users_aos_quotes_1users_ida',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-06-08 18:21:55
$dictionary['AOS_Quotes']['fields']['warehouse_desc_postalcode_c']['inline_edit']=1;

 

 // created: 2016-07-19 18:24:22
$dictionary['AOS_Quotes']['fields']['cst_no_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['cst_no_c']['labelValue']='CST No';

 

 // created: 2016-07-19 18:26:25
$dictionary['AOS_Quotes']['fields']['collectorate_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['collectorate_c']['labelValue']='Collectorate';

 

 // created: 2016-07-20 15:46:34
$dictionary['AOS_Quotes']['fields']['mode_of_secured_business_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['mode_of_secured_business_c']['labelValue']='Mode Of Secured Business';

 

 // created: 2016-05-27 12:40:11
$dictionary['AOS_Quotes']['fields']['professional_charge_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['professional_charge_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['professional_charge_c']['labelValue']='Professional Charge(inclusive taxes)';
$dictionary['AOS_Quotes']['fields']['professional_charge_c']['enable_range_search']='1';

 

 // created: 2016-06-23 15:37:52
$dictionary['AOS_Quotes']['fields']['customer_credit_days_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['customer_credit_days_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['customer_credit_days_c']['labelValue']='Credit Days';
$dictionary['AOS_Quotes']['fields']['customer_credit_days_c']['enable_range_search']='1';

 

 // created: 2016-07-09 14:51:25
$dictionary['AOS_Quotes']['fields']['name']['required']=false;
$dictionary['AOS_Quotes']['fields']['name']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['name']['duplicate_merge']='disabled';
$dictionary['AOS_Quotes']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['AOS_Quotes']['fields']['name']['merge_filter']='disabled';
$dictionary['AOS_Quotes']['fields']['name']['unified_search']=false;
$dictionary['AOS_Quotes']['fields']['name']['importable']='false';

 

// created: 2016-06-13 17:20:59
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_quser_quoteuser_2"] = array (
  'name' => 'aos_quotes_quser_quoteuser_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_quser_quoteuser_2',
  'source' => 'non-db',
  'module' => 'quser_QuoteUser',
  'bean_name' => 'quser_QuoteUser',
  'vname' => 'LBL_AOS_QUOTES_QUSER_QUOTEUSER_2_FROM_QUSER_QUOTEUSER_TITLE',
);


 // created: 2016-05-27 12:42:13
$dictionary['AOS_Quotes']['fields']['customer_freight_payment_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['customer_freight_payment_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['customer_freight_payment_c']['labelValue']='Customer Freight Payment';
$dictionary['AOS_Quotes']['fields']['customer_freight_payment_c']['enable_range_search']='1';

 

 // created: 2016-07-22 20:53:58
$dictionary['AOS_Quotes']['fields']['b_postcode_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_postcode_c']['labelValue']='Postcode';

 

// created: 2016-05-30 13:27:10
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_vmrfq_vmrfq_1"] = array (
  'name' => 'aos_quotes_vmrfq_vmrfq_1',
  'type' => 'link',
  'relationship' => 'aos_quotes_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'module' => 'VMRFQ_VMRFQ',
  'bean_name' => 'VMRFQ_VMRFQ',
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_VMRFQ_VMRFQ_1_FROM_VMRFQ_VMRFQ_TITLE',
);


 // created: 2016-07-09 14:50:10
$dictionary['AOS_Quotes']['fields']['rfq_state_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['rfq_state_c']['labelValue']='RFQ Stage';
$dictionary['AOS_Quotes']['fields']['number']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['assigned_user_name']['inline_edit']='';

 

 // created: 2016-06-08 19:38:27
$dictionary['AOS_Quotes']['fields']['warehouse_address_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['warehouse_address_c']['labelValue']='Warehouse Address';

 

 // created: 2016-07-19 18:21:11
$dictionary['AOS_Quotes']['fields']['city_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['city_c']['labelValue']='City';

 

 // created: 2016-07-07 10:45:38
$dictionary['AOS_Quotes']['fields']['category_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['category_c']['labelValue']='Commodity';

 

 // created: 2016-06-15 11:59:02
$dictionary['AOS_Quotes']['fields']['vendor_freight_charge_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['vendor_freight_charge_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['vendor_freight_charge_c']['labelValue']='Vendor Freight Charge(inclusive taxes)';
$dictionary['AOS_Quotes']['fields']['vendor_freight_charge_c']['enable_range_search']='1';

 

// created: 2016-06-23 11:12:02
$dictionary["AOS_Quotes"]["fields"]["bank_bank_aos_quotes"] = array (
  'name' => 'bank_bank_aos_quotes',
  'type' => 'link',
  'relationship' => 'bank_bank_aos_quotes',
  'source' => 'non-db',
  'module' => 'bank_Bank',
  'bean_name' => false,
  'vname' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_BANK_BANK_TITLE',
  'id_name' => 'bank_bank_aos_quotesbank_bank_ida',
);
$dictionary["AOS_Quotes"]["fields"]["bank_bank_aos_quotes_name"] = array (
  'name' => 'bank_bank_aos_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_BANK_BANK_TITLE',
  'save' => true,
  'id_name' => 'bank_bank_aos_quotesbank_bank_ida',
  'link' => 'bank_bank_aos_quotes',
  'table' => 'bank_bank',
  'module' => 'bank_Bank',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["bank_bank_aos_quotesbank_bank_ida"] = array (
  'name' => 'bank_bank_aos_quotesbank_bank_ida',
  'type' => 'link',
  'relationship' => 'bank_bank_aos_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_AOS_QUOTES_TITLE',
);


 // created: 2016-07-25 16:50:14
$dictionary['AOS_Quotes']['fields']['payment_method_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['payment_method_c']['labelValue']='Payment Method';

 

 // created: 2016-07-04 17:36:26
$dictionary['AOS_Quotes']['fields']['good_cnf_rejec_comm_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['good_cnf_rejec_comm_c']['labelValue']='good cnf rejec comm';

 

// created: 2016-06-27 13:41:43
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_fp_event_locations_1"] = array (
  'name' => 'aos_quotes_fp_event_locations_1',
  'type' => 'link',
  'relationship' => 'aos_quotes_fp_event_locations_1',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_FP_EVENT_LOCATIONS_1_FROM_FP_EVENT_LOCATIONS_TITLE',
);


 // created: 2016-07-19 18:25:04
$dictionary['AOS_Quotes']['fields']['ecc_no_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['ecc_no_c']['labelValue']='ECC No';

 

 // created: 2016-07-13 14:03:47
$dictionary['AOS_Quotes']['fields']['total_margin_percent_revenue_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['total_margin_percent_revenue_c']['labelValue']='Total Margin %';

 

 // created: 2016-07-08 17:23:46
$dictionary['AOS_Quotes']['fields']['freight_charge_borne_by_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['freight_charge_borne_by_c']['labelValue']='Freight Charge Borne By P2s?';

 

 // created: 2016-07-22 15:15:45
$dictionary['AOS_Quotes']['fields']['b_tin_no_reasons_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_tin_no_reasons_c']['labelValue']='Reason for Non-Availability of TIN No.';

 

 // created: 2016-07-19 18:21:54
$dictionary['AOS_Quotes']['fields']['state_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['state_c']['labelValue']='State';

 

 // created: 2016-07-22 11:42:04
$dictionary['AOS_Quotes']['fields']['b_tin_no_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_tin_no_c']['labelValue']='TIN No';

 

 // created: 2016-07-09 14:19:10
$dictionary['AOS_Quotes']['fields']['need_excise_exclusive_price_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['need_excise_exclusive_price_c']['labelValue']='Customer Needs Excise Exclusive Price?';

 

 // created: 2016-05-27 17:41:44
$dictionary['AOS_Quotes']['fields']['payment_amount_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['payment_amount_c']['options']='numeric_range_search_dom';
$dictionary['AOS_Quotes']['fields']['payment_amount_c']['labelValue']='Payment Amount';
$dictionary['AOS_Quotes']['fields']['payment_amount_c']['enable_range_search']='1';

 

 // created: 2016-07-14 00:18:18
$dictionary['AOS_Quotes']['fields']['delivery_within_days_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['delivery_within_days_c']['labelValue']='Delivery Within Days';

 

 // created: 2016-07-22 12:20:00
$dictionary['AOS_Quotes']['fields']['b_address_type_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_address_type_c']['labelValue']='Address Type ';

 

 // created: 2016-06-16 15:56:12
$dictionary['AOS_Quotes']['fields']['scm_comments_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['scm_comments_c']['labelValue']='SCM Comments';

 

 // created: 2016-07-22 20:44:15
$dictionary['AOS_Quotes']['fields']['address1_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['address1_c']['labelValue']='Address 1';

 

 // created: 2016-06-28 23:15:04
$dictionary['AOS_Quotes']['fields']['other_account_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['other_account_c']['labelValue']='Other Account';

 

 // created: 2016-06-27 13:45:44
$dictionary['AOS_Quotes']['fields']['parent_quote_id_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['parent_quote_id_c']['labelValue']='parent quote id';

 

 // created: 2016-07-04 17:37:24
$dictionary['AOS_Quotes']['fields']['finance_rejec_comm_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['finance_rejec_comm_c']['labelValue']='finance rejec comm';

 

 // created: 2016-07-22 11:56:29
$dictionary['AOS_Quotes']['fields']['b_collectorate_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['b_collectorate_c']['labelValue']='Collectorate';

 

 // created: 2016-07-22 20:45:48
$dictionary['AOS_Quotes']['fields']['tin_no_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['tin_no_c']['labelValue']='TIN No';

 

 // created: 2016-07-02 14:00:18
$dictionary['AOS_Quotes']['fields']['expected_delivery_date_c']['inline_edit']='';
$dictionary['AOS_Quotes']['fields']['expected_delivery_date_c']['labelValue']='Expected Delivery Date';

 

 // created: 2016-05-27 17:42:25
$dictionary['AOS_Quotes']['fields']['payment_c']['inline_edit']='1';
$dictionary['AOS_Quotes']['fields']['payment_c']['labelValue']='Payment %';

 
?>