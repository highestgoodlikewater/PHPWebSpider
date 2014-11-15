<?php 
/*
通过Lib_http:将获取网页文件到数组的制定key指中
http_get_withheader:获取有头信息的网页
*/

	include("../util/LIB_http.php");
	$target="http://www.schrenk.com/publications.php";
	$ref = "http://www.schrenk.com";
	
	$return_array = http_get_withheader($target,$ref);
	
	echo "FILE CONTENTS \n";
	var_dump($return_array['FILE']);
	echo "ERROR \n";
	var_dump($return_array['ERROR']);
	echo "STATUS \n";
	var_dump($return_array['STATUS']);
	
?>