<?php

 if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class application_hook 
    {
        function updateUserEntry($event, $arguments)
        {
            if(isset($_SESSION['authenticated_user_id']) && !empty($_SESSION['authenticated_user_id']))
            {
                global $db;
                $userId = $_SESSION['authenticated_user_id'];
                $date = date('Y-m-d H:i:s');
                $sql = "Update user_activity_custom set date='$date' where userid = '$userId'";
               // echo $sql;die;
                $db->query($sql);
            }
        }
        
    }