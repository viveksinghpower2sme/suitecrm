<?php
 // created: 2016-05-16 12:13:58
$layout_defs["AOS_Products"]["subpanel_setup"]['vend_vendor_aos_products_1'] = array (
  'order' => 100,
  'module' => 'vend_Vendor',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEND_VENDOR_AOS_PRODUCTS_1_FROM_VEND_VENDOR_TITLE',
  'get_subpanel_data' => 'vend_vendor_aos_products_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
