<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'saveVendorInfoInNav', 'custom/modules/vend_Vendor/vend_VendorJjwg_MapsLogicHook.php', 'vend_VendorJjwg_MapsLogicHook', 'saveVendorInfoInNav'); 
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(90, 'deleteAddressInfoIntoNav', 'custom/modules/vend_Vendor/vend_VendorJjwg_MapsLogicHook.php','vend_VendorJjwg_MapsLogicHook', 'deleteAddressInfoIntoNav'); 

?>