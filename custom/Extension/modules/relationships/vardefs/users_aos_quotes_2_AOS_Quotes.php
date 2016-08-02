<?php
// created: 2016-06-13 17:37:35
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_2"] = array (
  'name' => 'users_aos_quotes_2',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_2',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_AOS_QUOTES_2_FROM_USERS_TITLE',
  'id_name' => 'users_aos_quotes_2users_ida',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_2_name"] = array (
  'name' => 'users_aos_quotes_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_AOS_QUOTES_2_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_aos_quotes_2users_ida',
  'link' => 'users_aos_quotes_2',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["users_aos_quotes_2users_ida"] = array (
  'name' => 'users_aos_quotes_2users_ida',
  'type' => 'link',
  'relationship' => 'users_aos_quotes_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_AOS_QUOTES_2_FROM_AOS_QUOTES_TITLE',
);
