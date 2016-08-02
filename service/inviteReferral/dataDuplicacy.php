<?php

include "SuiteAPIWrapper.php";

class inviteReferral{


    public function Process($data)
    {
        $this->parent_status_in_CRM($data);
        return($data);
    }

    function parent_status_in_CRM(&$data){
       global $dbconn;
		if(empty($data['Referrer Custom Field 1'])){
	 
	    	       return $data[''];
	     }
		$session_id=mt_rand();

		$objWrapper=new SuiteAPIWrapper('Test','/var/www/html/suitecrm/service',2,$session_id,'admin','admin');
		$existingDataJson=	$this->CheckPhone($data['Referrer Custom Field 1']);
		
		$existingData=json_decode($existDataJson);
		if($existingData['status']==0 || ($existingData['status']==1 && ($existingData['module']=='abc12_data' || $existingData['module']=='Leads'))){
			$data['module'] ='Lead';
			$dataToCreateLead=$this->createParentDataToUpdateInCrm($data);
          	$id = $obj1->CreateLead($dataToCreateLead);
           
            $data['parentId']=$ItemsData[$id];
		}
		elseif($existingData['module'] ='Contacts'){
			$data['parentId']=$ItemsData[$id];
			$data['module'] =$existingData['module'];
		}
		
		
			
	        $this->child_status_in_CRM($data,$objWrapper);
	       
    }




    function child_status_in_CRM(&$data,$objWrapper){

        global $dbconn;
        if( empty($data['Referee Mobile'])){
        	echo("mobile number of referee is missing, please enter mobile no and then upload the sheet again");
			}
				
       $existingDataJson=	$this->CheckPhone($data['Referee Mobile']);
		$existingData=json_decode($existDataJson);
		if($existingData['status']==0 || ($existingData['status']==1 && $existingData['module']=='abc12_data')){
				
				$dataToCreateLead=$this->createChildDataToUpdateInCrm($data);
          	$id = $obj1->CreateLead($dataToCreateLead);
           
            $data['childId']=$ItemsData[$id];
			 $data['childId']=$ItemsData[$id];
			$data['childStatus'] ='new';
			 
		
		}
		else{
			$data['childStatus'] ='existing';
		}
		
			
	   
    
	}



    function createParentDataToUpdateInCrm($data){
    	$arrdata=array(
		"id"=>"",
		"lead_source"=>"Referrer_".$data["Campaign"],
		"first_name"=>$data["Referrer Name"],
    		"email1"=>$data["Referrer"],
    		"account_name"=>$data["Referrer Name"],
    		"phone_mobile"=>$data["Referrer Custom Field 1"],
		"description"=>'New Referrer Created'
		);
		return $arrdata;

    }
	
	
	function createChildDataToUpdateInCrm($data){
    	$arrdata=array(
		"id"=>"",
		"lead_source"=>"Referrer_".$data["Campaign"],
		"first_name"=>$data["Referee Name"],
    		"email1"=>$data["Referee"],
    		"account_name"=>$data["Referee Name"],
    		"phone_mobile"=>$data["Referee Mobile"],
    		"referrer_name"=>$data["Referrer Name"],
    		"referrer_id"=>$data["parentId"],
			
		"description"=>'New Referee Created'
		);
		return $arrdata;

    }
	

}


?>




