<?php
// created: 2016-06-13 16:09:42
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_users_2"] = array (
  'name' => 'aos_quotes_users_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_2',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_AOS_QUOTES_USERS_2_FROM_USERS_TITLE',
  'id_name' => 'aos_quotes_users_2users_idb',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_users_2_name"] = array (
  'name' => 'aos_quotes_users_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_USERS_2_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_users_2users_idb',
  'link' => 'aos_quotes_users_2',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_users_2users_idb"] = array (
  'name' => 'aos_quotes_users_2users_idb',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_AOS_QUOTES_USERS_2_FROM_USERS_TITLE',
);
