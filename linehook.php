<?php
    $accessToken = "PrQc2WdnEfQoVt6uxoYpOgWwKRFSQCfUTwV0ThQqf3wPiP6RTGXJxlYYfU2os6ZiCZOSKCSQGU4QkiJ0dZGfZacO4QZYWuvt7ZkwOI5di7fJeYyaeNcItumhmaujEXROkSHQQlX3n+CEIIEhnX2wsAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    $messageID = $arrayJson['events'][0]['message']['id'];
    $messagePIC =  $arrayJson['events'][0]['message']['type'];
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
   	$baseUrl = "http://1.179.149.85:2146/register/default2.aspx";
    	$resource = "?serial=$message&name=$str1";
    	$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "$baseUrl$resource"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
    	$output1 = "ไลน์ผู้ใช้งาน : $displayName\nรหัสลงทะเบียน : $output\n $id\n $groupId";

$test = '{
  "type": "bubble",
  "styles": {
    "footer": {
      "separator": true
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "Register Program SK v.9",
        "weight": "bold",
        "color": "#1DB446",
        "size": "sm"
      },
      {
        "type": "text",
        "text": "SK ให้บริการ24ชม.คับ",
        "weight": "bold",
        "size": "xl",
        "margin": "md"
      },
      {
        "type": "separator",
        "margin": "xxl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "xxl",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "รหัสลงทะเบียน",
                "weight": "bold",
                "size": "sm",
                "color": "#555555",
                "flex": 0
              },
              {
                "type": "text",
                "text": "01888817",
                "weight": "bold",
                "size": "sm",
                "color": "#111111",
                "align": "end"
              }
            ]
          }
        ]
      }
    ]
  }
}';
    if($messagePIC == "text"){
	if(is_numeric ($message))
	{
       	 $arrayPostData['to'] = $groupId;
          $arrayPostData['messages'][0]['type'] = "flex";
	  $arrayPostData['messages'][0]['altText'] = "Register Program SK V.9";		
          $arrayPostData['messages'][0]['contents'] = $test;
          pushMsg($arrayHeader,$arrayPostData);
        //replyMsg($arrayHeader,$arrayPostData);
	}
	else
	{}
    } else if($messagePIC == "image"){
	replyMsgs($arrayHeader,$messageID);
    }
function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayPostData);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
    function replyMsgs($arrayHeader,$messageID){
	$ch = curl_init("https://api.line.me/v2/bot/message/$messageID/content");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader); 
	$result = curl_exec($ch);
	curl_close($ch);
	$file_name = "$messageID.jpg";
        $file_name = "ftp://meengineer:OC7IuVdsGP@ftp.meengineer.co.th/domains/meengineer.co.th/public_html/images/reg/$file_name";
	$fp = fopen($file_name, 'wb');
	fwrite($fp, $result);
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
