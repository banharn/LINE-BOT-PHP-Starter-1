<?php
    $accessToken = "VQ1mBEd2QqIIBJwg629MTQCf3uTJjOMgZXp+ZHvBP9Znn07x3HkiMiUk7GCcwhD/R6VI1s2Nhc31rKx6ElxmT26P2Ve2oWqc7KK9dZaDC1coQQxoVlck0Kydnq6UaC0JhBSJa275g99+OxBmaXGdDAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    $messageID = $arrayJson['events'][0]['message']['id'];
    $messagePIC = $arrayJson['events'][0]['message']['contentProvider']['originalContentUrl'];
    $messagePIC1 = $arrayJson['events'][0]['message']['originalContentUrl'];
    $id = $arrayJson['events'][0]['source']['userId'];
    $groupId = $arrayJson['events'][0]['source']['groupId'];

    //$strUrl = "https://api.line.me/v2/bot/profile/$id";
    $strUrl = "https://api.line.me/v2/bot/group/$groupId/member/$id";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
        $character = json_decode($result);
        $displayName = $character->displayName;  
        $str1 = urlencode($displayName);



  



    $output1 = "ไลน์ผู้ใช้งาน : $displayName\nรหัสลงทะเบียน : $output\n$messageID";
  $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $output1;
        replyMsg($arrayHeader,$arrayPostData);
replyMsgs($arrayHeader);
 function replyMsgs($arrayHeader){

	

		$url = 'https://api.line.me/v2/bot/message/'.$messageID.'/content';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader); 
		
		$json_content = curl_exec($ch);
		curl_close($ch);
		

		$file_name = "$messageID.jpeg";
        $file_name = "ftp://meengineer:OC7IuVdsGP@ftp.meengineer.co.th/domains/meengineer.co.th/public_html/images/$file_name";
		$fp = fopen($file_name, 'w');
		fwrite($fp, $json_content);
		fclose($fp);
    }
    function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>
