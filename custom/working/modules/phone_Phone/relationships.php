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
  'abc12_data_phone_phone_1' => 
  array (
    'id' => '2a269ac2-0e81-efa7-b297-573993f95f39',
    'relationship_name' => 'abc12_data_phone_phone_1',
    'lhs_module' => 'abc12_Data',
    'lhs_table' => 'abc12_data',
    'lhs_key' => 'id',
    'rhs_module' => 'phone_Phone',
    'rhs_table' => 'phone_phone',
    'rhs_key' => 'id',
    'join_table' => 'abc12_data_phone_phone_1_c',
    'join_key_lhs' => 'abc12_data_phone_phone_1abc12_data_ida',
    'join_key_rhs' => 'abc12_data_phone_phone_1phone_phone_idb',
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
  'phone_phone_leads' => 
  array (
    'id' => '391b031e-9a96-c99a-1bfd-5739930e4684',
    'relationship_name' => 'phone_phone_leads',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'phone_Phone',
    'rhs_table' => 'phone_phone',
    'rhs_key' => 'id',
    'join_table' => 'phone_phone_leads_c',
    'join_key_lhs' => 'phone_phone_leadsleads_ida',
    'join_key_rhs' => 'phone_phone_leadsphone_phone_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'phone_phone_modified_user' => 
  array (
    'id' => '4c20f226-a203-8b0f-b8e0-573993d784eb',
    'relationship_name' => 'phone_phone_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'phone_Phone',
    'rhs_table' => 'phone_phone',
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
  'phone_phone_created_by' => 
  array (
    'id' => '58103c50-dd60-646e-45a6-573993d96967',
    'relationship_name' => 'phone_phone_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'phone_Phone',
    'rhs_table' => 'phone_phone',
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
  'phone_phone_assigned_user' => 
  array (
    'id' => '644d002f-1bd6-8017-b113-573993c899b0',
    'relationship_name' => 'phone_phone_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'phone_Phone',
    'rhs_table' => 'phone_phone',
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
  'phone_phone_accounts_1' => 
  array (
    'id' => '702b0f10-71a5-8460-aea7-573993ff07a2',
    'relationship_name' => 'phone_phone_accounts_1',
    'lhs_module' => 'phone_Phone',
    'lhs_table' => 'phone_phone',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'join_table' => 'phone_phone_accounts_1_c',
    'join_key_lhs' => 'phone_phone_accounts_1phone_phone_ida',
    'join_key_rhs' => 'phone_phone_accounts_1accounts_idb',
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
  'phone_phone_accounts_2' => 
  array (
    'id' => 'e97babf7-7b2f-b0a2-49b4-5739930c0709',
    'relationship_name' => 'phone_phone_accounts_2',
    'lhs_module' => 'phone_Phone',
    'lhs_table' => 'phone_phone',
    'lhs_key' => 'id',
    'rhs_module' => 'Accounts',
    'rhs_table' => 'accounts',
    'rhs_key' => 'id',
    'join_table' => 'phone_phone_accounts_2_c',
    'join_key_lhs' => 'phone_phone_accounts_2phone_phone_ida',
    'join_key_rhs' => 'phone_phone_accounts_2accounts_idb',
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
  'contacts_phone_phone_1' => 
  array (
    'id' => 'ed5e0c84-73ad-db99-4904-5739934e6fdc',
    'relationship_name' => 'contacts_phone_phone_1',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'phone_Phone',
    'rhs_table' => 'phone_phone',
    'rhs_key' => 'id',
    'join_table' => 'contacts_phone_phone_1_c',
    'join_key_lhs' => 'contacts_phone_phone_1contacts_ida',
    'join_key_rhs' => 'contacts_phone_phone_1phone_phone_idb',
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
  'phone_phone_calls_1' => 
  array (
    'rhs_label' => 'Calls',
    'lhs_label' => 'Phone',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'phone_Phone',
    'rhs_module' => 'Calls',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'phone_phone_calls_1',
  ),
);