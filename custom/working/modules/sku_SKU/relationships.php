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
  'sku_sku_vmrfq_vmrfq_2' => 
  array (
    'id' => '4b640178-42ca-575a-5820-5759679a5f96',
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
  'sku_sku_fp_event_locations_1' => 
  array (
    'id' => '75c40353-305a-c4e4-1f01-575967fa9cb4',
    'relationship_name' => 'sku_sku_fp_event_locations_1',
    'lhs_module' => 'sku_SKU',
    'lhs_table' => 'sku_sku',
    'lhs_key' => 'id',
    'rhs_module' => 'FP_Event_Locations',
    'rhs_table' => 'fp_event_locations',
    'rhs_key' => 'id',
    'join_table' => 'sku_sku_fp_event_locations_1_c',
    'join_key_lhs' => 'sku_sku_fp_event_locations_1sku_sku_ida',
    'join_key_rhs' => 'sku_sku_fp_event_locations_1fp_event_locations_idb',
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
  'sku_sku_modified_user' => 
  array (
    'id' => 'a8bf8d52-fb4b-4ef0-3e44-575966a4206c',
    'relationship_name' => 'sku_sku_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'sku_SKU',
    'rhs_table' => 'sku_sku',
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
  'sku_sku_created_by' => 
  array (
    'id' => 'b56a726e-a617-e1ed-c70b-57596651d03c',
    'relationship_name' => 'sku_sku_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'sku_SKU',
    'rhs_table' => 'sku_sku',
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
  'sku_sku_assigned_user' => 
  array (
    'id' => 'c1a792bc-1175-9068-544e-5759665a34f6',
    'relationship_name' => 'sku_sku_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'sku_SKU',
    'rhs_table' => 'sku_sku',
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
  'sku_sku_vend_vendor_1' => 
  array (
    'id' => 'c662deab-9f52-75ca-f85e-575967774524',
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
  'sku_sku_vmrfq_vmrfq_1' => 
  array (
    'rhs_label' => 'VMRFQ',
    'lhs_label' => 'SKU',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'sku_SKU',
    'rhs_module' => 'VMRFQ_VMRFQ',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'sku_sku_vmrfq_vmrfq_1',
  ),
);