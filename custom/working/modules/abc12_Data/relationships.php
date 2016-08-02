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
    'id' => '29b5d57c-1470-4fb5-f8e7-579b4af41869',
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
  'abc12_data_leads_1' => 
  array (
    'id' => '2cd42dda-c476-9fbf-249b-579b4a1a05a9',
    'relationship_name' => 'abc12_data_leads_1',
    'lhs_module' => 'abc12_Data',
    'lhs_table' => 'abc12_data',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'join_table' => 'abc12_data_leads_1_c',
    'join_key_lhs' => 'abc12_data_leads_1abc12_data_ida',
    'join_key_rhs' => 'abc12_data_leads_1leads_idb',
    'relationship_type' => 'one-to-one',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'abc12_data_calls_1' => 
  array (
    'id' => '5ad9b618-1402-567e-aeef-579b4af122a4',
    'relationship_name' => 'abc12_data_calls_1',
    'lhs_module' => 'abc12_Data',
    'lhs_table' => 'abc12_data',
    'lhs_key' => 'id',
    'rhs_module' => 'Calls',
    'rhs_table' => 'calls',
    'rhs_key' => 'id',
    'join_table' => 'abc12_data_calls_1_c',
    'join_key_lhs' => 'abc12_data_calls_1abc12_data_ida',
    'join_key_rhs' => 'abc12_data_calls_1calls_idb',
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
  'abc12_data_modified_user' => 
  array (
    'id' => 'b06f3bae-31a6-72af-1d18-579b4a0a575a',
    'relationship_name' => 'abc12_data_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'abc12_Data',
    'rhs_table' => 'abc12_data',
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
  'abc12_data_created_by' => 
  array (
    'id' => 'c060da07-f98f-75ce-56cf-579b4a6b9d53',
    'relationship_name' => 'abc12_data_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'abc12_Data',
    'rhs_table' => 'abc12_data',
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
  'abc12_data_assigned_user' => 
  array (
    'id' => 'd0b25a76-d556-3fde-8584-579b4ac48097',
    'relationship_name' => 'abc12_data_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'abc12_Data',
    'rhs_table' => 'abc12_data',
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
  'abc12_data_fp_event_locations_1' => 
  array (
    'id' => 'e1acf498-79d4-b5a9-f7fa-579b4a8badf3',
    'relationship_name' => 'abc12_data_fp_event_locations_1',
    'lhs_module' => 'abc12_Data',
    'lhs_table' => 'abc12_data',
    'lhs_key' => 'id',
    'rhs_module' => 'FP_Event_Locations',
    'rhs_table' => 'fp_event_locations',
    'rhs_key' => 'id',
    'join_table' => 'abc12_data_fp_event_locations_1_c',
    'join_key_lhs' => 'abc12_data_fp_event_locations_1abc12_data_ida',
    'join_key_rhs' => 'abc12_data_fp_event_locations_1fp_event_locations_idb',
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
  'abc12_data_activities_1_calls' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Data',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'abc12_Data',
    'rhs_module' => 'Calls',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'abc12_data_activities_1_calls',
  ),
  'abc12_data_activities_1_meetings' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Data',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'abc12_Data',
    'rhs_module' => 'Meetings',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'abc12_data_activities_1_meetings',
  ),
  'abc12_data_activities_1_notes' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Data',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'abc12_Data',
    'rhs_module' => 'Notes',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'abc12_data_activities_1_notes',
  ),
  'abc12_data_activities_1_tasks' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Data',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'abc12_Data',
    'rhs_module' => 'Tasks',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'abc12_data_activities_1_tasks',
  ),
  'abc12_data_activities_1_emails' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Data',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'abc12_Data',
    'rhs_module' => 'Emails',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'abc12_data_activities_1_emails',
  ),
);