<?php
/*
########################################################################
W3C? SOFTWARE NOTICE AND LICENSE
http://www.w3.org/Consortium/Legal/2002/copyright-software-20021231
This work (and included software, documentation such as READMEs, or other related items) is being 
provided by the copyright holders under the following license. By obtaining, using and/or copying 
this work, you (the licensee) agree that you have read, understood, and will comply with the following 
terms and conditions.

Permission to copy, modify, and distribute this software and its documentation, with or without modification, 
for any purpose and without fee or royalty is hereby granted, provided that you include the following on 
ALL copies of the software and documentation or portions thereof, including modifications:

    1.The full text of this NOTICE in a location viewable to users of the redistributed or derivative work.

    2.Any pre-existing intellectual property disclaimers, notices, or terms and conditions. If none exist, 
    the W3C Software Short Notice should be included (hypertext is preferred, text is permitted) within the 
    body of any redistributed or derivative code.

    3.Notice of any changes or modifications to the files, including the date changes were made. (We recommend 
    you provide URIs to the location from which the code is derived.)

THIS SOFTWARE AND DOCUMENTATION IS PROVIDED "AS IS," AND COPYRIGHT HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, 
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY OR FITNESS FOR ANY PARTICULAR 
PURPOSE OR THAT THE USE OF THE SOFTWARE OR DOCUMENTATION WILL NOT INFRINGE ANY THIRD PARTY PATENTS, COPYRIGHTS, 
TRADEMARKS OR OTHER RIGHTS.

COPYRIGHT HOLDERS WILL NOT BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF 
ANY USE OF THE SOFTWARE OR DOCUMENTATION.

The name and trademarks of copyright holders may NOT be used in advertising or publicity pertaining to the 
software without specific, written prior permission. Title to copyright in this software and any associated 
documentation will at all times remain with copyright holders.

Copyright 2007, Michael Schrenk

THIS SCRIPT IS FOR DEMONSTRATION PURPOSES ONLY! 
    It is not suitable for any use other than demonstrating 
    the concepts presented in Webbots, Spiders and Screen Scrapers. 
########################################################################
*/?>



<?php
# Inlcude http and parse libraries
include("../util/LIB_http_browser.php");
include("../util/LIB_parse.php");
include("../util/LIB_resolve_addresses.php");
include("../util/LIB_http_codes.php");

# Identify the target web page and the page base
$target = "http://www.schrenk.com/nostarch/webbots/page_with_broken_links.php";
$page_base = "http://www.schrenk.com/nostarch/webbots/";

# Download the web page
$downloaded_page = http_get($target, $ref="");

# Parse the links
$link_array = parse_array($downloaded_page['FILE'], $beg_tag="<a", $close_tag=">");

# Verify the links
?>
<table border="1" cellpadding="1" cellspacing="0">
    <tr bgcolor="#e0e0e0">
        <th>URL</th>
        <th>HTTP CODE</th>
        <th>DOWNLOAD TIME (seconds)</th>
    </tr>
<?php
for($xx=0; $xx<count($link_array); $xx++)
    {
    // Parse the http attribute from link
    $link = get_attribute($tag=$link_array[$xx], $attribute="href");

    // Create a fully resolved address
    $resloved_link_address = resolve_address($link, $page_base);

    $downloaded_link = http_get($resloved_link_address, $target);
    ?>
    <tr>
        <td align="left"><?php echo $downloaded_link['STATUS']['url']?></td>
        <td align="right"><?php echo $downloaded_link['STATUS']['http_code']?></td>
        <td align="right"><?php echo $downloaded_link['STATUS']['total_time']?></td>
    </tr>
    <?php
    
    }
?>
</table>
