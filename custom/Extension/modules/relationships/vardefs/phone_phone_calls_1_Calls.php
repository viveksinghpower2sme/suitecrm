<?php
// created: 2016-05-17 10:37:23
$dictionary["Call"]["fields"]["phone_phone_calls_1"] = array (
  'name' => 'phone_phone_calls_1',
  'type' => 'link',
  'relationship' => 'phone_phone_calls_1',
  'source' => 'non-db',
  'module' => 'phone_Phone',
  'bean_name' => 'phone_Phone',
  'vname' => 'LBL_PHONE_PHONE_CALLS_1_FROM_PHONE_PHONE_TITLE',
  'id_name' => 'phone_phone_calls_1phone_phone_ida',
);
$dictionary["Call"]["fields"]["phone_phone_calls_1_name"] = array (
  'name' => 'phone_phone_calls_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PHONE_PHONE_CALLS_1_FROM_PHONE_PHONE_TITLE',
  'save' => true,
  'id_name' => 'phone_phone_calls_1phone_phone_ida',
  'link' => 'phone_phone_calls_1',
  'table' => 'phone_phone',
  'module' => 'phone_Phone',
  'rname' => 'name',
);
$dictionary["Call"]["fields"]["phone_phone_calls_1phone_phone_ida"] = array (
  'name' => 'phone_phone_calls_1phone_phone_ida',
  'type' => 'link',
  'relationship' => 'phone_phone_calls_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PHONE_PHONE_CALLS_1_FROM_CALLS_TITLE',
);
