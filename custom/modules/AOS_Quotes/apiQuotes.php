<?php
require_once('service/navSoapService.php');

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');


class AOS_QuotesJjwg_MapsLogicHook {
	
     /*
     *
     * To save RFQ and Line Items
     *
     */ 
    function saveRfqInfo(&$bean, $event, $arguments)
    {
        
        if(isset($_REQUEST['vmrfq_count'])) // While splitting First Time We will use vmrfq
        {
            $vmrfqCount =  $_REQUEST['vmrfq_count'];
            unset($_REQUEST['vmrfq_count']);
        }
        else
        {
            $vmrfqCount = $bean->vmrfqCount;
        }

        /*** Delete Line Item Code Start ***/
        $vmrfqDelCount = $_REQUEST['vmrfqrecorddelete']; 
       
        if(!empty($vmrfqDelCount))
        {  
            $delVmrfq = explode(',', $vmrfqDelCount);   
           
            foreach($delVmrfq as $dlVm)
            {

                $this->deleteVmrfq($dlVm,$bean->id);
            }       
        }
        /*** Delete Line Item Code End***/

        if($vmrfqCount > 0)
        {
           $i = 0;
           $rowcount = 0;
           $remainingrow = 0;
           $CurrentVM = $bean->users_aos_quotes_2users_ida; // Current RFQ VM
           $NextVM = '';
            while($rowcount < $vmrfqCount)
             {
                
                $i++;
                if(!isset($_REQUEST['isEdit_'.$i]))
                {
                   continue;
                }
                $rowcount++;
                if(empty($_REQUEST['issave'])&& $_REQUEST['rfq_state_c'] == 'new' && $CurrentVM && ($CurrentVM !=$_REQUEST['vm_c_'.$i]))
                {
                    $this->deleteVmrfq($_REQUEST['vmrfqId_'.$i],$bean->id);
                    if(!$NextVM)
                        $NextVM = $_REQUEST['vm_c_'.$i];
                    $remainingrow++;
                    continue;
                }
                
                unset($_REQUEST['isEdit_'.$i]);   
                $pSkuName =  !empty($_REQUEST['sku_sku_vmrfq_vmrfq_2_name_'.$i]) ? $_REQUEST['sku_sku_vmrfq_vmrfq_2_name_'.$i] : "";
                $pSkuCode = !empty($_REQUEST['sku_code_c_'.$i]) ? $_REQUEST['sku_code_c_'.$i]: '';
                $rSkuCode = !empty($_REQUEST['r_sku_code_c_'.$i]) ? $_REQUEST['r_sku_code_c_'.$i]: '' ;

                $rSkuName = !empty($_REQUEST['sku_sku_vmrfq_vmrfq_1_name_'.$i]) ? $_REQUEST['sku_sku_vmrfq_vmrfq_1_name_'.$i] : "";
                
                //echo "<pre>"; print_r($_REQUEST);die;
                if(!empty($_REQUEST['sku_sku_vmrfq_vmrfq_1sku_sku_ida_'.$i]))
                {
                    $rfqBean = BeanFactory::getBean('sku_SKU',$_REQUEST['sku_sku_vmrfq_vmrfq_1sku_sku_ida_'.$i]);
                    if(strtolower(trim($rfqBean->name)) != strtolower(trim($_REQUEST['sku_sku_vmrfq_vmrfq_1_name_'.$i])))
                    {
                        if(!$rSkuCode)$rSkuCode = "P".rand();
                        $skuReqArray = array('requestedSku'=>array("name"=>$rSkuName,"code"=> $rSkuCode));
                        $skuIds = $this->saveSku($skuReqArray);
                        $_REQUEST['sku_sku_vmrfq_vmrfq_1_name_'.$i] = $rSkuName;
                        $_REQUEST['sku_sku_vmrfq_vmrfq_1sku_sku_ida_'.$i] = $skuIds['requestedSku'];
                        
                    }

                }
                else
                {
                    if($rSkuName != '')
                    {
                        if(!$rSkuCode)$rSkuCode = "P".rand();
                            $skuReqArray = array('requestedSku'=>array("name"=>$rSkuName,"code"=> $rSkuCode));
                            $skuIds = $this->saveSku($skuReqArray);
                            $_REQUEST['sku_sku_vmrfq_vmrfq_1_name_'.$i] = $rSkuName;
                            $_REQUEST['sku_sku_vmrfq_vmrfq_1sku_sku_ida_'.$i] = $skuIds['requestedSku'];
                    }
                }
               
                if($pSkuCode)
                {
                    $skuProArray = array('providedSku'=>array("name"=>$pSkuName,"code"=> $pSkuCode));
                    $skuIds = $this->saveSku($skuProArray);
                    $_REQUEST['sku_sku_vmrfq_vmrfq_2_name_'.$i] = $pSkuName;
                    $_REQUEST['sku_sku_vmrfq_vmrfq_2sku_sku_ida_'.$i] = $skuIds['providedSku'];
                }
                $_REQUEST['name_'.$i] = $pSkuName;
                $this->saveVmrfq($bean->id,$i,$bean->assigned_user_id,$bean->assigned_user_name);
                
            }
            if($remainingrow) // For splitting RFQ
            {  
                unset($_REQUEST['record']); // Unset previous record
                $bean->vmrfqCount = $remainingrow;
                $quotesBeanid = $this->getUniqueId();

                $quotesBean = BeanFactory::newBean('AOS_Quotes');
                $quotesBean = $bean; // Set Previous RFQ values to Newly Created RFQ
                $quotesBean->id = $quotesBeanid;
                $quotesBean->new_with_id= 1;
                $quotesBean->rfq_state_c ='new';
                $quotesBean->users_aos_quotes_2users_ida=$NextVM;
                $quotesBean->parent_quote_id = $bean->number;
                $quotesBean->fetched_row['rfq_state_c'] = 'new'; // Set initially stage to New
                $quotesBean->save();
            }             
        }      
    }

