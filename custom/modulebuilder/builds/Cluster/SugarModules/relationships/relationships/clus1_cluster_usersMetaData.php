<?php
// created: 2016-04-26 17:39:12
$dictionary["clus1_cluster_users"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'clus1_cluster_users' => 
    array (
      'lhs_module' => 'Clus1_Cluster',
      'lhs_table' => 'clus1_cluster',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'clus1_cluster_users_c',
      'join_key_lhs' => 'clus1_cluster_usersclus1_cluster_ida',
      'join_key_rhs' => 'clus1_cluster_usersusers_idb',
    ),
  ),
  'table' => 'clus1_cluster_users_c',
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
      'name' => 'clus1_cluster_usersclus1_cluster_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'clus1_cluster_usersusers_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'clus1_cluster_usersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'clus1_cluster_users_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'clus1_cluster_usersclus1_cluster_ida',
        1 => 'clus1_cluster_usersusers_idb',
      ),
    ),
  ),
);