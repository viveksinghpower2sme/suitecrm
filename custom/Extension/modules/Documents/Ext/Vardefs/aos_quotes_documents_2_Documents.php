<?php
// created: 2016-06-28 16:42:28
$dictionary["Document"]["fields"]["aos_quotes_documents_2"] = array (
  'name' => 'aos_quotes_documents_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_2',
  'source' => 'non-db',
  'module' => 'AOS_Quotes',
  'bean_name' => 'AOS_Quotes',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes_documents_2aos_quotes_ida',
);
$dictionary["Document"]["fields"]["aos_quotes_documents_2_name"] = array (
  'name' => 'aos_quotes_documents_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_documents_2aos_quotes_ida',
  'link' => 'aos_quotes_documents_2',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["aos_quotes_documents_2aos_quotes_ida"] = array (
  'name' => 'aos_quotes_documents_2aos_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_AOS_QUOTES_TITLE',
);
