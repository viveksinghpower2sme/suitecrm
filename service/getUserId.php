<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../config.php';

class getUserId{
    private $db;
    function getUserId($connectionArr){
            $this->db=mysqli_connect($connectionArr['db_host_name'], $connectionArr['db_user_name'], $connectionArr['db_password'],$connectionArr['db_name']);

  if(!$this->db) 
            {  
                die ("Cannot connect to the database");  
            }
		

    } 
    
    function getUserInfo($username){
        
         $result = mysqli_query($this->db,"SELECT id from users where user_name='".$username."'");
         $numRows=mysqli_num_rows($result);
        if($numRows>0){
            $data=mysqli_fetch_assoc($result);
            $userid=$data['id'];
             echo $userid; 
             die;
    } 
   
    }   
    }
    $userName= $_GET['data'];
    $obj=new getUserId($sugar_config['dbconfig']);
    
    $obj->getUserInfo($userName);