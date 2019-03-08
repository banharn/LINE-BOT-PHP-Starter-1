<?php

$url = 'https://ph.godaddy.com/hosting/website-builder.aspx?ci=88060';
$contents = htmlentities(file_get_contents($url));
echo $contents;

?>
