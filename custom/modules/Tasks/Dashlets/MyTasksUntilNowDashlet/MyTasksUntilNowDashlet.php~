<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Dashlets/DashletGeneric.php');

class MyTasksUntilNowDashlet extends DashletGeneric {

    function MyTasksUntilNowDashlet($id, $def = null) {

        
        require('custom/modules/Tasks/Dashlets/MyTasksUntilNowDashlet/MyTasksUntilNowDashlet.data.php');

        parent::DashletGeneric($id, $def);

        if (empty($def['title']))
            $this->title = translate('LBL_LIST_MY_TASKS_UNTIL_NOW', 'Tasks');

        $this->searchFields = $dashletData['MyTasksUntilNowDashlet']['searchFields'];
        $this->columns = $dashletData['MyTasksUntilNowDashlet']['columns'];
        $this->seedBean = new Task();
    }

    function process($lvsParams = array()) {
        global $timedate, $current_user;
        $format = $timedate->get_date_time_format($current_user);
        $dbformat = date('Y-m-d H:i:s', strtotime(date($format)));
      
// MYSQL database
        $lvsParams['custom_where'] = 'AND DATE_FORMAT(tasks.date_start, "%Y-%m-%d %H:%i:%s") <= "'.  $dbformat.'" ';
        // MSSQL 
// $lvsParams[‘custom_where’] = ” AND REPLACE(CONVERT(varchar, tasks.date_start,111),’/’,’-‘) = ‘”.$dbformat.”‘)”;
        parent::process($lvsParams);
    }

}
