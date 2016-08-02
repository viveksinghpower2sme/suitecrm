<?php
// created: 2016-05-16 11:57:56
$dictionary["vend_vendor_sku_sku"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'vend_vendor_sku_sku' => 
    array (
      'lhs_module' => 'vend_Vendor',
      'lhs_table' => 'vend_vendor',
      'lhs_key' => 'id',
      'rhs_module' => 'sku_SKU',
      'rhs_table' => 'sku_sku',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vend_vendor_sku_sku_c',
      'join_key_lhs' => 'vend_vendor_sku_skuvend_vendor_ida',
      'join_key_rhs' => 'vend_vendor_sku_skusku_sku_idb',
    ),
  ),
  'table' => 'vend_vendor_sku_sku_c',
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
      'name' => 'vend_vendor_sku_skuvend_vendor_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vend_vendor_sku_skusku_sku_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vend_vendor_sku_skuspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vend_vendor_sku_sku_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vend_vendor_sku_skuvend_vendor_ida',
        1 => 'vend_vendor_sku_skusku_sku_idb',
      ),
    ),
  ),
);