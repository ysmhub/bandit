<?php

function xor_encrypt($in, $key) {
    $key = $key;
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
        $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

$cookie = "ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw%3D";
$decoded = urldecode($cookie);
$xored = base64_decode($decoded);
$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");
$raw = json_encode($defaultdata); // array to json string

$keyz = xor_encrypt($xored, $raw);
echo $keyz . "\n";

$defaultdata = array( "showpassword"=>"yes", "bgcolor"=>"#ffffff");
$raw = json_encode($defaultdata); // array to json string
$cookiez = urlencode(base64_encode(xor_encrypt($raw, 'qw8J')));
echo $cookiez . "\n";

#eyJzaG93cGFzc3dvcmQiOiJubyIsImJnY29sb3IiOiIjZmZmZmZmIn0%3D

