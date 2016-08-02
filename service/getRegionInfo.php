<?php

	 
class getRegionInfo{
	private $db;
	function __construct($connectionArr){
		$this->db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'],$connectionArr['db_password'],$connectionArr['db_name']);
		
	}
	 	function regionDetails($pincode){
	 		
	 		if(!empty($pincode))
     		{
     			//echo("sdcnjhsdbfj");die;
		     	 $qry = "select id_c from rgn_region_cstm where pin_c like '%^".$pincode."^%'";
		     	
		     	$retval=mysqli_query($this->db,$qry);
				if(! $retval ) 
				{
				     die('Could not enter data: ' . mysqli_error());
				}
				$rows = mysqli_num_rows($retval);
				if($rows==0)
				{
					$a = json_encode(array('error'=>'No Region found for this Pincode!Kindly choose valid Pincode'));
					echo $a;
				}
				else
				{
					
					$tmp = mysqli_fetch_row($retval);
					$parent_id = $tmp[0];
		
					$q1 = "select id,name from rgn_region where id = '".$parent_id."'";
					//die;
					$retval=mysqli_query($this->db,$q1);
		                if(! $retval ) 
		                {
		                     die('Could not enter data: ' . mysql_error());
		                }
					$tmp1 = mysqli_fetch_row($retval);
					
					if($tmp1==0)
					{
						$a = json_encode(array('error'=>'No Region found for this Pincode!Kindly choose valid Pincode'));
						echo $a;
						die;
					}
					else{
						$retarr=array();
						$retarr['id']=$tmp1[0];
						
						 $q2 ="select state,district from pincodes where pincode =$pincode";
						$q2retval=mysqli_query($this->db,$q2);
						if(! $q2retval ) 
						{
						     die('Could not enter data: ' . mysqli_error());
						}
						$q2rows = mysqli_num_rows($q2retval);
						if($q2rows==0)
						{
							$a = json_encode(array('error'=>'No Region found for this Pincode!Kindly choose valid Pincode'));
							echo $a;
							die;
						}
						else{
							$q2result=mysqli_fetch_assoc($q2retval);
							$retarr['city']=$q2result['district'];
							$retarr['state']=$q2result['state'];
							return json_encode($retarr); 
							
						}
					
					}	
					
			}
	     }
	 		
	 	}
}

?>
