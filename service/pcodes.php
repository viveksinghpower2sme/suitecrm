<?php
echo $state = $_REQUEST['state'];
if(!empty($state))
{
	
	$array['Mumbai'] = 'Mumbai';
	
	$array['Ghaziabad'] = 'Ghaziabad';
	
	$array['Meerut'] = 'Meerut';
	
	$array['Delhi'] = 'Delhi';
	
	$array['Agra'] = 'Agra';
	
	$array['Varanasi'] = 'Varanasi';
	
	$array['Gurgaon 1'] = 'Gurgaon 1';	
}
else {
	$array[123234] = 123234;
	$array[123232] = 123232;
	$array[123235] = 123235;
	$array[123238] = 123238;
	$array[123223] = 123223;
	$array[123134] = 123134;
	$array[133234] = 133234;
	$array[183234] = 183234;
	$array[183134] = 183134;
	$array[183434] = 183434;
	$array[123234] = 123234;
	$array[173234] = 173234;
	$array[183134] = 183134;
	$array[103234] = 103234;
	

	
	
}

echo json_encode($array);

?>