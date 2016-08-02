<?php
// created: 2016-05-25 14:13:10
$dictionary["VMRFQ_VMRFQ"]["fields"]["vend_vendor_vmrfq_vmrfq_1"] = array (
  'name' => 'vend_vendor_vmrfq_vmrfq_1',
  'type' => 'link',
  'relationship' => 'vend_vendor_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'module' => 'vend_Vendor',
  'bean_name' => 'vend_Vendor',
  'vname' => 'LBL_VEND_VENDOR_VMRFQ_VMRFQ_1_FROM_VEND_VENDOR_TITLE',
  'id_name' => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["vend_vendor_vmrfq_vmrfq_1_name"] = array (
  'name' => 'vend_vendor_vmrfq_vmrfq_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEND_VENDOR_VMRFQ_VMRFQ_1_FROM_VEND_VENDOR_TITLE',
  'save' => true,
  'id_name' => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
  'link' => 'vend_vendor_vmrfq_vmrfq_1',
  'table' => 'vend_vendor',
  'module' => 'vend_Vendor',
  'rname' => 'name',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["vend_vendor_vmrfq_vmrfq_1vend_vendor_ida"] = array (
  'name' => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
  'type' => 'link',
  'relationship' => 'vend_vendor_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEND_VENDOR_VMRFQ_VMRFQ_1_FROM_VMRFQ_VMRFQ_TITLE',
);
