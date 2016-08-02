<?php
// created: 2016-05-25 13:51:33
$dictionary["vmrfq_vmrfq_vend_vendor"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'vmrfq_vmrfq_vend_vendor' => 
    array (
      'lhs_module' => 'VMRFQ_VMRFQ',
      'lhs_table' => 'vmrfq_vmrfq',
      'lhs_key' => 'id',
      'rhs_module' => 'vend_Vendor',
      'rhs_table' => 'vend_vendor',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'vmrfq_vmrfq_vend_vendor_c',
      'join_key_lhs' => 'vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida',
      'join_key_rhs' => 'vmrfq_vmrfq_vend_vendorvend_vendor_idb',
    ),
  ),
  'table' => 'vmrfq_vmrfq_vend_vendor_c',
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
      'name' => 'vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'vmrfq_vmrfq_vend_vendorvend_vendor_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'vmrfq_vmrfq_vend_vendorspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'vmrfq_vmrfq_vend_vendor_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'vmrfq_vmrfq_vend_vendor_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'vmrfq_vmrfq_vend_vendorvend_vendor_idb',
      ),
    ),
  ),
);