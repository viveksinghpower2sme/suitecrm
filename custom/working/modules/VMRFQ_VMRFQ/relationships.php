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

$relationships = array (
  'sku_sku_vmrfq_vmrfq_1' => 
  array (
    'id' => '3f8a0f00-e25e-35fa-2a9d-5745a23e63fd',
    'relationship_name' => 'sku_sku_vmrfq_vmrfq_1',
    'lhs_module' => 'sku_SKU',
    'lhs_table' => 'sku_sku',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'id',
    'join_table' => 'sku_sku_vmrfq_vmrfq_1_c',
    'join_key_lhs' => 'sku_sku_vmrfq_vmrfq_1sku_sku_ida',
    'join_key_rhs' => 'sku_sku_vmrfq_vmrfq_1vmrfq_vmrfq_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'vend_vendor_vmrfq_vmrfq_1' => 
  array (
    'id' => '427b9f78-2ea0-1788-9eda-5745a2e2b185',
    'relationship_name' => 'vend_vendor_vmrfq_vmrfq_1',
    'lhs_module' => 'vend_Vendor',
    'lhs_table' => 'vend_vendor',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'id',
    'join_table' => 'vend_vendor_vmrfq_vmrfq_1_c',
    'join_key_lhs' => 'vend_vendor_vmrfq_vmrfq_1vend_vendor_ida',
    'join_key_rhs' => 'vend_vendor_vmrfq_vmrfq_1vmrfq_vmrfq_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'fp_event_locations_vmrfq_vmrfq_1' => 
  array (
    'id' => '63b4209e-bc5f-ca7e-041e-5745a2f3a7fc',
    'relationship_name' => 'fp_event_locations_vmrfq_vmrfq_1',
    'lhs_module' => 'FP_Event_Locations',
    'lhs_table' => 'fp_event_locations',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'id',
    'join_table' => 'fp_event_locations_vmrfq_vmrfq_1_c',
    'join_key_lhs' => 'fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida',
    'join_key_rhs' => 'fp_event_locations_vmrfq_vmrfq_1vmrfq_vmrfq_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'vmrfq_vmrfq_modified_user' => 
  array (
    'id' => '9c1914eb-3e25-d6cd-81f0-5745a2b51b78',
    'relationship_name' => 'vmrfq_vmrfq_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'vmrfq_vmrfq_created_by' => 
  array (
    'id' => 'aa0219d4-adcf-a6d8-c0fc-5745a2e82dc9',
    'relationship_name' => 'vmrfq_vmrfq_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'vmrfq_vmrfq_assigned_user' => 
  array (
    'id' => 'b84a30bb-2bcb-ba1d-3f5f-5745a28e87ee',
    'relationship_name' => 'vmrfq_vmrfq_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'vmrfq_vmrfq_aos_products_1' => 
  array (
    'id' => 'c44e91a8-634a-f7ce-b849-5745a253a60d',
    'relationship_name' => 'vmrfq_vmrfq_aos_products_1',
    'lhs_module' => 'VMRFQ_VMRFQ',
    'lhs_table' => 'vmrfq_vmrfq',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Products',
    'rhs_table' => 'aos_products',
    'rhs_key' => 'id',
    'join_table' => 'vmrfq_vmrfq_aos_products_1_c',
    'join_key_lhs' => 'vmrfq_vmrfq_aos_products_1vmrfq_vmrfq_ida',
    'join_key_rhs' => 'vmrfq_vmrfq_aos_products_1aos_products_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'sku_sku_vmrfq_vmrfq_2' => 
  array (
    'id' => 'e9ec83ec-ba9f-4463-eab2-5745a238911c',
    'relationship_name' => 'sku_sku_vmrfq_vmrfq_2',
    'lhs_module' => 'sku_SKU',
    'lhs_table' => 'sku_sku',
    'lhs_key' => 'id',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'rhs_table' => 'vmrfq_vmrfq',
    'rhs_key' => 'id',
    'join_table' => 'sku_sku_vmrfq_vmrfq_2_c',
    'join_key_lhs' => 'sku_sku_vmrfq_vmrfq_2sku_sku_ida',
    'join_key_rhs' => 'sku_sku_vmrfq_vmrfq_2vmrfq_vmrfq_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'vmrfq_vmrfq_aos_quotes_1' => 
  array (
    'rhs_label' => 'Quotes',
    'lhs_label' => 'VMRFQ',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'VMRFQ_VMRFQ',
    'rhs_module' => 'AOS_Quotes',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'vmrfq_vmrfq_aos_quotes_1',
  ),
);