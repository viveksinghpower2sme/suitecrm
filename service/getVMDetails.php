<?php

$flag = $_REQUEST['flag'];

require_once '../config.php';
$connectionArr = $sugar_config['dbconfig'];
$db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
if(!$db)
{
	die ("Cannot connect to the database");
}	
$locationId = $_REQUEST['location'];
$category = $_REQUEST['category'];
$subCategory = $_REQUEST['subcategory'];
if(!empty($locationId) && !empty($category) && !empty($subCategory))
{
	$param = array('locationId'=>$locationId,'category'=>$category,'subcategory'=>$subCategory);

	$userData = getLocationDetail($param);
	//echo "<pre>";print_r($userData);die;
	echo json_encode($userData);
}
else
{
	//$sql1 = "select * from clus1_cluster inner join clus1_cluster_cstm on clus1_cluster.id = clus1_cluster_cstm.id_c and clus1_cluster.deleted = 0 and clus1_cluster_cstm.type_c='SCM'";
	//echo $sql1;die;

	$sql1 = "SELECT parent_category, concat( `category` , '::', group_concat( `sub_category` SEPARATOR '||' ) ) AS categories FROM category GROUP BY category,parent_category";

	$query1 = mysqli_query($db,$sql1);

	$catArray = array();
	if(mysqli_num_rows($query1) > 0)
	{
		while($contData = mysqli_fetch_assoc($query1))
		{
			
			$parentCategory = $contData['parent_category'];
			$category = $contData['categories'];
			if(!empty($parentCategory) && !empty($category))
			{
				$categories = explode("::", $category);

				if(!empty($categories))
				{
					$categor = $categories[0];
					$subCategory = explode("||", $categories[1]);

					if(!empty($subCategory))
					{
						foreach ($subCategory as $key => $value) {
							$catArray[$categor][$value] = $value;
						}
						
					}
				}
			}
			
		}
		
	}
	echo json_encode($catArray);
	
}





function getLocationDetail($param)
{
	$locationId = $param['locationId'];
	$category = $param['category'];
	$subcategory = $param['subcategory'];

	global $db;

	$pincode = getPincode($locationId);
	$region = getRegion($pincode);
	
	$region = implode("','", $region);
	
	$clusterSql = "select clus1_cluster_users_c.clus1_cluster_usersusers_idb as userId,users.user_name as userName,users.first_name as firstName from clus1_cluster 
					inner join clus1_cluster_cstm on clus1_cluster.id = clus1_cluster_cstm.id_c 
					and clus1_cluster_cstm.category_c like '%$category%' and clus1_cluster_cstm.subcategory_c like '%$subcategory%' and clus1_cluster_cstm.type_c= 'SCM'
					inner join rgn_region_clus1_cluster_1_c on rgn_region_clus1_cluster_1_c.rgn_region_clus1_cluster_1clus1_cluster_idb = clus1_cluster.id and rgn_region_clus1_cluster_1_c.rgn_region_clus1_cluster_1rgn_region_ida in ('$region') and rgn_region_clus1_cluster_1_c.deleted = 0
					inner join clus1_cluster_users_c on clus1_cluster_users_c.clus1_cluster_usersclus1_cluster_ida = clus1_cluster.id and clus1_cluster_users_c.deleted=0
					inner join users on users.id = clus1_cluster_users_c.clus1_cluster_usersusers_idb and users.deleted = 0";
				
				
	$finOut = mysqli_query($db,$clusterSql);
 
 	$retArray = array();
 	if(mysqli_num_rows($finOut) > 0)
 	{
 		 while($dat = mysqli_fetch_assoc($finOut))
	    {
	    	$retArray[] = $dat;

	    }
 	}
   
	return $retArray;				
	
}


function getPincode($locationId)
{
	global $db;
	$pincode = "";
	if($locationId != "")
	{
		
		$dbl = "select postcode_c from fp_event_locations inner join fp_event_locations_cstm on fp_event_locations.id = fp_event_locations_cstm.id_c
		where fp_event_locations_cstm.id_c = '$locationId' and fp_event_locations.deleted = 0";
  		
		$finOut = mysqli_query($db,$dbl);
	    $fOutData = mysqli_fetch_assoc($finOut);
	   
	    $pincode = $fOutData['postcode_c'];
		
	}
	return $pincode;
	
}

function getRegion($pincode)
{
	global $db;
	$region = array();		
	if($pincode != "")
	{
		
		$dbl = "select rgn_region.id from rgn_region inner join rgn_region_cstm on rgn_region.id = rgn_region_cstm.id_c and rgn_region.deleted = 0 and rgn_region_cstm.pin_c like '%$pincode%'";
		$finOut = mysqli_query($db,$dbl);

		if(mysqli_num_rows($finOut)> 0)
		{
			while($dat = mysqli_fetch_assoc($finOut))
			{
				$region[] = $dat['id'];
			}
		}
	 
	}
	return $region;
	
}
?>
