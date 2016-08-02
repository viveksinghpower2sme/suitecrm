<?php
$module_name = 'Clust_Cluster';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'VERTICAL' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_VERTICAL',
    'width' => '10%',
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
);
?>
