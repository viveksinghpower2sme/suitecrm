<?php
// created: 2016-05-25 19:24:07
$dictionary["VMRFQ_VMRFQ"]["fields"]["aos_products_vmrfq_vmrfq_1"] = array (
  'name' => 'aos_products_vmrfq_vmrfq_1',
  'type' => 'link',
  'relationship' => 'aos_products_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'module' => 'AOS_Products',
  'bean_name' => 'AOS_Products',
  'vname' => 'LBL_AOS_PRODUCTS_VMRFQ_VMRFQ_1_FROM_AOS_PRODUCTS_TITLE',
  'id_name' => 'aos_products_vmrfq_vmrfq_1aos_products_ida',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["aos_products_vmrfq_vmrfq_1_name"] = array (
  'name' => 'aos_products_vmrfq_vmrfq_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_PRODUCTS_VMRFQ_VMRFQ_1_FROM_AOS_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'aos_products_vmrfq_vmrfq_1aos_products_ida',
  'link' => 'aos_products_vmrfq_vmrfq_1',
  'table' => 'aos_products',
  'module' => 'AOS_Products',
  'rname' => 'name',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["aos_products_vmrfq_vmrfq_1aos_products_ida"] = array (
  'name' => 'aos_products_vmrfq_vmrfq_1aos_products_ida',
  'type' => 'link',
  'relationship' => 'aos_products_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_PRODUCTS_VMRFQ_VMRFQ_1_FROM_VMRFQ_VMRFQ_TITLE',
);
