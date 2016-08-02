<?php
// created: 2016-05-19 13:22:09
$dictionary["verti_vertical_clus1_cluster_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'verti_vertical_clus1_cluster_1' => 
    array (
      'lhs_module' => 'verti_Vertical',
      'lhs_table' => 'verti_vertical',
      'lhs_key' => 'id',
      'rhs_module' => 'Clus1_Cluster',
      'rhs_table' => 'clus1_cluster',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'verti_vertical_clus1_cluster_1_c',
      'join_key_lhs' => 'verti_vertical_clus1_cluster_1verti_vertical_ida',
      'join_key_rhs' => 'verti_vertical_clus1_cluster_1clus1_cluster_idb',
    ),
  ),
  'table' => 'verti_vertical_clus1_cluster_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'verti_vertical_clus1_cluster_1verti_vertical_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'verti_vertical_clus1_cluster_1clus1_cluster_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'verti_vertical_clus1_cluster_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'verti_vertical_clus1_cluster_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'verti_vertical_clus1_cluster_1verti_vertical_ida',
        1 => 'verti_vertical_clus1_cluster_1clus1_cluster_idb',
      ),
    ),
  ),
);