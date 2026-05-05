<?php

if (!isset($_GET['type'])) 
    exit();

$type = $_GET['type'];

$url = "https://official-joke-api.appspot.com/jokes/" . $type . "/random";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET"
]);

curl_setopt($curl, CURLOPT_CAINFO, "C:/MAMP/bin/cacert.pem");
curl_setopt($curl, CURLOPT_CAPATH, "C:/MAMP/bin/cacert.pem");

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

?>