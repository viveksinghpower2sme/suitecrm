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
		
		
         $output= json_decode($result);

       
         $ID=$output->id;
	
	
//	setLeadDetials($ID,$url);
	//	setDetials($ID,$url);
		delDetials($ID,$url);
}
 
 
 
 
 
 
function delDetials($sessionId,$url)
{	
			
	$add=array(
		$sessionId,
	   	'contactDetails' => array(
            'id' => "33e03144-ac9b-7137-34c7-5763a84e0780",
            'module' => "Contacts",
            'first_name' =>"dinu",
            'last_name' => "dinesh",
            'email_id' => "dinu@gmail.com",
            'mobile_number' => "8889995551",
            'company_name'=> "p2sme"
        ),

    	'address' => array
        (
            'id' => "d1e1cd66-c0ff-ea17-3651-5763a835929d",
          
        )

);
	$re=json_encode($add);
	//$re="12";
	//print_r($re); die;	

       $CreateLeadAPI='method=delete_address&input_type=json&response_type=json&'
         . 'rest_data='.$re;
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $CreateLeadAPI);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
        $result = curl_exec($ch);
       echo('<pre>');
		print_r($result); 
		
		
	//getRealationships( $ID); 

		
	
}
 
 


function setDetials($sessionId,$url)
{	
			
	$add=array(
		$sessionId,
	   	'contactDetails' => array(
            'id' => "6f5666663a57f-bc59-cc4b-6a6c-57729f5ab1b2",
            'module' => "Contacts",
            'first_name' =>"mahesh",
            'last_name' => "mahesh",
            'email_id' => "mahesh@gmail.com",
            'mobile_number' => "9090011111",
            'company_name'=> ""
        ),

    	'address' => array
        (
            'id' => "",
            'type' => "",
            'address' => "dlf phase 2 m3 block,delhi",
            'postalcode' => "110006"
        )

);
	$re=json_encode($add);
	//$re="12";
	

       $CreateLeadAPI='method=create_address&input_type=json&response_type=json&'
         . 'rest_data={
  "0": "bqejd8g7ve3pgeq61mb3aq7hq1",
  "contactDetails": {
    "id": "6f5666663a57f-bc59-cc4b-6a6c-57729f5ab1b2",
    "module": "Contacts",
    "first_name": "mahesh",
    "last_name": "mahesh",
    "email_id": "mahesh@gmail.com",
    "mobile_number": "9090011111",
    "company_name": "testpower"
  },
  "address": {
    "id": "",
    "type": "billing_address",
    "address": "dlf phase 2 m3 block,delhi",
    "postalcode": "110006"
  }
}';

			
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $CreateLeadAPI);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
     $result = curl_exec($ch);
       echo('<pre>');
		print_r($result); 
		
		
	//getRealationships( $ID); 

		
	
}



function setLeadDetials($sessionId,$url)
{	
			
	$add=array(
		$sessionId,
	   	'contactDetails' => array(
            'id' => "abb773dc-76f5-e769-ae9b-577285432b89",
            'module' => "Leads",
            'first_name' =>"abhay test",
            'last_name' => "abhay test",
            'email_id' => "abhay@gmail.com",
            'mobile_number' => "9018260507",
            'company_name'=> "power2sme"
        ),

    	'address' => array
        (
            'id' => '',
            'type' => 'billing_address/shiping_address',
             'address' => "Ardee neha city",
            'postalcode' => "110006"
        )

);
	$re=json_encode($add);
	//$re="12";
	//print_r($re); die;	

       $CreateLeadAPI='method=create_address&input_type=json&response_type=json&'
         . 'rest_data='.$re;
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $CreateLeadAPI);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
        $result = curl_exec($ch);
       echo('<pre>');
		print_r($result); 
		
		
	//getRealationships( $ID); 

		
	
}






// function getRealationships($ID){
	// $str = '7f832eaa-a84c-afca-38e0-575e5a0af9f1';
	// echo '<pre>';
		// //print_r($CreateLeadAPI);
		// //die;
// 		
		// //$CreateLeadAPI='method=set_entry&input_type=json&response_type=json&rest_data=["o449m15ul1ka2hrk98ir0qbn34","Leads" ,';
		// //'[{"name":"id","value":"9a749af6-8a05-82e2-6882-56fb5f74e7c7"},{"name":"status","value":"valid"}]]';
// 		
		// $CreateLeadAPI='method=get_relationships&input_type=json&response_type=json&rest_data=["'.$ID.'","Contacts" ,"'.$str.'",["first_name"", "last_name"], [{"name" : "leads", "value" : ["first_name", "last_name"]}],
		// ]';
// 		
		// $CreateLeadAPI='method=get_relationships&input_type=json&response_type=json&rest_data=["'.$ID.'","Contacts" ,"'.$str.'"]';
		// echo '<pre>';
		 // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_VERBOSE, true);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $CreateLeadAPI);
        // curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookie.txt');
        // $result = curl_exec($ch);
        // $output= json_decode($result);
	// print_r($output); die;
// }

?>
