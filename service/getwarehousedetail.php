<?php

require_once '../config.php';
	
     $connectionArr = $sugar_config['dbconfig'];
   
    $conn =mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
  

     	$qry = "select code , location from warehouse_locations";
     	
     	$retval=mysqli_query($conn,$qry);
		if(! $retval ) 
		{
		     die('Could not enter data: ' . mysql_error());
		}
		$rows = mysqli_num_rows($retval);

		if($rows==0)
		{
			//$a = array();
			$a = json_encode(array());
			echo $a;
		}
		else
		{
			$arr=array();
			for($i=0;$i<$rows;$i=$i+1)
       		{

		            $tmp = mysqli_fetch_row($retval);
		            //echo $i."=".$tmp[0]."<br>";
		            $arr[$tmp[0]] = $tmp[1]; 
		            
        	}
        	echo json_encode($arr);

		}
?>