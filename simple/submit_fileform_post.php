<?php
/*
	通过post 上传文件，文件路径必须是绝对路径，前面加@符号
*/
	$post = array("uploadedfile"=>"@".$file_path_name_of_file);
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$form_action_URL);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFILEDS,$post);
	$response = curl_exec($ch);
	
?>