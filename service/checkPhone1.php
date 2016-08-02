<?php

if(isset($_REQUEST['data']))
{
	$phone_number= $_GET['data'];
	checkPhone($_REQUEST['data'],0);
}
function checkPhone($phone_number,$cliCall=0)
{
	if($cliCall)
	{
	  	global $sugar_config;
		
	}
	else
	{
		require_once '../config.php';
		
	}
	$connectionArr = $sugar_config['dbconfig'];
	$db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
	$phoneFlag=0;
	if(!$db)
	{
		die ("Cannot connect to the database");
	}

	$dataQuery="SELECT a.id AS phoneId,
	 a.name,
	 b.abc12_data_phone_phone_1abc12_data_ida AS DataId,d.lead_source_c as leadSource,
	 e.abc12_data_calls_1calls_idb AS activityId,
	 c.assigned_user_id as assignedUserId
	FROM phone_phone a
	INNER JOIN abc12_data_phone_phone_1_c b ON a.id = b.abc12_data_phone_phone_1phone_phone_idb
	INNER JOIN abc12_data c ON c.id = b.abc12_data_phone_phone_1abc12_data_ida
	INNER JOIN abc12_data_cstm d ON d.id_c = c.id
	LEFT JOIN abc12_data_calls_1_c e ON b.abc12_data_phone_phone_1abc12_data_ida = e.abc12_data_calls_1abc12_data_ida
	LEFT JOIN calls f ON f.id = e.abc12_data_calls_1calls_idb
	WHERE a.name ='".$phone_number."'
	AND b.opted_out =0
	AND b.invalid =0
	AND b.deleted =0
	AND c.deleted =0
	";

	
	$query1 = mysqli_query($db,$dataQuery );

	$row = mysqli_fetch_assoc($query1);
	if($row)
	{
	    $moduleName="abc12_Data";

	 $phoneFlag=1;
	 $dataArr=json_encode(array(
			"id"=>$row['DataId'],
		        "phone"=>$row['name'],
		        "phoneId"=>$row['phoneId'],
                "activityId"=>$row['activityId'],
                "assignedUserId"=>$row['assignedUserId'],
			"module"=>$moduleName,
	    "status"=>1,
	    "leadSource" => $row['leadSource']

			));
	//make a serialized array;
	if($cliCall)
	  return $dataArr;
	
	echo $dataArr;  
	die;
	}

	//Check in leads

	 $leadQuery = "SELECT a.id as phoneId,b.phone_phone_leads_1leads_idb as leadId , a.name ,
	c.lead_source as leadSource,d.id as activityId,d.status,c.assigned_user_id as assignedUserId FROM phone_phone a 
	inner join phone_phone_leads_1_c b on a.id = b.phone_phone_leads_1phone_phone_ida 
	inner join leads c on c.id = b.phone_phone_leads_1leads_idb 
	LEFT join calls d on d.parent_id = b.phone_phone_leads_1leads_idb and d.name='".$phone_number."'
	where a.name ='".$phone_number."' and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 and c.deleted = 0";

	$plannedActivityId="";
	$query2 = mysqli_query($db,$leadQuery);
while($contData = mysqli_fetch_assoc($query2))
{
	
	if(	$contData['status']=='Planned'){
		$plannedActivityId=$contData['activityId'];
	}
	$row=$contData;
}
	if($row)
	{
	 $phoneFlag=1;

	$moduleName="Leads";


	//make a serialized array;

	$dataArr=json_encode(array(
			"id"=>$row['leadId'],
		        "phone"=>$row['name'],
		        "phoneId"=>$row['phoneId'],
		        "activityId"=>$plannedActivityId,
		         "assignedUserId"=>$row['assignedUserId'],
			"module"=>$moduleName,
	    		"status"=>1,
	    		"leadSource" => $row['leadSource']

			));
	//make a serialized array;
	if($cliCall)
	  return $dataArr;
	
	echo $dataArr;  
	die;
	}





	//Check in Contact
 $contactQuery="SELECT a.id AS phoneId,
	b.contacts_phone_phone_1contacts_ida AS contactId,
	a.name,
	c.lead_source as leadSource,
	e.call_id as activityId,
	calls.status,
	c.assigned_user_id as assignedUserId
	FROM phone_phone a
	INNER JOIN contacts_phone_phone_1_c as b on a.id = b.contacts_phone_phone_1phone_phone_idb 
	INNER JOIN contacts as c on c.id = b.contacts_phone_phone_1contacts_ida 
	LEFT JOIN calls_contacts e on e.contact_id = b.contacts_phone_phone_1contacts_ida
	LEFT JOIN calls ON calls.id = e.call_id
	WHERE a.name ='".$phone_number."' and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 and c.deleted = 0";

	
	$query3 = mysqli_query($db,$contactQuery);

		
$plannedActivityId="";
while($contData = mysqli_fetch_assoc($query3))
{
	
	if(	$contData['status']=='Planned'){
		$plannedActivityId=$contData['activityId'];
	}
	$row=$contData;
}

	if($row)
	{	
	    $phoneFlag=1;
	$contactId = $row['contacts_phone_phone_1contacts_ida'];
	 $phoneFlag=1;

	$moduleName="Contacts";


	//make a serialized array;
	$dataArr=json_encode(array(
			"id"=>$row['contactId'],
		        "phone"=>$row['name'],
		        "phoneId"=>$row['phoneId'],
		        "activityId"=>$plannedActivityId,
		         "assignedUserId"=>$row['assignedUserId'],
				"module"=>$moduleName,
	    "status"=>1,
	    "leadSource" => $row['leadSource']

			));
	//make a serialized array;
	if($cliCall)
	  return $dataArr;
	
	echo $dataArr;  
	die;
	}

	if($phoneFlag==0){
	   $dataArr=json_encode(array(
			"status"=>0

			)); 
	  	if($cliCall)
	  		return $dataArr;
	
		echo $dataArr;  
		die;
	
	}
}

?>
