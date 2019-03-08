<?php

$url = "http://www.xxx.co/Default.aspx" ;
$param = "?" . "Field1=" . $num . "&Field2=" . $name;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url. $param,
    CURLOPT_TIMEOUT => 30
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    return "error: " . $err;
    echo "error: " . $err;
} else {
    return $response;
    echo $response;
}

?>
