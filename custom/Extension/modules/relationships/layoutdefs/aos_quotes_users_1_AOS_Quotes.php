<?php
 // created: 2016-06-13 17:23:48
$layout_defs["AOS_Quotes"]["subpanel_setup"]['aos_quotes_users_1'] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_QUOTES_USERS_1_FROM_USERS_TITLE',
  'get_subpanel_data' => 'aos_quotes_users_1',
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
