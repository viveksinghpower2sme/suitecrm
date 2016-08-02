<?php
crmlogin();
 function crmLogin(){
	$username="admin";
	$password="admin";
	

        $error="";
        $url='http://192.168.1.16/suitecrm/service/v5/rest.php';

       $loginApiData='method=login&input_type=json&response_type=json&rest_data=[{"password":"'.$password.'","user_name":"'.$username.'",
			"encryption":"PLAIN"},"javascriptTest"]';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $loginApiData);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
        $result = curl_exec($ch);
		
		
		//print_r($result); die;
         $output= json_decode($result);

       
         $ID=$output->id;
	
	getCustom($ID,$url);
	
	//	getDetails($ID,$url);
}
// 
function getDetails($sessionId,$url)
{	
	// $str = '1c19a252-76a0-b11a-f764-576a81a78e98';// get id and module name through check phone
		// $CreateLeadAPI='method=get_entry&input_type=json&response_type=json&rest_data=["'.$ID.'","Leads" ,"'.$str.'"]';
		 echo '<pre>';
		// //print_r($CreateLeadAPI);
		// //die;
		
		 $leaddetails['module']='Leads';
        $DataToBeUpdated='method=set_entry&type=create_lead&input_type=json&response_type=json&'
            . 'rest_data=["'.$sessionId.'","'.$leaddetails['module'].'",['
               . '{"name":"first_name","value":"Savijyolead"},'
                . '{"name":"phone_mobile","value":"9873404555"},'
                . '{"name":"lead_source","value":"Marketing"}]]'
               
			   ;  
	   
			  
		
		 $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $DataToBeUpdated);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
        $result = curl_exec($ch);
       
		 $output= json_decode($result);
		echo('--------------------------------------');
		print_r($output); 
		die;
		
	//getRealationships( $ID); 

		
	
}


function getCustom($ID,$url)
{	

		$CreateLeadAPI='method=get_phone_detail&input_type=json&response_type=json&rest_data=["'.$ID.'","9854735900"]';
		//print_r($CreateLeadAPI);
		//die;
		
		 $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $CreateLeadAPI);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
        $result = curl_exec($ch);
       echo '<pre>';
print_r($result); 
//		print_r(json_decode($result)); 
		
		
	//getRealationships( $ID); 

		
	
}



?>
