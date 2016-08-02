<?php
 // created: 2016-06-11 16:44:08
$layout_defs["quser_QuoteUser"]["subpanel_setup"]['quser_quoteuser_users'] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUSER_QUOTEUSER_USERS_FROM_USERS_TITLE',
  'get_subpanel_data' => 'quser_quoteuser_users',
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
