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
  'sku_sku_vend_vendor_1' => 
  array (
    'id' => '1d390b05-fc97-56df-ae23-5745a34c4bcf',
    'relationship_name' => 'sku_sku_vend_vendor_1',
    'lhs_module' => 'sku_SKU',
    'lhs_table' => 'sku_sku',
    'lhs_key' => 'id',
    'rhs_module' => 'vend_Vendor',
    'rhs_table' => 'vend_vendor',
    'rhs_key' => 'id',
    'join_table' => 'sku_sku_vend_vendor_1_c',
    'join_key_lhs' => 'sku_sku_vend_vendor_1sku_sku_ida',
    'join_key_rhs' => 'sku_sku_vend_vendor_1vend_vendor_idb',
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
  'vend_vendor_modified_user' => 
  array (
    'id' => '44e4ab5b-4d02-4957-2cd8-5745a34da2ec',
    'relationship_name' => 'vend_vendor_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'vend_Vendor',
    'rhs_table' => 'vend_vendor',
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
  'vend_vendor_fp_event_locations_1' => 
  array (
    'id' => '4854a574-b483-0b18-d124-5745a38eecd8',
    'relationship_name' => 'vend_vendor_fp_event_locations_1',
    'lhs_module' => 'vend_Vendor',
    'lhs_table' => 'vend_vendor',
    'lhs_key' => 'id',
    'rhs_module' => 'FP_Event_Locations',
    'rhs_table' => 'fp_event_locations',
    'rhs_key' => 'id',
    'join_table' => 'vend_vendor_fp_event_locations_1_c',
    'join_key_lhs' => 'vend_vendor_fp_event_locations_1vend_vendor_ida',
    'join_key_rhs' => 'vend_vendor_fp_event_locations_1fp_event_locations_idb',
    'relationship_type' => 'many-to-many',
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
  'vend_vendor_created_by' => 
  array (
    'id' => '510d1366-fdf2-57d4-d759-5745a3cda529',
    'relationship_name' => 'vend_vendor_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'vend_Vendor',
    'rhs_table' => 'vend_vendor',
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
  'vend_vendor_vmrfq_vmrfq_1' => 
  array (
    'id' => '55bdef38-8a12-90d2-8114-5745a39d85bb',
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
  'vend_vendor_assigned_user' => 
  array (
    'id' => '5f6816b4-fe95-4979-f6eb-5745a3a5543e',
    'relationship_name' => 'vend_vendor_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'vend_Vendor',
    'rhs_table' => 'vend_vendor',
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
  'vend_vendor_aos_products_1' => 
  array (
    'id' => 'ebc2b1ab-6a7c-5e5b-5ec9-5745a379d6ba',
    'relationship_name' => 'vend_vendor_aos_products_1',
    'lhs_module' => 'vend_Vendor',
    'lhs_table' => 'vend_vendor',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Products',
    'rhs_table' => 'aos_products',
    'rhs_key' => 'id',
    'join_table' => 'vend_vendor_aos_products_1_c',
    'join_key_lhs' => 'vend_vendor_aos_products_1vend_vendor_ida',
    'join_key_rhs' => 'vend_vendor_aos_products_1aos_products_idb',
    'relationship_type' => 'many-to-many',
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
  'vend_vendor_fp_event_locations_2' => 
  array (
    'rhs_label' => 'Locations',
    'lhs_label' => 'Vendor',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'vend_Vendor',
    'rhs_module' => 'FP_Event_Locations',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'vend_vendor_fp_event_locations_2',
  ),
);