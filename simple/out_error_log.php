<?php

/*
	找出日志中包括error的信息
*/
	$source_log="c1.log";
	$det_error_log="error.log";
	
	$fslog = fopen($source_log,"r") or die("Unable to open source_log!");
	$fdlog = fopen($det_error_log,"w+")or die("Unable to open det_error_log!");
	
		while(!feof($fslog)){
			// echo fgets($fslog,4096);#读取字节数
			$row = fgets($fslog);#单行文本
			if(stristr($row,"ERROR")){
				fputs($fdlog,$row);
			}
		}
		
	fputs($fdlog,"--test-end \n");
	
	fclose($fslog);
	fclose($fdlog);
?>