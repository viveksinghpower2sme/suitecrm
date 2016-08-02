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
  'clus1_cluster_users' => 
  array (
    'id' => '79f106b2-63d3-4be4-1694-57711d61b348',
    'relationship_name' => 'clus1_cluster_users',
    'lhs_module' => 'Clus1_Cluster',
    'lhs_table' => 'clus1_cluster',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'join_table' => 'clus1_cluster_users_c',
    'join_key_lhs' => 'clus1_cluster_usersclus1_cluster_ida',
    'join_key_rhs' => 'clus1_cluster_usersusers_idb',
    'relationship_type' => 'many-to-many',
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
  'verti_vertical_clus1_cluster_1' => 
  array (
    'id' => 'aefa2b44-64c4-8037-d2fe-57711dd34bff',
    'relationship_name' => 'verti_vertical_clus1_cluster_1',
    'lhs_module' => 'verti_Vertical',
    'lhs_table' => 'verti_vertical',
    'lhs_key' => 'id',
    'rhs_module' => 'Clus1_Cluster',
    'rhs_table' => 'clus1_cluster',
    'rhs_key' => 'id',
    'join_table' => 'verti_vertical_clus1_cluster_1_c',
    'join_key_lhs' => 'verti_vertical_clus1_cluster_1verti_vertical_ida',
    'join_key_rhs' => 'verti_vertical_clus1_cluster_1clus1_cluster_idb',
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
  'clus1_cluster_modified_user' => 
  array (
    'id' => 'cf20d093-ce70-6df4-db38-57711d1bb79e',
    'relationship_name' => 'clus1_cluster_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Clus1_Cluster',
    'rhs_table' => 'clus1_cluster',
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
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'clus1_cluster_created_by' => 
  array (
    'id' => 'd950f29f-4727-a308-019c-57711d808740',
    'relationship_name' => 'clus1_cluster_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Clus1_Cluster',
    'rhs_table' => 'clus1_cluster',
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
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'clus1_cluster_assigned_user' => 
  array (
    'id' => 'e38cd09e-9cb8-3feb-0f5d-57711d590f31',
    'relationship_name' => 'clus1_cluster_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Clus1_Cluster',
    'rhs_table' => 'clus1_cluster',
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
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'rgn_region_clus1_cluster_1' => 
  array (
    'id' => 'ef8b6a8e-c66e-233f-62c6-57711d1c78b9',
    'relationship_name' => 'rgn_region_clus1_cluster_1',
    'lhs_module' => 'Rgn_Region',
    'lhs_table' => 'rgn_region',
    'lhs_key' => 'id',
    'rhs_module' => 'Clus1_Cluster',
    'rhs_table' => 'clus1_cluster',
    'rhs_key' => 'id',
    'join_table' => 'rgn_region_clus1_cluster_1_c',
    'join_key_lhs' => 'rgn_region_clus1_cluster_1rgn_region_ida',
    'join_key_rhs' => 'rgn_region_clus1_cluster_1clus1_cluster_idb',
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
  'clus1_cluster_rgn_region_1' => 
  array (
    'rhs_label' => 'Region',
    'lhs_label' => 'Cluster',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'Clus1_Cluster',
    'rhs_module' => 'Rgn_Region',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'clus1_cluster_rgn_region_1',
  ),
);