    /*
    *
    * Delete LineItems
    * @recordId - Vmrfq Id
    * @quoteId - Rfq Id
    */
    private function deleteVmrfq($recordId,$quoteId)
    {
        if(!empty($recordId))
        { 
            $vmrfqBean = BeanFactory::getBean('VMRFQ_VMRFQ',$recordId);
            if(!empty($quoteId))
            {
                $vmrfqBean->load_relationship('aos_quotes_vmrfq_vmrfq_1');
                $vmrfqBean->aos_quotes_vmrfq_vmrfq_1->delete($quoteId); 
            }
        } 
    }

    /*
    *
    * Save Requested and Provided SKU. If alrady exist will return requested and provided SKU.
    * @skuData - Contains all sku info including skucode,name
    *
    */
    private function saveSku($skuData)
    {
        $skuIds = array();
        
        if(!empty($skuData))
        {
            global $db;
            $userId = $_SESSION['authenticated_user_id'];
            foreach($skuData as $key=>$skdat)
            {

                $skuCode = $skdat['code'];
                $sql = "select id_c from sku_sku_cstm where sku_code_c = '$skuCode'";  
                $out = $db->query($sql);  
                $result = $db->fetchRow($out);
                               
                if(empty($result['id_c']))
                {
                   
                    $skuBean = BeanFactory::newBean('sku_SKU');
                    $skuBean->name = $skdat['name'];
                    $skuBean->sku_code_c = $skuCode;
                    $skuBean->date_entered = date('Y-m-d H:i:s');
                    $skuBean->date_modified = date('Y-m-d H:i:s');
                    $skuBean->created_by = $userId;
                    $skuBean->assigned_user_id = $userId;
                    $skuBean->save();
                    $skuId=$skuBean->id;
                }
                else
                {
                    $skuId = $result['id_c'];
                }    
                $skuIds[$key] = $skuId;
            }
           
        }
       
        return $skuIds;
    }

    /*
     * save and update Line Items
     * @ParentID - Contains  Bean Id
     * @id - Contains count number  
     * @AssignID - Contains Assigned Used Id
     * @AssignName - Contains Assigned User Name
     *
     */  
    private function saveVmrfq($ParentID,$id,$AssignID,$AssignName)
    {
        if(!empty($_REQUEST['vmrfqId_'.$id]))
        {
            
            $rfqBean = BeanFactory::getBean('VMRFQ_VMRFQ',$_REQUEST['vmrfqId_'.$id]);
        }
        else
        {
            $rfqBean = BeanFactory::newBean('VMRFQ_VMRFQ');

        }
        
        if(!empty($ParentID))
        {
            $rfqBean->not_use_rel_in_req = true;
            $rfqBean->new_rel_relname = "aos_quotes_vmrfq_vmrfq_1";
            $rfqBean->new_rel_id = $ParentID;          
        }
    
        $fields = $rfqBean->column_fields;
        
        if(!empty($fields))
        {

            foreach($fields as $key=>$field)
            {
                if(isset($_REQUEST[$field.'_'.$id]))
                {
                    $rfqBean->$field = $_REQUEST[$field.'_'.$id];
                    unset($_REQUEST[$field.'_'.$id]);
                }
                
            }
        }
        $rfqBean->assigned_user_id = $AssignID;
        $rfqBean->assigned_user_name = $AssignName;
        $rfqBean->save();
        
    }

