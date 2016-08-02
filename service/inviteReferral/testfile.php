<?php
require('excelread/php-excel-reader/excel_reader2.php');
require('excelread/SpreadsheetReader.php');
include 'config.inc.php';
include 'dataDuplicacy.php';



class testfile
{
    public $Name;
    public $tplData;

    public function setTemplate()
    {
        $this->tplData = file_get_contents(TEMPLATE);
    }

    public function Process($request)
    {
        $vars = array(
            '{Name}' => "UPLOAD FORM"

        );
        echo strtr($this->tplData, $vars);
        if(isset($_FILES['file_upload']))
            $this->upload_file($_FILES);

        if($request['uploadInDb']==1){
            $this->excel_read('./storage');
        }

    }
    private function validateExcel($filetype){
        if($filetype != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' && $filetype !='application/vnd.ms-excel'){
            die('Unsupported filetype uploaded.');
        }


    }
    public function validateFields($filename){

        global $excelfields;

        $Filepath=__DIR__.'/../storage/'.$filename;
        exec("chmod  0777 $Filepath");
        exec("chown administrator:administrator $Filepath");


        $Spreadsheet = new SpreadsheetReader($Filepath);

        $BaseMem = memory_get_usage();

        $Sheets = $Spreadsheet -> Sheets();
        $keysArray=array();

        foreach ($Sheets as $Index => $Name)
        {

            $Time = microtime(true);
            $Spreadsheet -> ChangeSheet($Index);
            foreach ($Spreadsheet as $Key => $Row)
            {
                if ($Row)
                {

                    $keysArray=$Row;
                }
                break;
            }

        }
        if($keysArray){
            die("File uploaded successfully");

        }
        else{
            unlink($Filepath);
            die('Excel file format is not valid');

        }




    }
    public function upload_file($filearray)
    {

        if($filearray['file_upload']['error'] > 0){
            die('An error ocurred when uploading.');
        }
        //format check
        $this->validateExcel($filearray['file_upload']['type']);


        if(!move_uploaded_file($filearray['file_upload']['tmp_name'], 'storage/' . $filearray['file_upload']['name'])){
            die('Error uploading file - check destination is writeable.');
        }


        $this->validateFields($filearray['file_upload']['name']);




    }
    public function excel_read($path)
    {
        $StartMem = memory_get_usage();

        try
        {

            $this->readFolder($path);
        }
        catch (Exception $E)
        {
            echo $E -> getMessage();
        }


    }
    function readFolder($path)
    {
        if (is_dir($path) === true)
        {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file)
            {
                $this->readFolder(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        }

        else if (is_file($path) === true)
        {
            $this->excel_to_db($path);
            return unlink($path);

        }

        return false;
    }
    function excel_to_db($Filepath)
    {   global $dbconn;
        $InviteArrayList= array();

        $Spreadsheet = new SpreadsheetReader($Filepath);
        $BaseMem = memory_get_usage();
        echo($Filepath);die;

        $Sheets = $Spreadsheet -> Sheets();

        foreach ($Sheets as $Index => $Name)
        {
            $count=0;
            $keys="";
            $keysArray=array();
            $Time = microtime(true);
            $Spreadsheet -> ChangeSheet($Index);
            foreach ($Spreadsheet as $Key => $Row)
            {
                if ($Row)
                {

                    $valuesArray=array();

                    if ($count == 0) {
                        $keysArray=$Row;
                        $keys = implode(",", $Row);

                    }

                    else {

                        $valuesArray=$Row;
                        $excelArray=array_combine($keysArray,$valuesArray);
                        print_r($excelArray);die;

//                        $data=array();
//                        $data['Campaign']="new friends";
//                        $data['Referrer Name']="Gaurav Jain";
//                        $data['ReferrerPhone']="8800534394";
//                        $data['ReferrerEmail']="gaurav@gmail.com";
//                        $data['orderId']="12323423";
//
//                        $data['Name']="Waseem";
//                        $data['Email']="Wassrrrsseem89@gmail.com";
//                        $data['Mobile']="9878804796";


                        $dupobj=new dataDuplicacy();
                        $processedData= $dupobj->Process($excelArray);

                        if($processedData['childStatus']=='Active'){

                            continue;
                        }
                        else{
                            $leadSource='Referral'."_".$processedData['Campaign'];
                            $sqlChildUpdate = "update vtiger_accountscf SET cf_1039 ='".trim($processedData['Referrer Name'])."', cf_1041 ='".($processedData['parentId'])."', cf_787= '".$leadSource."',cf_1047=cf_1047 + 1, cf_orderid='".$processedData['orderId']."'  where accountid ='".$processedData['childId']."' ";
                            $resultVertical = $dbconn->query($sqlChildUpdate);


                            $sqlVoucherValidity = "insert into cust_voucher_validity (account_id,status) VALUES ('".$processedData['childId']."','available')  ";
                            $resultVertical = $dbconn->query($sqlVoucherValidity);
                            $InviteArrayList[]=$processedData;


                        }

                    }
                    $count++;
                }

            }

        }
        //    $this->SendMailForApprovel($InviteArrayList);
        unlink($Filepath);
        die;
    }

    function  SendMailForApprovel($InviteArrayList){
        global $MMMIP;
        //  print_r($InviteArrayList);

        $message="";
        foreach($InviteArrayList as $key=>$value){
            $message.=$value['Referrer Name']."(".$value['ReferrerEmail'].") has referred". $value['Name']."(".$value['parentId'].") \n";
        }

        $xml_data =urlencode('<payload><object>organisation</object><event>Invite Referral</event><msg>$message</msg></payload>');
        $Curlurl = $MMMIP."/openbd/mq/endpoint.cfc?method=enqueue&payload=".$xml_data ;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Curlurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'Connection: Keep-Alive'
        ));
        curl_setopt($ch, CURLOPT_USERPWD, "website:p2sWebs!te");
        curl_setopt($ch, CURLOPT_POST, 1);

        $result = curl_exec($ch);
        curl_close($ch);

    }


}

?>