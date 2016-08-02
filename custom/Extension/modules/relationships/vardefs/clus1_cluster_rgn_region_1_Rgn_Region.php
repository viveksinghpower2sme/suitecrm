<?php
// created: 2016-06-27 18:09:56
$dictionary["Rgn_Region"]["fields"]["clus1_cluster_rgn_region_1"] = array (
  'name' => 'clus1_cluster_rgn_region_1',
  'type' => 'link',
  'relationship' => 'clus1_cluster_rgn_region_1',
  'source' => 'non-db',
  'module' => 'Clus1_Cluster',
  'bean_name' => 'Clus1_Cluster',
  'vname' => 'LBL_CLUS1_CLUSTER_RGN_REGION_1_FROM_CLUS1_CLUSTER_TITLE',
  'id_name' => 'clus1_cluster_rgn_region_1clus1_cluster_ida',
);
$dictionary["Rgn_Region"]["fields"]["clus1_cluster_rgn_region_1_name"] = array (
  'name' => 'clus1_cluster_rgn_region_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CLUS1_CLUSTER_RGN_REGION_1_FROM_CLUS1_CLUSTER_TITLE',
  'save' => true,
  'id_name' => 'clus1_cluster_rgn_region_1clus1_cluster_ida',
  'link' => 'clus1_cluster_rgn_region_1',
  'table' => 'clus1_cluster',
  'module' => 'Clus1_Cluster',
  'rname' => 'name',
);
$dictionary["Rgn_Region"]["fields"]["clus1_cluster_rgn_region_1clus1_cluster_ida"] = array (
  'name' => 'clus1_cluster_rgn_region_1clus1_cluster_ida',
  'type' => 'link',
  'relationship' => 'clus1_cluster_rgn_region_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CLUS1_CLUSTER_RGN_REGION_1_FROM_RGN_REGION_TITLE',
);
