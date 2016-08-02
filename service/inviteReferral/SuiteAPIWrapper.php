<?php

include "Request.php";
include "log.php";
//include "../config.php";

class SuiteAPIWrapper
{
	
	private $url = "http://192.168.1.16/suitecrm/service/v2/rest.php";
	private $Req = '';
	private $aLoginResp = '';
	private $ObjLog = '';
	public function SuiteAPIWrapper($ComponentName,$LogPath,$Mode,$session_id,$username, $password)
	{
		$this->Req=new Request('/tmp/api.txt');
		//$a=new Log($ComponentName,$LogPath,$Mode,$session_id);
		
		$this->ObjLog = new Log($ComponentName,$LogPath,$Mode,$session_id);
		$this->CRMLogin($username, $password);
		
		
	}
	
	private function CRMLogin($username, $password)
	{	
		 $loginApiData='method=login&input_type=json&encryption=PLAIN&response_type=json&rest_data=[{"password":"'.$password.'","user_name":"'.$username.'","encryption":"PLAIN"},"javascriptTest"]';

		
		$Resp = $this->Req->post($this->url,$loginApiData);
		
		$this->aLoginResp=json_decode($Resp);
		
		if(empty($this->aLoginResp->id))
		{
			$this->ObjLog->WriteLog('WARNING','CRMLogin',$this->aLoginResp->name);
			return false;
		}
		else 
		{
			$sessionID=$this->aLoginResp->id;
			$this->ObjLog->WriteLog('info','CRMLogin',$this->aLoginResp->name_value_list->user_name->value);
		}
	}
//creating data function;
	public function CreateData($arrData)
	{
		$str1 = '';
		foreach($arrData as $key => $val)
		{
			
			$str1 .= '{"name":"'.$key.'","'.'value":"'.$val.'"},';
		}
			$STR1=rtrim($str1, ",");

		$CreateDataAPI=''.$STR1;
		
		$Resp = $this->Req->post($this->url,$CreateDataAPI);
	
		if($Resp)
		{
		$this->ObjLog->WriteLog('info','data is send -- '.$STR1);
		}		
		
		if($this->Req->Error != 200)
		{
			$this->ObjLog->WriteLog('ERROR','CreateData','Error encountered - '.$this->Req->Error );
		}
		
		
	}

	public function CheckPhone($phone_num)
	{
		
		$url = "http://192.168.1.16/suitecrm/service/checkPhone1.php?data=$phone_num";
		$Resp = $this->Req->get($url);
		if($this->Req->Error != 200)
		{
			$this->ObjLog->WriteLog('ERROR','CheckPhone','Error encountered - '.$this->Req->Error );
		}
		return $Resp;
	}	
	
	public function CreateLead($arrData)
	{
		//echo "jyti";
		//$CreateLeadAPI='method=set_entry&input_type=json&response_type=json&rest_data=["o449m15ul1ka2hrk98ir0qbn34","Leads" ,';
		//'[{"name":"id","value":"9a749af6-8a05-82e2-6882-56fb5f74e7c7"},{"name":"status","value":"valid"}]]';
		$str = '';
		foreach($arrData as $key => $val)
		{
			
			$str .= '{"name":"'.$key.'","'.'value":"'.$val.'"},';
		}
		$STR=rtrim($str, ",");

		$CreateLeadAPI='method=set_entry&input_type=json&response_type=json&rest_data=["'.$this->aLoginResp->id.'","Leads" ,['.$STR.']]&type=create_lead';
		//print_r($CreateLeadAPI);
		//die;

		echo $Resp = $this->Req->post($this->url,$CreateLeadAPI);
	}	
	
	
}
//$session_id=mt_rand();

//$obj1=new SuiteAPIWrapper('Test','/var/www/test',2,$session_id,'admin','admin')

?>
