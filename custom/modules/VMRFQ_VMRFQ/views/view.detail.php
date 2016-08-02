<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

require_once('include/MVC/View/views/view.detail.php');

class VMRFQ_VMRFQViewDetail extends ViewDetail {

	public $html ='';

	function VMRFQ_VMRFQViewDetail(){
 		parent::ViewDetail();
 	}
	
	 /**
     * @see SugarView::$type
     */
    public $type = 'detail';
	
    /**
     * @var DetailView2 object 
     */
    public $dv;
	
    /**
     * Constructor
     *
     * @see SugarView::SugarView()
     */
    /**
     * @see SugarView::preDisplay()
     */
    public function preDisplay()
    {
 	    $metadataFile = $this->getMetaDataFile();
 	    $this->dv = new DetailView2();
 	    $this->dv->ss =&  $this->ss;
		
		$this->dv->setup($this->module, $this->bean, $metadataFile, get_custom_file_if_exists('custom/modules/VMRFQ_VMRFQ/tpl/DetailView.tpl'));
    } 	
 	function getAddress($idAdd)
    {
        $sql = "SELECT name,address1_c,district,nav_statecode,postcode_c FROM fp_event_locations JOIN fp_event_locations_cstm ON id =id_c Join pincodes on postcode_c = pincode WHERE id_c = '$idAdd'";
        
        $res = $this->bean->db->query($sql);
        $row = $this->bean->db->fetchByAssoc($res)  ;
        
        return trim($row['address1_c'].','.$row['district'].','.$row['nav_statecode'].','.$row['postcode_c'],',');
    }
    /**
     * @see SugarView::display()
     */
    public function display()
    {
		$this->bean->fp_event_locations_vmrfq_vmrfq_1_name = $this->getAddress($this->bean->fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida);
        if(!empty($this->bean->fetched_row['sub_commodity_c'])){
            $GLOBALS['app_list_strings']['sub_commodity_c_list'][$this->bean->fetched_row['sub_commodity_c']] = $this->bean->fetched_row['sub_commodity_c'];
        }

        if(!empty($this->bean->fetched_row['vm_c'])){
            $GLOBALS['app_list_strings']['vm_list'][$this->bean->fetched_row['vm_c']] = $this->bean->fetched_row['vm_c'];
        }

        if(empty($this->bean->id)){
            sugar_die($GLOBALS['app_strings']['ERROR_NO_RECORD']);
        }				
        $this->dv->process();
        $a = $this->dv->display();
		$fp = fopen('/tmp/aaa.txt','a+');
		fwrite($fp,$a);
		fclose($fp);
		preg_match("/LBL_EDITVIEW_PANEL1.*?'>(.*?)<\/table/is",$a,$matches);
		$this->html = '<table>'.$matches[1].'</table>';
    }
}

?>
