<?php
 // created: 2016-06-13 17:37:35
$layout_defs["Users"]["subpanel_setup"]['users_aos_quotes_2'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_USERS_AOS_QUOTES_2_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'users_aos_quotes_2',
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
