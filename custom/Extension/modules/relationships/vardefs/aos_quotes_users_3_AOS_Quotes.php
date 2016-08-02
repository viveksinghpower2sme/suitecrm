<?php
// created: 2016-06-13 16:15:41
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_users_3"] = array (
  'name' => 'aos_quotes_users_3',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_3',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_AOS_QUOTES_USERS_3_FROM_USERS_TITLE',
  'id_name' => 'aos_quotes_users_3users_idb',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_users_3_name"] = array (
  'name' => 'aos_quotes_users_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_USERS_3_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_users_3users_idb',
  'link' => 'aos_quotes_users_3',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_users_3users_idb"] = array (
  'name' => 'aos_quotes_users_3users_idb',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_AOS_QUOTES_USERS_3_FROM_USERS_TITLE',
);
