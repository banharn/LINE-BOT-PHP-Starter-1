<?php

   include("lib/nusoap.php");
        $client = new nusoap_client("http://1.179.149.85:2146/register/WebService.asmx?wsdl",true); 
        $params = array(
                   'name' => "Weerachai Nukitram"
        );
       $data = $client->call("HelloWorld",$params); 
       print_r($data);

	   echo "<hr>";
	   
	   echo $data["HelloWorldResult"];
?>
