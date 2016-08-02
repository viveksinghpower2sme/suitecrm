<?php
 // created: 2016-04-05 18:06:32
$layout_defs["phone_Phone"]["subpanel_setup"]['phone_phone_leads_1'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PHONE_PHONE_LEADS_1_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'phone_phone_leads_1',
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
