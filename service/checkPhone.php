<?php
require_once '../config.php';
$phone_number= $_GET['data'];
$connectionArr = $sugar_config['dbconfig'];
$db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
$phoneFlag=0;
if(!$db)
{
	die ("Cannot connect to the database");
}

$dataQuery="SELECT a.id AS phoneId, a.name, b.abc12_data_phone_phone_1abc12_data_ida AS DataId,
    c.abc12_data_calls_1calls_idb AS activityId
FROM phone_phone a
INNER JOIN abc12_data_phone_phone_1_c b ON a.id = b.abc12_data_phone_phone_1phone_phone_idb
LEFT JOIN abc12_data_calls_1_c c ON b.abc12_data_phone_phone_1abc12_data_ida = c.abc12_data_calls_1abc12_data_ida
LEFT JOIN calls ON calls.id = c.abc12_data_calls_1calls_idb
WHERE a.name ='".$phone_number."'
AND b.opted_out =0
AND b.invalid =0
AND b.deleted =0
AND calls.status = 'Planned'
";
$query1 = mysqli_query($db,$dataQuery );

$row = mysqli_fetch_assoc($query1);
if($row)
{
    $moduleName="abc12_Data";

 $phoneFlag=1;

//make a serialized array;

echo $dataArr=json_encode(array(
		"id"=>$row['DataId'],
                "activityId"=>$row['activityId'],
                "phone"=>$row['name'],
                "phoneId"=>$row['phoneId'],
		"module"=>$moduleName,
    "status"=>1

		)); 
die;
}

//Check in leads

//echo $leadQuery = "SELECT a.id as phoneId,b.phone_phone_leads_1leads_idb as leadId , a.name ,c.id as activityId FROM phone_phone a 
//inner join phone_phone_leads_1_c b on a.id = b.phone_phone_leads_1phone_phone_ida 
//LEFT join calls c on c.parent_id = b.phone_phone_leads_1leads_idb 
//where a.name ='".$phone_number."' and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 and c.status='Planned'";

 $leadQuery = "SELECT a.id as phoneId,b.phone_phone_leads_1leads_idb as leadId , a.name ,c.id as activityId FROM phone_phone a 
inner join phone_phone_leads_1_c b on a.id = b.phone_phone_leads_1phone_phone_ida 
LEFT join calls c on c.parent_id = b.phone_phone_leads_1leads_idb 
where a.name ='".$phone_number."' and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 and c.status='Planned'";

$query2 = mysqli_query($db,$leadQuery);

$row = mysqli_fetch_assoc($query2);

if($row)
{
 $phoneFlag=1;

$moduleName="Leads";


//make a serialized array;

echo $leadArr=json_encode(array(
		"id"=>$row['leadId'],
                "activityId"=>$row['activityId'],
                "phone"=>$row['name'],
                "phoneId"=>$row['phoneId'],
		"module"=>$moduleName,
                "status"=>1
		)); 
die;
}





//Check in Contact
$contactQuery="SELECT a.id AS phoneId,b.contacts_phone_phone_1contacts_ida AS contactId,a.name,c.call_id as activityId FROM phone_phone a
INNER JOIN contacts_phone_phone_1_c as b on a.id = b.contacts_phone_phone_1phone_phone_idb 
LEFT JOIN calls_contacts c on c.contact_id = b.contacts_phone_phone_1contacts_ida
LEFT JOIN calls ON calls.id = c.call_id
WHERE a.name ='".$phone_number."' and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 and calls.status = 'Planned'";

$query3 = mysqli_query($db,$contactQuery);

$row = mysqli_fetch_assoc($query3);


if($row)
{
    $phoneFlag=1;
$contactId = $row['contacts_phone_phone_1contacts_ida'];
 $phoneFlag=1;

$moduleName="Contacts";


//make a serialized array;
echo $contactArr=json_encode(array(
		"id"=>$row['contactId'],
                "activityId"=>$row['activityId'],
                "phone"=>$row['name'],
                "phoneId"=>$row['phoneId'],
		"module"=>$moduleName,
                "status"=>1
		)); 


die;
}
if($phoneFlag==0){
  echo  $contactArr=json_encode(array(
		"status"=>0

		)); 
  die;

}


?>
