<?php
// created: 2016-05-30 13:27:10
$dictionary["VMRFQ_VMRFQ"]["fields"]["aos_quotes_vmrfq_vmrfq_1"] = array (
  'name' => 'aos_quotes_vmrfq_vmrfq_1',
  'type' => 'link',
  'relationship' => 'aos_quotes_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'module' => 'AOS_Quotes',
  'bean_name' => 'AOS_Quotes',
  'vname' => 'LBL_AOS_QUOTES_VMRFQ_VMRFQ_1_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes_vmrfq_vmrfq_1aos_quotes_ida',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["aos_quotes_vmrfq_vmrfq_1_name"] = array (
  'name' => 'aos_quotes_vmrfq_vmrfq_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_VMRFQ_VMRFQ_1_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_vmrfq_vmrfq_1aos_quotes_ida',
  'link' => 'aos_quotes_vmrfq_vmrfq_1',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["VMRFQ_VMRFQ"]["fields"]["aos_quotes_vmrfq_vmrfq_1aos_quotes_ida"] = array (
  'name' => 'aos_quotes_vmrfq_vmrfq_1aos_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_vmrfq_vmrfq_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_VMRFQ_VMRFQ_1_FROM_VMRFQ_VMRFQ_TITLE',
);
