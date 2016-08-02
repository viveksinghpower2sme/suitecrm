<?php

require_once '../config.php';
print_r($_POST);die;
 $this->db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'], $connectionArr['db_password'],$connectionArr['db_name']);

  if(!$this->db) 
            {                  die ("Cannot connect to the database");  
            }
		
if(isset($_POST['abc'])){
    if(( $_POST['abc']=='export for lead' )){
        
        
    }
}
class leadSource{
     private $db;
    function leadSource($connectionArr){
            $this->db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'], $connectionArr['db_password'],$connectionArr['db_name']);

  if(!$this->db) 
            {  
                die ("Cannot connect to the database");  
            }
		

    }
    
    
     function getDataLeadSources(){
         $query = mysqli_query($this->db,"SELECT DISTINCT (lead_source_c) FROM  abc12_data_cstm");
        
    // loop over the rows, outputting them
    while ($row = mysqli_fetch_assoc($query)) {
        if(!empty($row['lead_source_c'])){
            $leadSourceArray[] =$row['lead_source_c'];
        }
    
    }
    return $leadSourceArray;
        
         
    }

    
}


