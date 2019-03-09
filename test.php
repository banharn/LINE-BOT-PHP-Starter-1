<?php
    $accessToken = "VQ1mBEd2QqIIBJwg629MTQCf3uTJjOMgZXp+ZHvBP9Znn07x3HkiMiUk7GCcwhD/R6VI1s2Nhc31rKx6ElxmT26P2Ve2oWqc7KK9dZaDC1coQQxoVlck0Kydnq6UaC0JhBSJa275g99+OxBmaXGdDAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้

$baseUrl = "https://api.line.me/v2/bot/profile/Ub50d949097ea4a3a880d45d26389fb95";
  $ch = curl_init(); 
        // set url 
        curl_setopt($ch, CURLOPT_URL, "$baseUrl"); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);  

echo $output;

   exit;
?>
