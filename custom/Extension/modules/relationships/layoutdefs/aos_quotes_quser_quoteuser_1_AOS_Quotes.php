<?php
 // created: 2016-06-13 16:51:40
$layout_defs["AOS_Quotes"]["subpanel_setup"]['aos_quotes_quser_quoteuser_1'] = array (
  'order' => 100,
  'module' => 'quser_QuoteUser',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_QUOTES_QUSER_QUOTEUSER_1_FROM_QUSER_QUOTEUSER_TITLE',
  'get_subpanel_data' => 'aos_quotes_quser_quoteuser_1',
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
