<?php
	/*
		将现在的html文件进行压缩
	*/
include("../util/LIB_http.php");

$target  = "http://www.schrenk.com";
$ref = "";
$method = "GET";
$data_array = "";
$web_page = http_get($target,$ref,$method,$data_array,EXCL_HEAD);

$uncompressed_size = strlen($web_page['FILE']);
$compressed_size = strlen(gzcompress($web_page['FILE'],$compression_value=9));
$noformat_size = strlen(strip_tags($web_page['FILE']));
// echo $target;
// echo $uncompressed_size ."\n";
// echo $compressed_size;
?>

<table border='1'>
	<tr>
		<th colspan='3'>Compression report for <?php echo $target;?></th>
	</tr>
	<tr>
		<th>Uncompressed</th>
		<th>Compressed</th>
		<th>noformat_size</th>
	</tr>
	<tr>
		<td align="right"><?php echo $uncompressed_size;?>bytes</td>
		<td align="right"><?php echo $compressed_size;?>bytes</td>
		<td align="right"><?php echo $noformat_size;?>bytes</td>
	</tr>
</table>