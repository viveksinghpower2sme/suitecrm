<?php


if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('custom/include/global_logic_hook.php');

class CallsJjwg_MapsLogicHook extends globalLogicHook {
    
     function updateActivityStatus(&$bean, $event, $arguments) {
        // after_save

    $info =$this->getModuleId($bean->id);
	$file = fopen("/tmp/test.txt","w");
echo fwrite($file,$info);
fclose($file);
    
    if(!empty($info)){
       $this->getPreviousActivities($info);
    }
         
 }
    function updateAlert(&$bean, $event, $arguments){
     global $db;
  
	  global $sugar_config;
	  if(in_array($bean->lead_source_c,$sugar_config['hotlead']))
          {
              if($bean->status=='Planned'){
                 $sqlSelect="select parent_id from alerts where parent_id='".$bean->id."'";
                   $sqlSelectQuery = $db->query($sqlSelect);
                   $row = $db->fetchByAssoc($sqlSelectQuery);
                   
                   $url = "index.php?action=DetailView&module=Calls&record=".$bean->id;
                   $userId= $_SESSION['authenticated_user_id'];
                   $primaryId=$this->getUniqueId();
                   if(empty($row)){
                        $sqlInsert="insert into alerts (id,name,date_entered,date_modified,modified_user_id,created_by,description,assigned_user_id,is_read,target_module,type,url_redirect,parent_id)
                                Values('".$primaryId."','".$bean->name."',NOW(),NOW(),'".$userId."','".$userId."','".$bean->description."','".$bean->assigned_user_id."','0','Calls','info','".$url."','".$bean->id."')";
                   
                        $db->query($sqlInsert);
                   }

              }
              else{
                  $query="update alerts set is_read=1, deleted =1 where parent_id='".$bean->id."'";
                   $db->query($query);
              }
              
          }
    
    
    
}
   
    


function getModuleId($activityId){
    global $db;

$dataQuery="SELECT abc12_data_calls_1abc12_data_ida 
FROM  abc12_data_calls_1_c where  abc12_data_calls_1calls_idb = '".$activityId."'";
$querydata=$db->query($dataQuery);
$rowdata = $db->fetchByAssoc($querydata);

if(isset($rowdata['abc12_data_calls_1abc12_data_ida']) && !empty($rowdata['abc12_data_calls_1abc12_data_ida']))
{
    $info['module']="abc12_Data";
    $info['id']=$rowdata['abc12_data_calls_1abc12_data_ida']; 
     $info['activityId']=$activityId;    

    return $info;

    
}
usleep(50000);
//$activityId = 'ea5f1b18-613a-c29b-d568-5731da19445f';
$leadQuery="select SQL_NO_CACHE parent_id,name from calls where id ='".$activityId."'";
  
$querylead=$db->query($leadQuery);
$rowlead = $db->fetchByAssoc($querylead);
 
if(isset($rowlead['parent_id']) && !empty($rowlead['parent_id']))
{
    $info['module']="Leads";
    $info['id']=$rowlead['parent_id'];  
    $info['activityId']=$activityId;
	$info['phone_number']=$rowlead['name'];   

    return $info;
   
}
$contactQuery="select contact_id from calls_contacts where call_id ='".$activityId."'";

$querycontact=$db->query($contactQuery);
$rowcontact = $db->fetchByAssoc($querycontact);

if(isset($rowcontact['contact_id']) && !empty($rowcontact['contact_id']))
{
    $info['module']="Contacts";
    $info['id']=$rowcontact['contact_id'];    
     $info['activityId']=$activityId;    

    return $info;

    
}


}


function getpreviousActivities($info){
      
    global $db;
    if($info['module']=='abc12_Data'){
        
         $dataQuery='update abc12_data_calls_1_c dcr 
inner join calls on calls.id = dcr.abc12_data_calls_1calls_idb 
set calls.status="Not Held",calls.date_modified =NOW()
where dcr.abc12_data_calls_1abc12_data_ida ="'.$info['id'].'"
and dcr.abc12_data_calls_1calls_idb <> "'.$info['activityId'].'" and calls.status="Planned" and dcr.deleted=0 ';

        $query2=$db->query($dataQuery);


    }
        elseif ($info['module']=='Leads') {


           $selectLeadQuery='select id from calls where calls.parent_id ="'.$info['id'].'"
                    and calls.id <>"'.$info['activityId'].'" and calls.status="Planned" and calls.deleted=0 and
                    calls.name="'.$info['phone_number'].'"';
               

//$file =fopen();

           
           $selectEx=$db->query($selectLeadQuery);
          
   $selStr='';
          if($db->getRowCount($selectEx) >0){
              
            while($selectResult=$db->fetchByAssoc($selectEx)){
                $selStr.="'".$selectResult['id']."',";
            }
            
            $selStr = rtrim($selStr,",");
 
            
            
                    $leadQuery="update calls set calls.status='Not Held',calls.date_modified =NOW()
                        where id IN (".$selStr.")";
           
                     $file =  fopen("/tmp/alert.txt", 'w');
$file = fwrite($file,$leadQuery);
fclose($file);
  
                 $db->query($leadQuery);
                 $alertQuery="update alerts set deleted=1 , is_read=1 where parent_id IN (".$selStr.")";
                 
                 
                 $db->query($alertQuery);
                  
    

          
          }

        
    }
    elseif ($info['module']=='Contacts') {
        
       
           $selContactQuery='select call_id from calls_contacts ccr 
inner join calls on calls.id = ccr.call_id 
where ccr.contact_id ="'.$info['id'].'" and ccr.deleted=0
and ccr.call_id <>"'.$info['activityId'].'" and calls.status="Planned"';
           
//           $file=fopen("/tmp/alert12.txt",'w');
//        fwrite($file,$selContactQuery);
//        fclose($file);
//        
          
 $selectCon = $db->query($selContactQuery);
 $selConStr='';
  if($db->getRowCount($selectCon) >0){
            while($selectResult=$db->fetchByAssoc($selectCon)){
                 $selConStr.="'".$selectResult['call_id']."',";
            }
        $selConStr = rtrim($selConStr,",");
 
                    $updateContactQuery="update calls set calls.status='Not Held',calls.date_modified =NOW() where id IN (".$selConStr.")";
              
                 $db->query($updateContactQuery);
                 $alertQuery="update alerts set deleted=1 , is_read=1 where parent_id IN (".$selConStr.")";
                  $db->query($alertQuery);
                 
          
          }

 
    }
    
}
 private function getUniqueId()
    {
        global $db;
     
        $a = $db->query("select UUID() as uid");
        $uid = $db->fetchRow($a);
        return $uid['uid'];
    }




}
