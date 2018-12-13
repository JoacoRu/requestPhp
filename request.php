<?php
//OPCION 1
function callToApi($page,$datos)
{

    $url = $page;
  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos) );
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($result);
    echo "<pre>";
    print_r( $data);
    
}


//OPCION 2
 function api($url, $params = []) {

	try {
		$ch = curl_init( $url );
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params) );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		$body = curl_exec($ch);
		curl_close($ch);
	} catch (Exception $e) {
		return $e;
	}

	if($body){
        $res = json_decode($body, 1);
        echo "<pre>";
        print_r($res);

		if($res["status"]=="error"){
			// ... *error
		}
		if($res["status"]=="success"){
			// ... ok!
		}

	} else {
		// ... falló
	}
}





api();

?>