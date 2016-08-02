<?php
 // created: 2016-05-25 13:51:33
$layout_defs["VMRFQ_VMRFQ"]["subpanel_setup"]['vmrfq_vmrfq_vend_vendor'] = array (
  'order' => 100,
  'module' => 'vend_Vendor',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_VMRFQ_VMRFQ_VEND_VENDOR_FROM_VEND_VENDOR_TITLE',
  'get_subpanel_data' => 'vmrfq_vmrfq_vend_vendor',
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
