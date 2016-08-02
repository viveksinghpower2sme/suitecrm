<?php
 // created: 2016-07-29 16:44:58
$layout_defs["Leads"]["subpanel_setup"]['leads_aos_quotes_1'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'leads_aos_quotes_1',
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
