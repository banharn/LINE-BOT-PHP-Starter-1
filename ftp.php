<?php 

$baseUrl = "http://1.179.149.85:2146/services/service1.aspx";
    	$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "$baseUrl"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch);
        curl_close($ch);  
         
echo "'.$output.'";


$age = '{"Poll":55,"Devid":40,"Akbar":68,"Cally":70}';
$arr = json_decode($age, true);
echo $arr["Poll"]."<br/>";
$obj = json_decode($age);
echo $obj->Poll."<br/>";
?>

