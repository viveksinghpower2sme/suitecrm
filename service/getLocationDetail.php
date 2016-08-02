<?php

require_once '../config.php';
$connectionArr = $sugar_config['dbconfig'];
$db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
if(!$db)
{
    die ("Cannot connect to the database");
} 

$locationId = $_REQUEST['locId'];

if(!empty($locationId))
{
    $retData = getLocationDetail($locationId);
    echo json_encode($retData);
}

function getLocationDetail($locId)
{
    global $db;
   
    $locationSql = "select fp_event_locations_cstm.rfq_won_c,fp_event_locations.name as address_code_c,fp_event_locations_cstm.address1_c,fp_event_locations_cstm.tin_no_c,fp_event_locations_cstm.ecc_no_c,fp_event_locations_cstm.collectorate_c,fp_event_locations_cstm.address_type_c,fp_event_locations_cstm.address2_c,fp_event_locations_cstm.cst_no_c,fp_event_locations_cstm.range_c,fp_event_locations_cstm.division_c,fp_event_locations_cstm.state_c,fp_event_locations_cstm.country_c,fp_event_locations_cstm.city_c,fp_event_locations_cstm.postcode_c,fp_event_locations_cstm.reason_c as tin_no_reasons_c from fp_event_locations inner join fp_event_locations_cstm on fp_event_locations.id = fp_event_locations_cstm.id_c where fp_event_locations.id = '$locId' and fp_event_locations.deleted = 0";               
    
    $locOut = mysqli_query($db,$locationSql);
    $retArray = array();
    if(mysqli_num_rows($locOut) > 0)
    {
        $dat = mysqli_fetch_assoc($locOut); 
        if($dat['postcode_c'] != "")
        {
            $retArray = $dat;
        } 
    }
    return $retArray;                
}
?>
