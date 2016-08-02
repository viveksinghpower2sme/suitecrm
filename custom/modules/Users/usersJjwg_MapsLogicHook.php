<?php

// custom/modules/Leads/LeadsJjwg_MapsLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');


class usersJjwg_MapsLogicHook {

    function setUserEntry(&$bean, $event, $arguments) {
       
        global $db;    
        $userId = $_SESSION['authenticated_user_id'];

        $date = date('Y-m-d H:i:s');
        
        $sql = "select * from user_activity_custom where userid = '$userId'"; 
        $out = $db->query($sql);
       
        if($db->getRowCount($out) == 0)
        {
            $insSql = "insert into user_activity_custom (userid,flag,date) values ('$userId',0,'$date')";
            
            $db->query($insSql); 
        }
        else
        {
            $upSql = "update user_activity_custom set date = '$date' where userid = '$userId'";
            $db->query($upSql); 
        }
       
        
    }
    
    function deleteUserEntry(&$bean, $event, $arguments) {
       
        global $db;
        
        $userId = $_SESSION['authenticated_user_id'];
        $sql = "delete from user_activity_custom where userid = '$userId'";
       
        $db->query($sql);
    }

   /* function setSecurityGroupId(&$bean, $event, $arguments)
    {
    	if (!isset($bean->fetched_row['id']))
		{
			 $record_id = $securityBean->id;
		}	

    }
*/

    function createUserGroup(&$bean, $event, $arguments)
    {

	    if (!isset($bean->fetched_row['id']))
		{
		    //new record
		    $securityBean = BeanFactory::newBean('SecurityGroups');
	        $securityBean->name = $bean->user_name;
	        $securityBean->assigned_user_id = $bean->id;
	        $securityBean->save();
	        $record_id=$securityBean->id;
		
				
		 }
		else
		{
		    //existing record
		    //fetching seurity group id
		  
		   
		  $record_id=$this->fetchSecurityGroupIdForGivenUser($bean->id);

		    $this->deleteOldUserFromSecurityGroup($record_id);
			    
		}
	   $this->addUserToSecurityGroup($record_id,$bean->reports_to_id,$bean->id);	  

    }

	function deleteOldUserFromSecurityGroup($securitygroupId){
		global $db;
		 $sql ="delete from securitygroups_users where securitygroup_id='$securitygroupId'";
		$db->query($sql);
	}
	
	function fetchSecurityGroupIdForGivenUser($userId){
		global $db;
		$sqlSecurityId ='select id from securitygroups where assigned_user_id="'.$userId.'"';
		   $query= $db->query($sqlSecurityId);
			 $res=$db->fetchRow($query);
		   return($res['id']);
	}

    function addUserToSecurityGroup($groupId,$reportId,$userId)
    {
    	global $db;
    	//update security grpup to add all the reporting managers
    	$groupOfUserId= $this->reportToGroupArray($reportId,$userId);
		
		$valuesTupple="";
		for($i=0; $i<sizeof($groupOfUserId);$i++){
			$uid=$this->getUniqueId();
			$valuesTupple.="('$uid',now(),0,'$groupId','$groupOfUserId[$i]'),";
			
		}
		
		$valuesTupple=rtrim($valuesTupple,",").";";
		
		 $sql ="insert into securitygroups_users(id,date_modified,deleted,securitygroup_id,user_id) Values $valuesTupple";
		$db->query($sql);
    } 

    
	function reportToGroupArray($reportToId,$userId){

	    global $db;
	    $groupofUserIdArray=array();
	    $groupofUserIdArray[] =$userId;
		if(!empty($reportToId)){
		    $groupofUserIdArray[] =$reportToId;
		   
					
			$level=4;
			$resultId=$this->fetchReportToRecursilvely($reportToId,$level,$groupofUserIdArray);
			if($resultId!=1){
				$groupofUserIdArray[]  = $resultId;
	
				
			}	
		
		}
		return $groupofUserIdArray;
		
		
	}


	function fetchReportToRecursilvely($reportToId,$level,&$groupofUserIdArray){
		
		global $db;
						
	    if($level==0){
	   		return 1;
	    }
	    else {
		    $sql = 'select reports_to_id from users where id="'.$reportToId.'"'; 
   		 	$out = $db->query($sql);
		    $userDetails=$db->fetchRow($out);
		  
		    if(empty($userDetails['reports_to_id'])){
		   	  return 1;
		    }
		    else{
		   		$level--;
			    $groupofUserIdArray[]=$userDetails['reports_to_id'];
			    return( $this->fetchReportToRecursilvely($userDetails['reports_to_id'],$level,$groupofUserIdArray));
		    }
	   		
		   
	   }
			 
		
		
	}
 	
 	private function getUniqueId()
    {
        global $db;
      
        $a = $db->query("select UUID() as uid");
        $uid = $db->fetchRow($a);
        return $uid['uid']; 
    }


}
