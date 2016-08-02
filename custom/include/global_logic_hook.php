//<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

//require_once 'service/core/SugarWebServiceImpl.php';

class globalLogicHook {


    /*
    *
    * It will save phone numbers through out the suitecrm (Data,Lead,Contact) 
    * @bean - contains bean values in array
    * @event - contains events
    * @arguments - contains arguments
    */
    function savePhones(&$bean, $event, $arguments) {
        
        global $db;
       
        //echo "<pre>";print_r($bean);die;
        //echo "<pre>";print_r($_REQUEST);die;
        $requestData = $this->getRequestedData($bean);
        //echo "<pre>";print_r($requestData);die('n');
        if(!empty($requestData))
        {
                  
            $arrUniqueNumbr = array();
            
            if($requestData['ph_count'] > 0)
            {
                for($phone_count=1;$phone_count <= $requestData['ph_count'];$phone_count++)
                {       
                    if(isset($requestData['phone_'.$phone_count]))
                    {
                       $arrUniqueNumbr[$requestData['phone_'.$phone_count]] = $phone_count;       
                    }               
                }
        
                //echo "<pre>"; print_r($arrUniqueNumbr);
                if(count($arrUniqueNumbr) > 0)
                {
                    foreach($arrUniqueNumbr as $mer=>$val)
                    {               

                        $phoneradio=0;
                         //echo "<pre>".$requestData['phoneradio']."---$val";
                        if($requestData['phoneradio'] == $val)
                        {
                            $phoneradio=1;   
                            $this->updatePrimaryNumber($requestData['module'],$requestData['bean_id'],$mer);
                           
                        }
                        
                        $optedout=$requestData['optedout_phone_'.$val];
                        $invalid_phone=$requestData['invalid_phone_'.$val]; 

                        if($requestData['isExist_'.$val] == 1)
                        {                      
                            $dataPhoneId = $requestData['existingPhId_'.$val];
                        }
                        else
                        {                          
                            $dataPhoneId = $this->getPhone($requestData['phone_'.$val]);
                            
                           /* if($dataPhoneId == "")
                            {
                               $dataPhoneId =  =  $this->getUniqueId();   
                            }*/

                            //insertPhone will not execute in case of lead to contact conversion case beacuse while converting we would have two beans one is lead and second is contact.For this case we need to restrict save functionality for lead.
                            if((!($_REQUEST['module'] == "Leads" && $bean->module_dir == "Leads" && $_REQUEST['action'] == "ConvertLead")) && $dataPhoneId == "") 
                            {
                                $dataPhoneId = $this->insertPhone($requestData['phone_'.$val],$requestData['assigned_user_id']);
                            }
                        }

                        //insertPhoneData will not execute in case of lead to contact conversion case beacuse while converting we would have two beans one is lead and second is contact.For this case we need to restrict save functionality for lead.
                        if(!($_REQUEST['module'] == "Leads" && $bean->module_dir == "Leads" && $_REQUEST['action'] == "ConvertLead"))
                        {
                            die('end');  
                            $this->insertPhoneData($dataPhoneId,$phoneradio,$optedout,$invalid_phone,$requestData['sel_'.$val],$requestData['module'],$requestData['bean_id'],$requestData['phone_'.$val],$requestData['assigned_user_id'],$bean);
                        }
                        
                    } 
                       
                } 
            } 
        }      
    }
    
    /*
    *
    * create unique id for new phone 
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
    *
    * delete all phone numbers from db according to beanId
    * @module - contains module name
    * @beanId - contains beanId
    *
    */
    private function deletePhoneData($module,$beanId)
    {

        global $db;
        $tableName = "";
        $column = "";
        $where = "";
        if($module == "abc12_Data")
        {
            $tableName = "abc12_data_phone_phone_1_c";
            $column = "abc12_data_phone_phone_1abc12_data_ida";  
        }
        elseif($module == "Leads")
        { 
            $tableName = "phone_phone_leads_1_c";
            $column = "phone_phone_leads_1leads_idb";  
            
            if($_REQUEST['action'] == "ConvertLead") // It will execute only convert lead to contact case
            {
                $phone = $_REQUEST['Contactsphone_mobile'];
                $ssql = "select p.id from phone_phone p inner join phone_phone_leads_1_c as pl on p.id = pl.phone_phone_leads_1phone_phone_ida where p.name = '$phone'";
               // echo $ssql;
                $sql = $db->query($ssql);              
                $pid = $db->fetchRow($sql);
                if(!empty($pid))
                {
                    $phonId = $pid['id']; 
                    $beanId = $_REQUEST['record']; // Set converted record beanId in $beanId so that we can remove that particular phone number from converted record
                    if($phonId != "")
                    {
                        $where .= " and phone_phone_leads_1phone_phone_ida = '$phonId'"; // we will remove only that one particular record that is going to convert into contact.
                    }
                    $this->updateActivityStatusHeld($beanId,$phone);
                }
                
             
            }
        }
        elseif($module == "Contacts")
        { 
            $tableName = "contacts_phone_phone_1_c";
            $column = "contacts_phone_phone_1contacts_ida";  
        }

        $sqlDelete="DELETE FROM ".$tableName." WHERE ".$column."='".$beanId."' $where";
       
        $db->query($sqlDelete);

        
        
    }
    

