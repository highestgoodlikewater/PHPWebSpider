<?php
	/*
		LIB_resolve_addresses.php 函数测试
	*/

	include("../util/LIB_resolve_addresses.php");
	
	$url_1 = "http://www.bruceyoo.com/";
	$url_2 = "http://www.bruceyoo.com/image/";
	$url_3 = "http://www.bruceyoo.com/image/index.html";
	$url_4 = "http://";
	$url_5 = "http://www.burceyoo.com/index.html";
	$url_6 = "www.burceyoo.com/index.html";
	
	echo "$url_1 base_page: ".get_base_page_address($url_1) ."\n";
	echo "$url_2 base_page: ".get_base_page_address($url_2) ."\n";
	echo "$url_3 base_page: ".get_base_page_address($url_3) ."\n";
	echo "$url_4 base_page: ".get_base_page_address($url_4) ."\n";
	echo "$url_5 base_page: ".get_base_page_address($url_5) ."\n";
	echo "$url_6 base_page: ".get_base_page_address($url_6) ."\n";
	
	echo "--------------------------------------------------------\n";
	
	/*
		应该使用base_page_address 测试直接使用原url address
	*/
	echo "$url_1 base_domain: ".get_base_domain_address($url_1) ."\n";
	echo "$url_2 base_domain: ".get_base_domain_address($url_2) ."\n";
	echo "$url_3 base_domain: ".get_base_domain_address($url_3) ."\n";
	// echo "url_4 base_domain: ".get_base_domain_address($url_4) ."\n"; #会报错，看可以继续运行返回为空
	echo "$url_5 base_domain: ".get_base_domain_address($url_5) ."\n";
	echo "$url_6 base_domain: ".get_base_domain_address($url_6) ."\n";
	
	echo "--------------------------------------------------------\n";
	
	$link_1 = "../image/book1.jpg";
	$link_2 = "./image/book2.jpg";
	$link_3 = "/image/book3.jpg";
	$link_4 = "image/book4.jpg";
	$base_url = "http://bruce.com.cn/book/sale/";
	echo "base_url:". $base_url."\n";
	echo "$link_1 resolve_address:".resolve_address($link_1,$base_url) ."\n";
	echo "$link_2 resolve_address:".resolve_address($link_2,$base_url) ."\n";
	echo "$link_3 resolve_address:".resolve_address($link_3,$base_url) ."\n";
	echo "$link_4 resolve_address:".resolve_address($link_4,$base_url) ."\n";
	
	echo "--------------------------------------------------------\n";
?>