   /*
    * Will change state , assigned user and create role for assigned user
    *
    *
    */
    function createNewQuoteGroupForUser(&$bean, $event, $arguments){
        
       
        global $db;
        global $sugar_config;
        
        $rfqCurrentState = $bean->rfq_state_c;
        $kamid=$bean->created_by;
        $scmid=$bean->users_aos_quotes_2users_ida;
        $lineItemCount = isset($_REQUEST['vmrfq_count']) ? $_REQUEST['vmrfq_count'] : $bean->vmrfqCount;
        $bean->source_type_c = $this->getSourceType($kamid); // Set field for Reporting purpose
        
        $financeid = $this->getFinanceUserId(); // Get Finanace User Id

        $usersArray=array($sugar_config['user']['KAM']=>$kamid,
                          $sugar_config['user']['SCM']=>$scmid,
                          $sugar_config['user']['Finance']=>$financeid,
                        );
        
        $existData = $this->getAllStages(); // Get Array of all stages 
        if(empty($_REQUEST['issave'])) 
        {
            $bean->opportunity_source_c = $sugar_config['opportunity_source'];
            $bean->name = $bean->number;

            if(!empty($kamid) && !empty($scmid) && !empty($financeid) && ($rfqCurrentState != $sugar_config['stages']['won'] || $rfqCurrentState != $sugar_config['stages']['loss'] || $rfqCurrentState != $sugar_config['stages']['rejected_by_scm'] || $rfqCurrentState != $sugar_config['stages']['rejected_by_finance'])){
                
                $lostRfq = $_REQUEST['lost_rfq_c'];
               // echo "<pre>";print_r($_REQUEST);die;
                if($lostRfq == "" && ($rfqCurrentState != $sugar_config['stages']['rejected_by_scm'] && $rfqCurrentState != $sugar_config['stages']['rejected_by_finance'] && $rfqCurrentState != $sugar_config['stages']['won'] && $rfqCurrentState != $sugar_config['stages']['loss']))
                {
                    
                    $bChangeState = false;
                    if((empty($bean->fetched_row['rfq_state_c']) && !empty($rfqCurrentState)) || (!empty($rfqCurrentState) && !empty($bean->fetched_row['rfq_state_c']) && $bean->fetched_row['rfq_state_c'] == $rfqCurrentState))
                    {
                        $bChangeState = true;
                    }
                    
                    $k = 0;  
                    if($rfqCurrentState  == $sugar_config['stages']['goods_confirmation']){

                        foreach($existData['goods_confirmation'] as $j=>$aData){
                            if($bean->goods_confirmation_status_c == $aData['next_state']){
                                $k = $j;
                                break;
                            }
                        }

                    }
                    elseif($rfqCurrentState  == $sugar_config['stages']['finance_approval'])
                    {
                        $LineItemsData = $_REQUEST['vmrfqrecordedit'];
                    
                        $creditDays = "";
                        $LineItemsData = json_decode(html_entity_decode($LineItemsData));
                        foreach($LineItemsData as $val)
                        { 
                            if(!empty($val->vendor_credit_days_c))
                            {
                                $creditDays .= $val->vendor_credit_days_c.",";
                            }
                        }
                        $creditDays = rtrim($creditDays,",");
                       
                        $dataJson = array('finance_margin'=>$bean->total_margin_percent_revenue_c,'credit_days'=>$creditDays);
                        $bean->finance_approved_margin_c = json_encode($dataJson);

                        foreach($existData['finance_approval'] as $j=>$aData){
                            if($bean->finance_status_c == $aData['next_state']){
                                $k = $j;
                                break;
                            }
                        }
                    }
                    elseif($rfqCurrentState  == $sugar_config['stages']['final_scm_confirmation'])
                    {
                        foreach($existData['final_scm_confirmation'] as $j=>$aData){
                            if($_REQUEST['final_scm_confirmation_status_c'] == $aData['next_state']){
                                $k = $j;
                                break;
                            }
                        }
                    }
                   
                    if($rfqCurrentState == $sugar_config['stages']['base_price'])
                    {
                        $LineItemCount = $_REQUEST['vmrfq_count'];
                        $count = 1;
                        while($count <= $LineItemCount)
                        {
                            if(!empty($_REQUEST['isEdit_'.$count]) && empty($_REQUEST['sku_sku_vmrfq_vmrfq_2_name_'.$count]))
                            {
                                $bChangeState = false;
                                break;
                            }
                            $count++;
                        }  
                    }
                    else if($rfqCurrentState == $sugar_config['stages']['sales_quote_price'])
                    {
                        if($bean->price_status_c == "pending")
                        {
                            $bChangeState = false;
                        }
                    }
                    else if($rfqCurrentState == $sugar_config['stages']['po_awaiting'])
                    {
                        $poFileName = $bean->filename;
                        if(empty($poFileName))  //validate po file upload
                        {
                            $bChangeState = false;
                        }
                    }
                    
                    
                   /* echo "<pre>";print_r($bean);
                    echo "-----------".$k."--------------------".$bChangeState."--------------".$rfqCurrentState;
                    echo "<pre>";print_r($existData);
                    echo "<pre>";print_r($usersArray);die;*/
                   
                    if($bChangeState)
                    {   
                        $role=trim($existData[$rfqCurrentState][$k]['next_role']);
                        $bean->rfq_state_c=$existData[$rfqCurrentState][$k]['next_state'];            
                    }
                    else
                    {
                        $role= trim($existData[$rfqCurrentState][$k]['role']);
                    }

                    if($bean->rfq_state_c == $sugar_config['stages']['won']) // When won stage occur then we will change assignto of shipTo and BillTo to admin
                    {
                        $shipToId = $bean->fp_event_locations_aos_quotes_1fp_event_locations_ida;
                        $billToId = $bean->fp_event_locations_aos_quotes_2fp_event_locations_ida;
                        $locationsArray = array($shipToId,$billToId);
                        $this->changeBillToShipToAssignTo($locationsArray);
                    }
                    
                    $bean->assigned_user_id = $usersArray[$role]; 
                    $groupIds = $this->fetchGroupIds($bean->id);    
                    $bean->group_ids = $groupIds;
                    $this->createQuoteUserGroup($bean,$usersArray[$role],$existData,$role,$k); 
                }
                else
                {
                    if(in_array($lostRfq,$sugar_config['loss_condition']))
                    {
                        $bean->rfq_state_c = $sugar_config['stages']['loss'];
                        $bean->assigned_user_id = $bean->created_by; 
                    }
                    else
                    {
                        $bean->rfq_state_c == $rfqCurrentState;
                    }
                    $this->createQuoteUserGroup($bean,$usersArray[$sugar_config['user']['KAM']],$existData,$sugar_config['user']['KAM'],0); 
                }
                                
            }
            else
            {
                $bean->rfq_state_c == $rfqCurrentState;
                $bean->assigned_user_id = $bean->created_by;
            }
        }
        else
        {
            $bean->assigned_user_id = $bean->created_by;
            if($bean->rfq_state_c == $sugar_config['stages']['new'])
            {
               $this->createQuoteUserGroup($bean,$usersArray[$sugar_config['user']['KAM']],$existData,$sugar_config['user']['KAM'],0);  
            } 
        } 

        /**** update billTo and ShipTo Info Start here ****/
        if($rfqCurrentState == $sugar_config['stages']['account_creation'])
        {
            $shipToId = $bean->fp_event_locations_aos_quotes_1fp_event_locations_ida;
            $billToId = $bean->fp_event_locations_aos_quotes_2fp_event_locations_ida;
            $this->updateShipToInformation($shipToId);
            $this->updateBillToInformation($billToId);
        }  
        /**** update billTo and ShipTo Info Ends here ****/  
              
    }

