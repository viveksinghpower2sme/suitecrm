<?php
// created: 2016-05-25 13:51:33
$dictionary["sku_SKU"]["fields"]["vmrfq_vmrfq_sku_sku_1"] = array (
  'name' => 'vmrfq_vmrfq_sku_sku_1',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_sku_sku_1',
  'source' => 'non-db',
  'module' => 'VMRFQ_VMRFQ',
  'bean_name' => false,
  'vname' => 'LBL_VMRFQ_VMRFQ_SKU_SKU_1_FROM_VMRFQ_VMRFQ_TITLE',
  'id_name' => 'vmrfq_vmrfq_sku_sku_1vmrfq_vmrfq_ida',
);
$dictionary["sku_SKU"]["fields"]["vmrfq_vmrfq_sku_sku_1_name"] = array (
  'name' => 'vmrfq_vmrfq_sku_sku_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VMRFQ_VMRFQ_SKU_SKU_1_FROM_VMRFQ_VMRFQ_TITLE',
  'save' => true,
  'id_name' => 'vmrfq_vmrfq_sku_sku_1vmrfq_vmrfq_ida',
  'link' => 'vmrfq_vmrfq_sku_sku_1',
  'table' => 'vmrfq_vmrfq',
  'module' => 'VMRFQ_VMRFQ',
  'rname' => 'name',
);
$dictionary["sku_SKU"]["fields"]["vmrfq_vmrfq_sku_sku_1vmrfq_vmrfq_ida"] = array (
  'name' => 'vmrfq_vmrfq_sku_sku_1vmrfq_vmrfq_ida',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_sku_sku_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VMRFQ_VMRFQ_SKU_SKU_1_FROM_SKU_SKU_TITLE',
);
