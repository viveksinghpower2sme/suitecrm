<?php
// created: 2016-05-27 17:28:53
$dictionary["sku_sku_vmrfq_vmrfq_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'sku_sku_vmrfq_vmrfq_2' => 
    array (
      'lhs_module' => 'sku_SKU',
      'lhs_table' => 'sku_sku',
      'lhs_key' => 'id',
      'rhs_module' => 'VMRFQ_VMRFQ',
      'rhs_table' => 'vmrfq_vmrfq',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'sku_sku_vmrfq_vmrfq_2_c',
      'join_key_lhs' => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
      'join_key_rhs' => 'sku_sku_vmrfq_vmrfq_2vmrfq_vmrfq_idb',
    ),
  ),
  'table' => 'sku_sku_vmrfq_vmrfq_2_c',
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
      'name' => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'sku_sku_vmrfq_vmrfq_2vmrfq_vmrfq_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'sku_sku_vmrfq_vmrfq_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'sku_sku_vmrfq_vmrfq_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'sku_sku_vmrfq_vmrfq_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'sku_sku_vmrfq_vmrfq_2vmrfq_vmrfq_idb',
      ),
    ),
  ),
);