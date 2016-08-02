<?php
// created: 2016-05-25 14:13:10
$dictionary["vend_vendor_vmrfq_vmrfq_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'vend_vendor_vmrfq_vmrfq_1' => 
    array (
      'lhs_module' => 'vend_Vendor',
      'lhs_table' => 'vend_vendor',
      'lhs_key' => 'id',
      'rhs_module' => 'VMRFQ_VMRFQ',
      'rhs_table' => 'vmrfq_vmrfq',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vend_vendor_vmrfq_vmrfq_1_c',
      'join_key_lhs' => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
      'join_key_rhs' => 'vend_vendor_vmrfq_vmrfq_1vmrfq_vmrfq_idb',
    ),
  ),
  'table' => 'vend_vendor_vmrfq_vmrfq_1_c',
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
      'name' => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vend_vendor_vmrfq_vmrfq_1vmrfq_vmrfq_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vend_vendor_vmrfq_vmrfq_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vend_vendor_vmrfq_vmrfq_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vend_vendor_vmrfq_vmrfq_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vend_vendor_vmrfq_vmrfq_1vmrfq_vmrfq_idb',
      ),
    ),
  ),
);