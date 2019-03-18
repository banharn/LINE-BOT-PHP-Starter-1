<?php 

$baseUrl = "http://1.179.149.85:2146/services/service1.aspx";
    	$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "$baseUrl"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch);
        $arrayJson = json_encode($output);
        curl_close($ch);  
         
echo $arrayJson;
$arr = json_decode($output, true);
echo $arr["id"]."<br/>";

$age = '{"Poll":55,"Devid":40,"Akbar":68,"Cally":70}';
$arr = json_decode($age, true);
echo $arr["Poll"]."<br/>";
?>