   /*
    * Will return array of all stages 
    *
    */
    private function getAllStages()
    {
        global $db;
        $existData = array(); 
        $rsql = "select * from rfq_state_mapping";
        $out = $db->query($rsql);
        $existData = array();
       
        if($db->getRowCount($out) > 0)
        {
            while($dat = $db->fetchRow($out))
            {
                if(!empty($dat['roleid']))
                {
                    $existData[$dat['state']][] = $dat;    
                }
               
            }
        }
        return $existData;
    }

    /*
    * Will return array of all stages 
    * @kamid - Contains kam UserId
    *
    */
    private function getSourceType($kamid)
    {
        global $db;
        $roleSql = "SELECT user_role_c FROM users_cstm WHERE id_c = '$kamid'";
        $rolOut = $db->query($roleSql);
        $outData = $db->fetchRow($rolOut);
        $userRole = $outData['user_role_c'];
        return $userRole;
    }

    /*
    * Will return finanace userId
    *
    */
    private function getFinanceUserId()
    {
        global $db;
        $financeSql = "SELECT id_c FROM users_cstm WHERE user_role_c = 'finance'";
        $finOut = $db->query($financeSql);
        $fOutData = $db->fetchRow($finOut);
        $financeid = $fOutData['id_c'];
        return $financeid;
    }

   /*
    * Will return rfq already created group Id for deletion 
    * @beanId - Contains QuoteId
    *
    */
    private function fetchGroupIds($beanId)
    {
        global $db;
        $delSql = "select securitygroup_id from securitygroups_records where record_id = '$beanId'";  
        $out = $db->query($delSql); 
       
        $existPhData = array();
        if($db->getRowCount($out) > 0)
        {
            while($dat = $db->fetchRow($out))
            {
                $existPhData[] = $dat['securitygroup_id'];                
            }
        }
        return $existPhData;
    }
      
   /*
    *
    * It will create user group
    * @bean - Containd RFQ Bean
    * @userId - Containg (KAM,SCM,Finance) UserId for which we have to create group
    * @existData - Contains Array of all stages
    * @role - Contains Role for which we need to create group
    * @keyCount - Contains the key count of moved stage in $existData array
    *
    */    
    private function createQuoteUserGroup($bean,$userId,$existData,$role,$keyCount){
        
       
        if(!empty($userId))
        {
            
            if(!isset($existData[$bean->rfq_state_c][$keyCount]))
            {
                $keyCount = 0;
            }
           
            $securityGroup = BeanFactory::newBean('SecurityGroups');
            $securityGroup->name = $bean->rfq_state_c."_".$role."_".$bean->number;
            $securityGroup->date_entered = date('Y-m-d H:i:s');
            $securityGroup->date_modified = date('Y-m-d H:i:s');
            $securityGroup->assigned_user_id = $userId;            
            $securityGroup->save();
            $groupId = $securityGroup->id; 

            $roleId = $existData[$bean->rfq_state_c][$keyCount]['roleid']; 
            $this->addUserToSecurityGroup($groupId,$userId);
            $this->addRoleToSecurityGroup($roleId,$groupId);
            $this->addRecordToSecurityGroup($groupId,$bean->id,$bean->module_dir); 
                 
            
        }   

    }
    
   /*
    * Add role to security group
    * @roleId -Contains roleId
    * @groupId - Contains groupId
    * 
    */  
    private function addRoleToSecurityGroup($roleId,$groupId)
    {
        global $db;
        $uid=$this->getUniqueId();
        $sql ="insert into securitygroups_acl_roles(id,date_modified,deleted,securitygroup_id,role_id) Values('$uid',now(),0,'$groupId','$roleId')";
        $db->query($sql);
    } 

   /*
    * Will return unique Id
    * 
    */  
    private function getUniqueId()
    {
        global $db;   
        $a = $db->query("select UUID() as uid");
        $uid = $db->fetchRow($a);
        return $uid['uid']; 
    }

   
    /*
    * Remove previous stage group in which previous state user(KAM/SCM/Finance) is present
    * 
    */  
    function removePreviousSecurityGroup(&$bean, $event, $arguments)
    {
         
        global $db; 
        $groupIds = $bean->group_ids ;
       
           
        if(!empty( $groupIds))
        {
            $sDelsql = 'delete from securitygroups where id in("'.implode('","', $groupIds).'")';
            $db->query($sDelsql); 

            $srDelsql = 'delete from securitygroups_records where securitygroup_id in("'.implode('","', $groupIds).'")';
            $db->query($srDelsql); 
        }

          
    }

   /*
    * Add record to security group
    * @groupId -Contains groupId
    * @moduleId - Contains modulesId
    * @moduleName - Contains moduleName
    * 
    */  
    private function addRecordToSecurityGroup($groupId , $moduleId, $moduleName)
    {
        global $db;
    
        if(!empty($groupId))
        {
            $primaryId=$this->getUniqueId(); 
            $upSql = "insert into securitygroups_records (id,securitygroup_id,record_id,module,date_modified,deleted) values ('$primaryId','$groupId','$moduleId','$moduleName',now(),0)";    
            $db->query($upSql); 
        }
    
    }
     