    /*
    *
    * Get particluar phone is present in our phone table or not
    * @phNumber - Contains phone number
    *
    */
    private function getPhone($phNumber)
    {
        global $db;
        
        $sql = "select * from phone_phone where name = '$phNumber'";
        
        $out= $db->query($sql);
               
        $phoneId = "";
        if($db->getRowCount($out) > 0)
        {
           $data = $db->fetchRow($out);
           $phoneId = $data['id'];
        }    
       
        return $phoneId; 
    }


    /*
     *
    * check duplicacy of phone number
    * @requestPh - Contains array of Phone numbers
    *
    */
   
   private function checkDuplicacy($requestPh)
   {
        global $db;
               
        $sqlSelect="SELECT a.id,b.abc12_data_phone_phone_1abc12_data_ida,a.name FROM `phone_phone` as a "
                . "     inner join abc12_data_phone_phone_1_c as b on a.id = b.abc12_data_phone_phone_1phone_phone_idb "               
                . "     where a.name in (".$requestPh.") and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 UNION" ;
        
        $sqlSelect.=" SELECT a.id,b.phone_phone_leads_1leads_idb,a.name FROM `phone_phone` as a "
                . "     inner join phone_phone_leads_1_c as b on a.id = b.phone_phone_leads_1phone_phone_ida"
                . "     where a.name in (".$requestPh.") and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0 UNION";
        
        $sqlSelect.=" SELECT a.id,b.contacts_phone_phone_1contacts_ida,a.name FROM `phone_phone` as a "
                . "      inner join contacts_phone_phone_1_c as b on a.id = b.contacts_phone_phone_1phone_phone_idb "
                . "     where a.name in (".$requestPh.") and b.opted_out = 0 and b.invalid = 0 and b.deleted = 0";
           
        //echo $sqlSelect;
        //die;
        $out = $db->query($sqlSelect);
  
        $existPhData = array();
       
        if($db->getRowCount($out) > 0)
        {
            while($dat = $db->fetchRow($out))
            {
                $existPhData[$dat['name']] = $dat['id'];                
            }
        }
        
        return $existPhData;
    }

   /*
    *
    * It will insert new phone number in db
    * @id - Contains unique id for that phone number
    * @phone - Contains phone number
    * @assignedUsedId - Contains assigned userId 
    *
    */
    private function insertPhone($phone,$assignedUserId)
    {
        
        require_once('modules/phone_Phone/phone_Phone.php');
        $ph = new phone_Phone();
        $ph->name = $phone;
        $ph->date_entered = date('Y-m-d H:i:s');
        $ph->date_modified = date('Y-m-d H:i:s');
        $ph->assigned_user_id = $assignedUserId;
        $ph->modified_user_id = $assignedUserId;
        $ph->created_by = $assignedUserId;
        //$phoneId = $ph->save(true);


        return $phoneId;
    }

    
    /*
    *
    * It will create activity corresponding to each phone for lead module
    * @phone - Contains phone number
    * @assignedUserId - Contains assignedUserId
    * @beanId - Contains leadId
    * @leadSource - Contains leadsource
    *
    */
    private function createActivity($phone,$assignedUserId,$beanId,$leadSource)
    {
        require_once('modules/Calls/Call.php');
        $cl = new Call();
        $cl->name = $phone;
        $cl->date_start = date('Y-m-d H:i:s');
        $cl->assigned_user_id = $assignedUserId;
        $cl->lead_source_c = $leadSource;
        $cl->parent_id = $beanId;
        $cl->parent_type = "Leads";
        $cl->save(true);
        
    }

    private function updateActivityStatusHeld($beanId,$phone)
    { 
        global $db;
        $sql = "update calls set status = 'Held' where parent_id = '$beanId' and name = '$phone'";
        $db->query($sql);
    } 
    
   /*
    *
    * It will insert phoneId and beanId in relationship table according to their module
    * @dataPhoneId - Contains phoneId
    * @phoneradio - Contains primary number flag
    * @optedout - Contains opted out flag
    * @invalid_phone - Contains invalid phone flag
    * @sel - Contains phone number type (Mobile or Landline) 
    * @module - Contains module name
    * @beanId - contains beanId (moduleId)
    *
    */
    private function insertPhoneData($dataPhoneId,$phoneradio,$optedout,$invalid_phone,$sel,$module,$beanId,$phone,$assignedUserId,$bean)
    {
        global $db; 
        $tableName = "";
        $column1 = "";
        $column2 = "";
        $where = "";
        if($module == "abc12_Data")
        {
            $tableName = "abc12_data_phone_phone_1_c";
            $column1 = "abc12_data_phone_phone_1abc12_data_ida";
            $column2 = "abc12_data_phone_phone_1phone_phone_idb";
        }
        elseif($module == "Leads")
        {
            
            $tableName = "phone_phone_leads_1_c";
            $column1 = "phone_phone_leads_1leads_idb";
            $column2 = "phone_phone_leads_1phone_phone_ida";
           
        }
        elseif($module == "Contacts")
        {
            
            $tableName = "contacts_phone_phone_1_c";
            $column1 = "contacts_phone_phone_1contacts_ida";
            $column2 = "contacts_phone_phone_1phone_phone_idb";
        }
        

        $insql="INSERT INTO ".$tableName ."(id,date_modified,".$column1.",".$column2.",primary_contact,opted_out,invalid,sel_type)
                                VALUES (uuid(),NOW(),'".$beanId ."','".$dataPhoneId."','".$phoneradio."','".$optedout."','".$invalid_phone."',
                            '".$sel."')";

       // echo $insql;
        $db->query($insql);

        if($module == "Leads" && $optedout == 0 && $invalid_phone == 0) 
        {

             $dat = $this->checkActivityExist($phone,$beanId);
             if(empty($dat))
             {
                $this->createActivity($phone,$assignedUserId,$beanId,$bean->lead_source);
             }
             
        }
    }
    

