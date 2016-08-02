
 <?php
 
 $serverPrefixUrl="http://103.25.172.110:8080/p2sapi";
 if (isset($_POST ['action'])) {
      if ($_POST ['action'] == "autocomSkuDesc") {
          typeAheadSku();
        }
	  elseif ($_POST ['action'] == "fetchUom") {
          getUomList();
        }
 }
 
function typeAheadSku(){

   $longDesc = $_POST['name_startsWith'];

    $longDesc= str_replace(" ", ",", $longDesc);
    
	$categoryval=trim($_POST['category']);

    $subcategory = !empty(trim($_POST['subcategory']))? trim($_POST['subcategory']): '';
	if(strtolower($subcategory)=='all'){
		$subcategory="";
	}
    $brand = "";
    $url = 'http://103.25.172.110:8080/p2sapi/ws/v2/skuList?category=' . rawurlencode($categoryval) . '&subcategory=' . rawurlencode($subcategory) . '&brand=' . rawurlencode($brand) . '&longdesc=' . rawurlencode($longDesc) . '&pageIndex=0&pageSize=50';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "website:p2sWebs!te");
    // receive server response ...
    $output = curl_exec($ch);


    $result = json_decode($output);
    echo(json_encode($result->Data));
    exit;
    
}

function getUomList(){
    global $serverPrefixUrl;
    $category = $_POST['category'];
    $url = $serverPrefixUrl."/ws/v3/uomList?category=".rawurlencode($category);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "website:p2sWebs!te");

    // receive server response ...
    $output = curl_exec($ch);
    $result = json_decode($output);
    $uom=array();
    if(sizeof($result->Data)>0) {
        foreach ($result->Data as $key => $value) {
            $uom[] = $value->Code;

        }
    }
    echo(json_encode($uom));

    exit;
}

?>