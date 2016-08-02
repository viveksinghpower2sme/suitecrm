<?php
 // created: 2016-06-23 11:12:02
$layout_defs["bank_Bank"]["subpanel_setup"]['bank_bank_aos_quotes'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'bank_bank_aos_quotes',
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
