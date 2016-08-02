<?php
// created: 2016-06-27 18:22:16
$dictionary["Clus1_Cluster"]["fields"]["rgn_region_clus1_cluster_1"] = array (
  'name' => 'rgn_region_clus1_cluster_1',
  'type' => 'link',
  'relationship' => 'rgn_region_clus1_cluster_1',
  'source' => 'non-db',
  'module' => 'Rgn_Region',
  'bean_name' => 'Rgn_Region',
  'vname' => 'LBL_RGN_REGION_CLUS1_CLUSTER_1_FROM_RGN_REGION_TITLE',
  'id_name' => 'rgn_region_clus1_cluster_1rgn_region_ida',
);
$dictionary["Clus1_Cluster"]["fields"]["rgn_region_clus1_cluster_1_name"] = array (
  'name' => 'rgn_region_clus1_cluster_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RGN_REGION_CLUS1_CLUSTER_1_FROM_RGN_REGION_TITLE',
  'save' => true,
  'id_name' => 'rgn_region_clus1_cluster_1rgn_region_ida',
  'link' => 'rgn_region_clus1_cluster_1',
  'table' => 'rgn_region',
  'module' => 'Rgn_Region',
  'rname' => 'name',
);
$dictionary["Clus1_Cluster"]["fields"]["rgn_region_clus1_cluster_1rgn_region_ida"] = array (
  'name' => 'rgn_region_clus1_cluster_1rgn_region_ida',
  'type' => 'link',
  'relationship' => 'rgn_region_clus1_cluster_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RGN_REGION_CLUS1_CLUSTER_1_FROM_CLUS1_CLUSTER_TITLE',
);
