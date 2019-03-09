<?php
$accessToken = "VQ1mBEd2QqIIBJwg629MTQCf3uTJjOMgZXp+ZHvBP9Znn07x3HkiMiUk7GCcwhD/R6VI1s2Nhc31rKx6ElxmT26P2Ve2oWqc7KK9dZaDC1coQQxoVlck0Kydnq6UaC0JhBSJa275g99+OxBmaXGdDAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
$id = "Ub50d949097ea4a3a880d45d26389fb95";
 $bot = new \\LINE\LINEBot(new CurlHTTPClient('$accessToken'), \[
 'channelSecret' => '070f839dfd1f720350258656368bef4f'
\]);
 
$res = $bot->getProfile('$id');
if ($res->isSucceeded()) {
 $profile = $res->getJSONDecodedBody();
 $displayName = $profile\['displayName'\];
 $statusMessage = $profile\['statusMessage'\];
 $pictureUrl = $profile\['pictureUrl'\];
}
?>
