<?php
// created: 2016-06-27 18:22:16
$dictionary["rgn_region_clus1_cluster_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'rgn_region_clus1_cluster_1' => 
    array (
      'lhs_module' => 'Rgn_Region',
      'lhs_table' => 'rgn_region',
      'lhs_key' => 'id',
      'rhs_module' => 'Clus1_Cluster',
      'rhs_table' => 'clus1_cluster',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'rgn_region_clus1_cluster_1_c',
      'join_key_lhs' => 'rgn_region_clus1_cluster_1rgn_region_ida',
      'join_key_rhs' => 'rgn_region_clus1_cluster_1clus1_cluster_idb',
    ),
  ),
  'table' => 'rgn_region_clus1_cluster_1_c',
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
      'name' => 'rgn_region_clus1_cluster_1rgn_region_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'rgn_region_clus1_cluster_1clus1_cluster_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'rgn_region_clus1_cluster_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'rgn_region_clus1_cluster_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'rgn_region_clus1_cluster_1rgn_region_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'rgn_region_clus1_cluster_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'rgn_region_clus1_cluster_1clus1_cluster_idb',
      ),
    ),
  ),
);