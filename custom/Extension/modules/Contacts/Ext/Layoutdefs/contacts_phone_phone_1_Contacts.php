<?php
 // created: 2016-02-10 16:36:58
$layout_defs["Contacts"]["subpanel_setup"]['contacts_phone_phone_1'] = array (
  'order' => 100,
  'module' => 'phone_Phone',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_PHONE_PHONE_1_FROM_PHONE_PHONE_TITLE',
  'get_subpanel_data' => 'contacts_phone_phone_1',
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
