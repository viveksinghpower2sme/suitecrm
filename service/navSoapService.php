<?php
class navSoapService extends SoapClient
{
    function __doRequest( $request, $location, $action, $version, $one_way = 0 ) {

        global $namespace;

        // Here we remove the ns1: prefix and remove the xmlns attribute from the XML envelope.
        $request = str_replace( '<ns1:', '<', $request );
        $request = str_replace( '</ns1:', '</', $request );
        $request = str_replace( ' xmlns:ns1="' . $namespace . '"', '', $request );
	
        return parent::__doRequest( $request, $location, $action, $version, $one_way = 0 );

    }

    function __getLastRequest() {
    	
        return parent::__getLastRequest();
    }
}
function navApiService($params,$navfun){
	
	$client = new navSoapService('http://192.168.1.46:7047/DynamicsNAV70/WS/BEBB_India/Codeunit/RFQCreation?wsdl', array('exceptions' => 0,
        'login' => 'Bi00257',
        'password' => 'Admin@1234',
        'trace' => 1
   	 )
	);
	echo'<pre>';
	print_r($params);

	 /* Invoke webservice method with your parameters, in this case: Function1 */
	$response = $client->__soapCall($navfun,$params);
	$response1=$client->__getLastRequest();
		echo'<pre>';

	print_r($response1);
	$response2=$client->__getLastResponse();
	// echo'<pre>';
		// print_r($response1);


	return($response2);
	
} 




?>

