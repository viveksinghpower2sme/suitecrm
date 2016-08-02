<?php
// created: 2016-06-23 11:12:02
$dictionary["AOS_Quotes"]["fields"]["bank_bank_aos_quotes"] = array (
  'name' => 'bank_bank_aos_quotes',
  'type' => 'link',
  'relationship' => 'bank_bank_aos_quotes',
  'source' => 'non-db',
  'module' => 'bank_Bank',
  'bean_name' => false,
  'vname' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_BANK_BANK_TITLE',
  'id_name' => 'bank_bank_aos_quotesbank_bank_ida',
);
$dictionary["AOS_Quotes"]["fields"]["bank_bank_aos_quotes_name"] = array (
  'name' => 'bank_bank_aos_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_BANK_BANK_TITLE',
  'save' => true,
  'id_name' => 'bank_bank_aos_quotesbank_bank_ida',
  'link' => 'bank_bank_aos_quotes',
  'table' => 'bank_bank',
  'module' => 'bank_Bank',
  'rname' => 'name',
);
$dictionary["AOS_Quotes"]["fields"]["bank_bank_aos_quotesbank_bank_ida"] = array (
  'name' => 'bank_bank_aos_quotesbank_bank_ida',
  'type' => 'link',
  'relationship' => 'bank_bank_aos_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BANK_BANK_AOS_QUOTES_FROM_AOS_QUOTES_TITLE',
);
