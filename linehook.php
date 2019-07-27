<?php
  //$accessToken = "VQ1mBEd2QqIIBJwg629MTQCf3uTJjOMgZXp+ZHvBP9Znn07x3HkiMiUk7GCcwhD/R6VI1s2Nhc31rKx6ElxmT26P2Ve2oWqc7KK9dZaDC1coQQxoVlck0Kydnq6UaC0JhBSJa275g99+OxBmaXGdDAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
   
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
        $output = replyCode($message);
$json = '{

	"replyToken": "'.$arrayJson['events'][0]['replyToken'].'",
    "messages":[{
       "type": "flex",
    "altText": "Register Program SK v.9",
    "contents": 
    
    {
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
        "text": "'.$displayName.'",
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
                "text": "'.$output.'",
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
}
    }
    ]
}';

    if($messagePIC == "text"){
	if(is_numeric ($message))
	{
        replyMsg2($arrayHeader,$json);
	}
	else
	{}
    } else if($messagePIC == "image"){
	replyMsgs($arrayHeader,$messageID);
    }
function pushMsg($arrayHeader,$json){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
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
        $file_name = "ftp://meengineer:OC7IuVdsGP@ftp.meengineer.co.th/domains/meengineer.co.th/public_html/picREG/$file_name";
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
	function replyMsg2($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,$arrayPostData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
	function replyCode($txtinput){
		$txtinput= trim($txtinput);
		$Int = array_fill( 0, 30, null);
		$strArrays = array_fill( 0, 20, null);
		$txtR = "";
        $str = "";
		$length = strlen(substr($txtinput, 0, -2));		
		for ($i = 0; $i <= $length; $i++) {
			$strArrays[$i]=substr($txtinput, $i, 2);
		} 
		$num = strlen(substr($txtinput, 0, -1));
		for ($j = 0; $j <= $num; $j++) {
			$txtR = $strArrays[strlen(substr($txtinput, 0, -1))-$j];
			$length1 = strlen(substr($txtR, 0, -1));
			for ($k = 0; $k <= $length1; $k++) {
				$binary = txt2bin(substr($txtR, $k, 1));
				$Int[$k]=bindec($binary);
			} 
			$str1 = "0";
			$num1 = strlen(substr($txtR, 0, -1));
			for ($l = 0; $l <= $length; $l++) {
				$str1 = round(($str1^$Int[$l])%10);
			}
			if ($str1 >= 10)
            {	
                $str1 = "9";
            }
			$str = $str.$str1;			
		}
        return $str;
    }
	function txt2bin($strb) {
      $text_array = explode("\r\n", chunk_split($strb, 1));
      for ($n = 0; $n < count($text_array) - 1; $n++) {
        $newstring = substr("0000".base_convert(ord($text_array[$n]), 10, 2), -8);
      }
	  return $newstring;
    }
   exit;
?>
