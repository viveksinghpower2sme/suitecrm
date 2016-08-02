<?php
 // created: 2016-01-07 16:35:43
$layout_defs["Contacts"]["subpanel_setup"]['phone_phone_contacts'] = array (
  'order' => 100,
  'module' => 'phone_Phone',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PHONE_PHONE_CONTACTS_FROM_PHONE_PHONE_TITLE',
  'get_subpanel_data' => 'phone_phone_contacts',
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
