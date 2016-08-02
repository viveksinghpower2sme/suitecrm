<?php
// created: 2016-06-10 12:20:36
$dictionary["VMRFQ_VMRFQ"]["fields"]["sku_sku_vmrfq_vmrfq_1"] = array (
  'name' => 'sku_sku_vmrfq_vmrfq_1',
  'type' => 'link',
  'relationship' => 'sku_sku_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'module' => 'sku_SKU',
  'bean_name' => 'sku_SKU',
  'vname' => 'LBL_SKU_SKU_VMRFQ_VMRFQ_1_FROM_SKU_SKU_TITLE',
  'id_name' => 'sku_sku_vmrfq_vmrfq_1sku_sku_ida',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["sku_sku_vmrfq_vmrfq_1_name"] = array (
  'name' => 'sku_sku_vmrfq_vmrfq_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SKU_SKU_VMRFQ_VMRFQ_1_FROM_SKU_SKU_TITLE',
  'save' => true,
  'id_name' => 'sku_sku_vmrfq_vmrfq_1sku_sku_ida',
  'link' => 'sku_sku_vmrfq_vmrfq_1',
  'table' => 'sku_sku',
  'module' => 'sku_SKU',
  'rname' => 'name',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["sku_sku_vmrfq_vmrfq_1sku_sku_ida"] = array (
  'name' => 'sku_sku_vmrfq_vmrfq_1sku_sku_ida',
  'type' => 'link',
  'relationship' => 'sku_sku_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SKU_SKU_VMRFQ_VMRFQ_1_FROM_VMRFQ_VMRFQ_TITLE',
);