    /*
    *
    * check activity exists for particular number corresponding
    * @phone - Contains phone number
    * @beanId - Contains beanId
    *
    */
    private function checkActivityExist($phone,$beanId)
    {
        global $db;
        $sQuery = "select * from calls where parent_id= '$beanId' and name = '$phone' and status = 'Planned'";
        $out =  $db->query($sQuery); 
        $retData = $db->fetchRow($out);
        return $retData;
    }


    private function fetchLeadPhoneActivities($beanId)
    {
        global $db;
        $sQuery = "select * from calls where parent_id= '$beanId' group by name order by date_entered asc";
        
        $out = $db->query($sQuery);
  
        $retData = array();
       
        if($db->getRowCount($out) > 0)
        {
            while($dat = $db->fetchRow($out))
            {
                $retData[$dat['name']] = $dat;                
            }
        }
        
        return $retData;


    }
    /*
    *
    * get params from different requests and modified that params structure according to fixed format
    * @bean - Contains the particular module params like data,lead,contact
    *
    */
    private function getRequestedData($bean)
    {
        //echo "<pre>"; print_r($_REQUEST); die;
        $requestData = array();
        if(!($_REQUEST['module'] == "Leads" && $bean->module_dir == "Leads" && $_REQUEST['action'] == "ConvertLead")) // delete will not execute in case of convertLead to Contact case
        {

            if($_REQUEST['module'] == "Leads" ) // It will execute only in case of lead to mark deleted phone activities held
            {
                $existingPh = $this->fetchLeadPhoneActivities($bean->id);
                $existingPhNum= array_keys($existingPh);
                $newPhNum =  array_keys($this->getPhNumber($_REQUEST));
                $deletedPhNum = array_diff($existingPhNum,$newPhNum);

                if(!empty($deletedPhNum))
                {
                    foreach ($deletedPhNum as $key => $value) {

                        $activityId = $existingPh[$value]['id'];
                        $where = "status = 'Held'";
                        $this->updateActivityStatus($activityId,$where); //Mark lead deleted phone numbers activities held
                    }
                }


            }
            $this->deletePhoneData($_REQUEST['module'],$bean->id); 
        }
         
        
        
        if($_REQUEST['module'] == 'abc12_Data' && $_REQUEST['action'] == "ConvertData") // execute in case of convert data to lead manually conversion 
        {
            $phoneArray = $this->getDataPhoneNumber($_REQUEST['record']);
            $getPhNumber = implode(',', array_keys($this->getPhNumber($phoneArray)));   
        }
        elseif($_REQUEST['module'] == "Import" && $_REQUEST['import_module'] == "abc12_Data") // excute for data import case
        {
            $getPhNumber = trim($bean->phone_office);
           
        }
        elseif($_REQUEST['module'] == "Leads" && $_REQUEST['action'] == "ConvertLead") // execute in case of convert lead to contact conversion case
        {
            $getPhNumber = $_REQUEST['Contactsphone_mobile'];
            
        }
        else  // Execute in case of when save phone numbers from normal data , lead , contact form  
        {  
            $getPhNumber = implode(',', array_keys($this->getPhNumber($_REQUEST)));
        }
       
        $ext = $this->checkDuplicacy($getPhNumber);
       // print_r($ext);
        if($_REQUEST['module'] == 'abc12_Data' && $_REQUEST['action'] == "ConvertData") // execute in case of convert data to lead conversion case
        {
      
            if($_REQUEST['mode'] == "auto") // It will execute in case of blasterCampaign Cron when automatically data would be converted into lead
            {
                             
                $restData = $_REQUEST['rest_data'];
                $restData = json_decode(stripslashes(from_html($restData))); 
                
                $lastVal = end($restData[2]);
                             
                $phData = $lastVal->value;
                $phNum = array();
                if(count($phData) > 0)
                {
                    foreach($phData as $v)
                    {
                        
                        $phNum[$v->phone] = $v->status;
         
                    }
                }
                
               // echo $phNum;die;
            }
                
               // echo $phNum;die;
            
            if(!empty($phoneArray)){
                          
                $requestData['ph_count']=sizeof($phoneArray);
                $requestData['module']=$bean->module_dir;               
                $requestData['bean_id']=$bean->id;              
                $requestData['assigned_user_id']=1;
                           
                $i =1;
                $primaryNumber = "";
                
               
                foreach($phoneArray as $key=>$val)
                {
                    $key = trim($key);
                    $requestData['phone_'.$i]=$key;
                    $requestData['sel_'.$i]=$val['sel_type'];
                    $requestData['isExist_'.$i] = 0; 
                    $requestData['existingPhId_'.$i] = 0;      
                    $requestData['optedout_phone_'.$i]=$val['opted_out'];
                    $requestData['invalid_phone_'.$i]=$val['invalid'];
                      
                    if(isset($ext[$key]))
                    {                         
                        $requestData['optedout_phone_'.$i]=1;                     
                        $requestData['isExist_'.$i] = 1; 
                        $requestData['existingPhId_'.$i] = $ext[$key];                            
                    }                   
                    elseif (!preg_match('/^\d{10}$/', $key)) 
                    {
                        $requestData['invalid_phone_'.$i]=1;                         
                    } 

                    if($primaryNumber == "" && $val['primary_contact'] == 1 && !isset($ext[$key]) && preg_match('/^\d{10}$/', $key) )
                    {
                        $primaryNumber = $i;
                        $requestData['optedout_phone_'.$i]=0;
                        $requestData['invalid_phone_'.$i]=0;    
                    } 
                    
                    if($_REQUEST['mode'] == "auto") // It will execute in case of blasterCampaign Cron when automatically data would be converted into lead
                    {   
                       if(isset($phNum[$key]) && $phNum[$key] == 2)
                       {
                           $primaryNumber = $i;
                           $requestData['optedout_phone_'.$i]=0;
                           $requestData['invalid_phone_'.$i]=0;    
                       }
                       elseif(isset($phNum[$key]) && $phNum[$key] == 0)
                       {
                           $requestData['invalid_phone_'.$i]=1;
                       }                      
                    }

                    $i++;
                }
                $requestData['phoneradio']=$primaryNumber;
                //echo "<pre>"; print_r($requestData);die;
               
            }
            $this->deleteAlternatePhone($_REQUEST['record']);
//           print_r($requestData);die;
             
        }
        elseif($_REQUEST['module'] == "Import" && $_REQUEST['import_module'] == "abc12_Data") // excute for data import case
        {
            $phoneArray=explode(",", $bean->phone_office);
            if(!empty($phoneArray)){
                $requestData['ph_count']=sizeof($phoneArray);
                $requestData['module']=$bean->module_dir;
                $requestData['bean_id']=$bean->id;             
                $requestData['assigned_user_id']=1;
                 
                $primaryNumber = "";
                for($i=1;$i<=sizeof($phoneArray);$i++){
                    
                    $phn = trim($phoneArray[$i-1]);
                    $requestData['phone_'.$i]=$phn;
                    $requestData['sel_'.$i]="mobile";
                    $requestData['isExist_'.$i] = 0; 
                    $requestData['existingPhId_'.$i] = 0; 
                    $requestData['optedout_phone_'.$i]=0;
                    $requestData['invalid_phone_'.$i]=0;
                    
                    if(isset($ext[$phn]))
                    {                         
                        $requestData['optedout_phone_'.$i]=1;                      
                        $requestData['isExist_'.$i] = 1; 
                        $requestData['existingPhId_'.$i] = $ext[$phn]; 
                       
                    }
                    elseif (!preg_match('/^\d{10}$/', $phn)) 
                    {
                        $requestData['invalid_phone_'.$i]=1;                         
                    } 
                    
                    if($primaryNumber == "" && !isset($ext[$phn]) && preg_match('/^\d{10}$/', $phn) )
                    {
                        $primaryNumber = $i;
                    } 
                    
                }
                $requestData['phoneradio']=$primaryNumber;
            }
            
           // print_r($requestData);
         
        }  
        elseif($_REQUEST['method'] == "set_entry" && $_REQUEST['input_type'] == "json" && $_REQUEST['type'] == "create_lead") // It will execute when lead comes from landing pages
        {      
//           echo "<pre>"; print_r($_REQUEST);
//           echo "<pre>"; print_r($bean);die;
//           
            $restData = $_REQUEST['rest_data'];
            $restData = json_decode(stripslashes(from_html($restData))); 

            $lastVal = $restData[2];


            //echo "<pre>";print_r($lastVal);die;

            $phn = "";
            $phnId = "";
            if(count($lastVal) > 0)
            {
                foreach($lastVal as $k => $v)
                {
                    if($v->name == "phone_mobile")
                    {
                        $phn = trim($v->value);
                        break;
                    }
                    
                }
            }
            //echo "<pre>";print_r($lastVal);die;
            $phData = $lastVal->value;
              
           /* $path = 'http://'.$_SERVER['HTTP_HOST'].'/suitecrm/service/checkPhone1.php?data='.$phn.''; // API calling to check the number comes from landing page exist in other modules (data,lead,contact) or not
            $phData = file_get_contents($path);*/

            require_once('service/checkPhone1.php');
            $phData = checkPhone($phn,1);

            if(!empty($phData))
            {
                $phData= json_decode($phData,1);
                //echo "<pre>";print_r($phData);die;
                if($phData['status'] == 1)
                {
                    
                    $phnId = $phData['phoneId'];
                }
                else
                {       
                    $requestData['ph_count'] = 1;              
                    $requestData['module'] = $restData[1];
                    $requestData['bean_id'] = $bean->id;
                    $requestData['assigned_user_id'] = 1;
                    $requestData['phone_1'] = $phn;
                    $requestData['sel_1'] = "mobile";
                    $requestData['isExist_1'] = 0; 
                    $requestData['existingPhId_1'] = 0; 
                    $requestData['optedout_phone_1']= 0;
                    $requestData['invalid_phone_1'] = 0;

                    if(!preg_match('/^\d{10}$/', $phn))
                    {
                       $requestData['invalid_phone_1'] = 1; 
                    }

                    $requestData['phoneradio'] = 1;
                }
            }
            //echo "<pre>";print_r($requestData);die;
                        
        }
        elseif($_REQUEST['method'] == "set_entry" && $_REQUEST['input_type'] == "json" && $_REQUEST['type'] == "create_data") // It will execute in case of blasterCampaign Cron when automatically data would be converted into lead .It will run once in a day.
        {      
           
            $this->updateDataDispositionStatus($bean->id,$bean->dialer_data_c);
        }
        elseif($_REQUEST['method'] == "set_entry" && $_REQUEST['input_type'] == "json" && $_REQUEST['type'] == "dialerDisposition") // execute in case of dialerDisposition cron for lead to contact fail cases
        {
           $phone =  $bean->phone_mobile;
           $leadId = $bean->id;
           $phoneId =  $bean->phoneId;
           $activityId = $bean->activityId;
           $assignedTo = $bean->assigned_to;
           
           $status = $this->getLeadStatus($leadId);
           if($status == "New")
           {
              $phoneCount = $this->checkRestLeadPhoneCount($leadId,$phoneId);
              
              if($phoneCount > 0) 
              {
                  $this->updateLeadPhoneStatus($leadId,$phoneId);
              }
              else
              {
                  
                  $this->updateLeadPhoneStatus($leadId,$phoneId);
                  $this->updateLeadStatus($leadId);
                 
              }
             
              
           }
           elseif($status == "Converted")
           {
                $this->updateLeadPhoneStatus($leadId,$phoneId);
           }

           $where = "assigned_user_id = '$assignedTo' , status = 'Held'";
            $this->updateActivityStatus($activityId,$where);

           
        }
        elseif($_REQUEST['module'] == "Leads" && $_REQUEST['action'] == "ConvertLead") // execute in case of convert lead to contact conversion
        {
            $phn = trim($_REQUEST['Contactsphone_mobile']);
            $requestData['ph_count'] = 1;              
            $requestData['module'] = "Contacts"; 
            $requestData['bean_id'] = $bean->id;
            $requestData['assigned_user_id'] = 1;
            $requestData['phone_1'] = $phn;
            $requestData['sel_1'] = "mobile";
            $requestData['isExist_1'] = 0; 
            $requestData['existingPhId_1'] = 0; 
            $requestData['optedout_phone_1']= 0;
            $requestData['invalid_phone_1'] = 0;
            
            if(!preg_match('/^\d{10}$/', $phn))
            {
               $requestData['invalid_phone_1'] = 1; 
            }
            
            $requestData['phoneradio'] = 1;
           
           
        }
        else // Execute in case of when save phone numbers from normal data , lead , contact form  
        {
            if(isset($_REQUEST['phone_count']) && $_REQUEST['phone_count'] > 0)
            {           

                $requestData['ph_count'] = $_REQUEST['phone_count'] ;              
                $requestData['module'] = $_REQUEST['module'];
                $requestData['bean_id'] = $bean->id;
                $requestData['assigned_user_id'] = $_REQUEST['assigned_user_id'];
               
                $primaryNumber = "";                   
                $primaryPh = $this->getPrimaryNumber($ext);
                //echo "<pre>"; print_r($primaryPh);
                for($phone_count=1;$phone_count <= $_REQUEST['phone_count'];$phone_count++)
                {   
                    $phn = trim($_REQUEST['phone_'.$phone_count]);
                    if(isset($_REQUEST['phone_'.$phone_count]) && $phn != "")
                    {
                       
                        $requestData['phone_'.$phone_count] = $phn;
                        $requestData['sel_'.$phone_count] = $_REQUEST['sel_'.$phone_count];  
                        $requestData['isExist_'.$phone_count] = 0; 
                        $requestData['existingPhId_'.$phone_count] = 0;   
   
                        if(isset($_REQUEST['optedout_phone_'.$phone_count]))
                        {
                            $requestData['optedout_phone_'.$phone_count] = isset($_REQUEST['optedout_phone_'.$phone_count]) ? 1 : 0;
                        }
                        else 
                        {
                            if(isset($ext[$phn]))
                            {                         
                                $requestData['optedout_phone_'.$phone_count]=1;                              
                                $requestData['isExist_'.$phone_count] = 1; 
                                $requestData['existingPhId_'.$phone_count] = $ext[$phn];                           
                            }                                                                     
                            else
                            {
                               $requestData['optedout_phone_'.$phone_count]=0;                               
                            }
                        }
                            
                        if(isset($_REQUEST['invalid_phone_'.$phone_count])) // It will excecute when person itself try to mark invalid number from form (data,lead,contact).
                        {
                            $requestData['invalid_phone_'.$phone_count] = isset($_REQUEST['invalid_phone_'.$phone_count]) ? 1 : 0;
                        }
                        else
                        {
                            if (preg_match('/^\d{10}$/', $phn)) {
  
                                $requestData['invalid_phone_'.$phone_count]=0;  
                            }                     
                            else
                            {
                              
                               $requestData['invalid_phone_'.$phone_count]=1;  
                            }
                        }
                             
                        if(isset($_REQUEST['phoneradio']) && $_REQUEST['phoneradio'] == $phone_count && $primaryPh[$phn]) // It will execute only when person itself try to mark primary number from form (data,lead,contact)
                        {             
                            $primaryNumber  = $phone_count;    
                        }
                         
                    }                
                }
                if($primaryNumber == "" && count($primaryPh)) // If person has not decided primary number then we will decide which number would be primary.We will exclude optedout and invalid numbers.
                {
                    $primaryNumber = array_shift($primaryPh);
                }     
                $requestData['phoneradio'] = $primaryNumber;
             
            }
            
        }
        //print_r($requestData);die;
        return $requestData;
    }
    
    
    /*
    *
    * Mark Activity Status Not Held
    * @activityId - Contains activityId
    * @where - Contains where condition with key and value pair
    *
    */
    private function updateActivityStatus($activityId,$where)
    { 
        global $db;
        $sql = "update calls set $where where id = '$activityId'";
        $db->query($sql);
    } 


