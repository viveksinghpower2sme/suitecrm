
<?php
class Log
{
    private $ComponentName ='';
    private $LogPath ='';
    private $Mode = 3; //1= Debug+Warning+Error, 2 = Warning+Error+Info, 3 = Error+warning
    private $fp = '';
    private $session_id='';
    public function Log($ComponentName,$LogPath,$Mode,$session_id)
    {
		$this->ComponentName=$ComponentName;
		$this->LogPath=$LogPath;
		$this->Mode=$Mode;
		$this->session_id=$session_id;
		$this->SetErrorLogPath();
	
    }
    private function SetErrorLogPath()
    {

		$FIleName = $this->LogPath.'/'.$this->ComponentName.'.log';		
		$this->fp = fopen($FIleName, "a+");
			
    }
    public function WriteLog($Type, $MethodName,$errormess)
    {
	$date = date('Y-m-d H:i:s');
	$bt = debug_backtrace();

	$caller = array_shift($bt);

	
	$caller['date']=$date;
	if($this->Mode == 3)
	{

		if($Type=='ERROR'or $Type=='WARNING')
		{
			fwrite($this->fp,'['.$caller['date'].']'."\t ".'['.$this->session_id.']'."\t ".'['.$Type.']'."\t ".'['.$this->ComponentName.']'."\t ".'[FILENAME='.$caller['file'].']'."\t ".'['.$MethodName.']'."\t ".'[LINENO='.$caller['line'].']'."\t "."\n");
		}
		
	}       
	elseif($this->Mode == 2)
	{
	
		if($Type=='WARNING' or $Type=='ERROR' or  $Type=='INFO' )
		{		
			fwrite($this->fp,'['.$caller['date'].']'."\t ".'['.$this->session_id.']'."\t ".'['.$Type.']'."\t ".'['.$this->ComponentName.']'."\t ".'[FILENAME='.$caller['file'].']'."\t ".'['.$MethodName.']'."\t ".'[LINENO='.$caller['line'].']'."\t "."\n");
		}
		
		
		
	}	
	elseif($this->Mode == 1)
		
	{	
		if($Type=='DEBUG' or $Type=='WARNING' or $Type=='ERROR')
		{
			fwrite($this->fp,'['.$caller['date'].']'."\t ".'['.$this->session_id.']'."\t ".'['.$Type.']'."\t ".'['.$this->ComponentName.']'."\t ".'[FILENAME='.$caller['file'].']'."\t ".'['.$MethodName.']'."\t ".'[LINENO='.$caller['line'].']'."\t "."\n");
		}
		
	}
    }		

}



?>

