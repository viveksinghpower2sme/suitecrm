<?php
// created: 2016-06-13 16:15:41
$dictionary["User"]["fields"]["aos_quotes_users_3"] = array (
  'name' => 'aos_quotes_users_3',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_3',
  'source' => 'non-db',
  'module' => 'AOS_Quotes',
  'bean_name' => 'AOS_Quotes',
  'vname' => 'LBL_AOS_QUOTES_USERS_3_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes_users_3aos_quotes_ida',
);
$dictionary["User"]["fields"]["aos_quotes_users_3_name"] = array (
  'name' => 'aos_quotes_users_3_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_USERS_3_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_users_3aos_quotes_ida',
  'link' => 'aos_quotes_users_3',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["User"]["fields"]["aos_quotes_users_3aos_quotes_ida"] = array (
  'name' => 'aos_quotes_users_3aos_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_users_3',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_AOS_QUOTES_USERS_3_FROM_AOS_QUOTES_TITLE',
);