    /*
    * Add user (SCM/KAM/Finance) to security group
    * @groupId -Contains groupId
    * @userId - Contains userId
    * 
    */        
    private function addUserToSecurityGroup($groupId,$userId)
    {
        global $db;

        //update security group to add all the reporting managers
        $groupOfUserId= $this->reportToGroupArray($userId);
        
        $valuesTupple="";
        for($i=0; $i<sizeof($groupOfUserId);$i++){
            $uid=$this->getUniqueId();
            $valuesTupple.="('$uid',now(),0,'$groupId','$groupOfUserId[$i]'),";  
        }
        $valuesTupple=rtrim($valuesTupple,",").";";
        
        $sql ="insert into securitygroups_users(id,date_modified,deleted,securitygroup_id,user_id) Values $valuesTupple";
        $db->query($sql);
    } 

    
    function reportToGroupArray($userId){

        global $db;
        $groupofUserIdArray=array();
        $groupofUserIdArray[] =$userId;
        if(!empty($userId)){
           
                    
            $level=4;
            $resultId=$this->fetchReportToRecursilvely($userId,$level,$groupofUserIdArray);
            if($resultId!=1){
                $groupofUserIdArray[]  = $resultId;
    
                
            }   
        
        }

        return $groupofUserIdArray;  
    }


   /*
    * Provide reporing manager hierarchy
    * @userId -Contains UserId 
    * @level - Contains level - upto which level we are providing reporting manager hierarchy
    * 
    */
    function fetchReportToRecursilvely($userId,$level,&$groupofUserIdArray){
        
        global $db;
                        
        if($level==0){
            return 1;
        }
        else {
            $sql = 'select reports_to_id from users where id="'.$userId.'"'; 
            $out = $db->query($sql);
            $userDetails=$db->fetchRow($out);
          
            if(empty($userDetails['reports_to_id'])){
              return 1;
            }
            else{
                $level--;
                $groupofUserIdArray[]=$userDetails['reports_to_id'];
                return( $this->fetchReportToRecursilvely($userDetails['reports_to_id'],$level,$groupofUserIdArray));
            }
       }  
    }

    /*
    *
    * Update flag for Won RFQ ship to address
    *
    */
    function updateWonRfqLocation(&$bean, $event, $arguments)
    {
        if($bean->rfq_state_c == "won")
        {
            $shipLocationId = $bean->fp_event_locations_aos_quotes_1fp_event_locations_ida;
            $locationBean = BeanFactory::getBean('FP_Event_Locations',$shipLocationId);
            $locationBean->rfq_won_c = 1;
            $locationBean->save();
        }  
    }

   /*
    *
    * Update ShipTo Location Info
    * @shipToId - Contains RFQ shipToId
    *
    */
    private function updateShipToInformation($shipToId)
    {
        $addressBean = BeanFactory::getBean('FP_Event_Locations',$shipToId);
        $addressBean->address_code_c = !empty($_REQUEST['address_code_c']) ? $_REQUEST['address_code_c'] : "";
        $addressBean->address1_c = !empty($_REQUEST['address1_c']) ? $_REQUEST['address1_c'] : "";
        $addressBean->postcode_c = !empty($_REQUEST['postcode_c']) ? $_REQUEST['postcode_c'] : "";
        $addressBean->city_c = !empty($_REQUEST['city_c']) ? $_REQUEST['city_c'] : "";
        $addressBean->tin_no_c = !empty($_REQUEST['tin_no_c']) ? $_REQUEST['tin_no_c'] : "";
        $addressBean->ecc_no_c = !empty($_REQUEST['ecc_no_c']) ? $_REQUEST['ecc_no_c'] : "";
        $addressBean->collectorate_c = !empty($_REQUEST['collectorate_c']) ? $_REQUEST['collectorate_c'] : "";
        $addressBean->address_type_c = !empty($_REQUEST['address_type_c']) ? $_REQUEST['address_type_c'] : "";
        $addressBean->address2_c = !empty($_REQUEST['address2_c']) ? $_REQUEST['address2_c'] : "";
        $addressBean->state_c = !empty($_REQUEST['state_c']) ? $_REQUEST['state_c'] : "";
        $addressBean->country_c = !empty($_REQUEST['country_c']) ? $_REQUEST['country_c'] : "";
        $addressBean->cst_no_c = !empty($_REQUEST['cst_no_c']) ? $_REQUEST['cst_no_c'] : "";
        $addressBean->range_c = !empty($_REQUEST['range_c']) ? $_REQUEST['range_c'] : "";
        $addressBean->division_c = !empty($_REQUEST['division_c']) ? $_REQUEST['division_c'] : "";
        $addressBean->reason_c = !empty($_REQUEST['tin_no_reasons_c']) ? $_REQUEST['tin_no_reasons_c'] : "";
        $addressBean->save();  
    }

