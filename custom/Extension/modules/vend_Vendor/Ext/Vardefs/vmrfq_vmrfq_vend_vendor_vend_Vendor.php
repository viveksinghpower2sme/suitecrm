<?php
// created: 2016-05-25 13:51:33
$dictionary["vend_Vendor"]["fields"]["vmrfq_vmrfq_vend_vendor"] = array (
  'name' => 'vmrfq_vmrfq_vend_vendor',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_vend_vendor',
  'source' => 'non-db',
  'module' => 'VMRFQ_VMRFQ',
  'bean_name' => false,
  'vname' => 'LBL_VMRFQ_VMRFQ_VEND_VENDOR_FROM_VMRFQ_VMRFQ_TITLE',
  'id_name' => 'vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida',
);
$dictionary["vend_Vendor"]["fields"]["vmrfq_vmrfq_vend_vendor_name"] = array (
  'name' => 'vmrfq_vmrfq_vend_vendor_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VMRFQ_VMRFQ_VEND_VENDOR_FROM_VMRFQ_VMRFQ_TITLE',
  'save' => true,
  'id_name' => 'vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida',
  'link' => 'vmrfq_vmrfq_vend_vendor',
  'table' => 'vmrfq_vmrfq',
  'module' => 'VMRFQ_VMRFQ',
  'rname' => 'name',
);
$dictionary["vend_Vendor"]["fields"]["vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida"] = array (
  'name' => 'vmrfq_vmrfq_vend_vendorvmrfq_vmrfq_ida',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_vend_vendor',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VMRFQ_VMRFQ_VEND_VENDOR_FROM_VEND_VENDOR_TITLE',
);
