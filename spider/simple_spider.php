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



<?
# Initialization
include("../util/LIB_http.php");                        // http library
include("../util/LIB_parse.php");                       // parse library
include("../util/LIB_resolve_addresses.php");           // address resolution library
include("../util/LIB_exclusion_list.php");              // list of excluded keywords
include("../util/LIB_simple_spider.php");               // spider routines used by this app.
include("../util/LIB_download_images.php");

set_time_limit(3600);                           // Don't let PHP timeout

$SEED_URL        = "http://www.schrenk.com";    // First URL spider downloads
$MAX_PENETRATION = 1;                           // Set spider penetration depth
$FETCH_DELAY     = 1;                           // Wait one second between page fetches
$ALLOW_OFFISTE   = true;                        // Don't allow spider to roam from the SEED_URL's domain
$spider_array = array();

# Get links from $SEED_URL
echo "Harvesting Seed URL    \n"; 
$temp_link_array = harvest_links($SEED_URL);
$spider_array = archive_links($spider_array, 0, $temp_link_array);

# Spider links in remaining penetration levels
for($penetration_level=1; $penetration_level<=$MAX_PENETRATION; $penetration_level++)
    {
    $previous_level = $penetration_level - 1;
    for($xx=0; $xx<count($spider_array[$previous_level]); $xx++)
        {
        unset($temp_link_array);
        $temp_link_array = harvest_links($spider_array[$previous_level][$xx]);
        echo "Level=$penetration_level, xx=$xx of ".count($spider_array[$previous_level])." <br>\n"; 
        $spider_array = archive_links($spider_array, $penetration_level, $temp_link_array);
        }
    }

# Download images from pages referenced in $spider_array
for($penetration_level=1; $penetration_level<=$MAX_PENETRATION; $penetration_level++)
    {
    for($xx=0; $xx<count($spider_array[$previous_level]); $xx++)
        {
        download_images_for_page($spider_array[$previous_level][$xx]);
        }
    }
?>