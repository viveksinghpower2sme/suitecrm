<?php

// custom/modules/Leads/LeadsJjwg_MapsLogicHook.php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('custom/include/global_logic_hook.php');

class LeadsJjwg_MapsLogicHook extends globalLogicHook {

    function updateGeocodeInfo(&$bean, $event, $arguments) {
        // before_save
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $jjwg_Maps->updateGeocodeInfo($bean);
        }
    }

    function updateRelatedMeetingsGeocodeInfo(&$bean, $event, $arguments) {
        // after_save
        
        $jjwg_Maps = get_module_info('jjwg_Maps');
        if ($jjwg_Maps->settings['logic_hooks_enabled']) {
            $jjwg_Maps->updateRelatedMeetingsGeocodeInfo($bean);
        }
    }
    function autoAssign(&$bean, $event, $arguments)
   {
	  global $db;
	  global $sugar_config;

	  if(in_array($bean->lead_source,$sugar_config['hotlead']) && !$bean->auto_lead_c)
	  {

        $Vertical= "";
        $Region = "";

        if(isset($sugar_config['region_state_mapping'][$bean->primary_address_state]))
        {
            $Region = $sugar_config['region_state_mapping'][$bean->primary_address_state];
            $bean->region_c  = $Region;
        }

        $Vertical = $bean->vertical_c;
		//$Region =  = $_REQUEST['region_c'];
		//$Vertical = $_REQUEST['vertical_c'];
		 $sql="select a.id as id from clus1_cluster a INNER JOIN clus1_cluster_cstm b on a.id = b.id_c WHERE a.region='$Region' AND a.vertical='$Vertical' AND b.type_c ='AutoLead'";
	
		$result=$db->query($sql);
		$row = $db->fetchByAssoc($result);
		if($row['id'] == null)
		  {
			$sql1="select a.id as id from clus1_cluster a INNER JOIN clus1_cluster_cstm b on a.id = b.id_c WHERE a.region='all' AND a.vertical='all'  AND b.type_c ='AutoLead' ";
			$result=$db->query($sql1);
			$row = $db->fetchByAssoc($result);
			
		  }
		  $ClustID=$row['id'];
		

		 $sqlSelectrelation= "SELECT clus1_cluster_usersusers_idb as id FROM clus1_cluster_users_c WHERE clus1_cluster_usersclus1_cluster_ida='$ClustID' and deleted=0";
		
		$result=$db->query($sqlSelectrelation);
		$i=0;
		$row1='';
		$aUserCount = array();
		while (($row = $db->fetchByAssoc($result)) != null)
		{
			$aUserCount[$row['id']] = 0;
			$row1=$row1."'".$row['id']."',";
		}
		 $row1 = trim($row1,',');
		
	 	$sql1="SELECT userid,date FROM `user_activity_custom` where date between timestamp(date_sub(now(), interval 10 minute)) 		and now() AND userid in($row1) order by date DESC";
	
		$res=$db->query($sql1);
		$row2='';
		$count=0;
		while($row = $db->fetchByAssoc($res))
		{
			if(!$count)
				$aUserCount = array();
			
			 $count=1;
			
			$aUserCount[$row['userid']] = 0;
			$row2=$row2."'".$row['userid']."',";
		}
        
        $date = date('Y-m-d');
		if($count==1)
		{
			$row2 = trim($row2,',');
			 $sql="SELECT assigned_user_id,COUNT(*) as tCount  FROM calls where status='Planned' and parent_type='Leads' and date(date_entered)= '$date' group by assigned_user_id having assigned_user_id in($row2) ORDER BY tCount ASC";
	
		}	
		else
		{
			$sql="SELECT assigned_user_id,COUNT(*) as tCount  FROM calls where status='Planned' and parent_type='Leads' and date(date_entered)= '$date' group by assigned_user_id having assigned_user_id in($row1) ORDER BY tCount ASC";
			//die;
		}
       
		$result=$db->query($sql);
		while($row = $db->fetchByAssoc($result))
		{
			$aUserCount[$row['assigned_user_id']] = $row['tCount'];
		}
		asort($aUserCount);
		//print_r($aUserCount);
		//die;
		foreach($aUserCount as $key=>$val )
		{
		 	$AssignID = $key;

		 	break;
		}


		$_REQUEST['assigned_user_id']=$AssignID;
		$bean->assigned_user_id=$AssignID;
		$bean->auto_lead_c=1;
	}
 
	 

   }
    	function removeLock(&$bean, $event, $arguments)
    	{
            //print_r($_REQUEST);
    		if($_REQUEST['method'] == "set_entry" && $_REQUEST['input_type'] == "json" && $_REQUEST['type'] == "create_lead")
            {
                global $db;
                $restData = $this->getRestParams();

                //print_r($restData);
                $phone = $restData['phone'];
                if(!empty($phone))
                {
                    $sql = "Delete From temp where phone= '$phone' ";         
                    //echo $sql;
                    $db->query($sql);
                }
    			

    		}
            //die('nn');		
    	}
        function checkLeadPhoneDuplicacy(&$bean, $event, $arguments)
        {
            
            // Only execute when lead comes from landing pages
            if($_REQUEST['method'] == "set_entry" && $_REQUEST['input_type'] == "json" && $_REQUEST['type'] == "create_lead")
            {
                global $db;
                $restData = $this->getRestParams();
                //print_r($restData);die;
                if(!empty($restData))
                {
                    $phone = $restData['phone'];
                    $leadSource = $restData['leadSource'];
                    $firstName = $restData['firstName'];
                    $email = $restData['email'];
                    $accountName = $restData['accountName'];
                    $postalCode = $restData['postalCode'];
                    $state = $restData['state'];
                    $vertical = $restData['vertical'];
					
    				while(1)
    				{
    					$sql = "INSERT INTO temp (phone,flag) VALUES ('$phone',1)";         
    					$db->query($sql);
    					if($db->last_error)
    					{
    						sleep(2);
    					}
    					else
    					{
    						break;
    					}
    				}
					

                
    				require_once('service/checkPhone1.php');
    				$data = checkPhone($phone,1);
                   // print_r($data);die('end');
                    $data= json_decode($data,1);
                    if($data['status'] == 1)
                    {
                        
                       //print_r($data);die('end');
                        $moduleId = $data['id'];
                        $module = $data['module'];
                        $phoneId = $data['phoneId'];
                        $oldLeadSource = $data['leadSource'];

                        if($moduleId != "" && $phoneId != "")
                        {
                            if($module == "abc12_Data")
                            {
                                $this->markDataPhoneOptedOut($moduleId,$phoneId);
                            }
                            elseif($module == "Leads")
                            {
                                $bean->id = $moduleId;
                                $bean->create_activity_c = 1;
                                $bean->lead_source = $leadSource;
                                $bean->first_name = (!empty($firstName)) ? $firstName : $bean->first_name;
                                $bean->last_name =  (!empty($firstName)) ? $firstName : $bean->last_name;
                                $bean->email1 =  (!empty($email)) ? $email : $bean->email1;
                                $bean->account_name = (!empty($accountName)) ? $accountName : $bean->account_name;
                                $bean->primary_address_postalcode = (!empty($postalCode)) ? $postalCode : $bean->primary_address_postalcode;
                                $bean->primary_address_state = (!empty($state)) ? $state : $bean->primary_address_state;
                                $bean->vertical_c = (!empty($vertical)) ? $vertical : $bean->vertical_c;
                                $bean->phone_other = $phone;
                               // echo "<pre>";print_r($bean);die;
                                if($bean->description == "New Lead Created")
                                {
                                     $bean->description = "Lead tried to Contact";
                                } 
                                else
                                {
                                    $bean->description = "Lead ".$bean->description;
                                }
                                $this->makeHistoryForOldLeadSource($moduleId,$module,$oldLeadSource);


                                //echo "<pre>"; print_r($bean);die;
                            }
                            elseif($module == "Contacts")
                            {
                                $bean->create_contact_c = $moduleId;
                               // $bean->create_activity_c = 1;
                            }
                           // 
                        }
                    }
				}
            }
          
        }
        
        private function markDataPhoneOptedOut($dataId,$phoneId)
        {
            global $db;
            $sql = "update abc12_data_phone_phone_1_c set opted_out = 1 where abc12_data_phone_phone_1abc12_data_ida = '$dataId' and abc12_data_phone_phone_1phone_phone_idb = '$phoneId'";         
           // echo $sql;die;
            $db->query($sql);
        }
        
        function deleteLead(&$bean, $event, $arguments)
        {
            
            if(!empty($bean->create_contact_c))
            {
                global $db;
                $sql = "delete from leads where id = '$bean->id'";
                $db->query($sql);
            }
            
        }
        
        function markActivityHeld(&$bean, $event, $arguments)
        {
            global $db;
            $sql = "select count(id) as phCount from phone_phone_leads_1_c where phone_phone_leads_1leads_idb='".$bean->id."' and opted_out = 0 and invalid = 0";
            $out = $db->query($sql);  
            $res = $db->fetchRow($out);
            if(!empty($res) && $res['phCount'] == 0)
            { 
               $upSql = "update calls set status = 'Held' where parent_id = '".$bean->id."' and status = 'Planned'";    
               $db->query($upSql);
            }
        
        }

        private function makeHistoryForOldLeadSource($moduleId,$module,$oldLeadSource)
        {
         
            global $db;
            $inSql="INSERT INTO old_lead_source (bean_id,bean_module,lead_source,date_entered)
                            VALUES ('".$moduleId."','".$module."','".$oldLeadSource."',NOW())";
          
            //echo $sql;
            $db->query($inSql); 
        }

        private function getRestParams()
        {
                $restData = $_REQUEST['rest_data'];
                $restData = json_decode(stripslashes(from_html($restData))); 
                $lastVal = $restData[2];
               
                $returnArray = array();

                if(count($lastVal) > 0)
                {
                    foreach($lastVal as $k => $v)
                    {
                        if($v->name == "phone_mobile")
                        {
                            $returnArray['phone'] = trim($v->value);
                        }
                        elseif($v->name == "lead_source")
                        {
                            $returnArray['leadSource']  = trim($v->value);
                        }
                        elseif($v->name == "first_name")
                        {
                             $returnArray['firstName']  = trim($v->value);
                        }
                        elseif($v->name == "email1")
                        {
                             $returnArray['email'] = trim($v->value);
                        }
                        elseif($v->name == "account_name")
                        {
                             $returnArray['accountName']  = trim($v->value);
                        }
                        elseif($v->name == "primary_address_postalcode")
                        {
                             $returnArray['postalCode']  = trim($v->value);
                        }
                        elseif($v->name == "primary_address_state")
                        {
                             $returnArray['state']  = trim($v->value);
                        }
                        elseif($v->name == "vertical_c")
                        {
                             $returnArray['vertical']  = trim($v->value);
                        }
                        
                    }
                }

                return $returnArray;
        }


   
}
