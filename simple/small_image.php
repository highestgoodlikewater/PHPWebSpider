<?php
	/*
		通过lib_thumbnail.php 生成图片的缩略图
	*/
	
	include("../util/LIB_thumbnail.php");
	include("../util/LIB_http.php");
	
	$target = "http://www.schrenk.com/north_beach.jpg";
	$ref = "";
	$method = "GET";
	$data_array = "";
	$image = http_get($target,$ref,$method,$data_array,EXCL_HEAD);
	
	$handle = fopen("test.jpg","w");
	fputs($handle,$image['FILE']);
	fclose($handle);
	
	$org_file = "test.jpg";
	$new_file_name = "small_image.jpg";
	
	$max_width=90;
	$max_heigth=90;
	
	create_thumbnail($org_file,$new_file_name,$max_width,$max_heigth);
?>

FULL-SIZE IMAGE<br>
<img src = "test.jpg">
<p>
SMALL_IMAGE<br>
<img src="small_image.jpg">