<?php
// created: 2016-05-27 17:28:53
$dictionary["VMRFQ_VMRFQ"]["fields"]["sku_sku_vmrfq_vmrfq_2"] = array (
  'name' => 'sku_sku_vmrfq_vmrfq_2',
  'type' => 'link',
  'relationship' => 'sku_sku_vmrfq_vmrfq_2',
  'source' => 'non-db',
  'module' => 'sku_SKU',
  'bean_name' => 'sku_SKU',
  'vname' => 'LBL_SKU_SKU_VMRFQ_VMRFQ_2_FROM_SKU_SKU_TITLE',
  'id_name' => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["sku_sku_vmrfq_vmrfq_2_name"] = array (
  'name' => 'sku_sku_vmrfq_vmrfq_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SKU_SKU_VMRFQ_VMRFQ_2_FROM_SKU_SKU_TITLE',
  'save' => true,
  'id_name' => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
  'link' => 'sku_sku_vmrfq_vmrfq_2',
  'table' => 'sku_sku',
  'module' => 'sku_SKU',
  'rname' => 'name',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["sku_sku_vmrfq_vmrfq_2sku_sku_ida"] = array (
  'name' => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
  'type' => 'link',
  'relationship' => 'sku_sku_vmrfq_vmrfq_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SKU_SKU_VMRFQ_VMRFQ_2_FROM_VMRFQ_VMRFQ_TITLE',
);
