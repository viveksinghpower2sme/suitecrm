<?php
require_once '../config.php';
	$locationid = trim($_REQUEST["locationid"],",");
	$category = trim($_REQUEST["category"],",");
	$tax = trim($_REQUEST["tax"],",");
	$form = trim($_REQUEST["form"]);

   $connectionArr = $sugar_config['dbconfig'];
   
    $conn =mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
   // mysql_select_db('suitecrm');
	//var_dump($conn);die;
	$qry = 'SELECT t.tax_perc FROM fp_event_locations_cstm fel inner join pincodes p on fel.postcode_c= p.pincode inner join tax t on p.state=t.state WHERE fel.id_c="'.$locationid.'" and t.category="'.$category.'" and t.tax_type="'.$tax.'" and form_code="'.$form.'"';

	$retval=mysqli_query($conn,$qry);
		if(! $retval ) 
		{
		     die('Could not enter data: ' . mysqli_error());
		}
		$rows = mysqli_num_rows($retval);
		//echo $rows;die;
		if($rows==0)
		{
			//$a = array();
			$a = json_encode(array());
			echo $a;
		}
		else
		{
			$tmp = mysqli_fetch_row($retval);
			$retarr=array();
			$retarr['tax_perc']=$tmp[0];
			echo json_encode($retarr);
		}

?>