    /*
    *
    * Mark lead status is equal to 'dead' and disposition is equal to 'non contactable' according to result of dialerDisposition cron if that lead doesn't even contains single valid number.
    * @leadId - Contains leadId
    *
    */
    private function updateLeadStatus($leadId)
    {
        global $db;
      
        $sqlQry = "update leads inner join leads_cstm "
                . "on leads.id= leads_cstm.id_c "
                . "set leads.status = 'Dead' , "
                . "leads_cstm.disposition_c = 'not contactable' "
                . "where leads.id = '$leadId' and leads.deleted = 0";           
       
        $db->query($sqlQry); 
    }
    
    /*
    *
    * Mark phone invalid according to result of dialerDisposition Cron
    * @leadId - Contains leadId
    * @phoneId - Contains phoneId
    *
    */
    private function updateLeadPhoneStatus($leadId,$phoneId)
    {
        global $db;
        $sqlQry = "update phone_phone_leads_1_c set invalid = 1 where phone_phone_leads_1phone_phone_ida = '$phoneId' and phone_phone_leads_1leads_idb = '$leadId' and deleted = 0";           
        $db->query($sqlQry); 
    }
    
    /*
    *
    * get count of phone numbers that lead has left for calling 
    * @leadId - Contains leadId
    * @phoneId - Contains phoneId
    *
    */
    private function checkRestLeadPhoneCount($leadId,$phoneId)
    {
        global $db;
        $sqlQry = "select count(id) as phoneCount from phone_phone_leads_1_c where phone_phone_leads_1leads_idb = '$leadId' and phone_phone_leads_1phone_phone_ida != '$phoneId' and opted_out = 0 and  invalid = 0";           
        $out =  $db->query($sqlQry); 
        $retData = $db->fetchRow($out);
        $phoneCount = $retData['phoneCount'];
        return $phoneCount;
             
    }
    
