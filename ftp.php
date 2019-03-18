<?php 

$baseUrl = "http://1.179.149.85:2146/services/service1.aspx";
    	$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "$baseUrl"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
    echo $output;
?>
