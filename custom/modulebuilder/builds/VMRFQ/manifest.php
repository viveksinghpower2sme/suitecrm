<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


// THIS CONTENT IS GENERATED BY MBPackage.php
$manifest = array (
  0 => 
  array (
    'acceptable_sugar_versions' => 
    array (
      0 => '',
    ),
  ),
  1 => 
  array (
    'acceptable_sugar_flavors' => 
    array (
      0 => 'CE',
      1 => 'PRO',
      2 => 'ENT',
    ),
  ),
  'readme' => '',
  'key' => 'VMRFQ',
  'author' => '',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'VMRFQ',
  'published_date' => '2016-05-25 08:21:33',
  'type' => 'module',
  'version' => 1464164493,
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'VMRFQ',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'VMRFQ_VMRFQ',
      'class' => 'VMRFQ_VMRFQ',
      'path' => 'modules/VMRFQ_VMRFQ/VMRFQ_VMRFQ.php',
      'tab' => true,
    ),
  ),
  'layoutdefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/vmrfq_vmrfq_sku_sku_VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/vmrfq_vmrfq_sku_sku_1_VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/vmrfq_vmrfq_vend_vendor_VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
    ),
  ),
  'relationships' => 
  array (
    0 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/vmrfq_vmrfq_sku_skuMetaData.php',
    ),
    1 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/vmrfq_vmrfq_sku_sku_1MetaData.php',
    ),
    2 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/vmrfq_vmrfq_vend_vendorMetaData.php',
    ),
  ),
  'image_dir' => '<basepath>/icons',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/VMRFQ_VMRFQ',
      'to' => 'modules/VMRFQ_VMRFQ',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/sku_SKU.php',
      'to_module' => 'sku_SKU',
      'language' => 'en_us',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/sku_SKU.php',
      'to_module' => 'sku_SKU',
      'language' => 'es_es',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
      'language' => 'en_us',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
      'language' => 'es_es',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/sku_SKU.php',
      'to_module' => 'sku_SKU',
      'language' => 'en_us',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/sku_SKU.php',
      'to_module' => 'sku_SKU',
      'language' => 'es_es',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
      'language' => 'en_us',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
      'language' => 'es_es',
    ),
    8 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/vend_Vendor.php',
      'to_module' => 'vend_Vendor',
      'language' => 'en_us',
    ),
    9 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/vend_Vendor.php',
      'to_module' => 'vend_Vendor',
      'language' => 'es_es',
    ),
    10 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
      'language' => 'en_us',
    ),
    11 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
      'language' => 'es_es',
    ),
    12 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
  ),
  'vardefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/vmrfq_vmrfq_sku_sku_sku_SKU.php',
      'to_module' => 'sku_SKU',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/vmrfq_vmrfq_sku_sku_VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/vmrfq_vmrfq_sku_sku_1_sku_SKU.php',
      'to_module' => 'sku_SKU',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/vmrfq_vmrfq_sku_sku_1_VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/vmrfq_vmrfq_vend_vendor_vend_Vendor.php',
      'to_module' => 'vend_Vendor',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/vmrfq_vmrfq_vend_vendor_VMRFQ_VMRFQ.php',
      'to_module' => 'VMRFQ_VMRFQ',
    ),
  ),
  'layoutfields' => 
  array (
    0 => 
    array (
      'additional_fields' => 
      array (
        'sku_SKU' => 'vmrfq_vmrfq_sku_sku_name',
      ),
    ),
    1 => 
    array (
      'additional_fields' => 
      array (
        'sku_SKU' => 'vmrfq_vmrfq_sku_sku_1_name',
      ),
    ),
    2 => 
    array (
      'additional_fields' => 
      array (
        'vend_Vendor' => 'vmrfq_vmrfq_vend_vendor_name',
      ),
    ),
  ),
);