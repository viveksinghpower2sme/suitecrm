<?php
$dictionary['AOS_Quotes']['fields']['file_mime_type'] = array(
  'name' => 'file_mime_type',
  'vname' => 'LBL_FILE_MIME_TYPE',
  'type' => 'varchar',
  'len' => '100',
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['file_url1'] = array(
  'name'=>'file_url',
  'vname' => 'LBL_FILE_URL',
  'type'=>'function',
  'function_class'=>'UploadFile',
  'function_name'=>'get_upload_url_1',
  'function_params'=> array('filename','id','module_dir'),
  'function_params_source'=>'this',
  'source'=>'function',
  'reportable'=>false,
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['filename'] = array(
  'name' => 'filename',
  'vname' => 'LBL_FILENAME',
  'type' => 'file',
  'dbType' => 'varchar',
  'len' => '255',
  'reportable'=>true,
  'docType'=> 'gaurav',
  'importable' => false,
);

$dictionary['AOS_Quotes']['fields']['file_mime_type_1'] = array(
  'name' => 'file_mime_type_1',
  'vname' => 'LBL_FILE_MIME_TYPE',
  'type' => 'varchar',
  'len' => '100',
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['file_url_1'] = array(
  'name'=>'file_url_1',
  'vname' => 'LBL_FILE_URL',
  'type'=>'function',
  'function_class'=>'UploadFile',
  'function_name'=>'get_upload_url',
  'function_params_source'=>'this',
  'function_params'=> array('$this'),
  'source'=>'function',
  'reportable'=>false,
  'importable' => false,
);
$dictionary['AOS_Quotes']['fields']['filename_1'] = array(
  'name' => 'filename_1',
  'vname' => 'LBL_FILENAME',
  'type' => 'file',
  'dbType' => 'varchar',
  'docType'=> 'gaurav',
  'len' => '255',
  'reportable'=>true,
  'importable' => false,
);