<?php
// created: 2016-06-23 11:12:02
$dictionary["bank_bank_aos_quotes"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'bank_bank_aos_quotes' => 
    array (
      'lhs_module' => 'bank_Bank',
      'lhs_table' => 'bank_bank',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Quotes',
      'rhs_table' => 'aos_quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'bank_bank_aos_quotes_c',
      'join_key_lhs' => 'bank_bank_aos_quotesbank_bank_ida',
      'join_key_rhs' => 'bank_bank_aos_quotesaos_quotes_idb',
    ),
  ),
  'table' => 'bank_bank_aos_quotes_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'bank_bank_aos_quotesbank_bank_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'bank_bank_aos_quotesaos_quotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'bank_bank_aos_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'bank_bank_aos_quotes_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'bank_bank_aos_quotesbank_bank_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'bank_bank_aos_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'bank_bank_aos_quotesaos_quotes_idb',
      ),
    ),
  ),
);