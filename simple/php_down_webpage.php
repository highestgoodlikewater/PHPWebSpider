<?php
/*
########################################################################     
通过 php fopen 和 file 对网页进行打印
fopen ：通过句柄单行获取网页，需要对网页句柄进行手动关闭；
file ： 将网页文件一次下载到数组中，无需手动关闭；
########################################################################                                        
*/
	
	$target = "http://webbotsspidersscreenscrapers.com/hello_world.html";
	// $target = "http://www.pansky.com.cn/";
	
	//fopen =========》》
	/*
	$file_handle = fopen($target,"r");
	while(!feof($file_handle)){
		echo fgets($file_handle,4096);
	}
	fclose($file_handle);
	*/
	
	//file ==========》》
	/*
	$downloaded_page_array=file($target);
	for($i=0;$i<count($downloaded_page_array);$i++){
		echo $downloaded_page_array[$i];
	}
	*/
?>