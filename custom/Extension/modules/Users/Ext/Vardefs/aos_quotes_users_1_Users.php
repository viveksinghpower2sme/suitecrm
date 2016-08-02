<?php
// created: 2016-06-13 17:23:48
$dictionary["User"]["fields"]["aos_quotes_users_1"] = array (
  'name' => 'aos_quotes_users_1',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_1',
  'source' => 'non-db',
  'module' => 'AOS_Quotes',
  'bean_name' => 'AOS_Quotes',
  'vname' => 'LBL_AOS_QUOTES_USERS_1_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes_users_1aos_quotes_ida',
);
$dictionary["User"]["fields"]["aos_quotes_users_1_name"] = array (
  'name' => 'aos_quotes_users_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_USERS_1_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_users_1aos_quotes_ida',
  'link' => 'aos_quotes_users_1',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["User"]["fields"]["aos_quotes_users_1aos_quotes_ida"] = array (
  'name' => 'aos_quotes_users_1aos_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_USERS_1_FROM_USERS_TITLE',
);
