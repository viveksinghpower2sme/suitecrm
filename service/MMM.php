<?php

class MMM
{
	function payload($xml_data,$quoteNumber,$rfqStage)
	{
		
		$url = "http://103.25.172.110:8080/openbd/mq/endpoint.cfc?method=enqueue&payload=".urlencode($xml_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'Connection: Keep-Alive'
        ));
        curl_setopt($ch, CURLOPT_USERPWD, "website:p2sWebs!te");
        curl_setopt($ch, CURLOPT_POST, 1);

        $result = curl_exec($ch);

        file_put_contents('/var/www/html/suitecrm/custom/modules/AOS_Quotes/mmmlogs.txt', date('d/m/Y h:i:s').PHP_EOL , FILE_APPEND);
        file_put_contents('/var/www/html/suitecrm/custom/modules/AOS_Quotes/mmmlogs.txt', "Quote Number :".$quoteNumber.PHP_EOL , FILE_APPEND);
        file_put_contents('/var/www/html/suitecrm/custom/modules/AOS_Quotes/mmmlogs.txt', "Stage :".$rfqStage.PHP_EOL , FILE_APPEND);
        file_put_contents('/var/www/html/suitecrm/custom/modules/AOS_Quotes/mmmlogs.txt', "Request : ".$url.PHP_EOL , FILE_APPEND);
        file_put_contents('/var/www/html/suitecrm/custom/modules/AOS_Quotes/mmmlogs.txt', "Response : ".$result.PHP_EOL , FILE_APPEND);
	}
}



?>
