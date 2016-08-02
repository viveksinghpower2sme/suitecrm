<?php
require_once '../config.php';
//echo $sugar_config['dbconfig']['db_host_name'];
$db=mysqli_connect($sugar_config['dbconfig']['db_host_name'],$sugar_config['dbconfig']['db_user_name'],$sugar_config['dbconfig']['db_password'],$sugar_config['dbconfig']['db_name']);

if(!$db)
{
	die ("Cannot connect to the database");
}

$state="";
$city="";
$state= $_REQUEST["state"];
$city=$_REQUEST["district"];
if(!empty($state))
{
	$arrState=explode(",",$state);
}
$stateCount=count($arrState);
if(!empty($city))
{ 
	$arrCity=explode(",",$city);
}

echo $cityCount=count($arrCity);
$stateRow="";
$cityRow="";
$count1=0;
$count2=0;

while($count1<$stateCount)
{
$stateRow=$stateRow."'".$arrState[$count1]."',";
$count1=$count1+1;
}
 $count1;
$stateRow = trim($stateRow,',');
if($cityCount)
{
	while($count2<$cityCount)
	{
	 $cityRow=$cityRow."'".$arrCity[$count2]."',";
	$count2=$count2+1;
	}
	$cityRow= trim($cityRow,',');
}


if(empty($stateRow) && !empty($cityRow))
{
	$pinArray=array();
	$sqlpin="select pincode from pincodes where district in ($cityRow) ";
	$res=$db->query($sqlpin);
	while($row = $db->fetchByAssoc($res))
	{
		$pinArray[]=$row['$pincode'];
	}
	$jsondata=json_encode($pinArray);
}
elseif(!empty($stateRow) && !empty($cityRow))
{
	$pinArray=array();
	$sqlpin="select pincode from pincodes where district in ($cityRow) ";
	$res=$db->query($sqlpin);
	while($row = $db->fetchByAssoc($res))
	{
		$pinArray[]=$row['$pincode'];
	}
	$jsondata=json_encode($pinArray);
	
}
elseif(!empty($stateRow) && empty($cityRow))
{
	
	 $sqlCity="select distinct district from pincodes where state in ($stateRow)";
		
 	$res=mysqli_query($db,$sqlCity);
	
	$districtArray=array();
	while($row = mysqli_fetch_assoc($res))
	{
		$districtArray[]=$row['district'];
		
	}

	$jsondata=json_encode($districtArray);
	//echo($jsondata);die;

}

echo $jsondata;

?>