    /*
    *
    * get all phone number that we can make primary while saving phone .It will be excluded optedout and invalid phone numbers.
    * @ext - Contains already present phone number array
    *
    */
    private function getPrimaryNumber($ext)
    {
        
        $primaryPhNum = array();
        if(count($_REQUEST['phone_count']) > 0)
        {
            
            for($phone_count=1;$phone_count <= $_REQUEST['phone_count'];$phone_count++)
            {   
                if(!isset($ext[$_REQUEST['phone_'.$phone_count]]) && preg_match('/^\d{10}$/', $_REQUEST['phone_'.$phone_count]) && $_REQUEST['invalid_phone_'.$phone_count] == 0)
                {                  
                    $primaryPhNum[$_REQUEST['phone_'.$phone_count]] = $phone_count;                  
                }
            }    
        }
        
        return $primaryPhNum;
    }
    
   /*
    *
    * get lead status
    * @leadId - Contains leadId
    *
    */
    private function getLeadStatus($leadId)
    {
        global $db;
        $sqlQry = "select status from leads where id = '$leadId' and deleted = 0";           
        $out =  $db->query($sqlQry); 
        $retData = $db->fetchRow($out);
        $status = $retData['status'];
        return $status;
    }
    
  
    /*
    *
    * Change the format of data phone numbers so that we can save that phone number in lead
    * @request - Contains all data phone number 
    *
    */
    private function getPhNumber($request)
    {
       // print_r($request);die;
        $requestData = array();
        if(isset($request['phone_count']))
        {
            for($phone_count=1;$phone_count <= $request['phone_count'];$phone_count++)
            {   
                if(isset($request['phone_'.$phone_count]))
                {
                    $requestData[trim($request['phone_'.$phone_count])] = $phone_count;
                }
            }
        }
        return $requestData;
                
    }

