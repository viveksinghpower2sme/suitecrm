<?php

	require_once '../config.php';

	$connectionArr = $sugar_config['dbconfig'];
	$db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],
		$connectionArr['db_name']);
		
class neglectedContactsCron
{
	function showNotifications($row)
	{	
		global $db;
		
		$primaryId= $this->getUniqueId();
		$name=$row['first_name']." ".$row['last_name'];
		$userId =1;
	        $url = "index.php?action=DetailView&module=Contacts&record=".$row['id'];

		
		//inserting a data into alert table;
		
		 $sqlInsert="insert into alerts
	(id,name,date_entered,date_modified,modified_user_id,created_by,description,assigned_user_id,is_read,target_module,type,url_redirect,parent_id)
	Values('".$primaryId."','".$name."',NOW(),NOW(),'".$userId."','".$userId."','".$row["description"]."','".$row["assigned_user_id"]."','0','Contacts','info','".$url."','".$row["id"]."')";
		
	 mysqli_query($db,$sqlInsert);
		 

	}
	function getUniqueId()
    	{
		
        	global $db;
		$query="select UUID() as uid";
		$query1 = mysqli_query($db,$query );
        	$uid = mysqli_fetch_assoc($query1);
		return $uid['uid'];
	}
	function fetchNeglectedContacts($days)
	{	
	//fetching the contacts having modification before 30 days from database
		global $db;
      		  $dataQuery="SELECT * FROM contacts
				JOIN contacts_cstm ctc ON contacts.id = ctc.id_c
				WHERE deleted=0 and last_call_modification_c < TIMESTAMP( DATE_SUB( NOW( ) , INTERVAL ".$days." DAY ) )"; 
		

		$query1 = mysqli_query($db,$dataQuery );
		$numRows=mysqli_num_rows($query1);
		//print_r($numRows); die;
		for($i=0; $i<$numRows; $i++)
		{
				$row = mysqli_fetch_assoc($query1);
				$this->showNotifications($row);	
		}
		
	}
}

$obj1=new neglectedContactsCron();
$obj1->fetchNeglectedContacts($sugar_config['days']);
?>
