<?php
/*
	通过正则表达式获取字符串中的所有电话号码，以北美电话号码为例
*/

$test_telnum = "Example #01:100 000 0001
				Example #02:200 010-0002
				Example #03:300.010.0003
				Example #04:400 000 0004.
				Example #05:<td>500 000-0005</td>
				Example #06:<li>600.111.0006</li>
				Example #07:(700) 111 0007
				Example #08:(800) 111-0008
				Example #09:(900) 111.0009
				Example #10:(111) 222 0010.
				Example #11:(222) 222-0011.
				Example #12:(333) 222.0012.";
				
/*
	\d{3} 三位数字
	(\D)  单个非数字字符
	\d{4} 四位数字
*/
 $pattern_ko = "\d{3}(.)\d{3}(.)\d{4}";#匹配无括号
 $pattern_k="\(\d{3}\)(.)\d{3}(.)\d{4}";#匹配有括号
 $pattern = "/(".$pattern_ko."|".$pattern_k.")/";
 preg_match_all($pattern,$test_telnum,$matches_array);
 
 var_dump($matches_array[0]);
 
?>