     /*
    *
    * Update BillTo Location Info
    * @billToId - Contains RFQ billToId
    *
    */
    private function updateBillToInformation($billToId)
    {
        //echo "<pre>";print_r($_REQUEST);die;
        $addressBean = BeanFactory::getBean('FP_Event_Locations',$billToId);
        $addressBean->address_code_c = !empty($_REQUEST['b_address_code_c']) ? $_REQUEST['b_address_code_c'] : "";
        $addressBean->address1_c = !empty($_REQUEST['b_address1_c']) ? $_REQUEST['b_address1_c'] : "";
        $addressBean->postcode_c = !empty($_REQUEST['b_postcode_c']) ? $_REQUEST['b_postcode_c'] : "";
        $addressBean->city_c = !empty($_REQUEST['b_city_c']) ? $_REQUEST['b_city_c'] : "";
        $addressBean->tin_no_c = !empty($_REQUEST['b_tin_no_c']) ? $_REQUEST['b_tin_no_c'] : "";
        $addressBean->ecc_no_c = !empty($_REQUEST['b_ecc_no_c']) ? $_REQUEST['b_ecc_no_c'] : "";
        $addressBean->collectorate_c = !empty($_REQUEST['b_collectorate_c']) ? $_REQUEST['b_collectorate_c'] : "";
        $addressBean->address_type_c = !empty($_REQUEST['b_address_type_c']) ? $_REQUEST['b_address_type_c'] : "";
        $addressBean->address2_c = !empty($_REQUEST['b_address2_c']) ? $_REQUEST['b_address2_c'] : "";
        $addressBean->state_c = !empty($_REQUEST['b_state_c']) ? $_REQUEST['b_state_c'] : "";
        $addressBean->country_c = !empty($_REQUEST['b_country_c']) ? $_REQUEST['b_country_c'] : "";
        $addressBean->cst_no_c = !empty($_REQUEST['b_cst_no_c']) ? $_REQUEST['b_cst_no_c'] : "";
        $addressBean->range_c = !empty($_REQUEST['b_range_c']) ? $_REQUEST['b_range_c'] : "";
        $addressBean->division_c = !empty($_REQUEST['b_division_c']) ? $_REQUEST['b_division_c'] : "";
        $addressBean->reason_c = !empty($_REQUEST['b_tin_no_reasons_c']) ? $_REQUEST['b_tin_no_reasons_c'] : "";
        $addressBean->save();  
    }

   /*
    *
    * Change AssignTo of ShipTo Address when rfq won
    * @shipToId - Contains RFQ ShipTo AddressId
    *
    */
    private function changeBillToShipToAssignTo($locationsArray)
    {
        if(!empty($locationsArray))
        {
            foreach($locationsArray as $loc)
            {
                $locationBean = BeanFactory::getBean('FP_Event_Locations',$loc);
                $locationBean->assigned_user_id = 1;
                $locationBean->save(); 
            }
        }
       
    }

    //function defination to convert array to xml
    private function array_to_xml($array, &$xml_user_info) {
        
        foreach($array as $key => $value) {
            if(is_array($value)) {
                
                if(!is_numeric($key)){
                    $subnode = $xml_user_info->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                    
                }else{
                    $subnode = $xml_user_info->addChild("item");
                    $this->array_to_xml($value, $subnode);
                }
            }else {
                $xml_user_info->addChild("$key",htmlspecialchars("$value"));
            }
        }
        
    }

