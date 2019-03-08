<?php

$url = 'https://ph.godaddy.com/hosting/website-builder.aspx?ci=88060';
$contents = htmlentities(file_get_contents($url));
 $arrayJson = json_decode($contents, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
echo $arrayJson;

?>