    /*
    *
    * Get data phone number according to dataId 
    * @dataId - Contains dataId
    *
    */
    private function getDataPhoneNumber($dataId)
    {
        global $db;
        $sqlSelect="SELECT a.id,b.abc12_data_phone_phone_1abc12_data_ida,a.name,b.primary_contact,b.opted_out,b.invalid,b.sel_type FROM `phone_phone` as a "
                . "     inner join abc12_data_phone_phone_1_c as b on a.id = b.abc12_data_phone_phone_1phone_phone_idb "               
                . "     where b.abc12_data_phone_phone_1abc12_data_ida ='$dataId' and b.deleted = 0" ;
        
        $out =  $db->query($sqlSelect);    
        $existPhData = array();
       
        if($db->getRowCount($out) > 0)
        {
            while($dat = $db->fetchRow($out))
            {
                $existPhData[$dat['name']] = array('id'=>$dat['id'], 'primary_contact'=> $dat['primary_contact'],'opted_out'=>$dat['opted_out'],'invalid'=>$dat['invalid'],'sel_type'=>$dat['sel_type'] );              
            }
        }
        
        return $existPhData;     
    }
    
    /*
    *
    * Mark primary number according to module and moduleId
    * @module - Contains module name
    * @beanId - Contains moduleId 
    * @phNumber - Contains phone number that we will mark as primary
    *
    */
    private function updatePrimaryNumber($module,$beanId,$phNumber)
    {
        global $db;
        $table = "";
        $column = "";
        if($module == "abc12_Data")
        {
             $table = "abc12_data";
             $column = "phone_alternate";
        }
        elseif($module == "Leads")
        {
             $table = "leads";
             $column = "phone_mobile";
        }
        
        $sql="UPDATE $table SET $column = '$phNumber' where id = '$beanId'";
          
        //echo $sql;die;
        $db->query($sql); 
    }
    
