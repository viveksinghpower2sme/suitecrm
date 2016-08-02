<?php
// created: 2016-04-15 17:33:05
$dictionary["Call"]["fields"]["contacts_calls_1"] = array (
  'name' => 'contacts_calls_1',
  'type' => 'link',
  'relationship' => 'contacts_calls_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_CALLS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_calls_1contacts_ida',
);
$dictionary["Call"]["fields"]["contacts_calls_1_name"] = array (
  'name' => 'contacts_calls_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_CALLS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_calls_1contacts_ida',
  'link' => 'contacts_calls_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Call"]["fields"]["contacts_calls_1contacts_ida"] = array (
  'name' => 'contacts_calls_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_calls_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_CALLS_1_FROM_CALLS_TITLE',
);