	function posoCreationApi(&$bean, $event, $arguments){
	
        if(empty($_REQUEST['issave']) ){
		$shipAddress = BeanFactory::getBean('FP_Event_Locations', $bean->fp_event_locations_aos_quotes_1fp_event_locations_ida);
			
        	if($bean->load_relationship('aos_quotes_vmrfq_vmrfq_1')){
                $vmrfqBean=$bean->aos_quotes_vmrfq_vmrfq_1->getBeans();
			
	            $i = 0;
				$j=1;
	            $itemArray = array();
	            foreach($vmrfqBean as $id=>$vmbean)
	            {
					$vendorBean = BeanFactory::getBean('vend_Vendor',$vmbean->vend_vendor_vmrfq_vmrfq_1vend_vendor_ida);
		            $addressBean = BeanFactory::getBean('FP_Event_Locations', $vmbean->fp_event_locations_vmrfq_vmrfq_1fp_event_locations_ida);
					$providedSkuBean = BeanFactory::getBean('sku_SKU',$vmbean->sku_sku_vmrfq_vmrfq_2sku_sku_ida);
					$employeeBean = BeanFactory::getBean('Users',$vmbean->vm_c);
					if($vmbean->vendor_taxation_type_c =='VAT Only' ||  $vmbean->vendor_taxation_type_c=='CST Only')
					{
						$inclusiveExcise =1;
					}
				
				$saleslineitems[] =array("SalesLine"=>array(
			           	'ItemNo' => $providedSkuBean->sku_code_c,
			            'Description' => $providedSkuBean->name,
			            'UOM' => $vmbean->uom_c,
			            'LocationCode' => $bean->warehouse_location_c,
			            'Qty' =>$vmbean->requested_quantity_c,
			            'DirectUnitCost' => $vmbean->purchase_cost_per_unit_c,
			            ) );
						
						
				
				
	            	$info[$addressBean->name.$vmbean->vendor_taxation_type_c.$vmbean->vendor_payment_method_c.$vmbean->vendor_credit_days_c][] = 
	            	array("PurchaseOrderDetails" =>array(
			            'CRMRefID' => "-".$j,// need to generate it
			            'BuyFromVendorNo' => $vendorBean->vendornavid_c,// 
			            'Structure' => $vmbean->vendor_taxation_type_c,
			            'OrderDate' =>  date("m/d/Y", strtotime($vmbean->date_modified)),
			            'DocumentDate' => date("m/d/Y", strtotime($vmbean->date_modified)),
			            'PaymentTerms' => $vmbean->vendor_credit_days_c,
			            'LocationCode' => $bean->warehouse_location_c,
			            'InclusiveExcise' => $inclusiveExcise,
			            'FormCode' => $vmbean->form_type_c,
			            'VendorManager' => $employeeBean->user_name,
			            'PaymentMethod' => $vmbean->vendor_payment_method_c,
			            'DocType' => 1,
			            'OrderAddressCode' => $addressBean->name,
			            'PaytoVendorNo' => $vendorBean->vendornavid_c,
			            'WishlistNo' => $bean->name,
			            'PostCode' => $addressBean->postcode_c,
			            'CityCode' => $addressBean->city_c,
			            'StateCode' => $addressBean->state_c,
		                	),
					
		           		"PurchaseLine"=>array(
			           'ItemNo' => $providedSkuBean->sku_code_c,
			            'Description' => $providedSkuBean->name,
			            'UOM' => $vmbean->uom_c,
			            'LocationCode' => $bean->warehouse_location_c,
			            'Qty' =>$vmbean->requested_quantity_c,
			            'DirectUnitCost' => $vmbean->purchase_cost_per_unit_c,
			            ) 
		 			);
				 $i++;
				 $j++;
				 
				 
				 
	 }
			$this->poCallingApi($info,$bean->name);die;
			//if po is succesful than only so should be called...need to discuss with Gaurav

 		
      }


        if($bean->customer_taxation_preference_c==Excise_And_CST || $bean->customer_taxation_preference_c==Excise_And_VAT)
			{
				$billingType =1;	
				$docType =1;
			}
		else{
			$docType =2;
			$billingType =0;	
			
		}
			
			
	$salesOrder = array("SalesOrder"=>array (
					"SalesOrderDetails" =>array(
			            'CRMRefID' => $bean->name.'sales',
			            'SellToCustNo' => $bean->billing_account_id,
			            'BillToCustNo' => $bean->billing_account_id,// need to generate it
			            'LocationCode' =>  $bean->warehouse_location_c,
			            'BillingType' => $billingType,
			            'Structure' => $bean->customer_taxation_preference_c,
			            'OrderDate' => $bean->date_entered,
			            'DocumentDate' => $bean->date_entered,
			            'PaymentTerms' => $bean->customer_credit_days_c,
			            'PaymentMethod' => $bean->payment_method_c,
			            'ShipToCode' => $shipAddress->name,
			            'FormCode' => $bean->form_type_c,
			            'WishListNo' => $bean->name,
			            'CustomerOrderNo' => $bean->name,// need to generate it
			            'DeliveryDate' =>'sdfsdf',// need to generate it
			            'DocType' =>$docType,// need to generate it
			            'PostCode' => $shipAddress->postcode_c,
			            'CityCode' => $shipAddress->city_c,
			            'StateCode' => $shipAddress->state_c,
		                	),
						"SalesLineDetails"	=>$saleslineitems
				
		            )
		            
 	);
	$this->soCallingApi($salesOrder);
	print_r($salesOrder); die;
			
    }
}   

function poCallingApi($info,$name){
	foreach($info as $keyadd =>$valueadd){
		$purchaseLine='';
		$purchaseorder='';
		$crmref ='';
		for($count=0; $count<sizeof($valueadd); $count++){
			
			$purchaseLine[]=$valueadd[$count]['PurchaseLine'];
			$purchaseorder=$valueadd[$count]['PurchaseOrderDetails'];
			$crmref = $crmref.$purchaseorder['CRMRefID'];
		
			}
				$purchaseorder['CRMRefID']=$name.$crmref;		
			
				$finalPoArray= array("PurchaseOrder"=>array (
	 				"PurchaseOrderDetails" =>$purchaseorder,
	 				"PurchaseLineDetails"=>array(
	 						"PurchaseLine"=>$purchaseLine
						)
					 )
				);	
			$params = array(
			    "ImportPurchOrderDetails" => array(
			        "purchaseOrderRequest" => $finalPoArray,
			        "errorMessage" => ""
			    )
			);
		
			$navFunc='ImportPurchOrderDetails';
			$response=navApiService($params,$navFunc);
		
	}
		
}

// function soCallingApi($info){
// 	
//     	
		// $params = array(
		    // "ImportSalesOrderDetails" => array(
		        // "salesOrderRequest" => $info,
		        // "errorMessage" => ""
		    // )
		// );
// 		
		// $navFunc='ImportSalesOrderDetails';
// 		
		// echo'<pre>';
		// print_r($params);
		// $response=navApiService($params,$navFunc);
// 		
		// echo'<pre>';		
				// print_r($response);die;
// 		
// 		
// 	            
//  		
        // }
	

function sendMMMNotification(&$bean, $event, $arguments){
    	
      if(($bean->rfq_state_c == 'sales_quote_margin' && empty($_REQUEST['issave'])) || ($bean->rfq_state_c == 'sales_quote_price' && empty($_REQUEST['issave']) && $bean->price_status_c == "pending"))
       {
		     if($bean->load_relationship('aos_quotes_vmrfq_vmrfq_1')){
                $vmrfqBean=$bean->aos_quotes_vmrfq_vmrfq_1->getBeans();
           
            $i = 0;
            $itemArray = array();
			
           foreach($vmrfqBean as $id=>$vmbean)
            {              
                
                $providedSkuBean = BeanFactory::getBean('sku_SKU',$vmbean->sku_sku_vmrfq_vmrfq_2sku_sku_ida);
                
                //$allfields = $bean->column_fields;
                $itemArray[$i]['full_description'] = $providedSkuBean->name;
                $itemArray[$i]['uom'] = $vmbean->uom_c;
        
                $itemArray[$i]['qty'] = $vmbean->provided_quantity_c;
                $itemArray[$i]['sales_rate'] = $vmbean->sales_rate_per_unit_c;
                $itemArray[$i]['excise_per_line'] = $vmbean->total_excise_cost_c;
                $itemArray[$i]['tax_type'] = $vmbean->vendor_taxation_type_c;
                $itemArray[$i]['tax_percent'] = $vmbean->vendor_tax_percent_c;
                $itemArray[$i]['Taxt_amount_per_line'] = $vmbean->vendor_tax_amount_c;
                $itemArray[$i]['total_line_amount'] = $vmbean->purchase_line_amount_c;
				
                
                $i++;
            }
        }
            $contactBean = BeanFactory::getBean('Contacts', $bean->billing_contact_id);
 			if($contactBean->load_relationship('contacts_phone_phone_1')){
 				      $phoneBean=$contactBean->contacts_phone_phone_1->getBeans();
					
 		}		
			// echo'<pre>';
			// print_r($phoneBean); die;
			
            $shipAddress = BeanFactory::getBean('FP_Event_Locations', $bean->fp_event_locations_aos_quotes_1fp_event_locations_ida);
            $billAddress = BeanFactory::getBean('FP_Event_Locations', $bean->fp_event_locations_aos_quotes_2fp_event_locations_ida);
            $kamBean= BeanFactory::getBean('Users', $bean->created_by);
			$scmBean= BeanFactory::getBean('Users', $bean->users_aos_quotes_2users_ida);
		
		
            
             $info=array("object"=>'rfq',
                "event"=>'Sales Quote Published',
                "RFQ_no"=>$bean->name,
                "contact_name"=>$bean->billing_contact,
                "contact"=>array("mobile_no"=>'9823458723',
                            "email_id"=>$contactBean->email1
            ),
            "payment_terms"=>$bean->customer_credit_days_c,
            "cust_taxation_prefernce"=>$bean->customer_taxation_preference_c,
            "payment_method"=>$bean->payment_method_c,
            "excise_inclusive"=>$bean->need_excise_exclusive_price_c,
            "Freight_borne_by"=>$bean->freight_charge_borne_by_c,
            "vendor_loading_charges"=>$bean->vendor_loading_charge_c,
            "vendor_Freight_charges"=>$bean->vendor_freight_charge_c,
            "cust_freight_amount"=>$bean->customer_freight_payment_c,
            "Cust_Loading_charges"=>$bean->customer_loading_payment_c,
            "commented_by"=>$bean->need_excise_exclusive_price_c,//need to check
            "commented_date"=>$bean->need_excise_exclusive_price_c,//need to check
            "commented_time"=>'',//need to check
            "comments"=>$bean->comments_c,
            "shipping_address"=>array("shiptoadress"=>$shipAddress->address1_c,
                                    "shiptoadress2" =>$shipAddress->address2_c,
                                    "shiptocitypostcode"=>$shipAddress->postcode_c
                                    ),
                                    
            "billing_address"=>array("billtoadress"=>$billAddress->address1_c,
                                    "billtoadress2" =>$billAddress->address2_c,
                                    "billtocitypostcode"=>$billAddress->postcode_c
                                    ),
                                    
            "kam"=>array("kam_name"=>$kamBean->name,
                         "mobile_no"=>$kamBean->phone_mobile,
                         "email_id"=>$kamBean->email1
                        ),
            
            "items"=>$itemArray,
            "vendor_manager"=>array("vendor_manager_name"=>$scmBean->name,
                         "email_id"=>$scmBean->phone_mobile,
                         "mobile_no"=>$scmBean->email1
                        ),
        
            );

       
        $xml_user_info = new SimpleXMLElement("<payload></payload>");

        //function call to convert array to xml
        $this->array_to_xml($info,$xml_user_info);

		$dom = dom_import_simplexml($xml_user_info);
		$mmmXml= $dom->ownerDocument->saveXML($dom->ownerDocument->documentElement);

        //saving generated xml file
        //$xml_file = $xml_user_info->asXML('/var/www/html/suitecrm/custom/modules/AOS_Quotes/users.xml');
      //  echo($xml_user_info->asXML());die;
        require_once('/var/www/html/suitecrm/service/MMM.php');
        $obj1=new MMM();
	
        $obj1->Payload($mmmXml,$bean->number,$bean->rfq_state_c);
                    
        }
       // die;
    
    }

	function accountCreationApi(&$bean, $event, $arguments){
		
		$addInfo = array("CustomerContact"=>
		array("cNo"=>'',
			"cName"=>'',
			"cPhone"=>'',
			"cType"=>'',
			"cEMail"=>'',
			"cCompanyNo"=>'',
		),
		"CustomerAddress"=>array(
			"aCode"=>'',
	        "aAddress"=>'',
	        "aAddress2"=>'',
            "aPostCode"=>'',
            "aTIN"=>'',
            "aECC"=>'',
            "aRange"=>'',
            "aDivision"=>'',
            "aCollectorate"=>'',
            "aCommissionrate"=>'',
            "aCST"=>''
		)
		
	
		);
			$accountInfo = array(
						"CustomerDetails" =>array(
			            'CustNo' => $bean->name.'sales',
			            'CustName' => $bean->billing_account_id,
			            'CustPostingGroup' => $bean->billing_account_id,// need to generate it
			            'GenBusPostingGroup' =>  $bean->warehouse_location_c,
			            'PANNo' => $billingType,
			            				
		            ),
		            "AdditionalInformation"=>$addInfo
		            
		            
 	);		
	echo'<pre>';
	print_r($accountInfo); die;		
							
						
	
	
	}



}
