<?php
$module_name = 'Clus1_Cluster';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'REGION' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_REGION',
    'width' => '10%',
    'default' => true,
  ),
  'VERTICAL' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_VERTICAL',
    'width' => '10%',
    'default' => true,
  ),
);
?>
