<?php
// created: 2016-05-25 18:30:14
$dictionary["AOS_Products"]["fields"]["vmrfq_vmrfq_aos_products_1"] = array (
  'name' => 'vmrfq_vmrfq_aos_products_1',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_aos_products_1',
  'source' => 'non-db',
  'module' => 'VMRFQ_VMRFQ',
  'bean_name' => 'VMRFQ_VMRFQ',
  'vname' => 'LBL_VMRFQ_VMRFQ_AOS_PRODUCTS_1_FROM_VMRFQ_VMRFQ_TITLE',
  'id_name' => 'vmrfq_vmrfq_aos_products_1vmrfq_vmrfq_ida',
);
$dictionary["AOS_Products"]["fields"]["vmrfq_vmrfq_aos_products_1_name"] = array (
  'name' => 'vmrfq_vmrfq_aos_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VMRFQ_VMRFQ_AOS_PRODUCTS_1_FROM_VMRFQ_VMRFQ_TITLE',
  'save' => true,
  'id_name' => 'vmrfq_vmrfq_aos_products_1vmrfq_vmrfq_ida',
  'link' => 'vmrfq_vmrfq_aos_products_1',
  'table' => 'vmrfq_vmrfq',
  'module' => 'VMRFQ_VMRFQ',
  'rname' => 'name',
);
$dictionary["AOS_Products"]["fields"]["vmrfq_vmrfq_aos_products_1vmrfq_vmrfq_ida"] = array (
  'name' => 'vmrfq_vmrfq_aos_products_1vmrfq_vmrfq_ida',
  'type' => 'link',
  'relationship' => 'vmrfq_vmrfq_aos_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VMRFQ_VMRFQ_AOS_PRODUCTS_1_FROM_AOS_PRODUCTS_TITLE',
);
