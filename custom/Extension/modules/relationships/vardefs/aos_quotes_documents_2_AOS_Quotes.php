<?php
// created: 2016-06-28 16:42:28
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_2"] = array (
  'name' => 'aos_quotes_documents_2',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_2',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_DOCUMENTS_TITLE',
  'id_name' => 'aos_quotes_documents_2documents_idb',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_2_name"] = array (
  'name' => 'aos_quotes_documents_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_DOCUMENTS_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes_documents_2documents_idb',
  'link' => 'aos_quotes_documents_2',
  'table' => 'documents',
  'module' => 'Documents',
  'rname' => 'document_name',
);
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_documents_2documents_idb"] = array (
  'name' => 'aos_quotes_documents_2documents_idb',
  'type' => 'link',
  'relationship' => 'aos_quotes_documents_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_AOS_QUOTES_DOCUMENTS_2_FROM_DOCUMENTS_TITLE',
);
