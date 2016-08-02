<?php
// created: 2016-06-13 16:51:40
$dictionary["aos_quotes_quser_quoteuser_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'aos_quotes_quser_quoteuser_1' => 
    array (
      'lhs_module' => 'AOS_Quotes',
      'lhs_table' => 'aos_quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'quser_QuoteUser',
      'rhs_table' => 'quser_quoteuser',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'aos_quotes_quser_quoteuser_1_c',
      'join_key_lhs' => 'aos_quotes_quser_quoteuser_1aos_quotes_ida',
      'join_key_rhs' => 'aos_quotes_quser_quoteuser_1quser_quoteuser_idb',
    ),
  ),
  'table' => 'aos_quotes_quser_quoteuser_1_c',
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
      'name' => 'aos_quotes_quser_quoteuser_1aos_quotes_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'aos_quotes_quser_quoteuser_1quser_quoteuser_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'aos_quotes_quser_quoteuser_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'aos_quotes_quser_quoteuser_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'aos_quotes_quser_quoteuser_1aos_quotes_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'aos_quotes_quser_quoteuser_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'aos_quotes_quser_quoteuser_1quser_quoteuser_idb',
      ),
    ),
  ),
);