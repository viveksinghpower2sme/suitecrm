<?php
 // created: 2016-05-25 13:51:33
$layout_defs["VMRFQ_VMRFQ"]["subpanel_setup"]['vmrfq_vmrfq_sku_sku'] = array (
  'order' => 100,
  'module' => 'sku_SKU',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VMRFQ_VMRFQ_SKU_SKU_FROM_SKU_SKU_TITLE',
  'get_subpanel_data' => 'vmrfq_vmrfq_sku_sku',
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
