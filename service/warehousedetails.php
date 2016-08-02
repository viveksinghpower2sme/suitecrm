<?php
require_once '../config.php';
$client = new SoapClient("http://192.168.1.46:7047/DynamicsNAV70/WS/BEBB_India/Page/GetWarehouseAddress?wsdl", array('login'          => "BI00257",

                                            'password'       => "Admin@1234"));
                                            
                                            echo '<pre>';


$res = $client->ReadMultiple();

//print_r($res->ReadMultiple_Result->GetWarehouseAddress);

	$connectionArr = $sugar_config['dbconfig'];
   
    $conn =mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
   
	$e=0;
	foreach ($res->ReadMultiple_Result->GetWarehouseAddress as $val) {
		//print_r($val);
		$iCode  = isset($val->Code) ? $val->Code : '';

	

		if($iCode==""){$e++;continue;}
		$iCode=trim($iCode);
		$address = "";

		$address.=isset($val->Address)?$val->Address:'';
		$address.=isset($val->Address_2)?" ".$val->Address_2:'';

		$address.=isset($val->Post_Code)?" - ".$val->Post_Code:'';

		$query = 'insert into warehouse_locations values("'.$iCode.'","'.$address.'",now()) ON duplicate key update location="'.$address.'", last_updated = now();';
		$retval = mysqli_query($conn,$query);
		if(! $retval ) 
		{
			die('Could not enter data: ' . mysqli_error());
		}
		

	}

	echo "Empty warehouses = ".$e;

?>
