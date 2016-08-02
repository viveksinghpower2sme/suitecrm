<?php
 // created: 2016-04-26 17:33:56
$layout_defs["Users"]["subpanel_setup"]['clust_cluster_users'] = array (
  'order' => 100,
  'module' => 'Clust_Cluster',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CLUST_CLUSTER_USERS_FROM_CLUST_CLUSTER_TITLE',
  'get_subpanel_data' => 'clust_cluster_users',
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
