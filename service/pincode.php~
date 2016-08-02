<?php
	require_once '../config.php';
	 $state = trim($_REQUEST["state"],",");
	 $city = trim($_REQUEST["city"],",");
	$pincode = trim($_REQUEST["pin"],",");
	 //echo $states;die;
	$connectionArr = $sugar_config['dbconfig'];
   
    $conn =mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
  
	if(!empty($pincode))
     {
     	 $qry = "select id_c from rgn_region_cstm where pin_c like '%^".$pincode."^%'";
     	//die;
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
			$parent_id = $tmp[0];

			$q1 = "select id , name from rgn_region where id = '".$parent_id."'";
			//die;
			$retval=mysqli_query($conn,$q1);
                if(! $retval ) 
                {
                     die('Could not enter data: ' . mysqli_error());
                }
		$tmp1 = mysqli_fetch_row($retval);
			$retarr=array();
			$retarr['id']=$tmp1[0];
			$retarr['name']=$tmp1[1];
		//	echo json_encode($retarr);

			$q1 = "select state , district from pincodes where pincode = '".$pincode."'";
			//die;
			$retval=mysqli_query($conn,$q1);
                if(! $retval ) 
                {
                     die('Could not enter data: ' . mysqli_error());
                }
		$tmp1 = mysqli_fetch_row($retval);

			$retarr['state']=$tmp1[0];
			$retarr['district']=$tmp1[1];
			$retarr['country']="India";

			echo json_encode($retarr);
		}
     }
	else{

	
	$state_arr=explode(",",$state);
	$new_starr = "";
	foreach ($state_arr as $val) {
		$new_starr.="'".$val."',";
	}
	$new_starr = trim($new_starr,",");
	//echo $new_starr;die;

	$city_arr=explode(",",$city);
	$new_ctarr = "";
	foreach ($city_arr as $val) {
		$new_ctarr.="'".$val."',";
	}
	$new_ctarr = trim($new_ctarr,",");
	//echo $new_ctarr;die;



	//print_r($states);
	//$cities=explode(",",$cities);
	//print_r($cities);
     $arr = array();
	if(empty($state) && empty($city)) { $arr = array(); echo json_encode($arr);}
	else
	{
		if (empty($city)) 
		{
			$city_qry = "select distinct(district) from pincodes where state in (".$new_starr.")";

			$retval=mysqli_query($conn,$city_qry);
			if(! $retval ) 
			{
					     die('Could not enter data: ' . mysqli_error());
			}
			$rows = mysqli_num_rows($retval);
			$rows;
			for($i=0;$i<$rows;$i=$i+1)
       		{

		            $tmp = mysqli_fetch_row($retval);
		            //echo $i."=".$tmp[0]."<br>";
		            $arr[$tmp[0]] = $tmp[0]; 
        	}
        	echo json_encode($arr);
		}
		else
		{
			$zip_qry = "select pincode from pincodes where district in (".$new_ctarr.")";
			$retval=mysqli_query($conn,$zip_qry);
			if(! $retval ) 
			{
					     die('Could not enter data: ' . mysqli_error());
			}
			$rows = mysqli_num_rows($retval);
			//echo $rows;
			for($i=0;$i<$rows;$i=$i+1)
       		{

		            $tmp = mysqli_fetch_row($retval);
		            //echo $i."=".$tmp[0]."<br>";
		            $arr[$tmp[0]] = $tmp[0]; 
        	}
        	echo json_encode($arr);

		}
		
	}
	}
?>