    /*
     *
    * Update status of phone number when blaster run on data module phone numbers
    * @dataId - Contains dataId
    * @jsonData - Json data contains all phone numbers according to dataId 
    * @$val['status']  -  It has three values (0,1,2) 
    *       0 indicate number is invalid number, 
    *       1 indicate number is valid number , 
    *       2 indicate we need to mark that number as primary while lead conversion
    *
    */
    private function updateDataDispositionStatus($dataId , $jsonData)
    {  
        $data = $jsonData;
        
        if(!empty($data))
        {  
            foreach($data as $val)
            {      
                $phone = $val["phone"]; 
                if($val['status'] == 2)
                {
                                                           
                    $this->updateDataDisposition($dataId,$phone); 
                   // echo $dataId;die;
                    $dataVal = $this->getDataIdData($dataId);
                    
                    //print_r($dataVal);die;
                    if(!empty($dataVal))
                    {                      
                        $this->convertToLead($dataVal);
                    }

                }
                elseif($val['status'] == 0)
                {
                    $this->updatePhoneStatusForData($dataId,$phone);
                }
            } 
        }
    }
    
    /*
    *
    * Mark data number as invalid in data according to blasterDisposition Cron
    * @dataId - Contains dataId
    * @phone - Contains phone number
    *
    */
    private function updatePhoneStatusForData($dataId,$phone)
    {
        global $db;
        
        $updateSql = "Update abc12_data_phone_phone_1_c as a inner join phone_phone "
                . " as b on a.abc12_data_phone_phone_1phone_phone_idb = b.id set a.invalid = 1,a.opted_out = 0 where b.name = '$phone' and a.abc12_data_phone_phone_1abc12_data_ida = '$dataId'";
        
       //echo $updateSql;die('nn');
        $db->query($updateSql);
    }
    
    /*
     *
    * get detail of one partcular dataId
    * @dataId - Contains dataId
    *
    */
    private function getDataIdData($dataId)
    {
       
        global $db;
        $dataSql = "select a.*,b.* from abc12_data as a inner join abc12_data_cstm as b "
                . "on a.id = b.id_c where a.id = '$dataId' and a.deleted = 0";
         //echo $dataSql;die;       
        $data = $db->query($dataSql);
        $retData = $db->fetchRow($data);
     
       // print_r($retArray);die('nn');
        return $retData;
    }
    
    private function deleteAlternatePhone($dataId)
    {
        global $db;
        $updateSql = "UPDATE abc12_data set phone_alternate = '' where id='$dataId'";
        //echo $delSql;die;
        $db->query($updateSql);
    }
    
    /*
    *
    * Update primary number based on the result of blasterDisposition Cron
    * @dataId - Contains dataId
    * @phone - Contains phone number
    *
    */
    private function updateDataDisposition($dataId,$phone)
    {
        global $db;
        $updateSql1 = "UPDATE abc12_data_phone_phone_1_c AS b
                        INNER JOIN phone_phone AS g ON b.abc12_data_phone_phone_1abc12_data_idb = g.id
                        SET b.primary_contact = 1
                        WHERE b.abc12_data_phone_phone_1abc12_data_ida ='$dataId' and g.name = '$phone'";
                
        $updateSql2 = "UPDATE abc12_data_phone_phone_1_c AS b
                        INNER JOIN phone_phone AS g ON b.abc12_data_phone_phone_1abc12_data_idb = g.id
                        SET b.primary_contact = 0
                        WHERE b.abc12_data_phone_phone_1abc12_data_ida ='$dataId' and g.name !='$phone'";
                        

        $db->query($updateSql1);
        $db->query($updateSql2);
                
    }
    
