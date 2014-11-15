<?php
	
	include("../util/LIB_http.php");
	
	$action = "http://www.schrenk.com/search.php";
	$method="GET";
	$ref="";
	$data_array['term']="hello";
	$data_array['sort']="up";
	$response = http($target=$action,$ref,$method,$data_array,EXCL_HEAD);
	
	echo $response['FILE'];
	
?>