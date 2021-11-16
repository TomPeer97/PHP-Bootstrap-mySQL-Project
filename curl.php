<?php

$rand =   time() . '_' . rand(1, 100);
$curl = curl_init("https://avatars.dicebear.com/api/bottts/$rand.svg");

curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($curl);
curl_close($curl);

$f = fopen("images/bots/$rand.svg", 'x');
fwrite($f, $response);
fclose($f);

echo $response;