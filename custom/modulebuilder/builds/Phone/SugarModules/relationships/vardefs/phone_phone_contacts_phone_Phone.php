<?php
// created: 2016-01-07 16:35:43
$dictionary["phone_Phone"]["fields"]["phone_phone_contacts"] = array (
  'name' => 'phone_phone_contacts',
  'type' => 'link',
  'relationship' => 'phone_phone_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_PHONE_PHONE_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'phone_phone_contactscontacts_ida',
);
$dictionary["phone_Phone"]["fields"]["phone_phone_contacts_name"] = array (
  'name' => 'phone_phone_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PHONE_PHONE_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'phone_phone_contactscontacts_ida',
  'link' => 'phone_phone_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["phone_Phone"]["fields"]["phone_phone_contactscontacts_ida"] = array (
  'name' => 'phone_phone_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'phone_phone_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PHONE_PHONE_CONTACTS_FROM_PHONE_PHONE_TITLE',
);
