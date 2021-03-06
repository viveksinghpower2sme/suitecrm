<?php
// created: 2016-05-25 13:41:17
$dictionary["FP_Event_Locations"]["fields"]["sku_sku_fp_event_locations_1"] = array (
  'name' => 'sku_sku_fp_event_locations_1',
  'type' => 'link',
  'relationship' => 'sku_sku_fp_event_locations_1',
  'source' => 'non-db',
  'module' => 'sku_SKU',
  'bean_name' => 'sku_SKU',
  'vname' => 'LBL_SKU_SKU_FP_EVENT_LOCATIONS_1_FROM_SKU_SKU_TITLE',
  'id_name' => 'sku_sku_fp_event_locations_1sku_sku_ida',
);
$dictionary["FP_Event_Locations"]["fields"]["sku_sku_fp_event_locations_1_name"] = array (
  'name' => 'sku_sku_fp_event_locations_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SKU_SKU_FP_EVENT_LOCATIONS_1_FROM_SKU_SKU_TITLE',
  'save' => true,
  'id_name' => 'sku_sku_fp_event_locations_1sku_sku_ida',
  'link' => 'sku_sku_fp_event_locations_1',
  'table' => 'sku_sku',
  'module' => 'sku_SKU',
  'rname' => 'name',
);
$dictionary["FP_Event_Locations"]["fields"]["sku_sku_fp_event_locations_1sku_sku_ida"] = array (
  'name' => 'sku_sku_fp_event_locations_1sku_sku_ida',
  'type' => 'link',
  'relationship' => 'sku_sku_fp_event_locations_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SKU_SKU_FP_EVENT_LOCATIONS_1_FROM_FP_EVENT_LOCATIONS_TITLE',
);
