<?php
// created: 2016-06-27 18:09:56
$dictionary["clus1_cluster_rgn_region_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'clus1_cluster_rgn_region_1' => 
    array (
      'lhs_module' => 'Clus1_Cluster',
      'lhs_table' => 'clus1_cluster',
      'lhs_key' => 'id',
      'rhs_module' => 'Rgn_Region',
      'rhs_table' => 'rgn_region',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'clus1_cluster_rgn_region_1_c',
      'join_key_lhs' => 'clus1_cluster_rgn_region_1clus1_cluster_ida',
      'join_key_rhs' => 'clus1_cluster_rgn_region_1rgn_region_idb',
    ),
  ),
  'table' => 'clus1_cluster_rgn_region_1_c',
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
      'name' => 'clus1_cluster_rgn_region_1clus1_cluster_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'clus1_cluster_rgn_region_1rgn_region_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'clus1_cluster_rgn_region_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'clus1_cluster_rgn_region_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'clus1_cluster_rgn_region_1clus1_cluster_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'clus1_cluster_rgn_region_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'clus1_cluster_rgn_region_1rgn_region_idb',
      ),
    ),
  ),
);