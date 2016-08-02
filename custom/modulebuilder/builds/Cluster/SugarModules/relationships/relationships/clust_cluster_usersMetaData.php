<?php
// created: 2016-04-26 17:33:56
$dictionary["clust_cluster_users"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'clust_cluster_users' => 
    array (
      'lhs_module' => 'Clust_Cluster',
      'lhs_table' => 'clust_cluster',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'clust_cluster_users_c',
      'join_key_lhs' => 'clust_cluster_usersclust_cluster_ida',
      'join_key_rhs' => 'clust_cluster_usersusers_idb',
    ),
  ),
  'table' => 'clust_cluster_users_c',
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
      'name' => 'clust_cluster_usersclust_cluster_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'clust_cluster_usersusers_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'clust_cluster_usersspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'clust_cluster_users_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'clust_cluster_usersclust_cluster_ida',
        1 => 'clust_cluster_usersusers_idb',
      ),
    ),
  ),
);