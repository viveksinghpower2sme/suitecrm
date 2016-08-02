<?php
// created: 2016-06-13 17:35:47
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_1"] = array (
  'name' => 'users_aos_quotes_1',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_AOS_QUOTES_1_FROM_USERS_TITLE',
  'id_name' => 'users_aos_quotes_1users_ida',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_1_name"] = array (
  'name' => 'users_aos_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_AOS_QUOTES_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_aos_quotes_1users_ida',
  'link' => 'users_aos_quotes_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_1users_ida"] = array (
  'name' => 'users_aos_quotes_1users_ida',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE',
);
