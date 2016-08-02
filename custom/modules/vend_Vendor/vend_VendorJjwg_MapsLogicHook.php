<?php

require_once('service/randomIdGenerator.php');
require_once('service/navSoapService.php');

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');


class vend_VendorJjwg_MapsLogicHook {
	
     
     function saveVendorInfoInNav(&$bean, $event, $arguments)
     {
     	
     	if(!is_array($bean->vend_vendor_fp_event_locations_2->tempBeans))
     	{
     			     	
			if (empty($bean->fetched_row['id'])) {
		   		 // Do custom logic for only a newly created record
	   			$moduleName="VN";
				$length=4;
				$venNavId = randomId($length,$moduleName);
				$bean->vendornavid_c=$venNavId;	

			}
			else{
					
				$venNavId =$bean->vendornavid_c;
			}
			
			if($bean->load_relationship('vend_vendor_fp_event_locations_2'))
                {
                    $addBean=$bean->vend_vendor_fp_event_locations_2->getBeans();
				}
				  foreach($addBean as $id=>$addressBean)
                    {
			              $vendorLocations[] = array(
		                    'lCode' => $addressBean->name,
		                    'lAddress' => $addressBean->address1_c,
		                    'lAddress2' => $addressBean->address2_c,
		                    'lPostCode' => $addressBean->postcode_c,
		                    'CityCode' => $addressBean->city_c,
		                    'StateCode' =>$addressBean->state_c,
		                    'lTIN'=> $addressBean->tin_no_c,
		                    'lCST' => $addressBean->cst_no_c,
		                    'lECC' =>  $addressBean->ecc_no_c,
		                    'lRange' => $addressBean->range_c,
		                    'lDivision' => $addressBean->division_c,
		                    'lCollectorate' => $addressBean->collectorate_c,
		                    'lCommissionRate' => '0',
		                    'lSoftDelete' => '',
		                    'Email'=>$bean->email_c
		       							
		                );
					}
		 
		 			 
		 
	        $info = array("VendorDetails"=>array (
	            'No' => $venNavId,
	            'Name' => $bean->name,
	            'PhoneNo' => $bean->phone_number_c,
	            'EMail' => $bean->email_c,
	            'VendorPostingGroup' =>  $bean->vendor_posting_group_c,
	            'GenBusinessPostingGroup' => $bean->gen_bus_pos_c,
	            'PANNo' => $bean->pan_number_c,
	            'SoftDelete' => ''
	       		 ),
	       		  "AddtionalInformation" => array (
		                "VendorLocations" =>$vendorLocations
		            )
		      );
			  
			  				  
		}
		else{
			
			   		$bean->sink_with_nav_c =0;	
			
		}

		//$response = $this->soapClient($info);	
	   	// file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', date('d/m/Y h:i:s').PHP_EOL , FILE_APPEND);
	   	// file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', "Save Vendor : ".PHP_EOL , FILE_APPEND);
	   	// file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', "Request :".json_encode($info).PHP_EOL , FILE_APPEND);
       	// file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', "Response :".json_encode($response).PHP_EOL , FILE_APPEND);
// 	
    }  

	function deleteAddressInfoIntoNav(&$bean, $event, $arguments){
		
		$address=$bean->vend_vendor_fp_event_locations_2->tempBeans;
		
		$addressBean = BeanFactory::getBean('FP_Event_Locations',$arguments['related_id']);
		/*echo "<pre>";print_r($addressBean);
    	die;*/
		  $info = array("VendorDetails"=>array (
            'No' => $bean->vendornavid_c,
            'Name' => $bean->name,
            'PhoneNo' => $bean->phone_number_c,
            'EMail' => $bean->email_c,
            'VendorPostingGroup' => $bean->vendor_posting_group_c,
            'GenBusinessPostingGroup' =>$bean->gen_bus_pos_c,
            'PANNo' => $bean->pan_number_c,
            'SoftDelete' => ''
        	),
           "AddtionalInformation" => array (
                "VendorLocations" => array (
                    'lCode' => $addressBean->name,
                    'lAddress' => $addressBean->address1_c,
                    'lAddress2' => $addressBean->address2_c,
                    'lPostCode' => $addressBean->postcode_c,
                    'CityCode' => $addressBean->city_c,
                    'StateCode' =>$addressBean->state_c,
                    //'lTIN'=>'06TINLKJNKL',
                    'lTIN'=> $addressBean->tin_no_c,
                    //'lCST' => 'CST NO',
                    'lCST' => $addressBean->cst_no_c,
                    //'lECC' => 'ECC',
                    'lECC' =>  $addressBean->ecc_no_c,
                    //'lRange' => '200',
                    'lRange' => $addressBean->range_c,
                    //'lDivision' => 'DIV',
                    'lDivision' => $addressBean->division_c,
                    //'lCollectorate' => '11',
                    'lCollectorate' => $addressBean->collectorate_c,
                    'lCommissionRate' => '0',
                    'lSoftDelete' => '',
                    //'Email'=>'testnsds',
                    'Email'=>$bean->email_c
					
                )
            )
        );
	
		$response = $this->soapClient($info);	
		file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', date('d/m/Y h:i:s').PHP_EOL , FILE_APPEND);
	   	file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', "Delete Vendor : ".PHP_EOL , FILE_APPEND);
	   	file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', "Request :".json_encode($info).PHP_EOL , FILE_APPEND);
       	file_put_contents('/var/www/html/suitecrm/custom/modules/vend_Vendor/vendorlogs.txt', "Response :".json_encode($response).PHP_EOL , FILE_APPEND);
       
	
	}

	function soapClient($info){
		
	/* Set your parameters for the request */
		$params = array(
		    "ImportVendorDetails" => array(
		        "vendorRequest" => $info,
		        "errorMessage" => ""
		    )
		);
		
		$navfunc="ImportVendorDetails";
		$response=navApiService($params,$navfunc);
		
		return($response);
	}
}
