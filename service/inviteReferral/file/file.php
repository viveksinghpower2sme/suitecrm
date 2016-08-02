<?php
require('excelread/php-excel-reader/excel_reader2.php');
require('excelread/SpreadsheetReader.php');
include 'dataDuplicacy.php';



class File
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

        if (isset($_POST["submit"])) {
            $this->upload_file($_FILES);
			 $folderpath = '/storage/';
   			 $this->excel_read($folderpath);
			
        }

    }

    public function permissionToFile($filename){
        global $excelfields;

         $Filepath=__DIR__.'/../storage/';

        exec("sudo chmod -R 777 $Filepath");
        //exec("chown administrator:administrator $Filepath");



    }
    public function upload_file($filearray)
    {   $storagename = $_FILES["file"]["name"];
             if ( isset($_FILES["file"])) {
                //if there was an error uploading the file
                if ($_FILES["file"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

                }
                else if(strtolower(substr($storagename,-4))!='.csv'){

                    echo "Invalid File Format, Please upload CSV";

                }
                else {

                    if (file_exists("storage/" . $_FILES["file"]["name"])) {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    }
                    else {
                        //Store file in directory "upload" with the name of "uploaded_file.txt"
                        move_uploaded_file($_FILES["file"]["tmp_name"], "storage/" . $storagename);
                        echo "File is uploaded in: " . "storage/" . $_FILES["file"]["name"] . "<br />";
                    }
                }
            }
            else {
                echo "No file selected <br />";
            }


       $this->permissionToFile($filearray['file']['name']);




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
          //return rmdir($path);
        }

        else if (is_file($path) === true)
        {
            $this->csv_to_db($path);
            return unlink($path);

        }

        return false;
    }
    function csv_to_db($Filepath)

    {

        global $dbconn;
         $InviteArrayList= array();

           $count=0;
            $keys="";
            $keysArray=array();
            $Time = microtime(true);
        $file_handle = fopen($Filepath, 'r');
        while (!feof($file_handle)) {
            $Row = fgetcsv($file_handle, 1024);

            if ($Row) {

                $valuesArray = array();

                if ($count == 0) {
                    $keysArray = $Row;
                    $keys = implode(",", $Row);

                } else {

                    $valuesArray = $Row;
                    $excelArray = array_combine($keysArray, $valuesArray);
                    if(isset($excelArray['Event']) && ($excelArray['Event'] =='sale')){
                        $count++;
                        continue;
                    }

                    $dupobj = new checkExistenceInCrm();
                    $processedData = $dupobj->Process($excelArray);

                    if ($processedData['childStatus'] == 'existing') {
                        $count++;
                        continue;
                    } else {
                    
                        $InviteArrayList[] = $processedData;

                    }

                }
                $count++;
            }
        }

        fclose($file_handle);

        if(!empty($InviteArrayList)) {
        	
            $this->SendMailForApprovel($InviteArrayList);
        }
        unlink($Filepath);
        die;
    }

         function  SendMailForApprovel($InviteArrayList){
            global $MMMIP;
             $message="";
             foreach($InviteArrayList as $key=>$value){
                 if(!empty($value['Referee Name'])){
                     $childName=trim($value['Referee Name']);
                 }
                 elseif(!empty($value['Referee'])){
                     $childName=trim($value['Referee']);
                 }
                 else{
                     $childName=trim($value['Campaign']);

                 }
                 if(!empty($value['Referrer Name'])){
                     $parentName=trim($value['Referrer Name']);
                 }
                 elseif(!empty($value['Referrer'])){
                     $parentName=trim($value['Referrer']);
                 }
                 else{
                     $parentName=trim($value['Campaign']);

                 }

                 $message.='<msg><linkreferrer>http://'.$_SERVER['SERVER_NAME'].'/index.php?module=Accounts&amp;view=Detail&amp;record='.$value['parentId'].'</linkreferrer>
                 <referrer>'.$parentName.'</referrer>
                 <linkreferee>http://'.$_SERVER['SERVER_NAME'].'/index.php?module=Accounts&amp;view=Detail&amp;record='.$value['childId'].'</linkreferee>
                 <referee>'.$childName.'</referee>
                 </msg>';

             }

            $xml_data =urlencode('<payload><object>organisation</object><event>Invite Referral</event>'.$message.'</payload>');
            $Curlurl = $MMMIP."/openbd/mq/endpoint.cfc?method=enqueue&payload=".$xml_data ;
             file_put_contents('mmmlogs.txt', date('d/m/Y h:i:s').PHP_EOL , FILE_APPEND);
             file_put_contents('mmmlogs.txt', $Curlurl.PHP_EOL , FILE_APPEND);

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
             file_put_contents('mmmlogs.txt', $result.PHP_EOL , FILE_APPEND);

            curl_close($ch);

    }


}

?>