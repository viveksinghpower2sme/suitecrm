<?php
 // created: 2016-04-26 17:39:12
$layout_defs["Users"]["subpanel_setup"]['clus1_cluster_users'] = array (
  'order' => 100,
  'module' => 'Clus1_Cluster',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CLUS1_CLUSTER_USERS_FROM_CLUS1_CLUSTER_TITLE',
  'get_subpanel_data' => 'clus1_cluster_users',
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
