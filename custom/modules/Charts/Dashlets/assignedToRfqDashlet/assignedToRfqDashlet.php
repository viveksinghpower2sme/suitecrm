<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/





require_once('include/Dashlets/DashletGenericChart.php');

class assignedToRfqDashlet extends DashletGenericChart 
{
    public $pbls_rfq_stage = array();
    public $pbls_ids          = array();
    
    /**
     * @see DashletGenericChart::$_seedName
     */
    protected $_seedName = 'AOS_Quotes';
    
    /**
     * @see DashletGenericChart::displayOptions()
     */
    public function displayOptions()
    {


        global $app_list_strings;
        
        $selected_datax = array();
        if (!empty($this->pbls_rfq_stage) && sizeof($this->pbls_rfq_stage) > 0)
            foreach ($this->pbls_rfq_stage as $key)
                $selected_datax[] = $key;
        else
            $selected_datax = array_keys($app_list_strings['rfq_state_c']);
        


        $this->_searchFields['pbls_rfq_stage']['options'] = array_filter($app_list_strings['rfq_state_c']);
        $this->_searchFields['pbls_rfq_stage']['input_name0'] = $selected_datax;
        
        
        if (!isset($this->pbls_ids) || count($this->pbls_ids) == 0)
        {

			$this->_searchFields['pbls_ids']['input_name0'] = array_keys(get_user_array(false));

        }
        
        return parent::displayOptions();
	
    }
    
    /**
     * @see DashletGenericChart::display()
     */
    public function display() 
    {

    	global $current_user, $sugar_config;
        require("custom/modules/Charts/chartdefs.php");
        $chartDef = $chartDefs['pipeline_by_rfq_stage'];
        
        $this->pbls_ids[] = $current_user->id;  
        require_once('include/SugarCharts/SugarChartFactory.php');
        $sugarChart = SugarChartFactory::getInstance();
        $sugarChart->is_currency = false; 
        $currency_symbol = $sugar_config['default_currency_symbol'];
        if ($current_user->getPreference('currency')){
            
            $currency = new Currency();
            $currency->retrieve($current_user->getPreference('currency'));
            $currency_symbol = $currency->symbol;
        }

        $subtitle = "Legends";
        $sugarChart->setProperties('', $subtitle, $chartDef['chartType']);
        $sugarChart->base_url = $chartDef['base_url'];
        $sugarChart->group_by = $chartDef['groupBy'];
        $sugarChart->url_params = array();
    
        if ( count($this->pbls_ids) > 0 )
            $sugarChart->url_params['assigned_user_id'] = array_values($this->pbls_ids);	
        $sugarChart->getData($this->constructQuery());

        $sugarChart->data_set = $sugarChart->sortData($sugarChart->data_set, 'rfq_state_c', true);
        
		$xmlFile = $sugarChart->getXMLFileName($this->id);
       
		$sugarChart->saveXMLFile($xmlFile, $sugarChart->generateXML());

		return $this->getTitle('<div align="center"></div>') . 
            '<div align="center">' . $sugarChart->display($this->id, $xmlFile, '100%', '300', false) . '</div>'. $this->processAutoRefresh();
    }  
    
    /**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery()
    {
        //echo "<pre>";print_r($this->pbls_ids);die;
        global $current_user;
        $this->pbls_ids[] = $current_user->id;   
        
		$query = "SELECT rfq_state_c,count(*) as total,count(*) as opp_count ".
                    "FROM aos_quotes inner join aos_quotes_cstm on aos_quotes.id = aos_quotes_cstm.id_c ";
		$query .= "and aos_quotes.deleted=0 ";
		if ( count($this->pbls_ids) > 0 )
            $query .= "AND aos_quotes.assigned_user_id IN ('".implode("','",$this->pbls_ids)."') ";
        if ( count($this->pbls_rfq_stage) > 0 )
            $query .= "AND aos_quotes_cstm .rfq_state_c IN ('".implode("','",$this->pbls_rfq_stage)."') ";
		else
            $query .= "AND aos_quotes_cstm.rfq_state_c IN ('".implode("','",array_keys($GLOBALS['app_list_strings']['rfq_state_list']))."') ";
        $query .= "GROUP BY aos_quotes_cstm.rfq_state_c ORDER BY total DESC";

       // echo $query;die;
        return $query;		
	}
}
