<?php
// created: 2016-06-13 17:42:14
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_3"] = array (
  'name' => 'users_aos_quotes_3',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_3',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_AOS_QUOTES_3_FROM_USERS_TITLE',
  'id_name' => 'users_aos_quotes_3users_ida',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_3_name"] = array (
  'name' => 'users_aos_quotes_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_AOS_QUOTES_3_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_aos_quotes_3users_ida',
  'link' => 'users_aos_quotes_3',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_3users_ida"] = array (
  'name' => 'users_aos_quotes_3users_ida',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_AOS_QUOTES_3_FROM_AOS_QUOTES_TITLE',
);
