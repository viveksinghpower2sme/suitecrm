<?php
// created: 2016-07-22 20:54:45
$searchFields['AOS_Quotes'] = array (
  'name' => 
  array (
    'query_type' => 'default',
  ),
  'account_type' => 
  array (
    'query_type' => 'default',
    'options' => 'account_type_dom',
    'template_var' => 'ACCOUNT_TYPE_OPTIONS',
  ),
  'industry' => 
  array (
    'query_type' => 'default',
    'options' => 'industry_dom',
    'template_var' => 'INDUSTRY_OPTIONS',
  ),
  'annual_revenue' => 
  array (
    'query_type' => 'default',
  ),
  'address_street' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'billing_address_street',
      1 => 'shipping_address_street',
    ),
  ),
  'address_city' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'billing_address_city',
      1 => 'shipping_address_city',
    ),
  ),
  'address_state' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'billing_address_state',
      1 => 'shipping_address_state',
    ),
  ),
  'address_postalcode' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'billing_address_postalcode',
      1 => 'shipping_address_postalcode',
    ),
  ),
  'address_country' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'billing_address_country',
      1 => 'shipping_address_country',
    ),
  ),
  'rating' => 
  array (
    'query_type' => 'default',
  ),
  'phone' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'phone_office',
    ),
  ),
  'email' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'email1',
      1 => 'email2',
    ),
  ),
  'website' => 
  array (
    'query_type' => 'default',
  ),
  'ownership' => 
  array (
    'query_type' => 'default',
  ),
  'employees' => 
  array (
    'query_type' => 'default',
  ),
  'ticker_symbol' => 
  array (
    'query_type' => 'default',
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
    'vname' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
  ),
  'assigned_user_id' => 
  array (
    'query_type' => 'default',
  ),
  'favorites_only' => 
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT favorites.parent_id FROM favorites
			                    WHERE favorites.deleted = 0
			                        and favorites.parent_type = "AOS_Quotes"
			                        and favorites.assigned_user_id = "1") OR NOT ({0}',
    'db_field' => 
    array (
      0 => 'id',
    ),
  ),
  'range_total_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_expiration' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_expiration' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_expiration' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_customer_credit_days' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_customer_credit_days' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_customer_credit_days' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_vendor_freight_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_vendor_freight_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_vendor_freight_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_professional_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_professional_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_professional_charge' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_customer_loading_payment' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_customer_loading_payment' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_customer_loading_payment' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_customer_freight_payment' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_customer_freight_payment' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_customer_freight_payment' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_discount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_discount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_discount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_total_sales_value' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_sales_value' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_sales_value' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_total_margin' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_margin' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_margin' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_discount_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_discount_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_discount_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_total_margin_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_margin_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_margin_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_total_sales_value_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_sales_value_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_sales_value_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_vendor_freight_charge_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_vendor_freight_charge_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_vendor_freight_charge_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_amount_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_amount_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_amount_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_customer_credit_days_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_customer_credit_days_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_customer_credit_days_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_customer_loading_payment_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_customer_loading_payment_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_customer_loading_payment_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_professional_charge_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_professional_charge_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_professional_charge_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_customer_freight_payment_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_customer_freight_payment_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_customer_freight_payment_c' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
);