    /*
    *
    * Set request params for data to lead conversion automatically.we have set these params because we can use same manual conversion functionality when we need to convert data into lead from blasterDisposition Cron
    * @dataValues - Contains array of one data values to that we can convert data to lead with same values present in data
    *
    */
    private function convertToLead($dataValues)
    {
       
        $_REQUEST['module'] = 'abc12_Data' ;
        $_REQUEST['action'] = "ConvertData";
        $_REQUEST['record'] = $dataValues['id'];
        $_REQUEST["convert_create_Leads"] = 1;
       
        $_REQUEST['selectedLead'] = "";
        $_REQUEST['mode'] = 'auto' ;
        $_REQUEST['Leadsfirst_name'] = $dataValues['name'];
        $_REQUEST['Leadsprimary_address_street'] = $dataValues['billing_address_street'];
        $_REQUEST['Leadsprimary_address_city'] = $dataValues['billing_address_city'];
        $_REQUEST['Leadsprimary_address_state'] = $dataValues['billing_address_state'];
        $_REQUEST['Leadsprimary_address_postalcode'] = $dataValues['billing_address_postalcode'];
        $_REQUEST['Leadsprimary_address_country'] = $dataValues['billing_address_country'];
        $_REQUEST['Leadslead_source'] = $dataValues['lead_source_c'];
        $_REQUEST['Leadsaccount_name'] = $dataValues['account_name_c'];
        $_REQUEST['Leadsbusinesstype_c'] = $dataValues['businesstype_c'];
        $_REQUEST['Leadswebsite'] = $dataValues['website'];
        $_REQUEST['Leadsdesignation_c'] = $dataValues['designation_c'];
        $_REQUEST['Leadsgrade_c'] = $dataValues['grade_c'];
        $_REQUEST['Leadspan_c'] = $dataValues['pan_c'];
        $_REQUEST['Leadsvat_c'] = $dataValues['vat_c'];
        $_REQUEST['Leadscst_c'] = $dataValues['cst_c'];
        $_REQUEST['Leadstan_c'] = $dataValues[' tan_c'];
        $_REQUEST['Leadsservicetax_c'] = $dataValues['servicetax_c'];
        $_REQUEST['Leadsexcise_c'] = $dataValues['excise_c'];
        $_REQUEST['Leadsssi_c'] = $dataValues['ssi_c'];
        $_REQUEST['Leadsepf_c'] = $dataValues['epf_c'];
        $_REQUEST['Leadsyear_of_incorporation_c'] = $dataValues['yearofincorporation_c'];
        $_REQUEST['Leadsturn_over_c'] = $dataValues['turnover_c'];
        $_REQUEST['Leadsdescription'] = $dataValues['description'];
        $_REQUEST['Leadsregion_c'] = $dataValues['region_c'];
        $_REQUEST['Leadsverical1_c'] = $dataValues['vertical1_c'];
        

        
        //echo "<pre>";print_r($_REQUEST);die;
        $_POST['Leadsfirst_name'] = $dataValues['name'];
        $_POST['Leadsprimary_address_street'] = $dataValues['billing_address_street'];
        $_POST['Leadsprimary_address_city'] = $dataValues['billing_address_city'];
        $_POST['Leadsprimary_address_state'] = $dataValues['billing_address_state'];
        $_POST['Leadsprimary_address_postalcode'] = $dataValues['billing_address_postalcode'];
        $_POST['Leadsprimary_address_country'] = $dataValues['billing_address_country'];
        $_POST['Leadslead_source'] = $dataValues['lead_source_c'];
        $_POST['Leadsaccount_name'] = $dataValues['account_name_c'];
        $_POST['Leadsbusinesstype_c'] = $dataValues['businesstype_c'];
        $_POST['Leadswebsite'] = $dataValues['website'];
        $_POST['Leadsdesignation_c'] = $dataValues['designation_c'];
        $_POST['Leadsgrade_c'] = $dataValues['grade_c'];
        $_POST['Leadspan_c'] = $dataValues['pan_c'];
        $_POST['Leadsvat_c'] = $dataValues['vat_c'];
        $_POST['Leadscst_c'] = $dataValues['cst_c'];
        $_POST['Leadstan_c'] = $dataValues['    tan_c'];
        $_POST['Leadsservicetax_c'] = $dataValues['servicetax_c'];
        $_POST['Leadsexcise_c'] = $dataValues['excise_c'];
        $_POST['Leadsssi_c'] = $dataValues['ssi_c'];
        $_POST['Leadsepf_c'] = $dataValues['epf_c'];
        $_POST['Leadsyear_of_incorporation_c'] = $dataValues['yearofincorporation_c'];
        $_POST['Leadsturn_over_c'] = $dataValues['turnover_c'];
        $_POST['Leadsdescription'] = $dataValues['description'];
        $_POST['Leadsregion_c'] = $dataValues['region_c'];
        $_POST['Leadsverical1_c'] = $dataValues['vertical1_c'];
          
        
        require_once 'custom/modules/abc12_Data/views/view.convertdata.php';
        $a = new ViewConvertData();
        $a->handleSave();
      
    }

	/* Whenever a record of module is assigned to a user, 
	 * it will also get assigned to that security group of user
	 */
    function removePreviousSecurityGroup(&$bean, $event, $arguments)
    {
    	
    	if($bean->fetched_row['assigned_user_id'] != $bean->assigned_user_id)
        {
               
            global $db;   
            $dsql = "delete from securitygroups_records where record_id = '$bean->id'";
           
            $db->query($dsql); 

            $this->addModuleRecordToNewSecurityGroup($bean->assigned_user_id,$bean->id,$bean->module_dir);  
            
        }
            
    }

     private function addModuleRecordToNewSecurityGroup($userId , $moduleId, $moduleName)
     {
        global $db;
        $sql = "select id from securitygroups where assigned_user_id = '$userId'";

        $out = $db->query($sql);

        $res = $db->fetchRow($out);
		
        if(!empty($res['id']))
        {
        	$primaryId=$this->getUniqueId(); 
            $secGroupId = $res['id'];
             $upSql = "insert into securitygroups_records (id,securitygroup_id,record_id,module,date_modified,deleted) values ('$primaryId','$secGroupId','$moduleId','$moduleName',now(),0)";    
            $db->query($upSql);
        }
		


     }
	 
/* function to keep the log of all the changes	 
 * made in subpanels.
 */
	function auditRelationship(&$bean, $event, $arguments)
	{
	        
	     $name = isset($arguments['related_bean']->name)?$arguments['related_bean']->name:$arguments['related_bean']->first_name.' '. $arguments['related_bean']->last_name ;
		    $aChange = array();
            $aChange['field_name'] = $arguments['related_module'];
            $aChange['data_type'] = 'relate';
            $aChange['before'] = 'Added';
            $aChange['after'] = $name;
            // save audit entry
            $bean->db->save_audit_records($bean, $aChange);
      
	}
	function auditDeleteRelationship(&$bean, $event, $arguments)
	{
	
            // prepare an array to audit the changes in parent module’s audit table
            $aChange = array();
            $aChange['field_name'] = $arguments['related_module'];
            $aChange['data_type'] = 'relate';
            $aChange['before'] = 'Deleted';
            $aChange['after'] = $arguments['related_bean']->name;
            // save audit entry
            $bean->db->save_audit_records($bean, $aChange);
       
	}
}
