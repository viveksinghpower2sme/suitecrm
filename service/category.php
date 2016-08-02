<?php
	require_once '../config.php';

	//print_r($_REQUEST);die;
	$parent_category = trim($_REQUEST["parent_category"]);
	$category = trim($_REQUEST["category"],",");
	
	$connectionArr = $sugar_config['dbconfig'];
   
    $conn =mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
  
	
	
	$parent_category_arr[]=$parent_category;
	$new_parent_category_arr = "";
	foreach ($parent_category_arr as $val) {
		$new_parent_category_arr.="'".$val."',";
	}
	$new_parent_category_arr = trim($new_parent_category_arr,",");
	//echo $new_starr;die;

	$category_arr=explode(",",$category);
	$new_category_arr = "";
	foreach ($category_arr as $val) {
		$new_category_arr.="'".$val."',";
	}
	$new_category_arr = trim($new_category_arr,",");

     $arr = array();
	if(empty($parent_category) && empty($category)) { $arr = array(); echo json_encode($arr);}
	else
	{
		if (empty($category)) 
		{
			$category_qry = "select distinct(category) from category where parent_category in (".$new_parent_category_arr.")";

			$retval=mysqli_query($conn,$category_qry);
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

			$sub_category_qry = "select sub_category from category where category in (".$new_category_arr.")";
			//echo $zip_qry;die;
			$retval=mysqli_query($conn,$sub_category_qry);
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
?>
