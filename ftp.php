<?php 

$content = file_get_contents('http://1.179.149.85:2146/services/service1.aspx');
$arrayJson = json_decode($content, true);

echo $arrayJson['results'][0][id];
foreach($arrayJson as $key)
{
    echo $key[0][id] . "<br>";
}
?>

