<?php
// created: 2016-06-11 16:44:08
$dictionary["User"]["fields"]["quser_quoteuser_users"] = array (
  'name' => 'quser_quoteuser_users',
  'type' => 'link',
  'relationship' => 'quser_quoteuser_users',
  'source' => 'non-db',
  'module' => 'quser_QuoteUser',
  'bean_name' => false,
  'vname' => 'LBL_QUSER_QUOTEUSER_USERS_FROM_QUSER_QUOTEUSER_TITLE',
  'id_name' => 'quser_quoteuser_usersquser_quoteuser_ida',
);
$dictionary["User"]["fields"]["quser_quoteuser_users_name"] = array (
  'name' => 'quser_quoteuser_users_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUSER_QUOTEUSER_USERS_FROM_QUSER_QUOTEUSER_TITLE',
  'save' => true,
  'id_name' => 'quser_quoteuser_usersquser_quoteuser_ida',
  'link' => 'quser_quoteuser_users',
  'table' => 'quser_quoteuser',
  'module' => 'quser_QuoteUser',
  'rname' => 'name',
);
$dictionary["User"]["fields"]["quser_quoteuser_usersquser_quoteuser_ida"] = array (
  'name' => 'quser_quoteuser_usersquser_quoteuser_ida',
  'type' => 'link',
  'relationship' => 'quser_quoteuser_users',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUSER_QUOTEUSER_USERS_FROM_USERS_TITLE',
);
