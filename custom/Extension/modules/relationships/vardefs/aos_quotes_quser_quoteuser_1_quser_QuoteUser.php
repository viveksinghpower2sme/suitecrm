<?php
// created: 2016-06-13 16:51:40
$dictionary["quser_QuoteUser"]["fields"]["aos_quotes_quser_quoteuser_1"] = array (
  'name' => 'aos_quotes_quser_quoteuser_1',
  'type' => 'link',
  'relationship' => 'aos_quotes_quser_quoteuser_1',
  'source' => 'non-db',
  'module' => 'AOS_Quotes',
  'bean_name' => 'AOS_Quotes',
  'vname' => 'LBL_AOS_QUOTES_QUSER_QUOTEUSER_1_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes_quser_quoteuser_1aos_quotes_ida',
);
$dictionary["quser_QuoteUser"]["fields"]["aos_quotes_quser_quoteuser_1_name"] = array (
  'name' => 'aos_quotes_quser_quoteuser_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_QUSER_QUOTEUSER_1_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_quser_quoteuser_1aos_quotes_ida',
  'link' => 'aos_quotes_quser_quoteuser_1',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["quser_QuoteUser"]["fields"]["aos_quotes_quser_quoteuser_1aos_quotes_ida"] = array (
  'name' => 'aos_quotes_quser_quoteuser_1aos_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_quser_quoteuser_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_QUSER_QUOTEUSER_1_FROM_QUSER_QUOTEUSER_TITLE',
);
