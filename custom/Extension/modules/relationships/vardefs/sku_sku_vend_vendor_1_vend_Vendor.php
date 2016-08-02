<?php
// created: 2016-05-25 13:39:45
$dictionary["vend_Vendor"]["fields"]["sku_sku_vend_vendor_1"] = array (
  'name' => 'sku_sku_vend_vendor_1',
  'type' => 'link',
  'relationship' => 'sku_sku_vend_vendor_1',
  'source' => 'non-db',
  'module' => 'sku_SKU',
  'bean_name' => 'sku_SKU',
  'vname' => 'LBL_SKU_SKU_VEND_VENDOR_1_FROM_SKU_SKU_TITLE',
  'id_name' => 'sku_sku_vend_vendor_1sku_sku_ida',
);
$dictionary["vend_Vendor"]["fields"]["sku_sku_vend_vendor_1_name"] = array (
  'name' => 'sku_sku_vend_vendor_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SKU_SKU_VEND_VENDOR_1_FROM_SKU_SKU_TITLE',
  'save' => true,
  'id_name' => 'sku_sku_vend_vendor_1sku_sku_ida',
  'link' => 'sku_sku_vend_vendor_1',
  'table' => 'sku_sku',
  'module' => 'sku_SKU',
  'rname' => 'name',
);
$dictionary["vend_Vendor"]["fields"]["sku_sku_vend_vendor_1sku_sku_ida"] = array (
  'name' => 'sku_sku_vend_vendor_1sku_sku_ida',
  'type' => 'link',
  'relationship' => 'sku_sku_vend_vendor_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SKU_SKU_VEND_VENDOR_1_FROM_VEND_VENDOR_TITLE',
);
