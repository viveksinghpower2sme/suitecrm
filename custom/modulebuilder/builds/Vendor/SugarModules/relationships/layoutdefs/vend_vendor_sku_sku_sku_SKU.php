<?php
 // created: 2016-05-16 11:57:56
$layout_defs["sku_SKU"]["subpanel_setup"]['vend_vendor_sku_sku'] = array (
  'order' => 100,
  'module' => 'vend_Vendor',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VEND_VENDOR_SKU_SKU_FROM_VEND_VENDOR_TITLE',
  'get_subpanel_data' => 'vend_vendor_sku_sku',
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
