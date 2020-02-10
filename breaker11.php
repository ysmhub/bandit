<?php

#$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");
$colors = file('color11.txt');
$color_encoded = urlencode('#ffffff');

$headers = array("Authorization: Basic ". base64_encode("natas11:U82q5TCMMQ9xuFoI3dYX61s7OZD9JKoK"));
$url = "http://natas11.natas.labs.overthewire.org/";

for ($i=0;$i<count($colors);$i++) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
  $out = curl_exec($curl);
  
  $c = rtrim($colors[$i]);
  $ce = urlencode(rtrim($colors[$i]));
  $url = "http://natas11.natas.labs.overthewire.org/?bgcolor=" . $ce;
  curl_setopt($curl, CURLOPT_URL, $url);
  $out = curl_exec($curl);
  curl_close($curl);

  // extract cookie data
  $tmpf = file('cookies.txt');
  $parts = preg_split('/\t/', $tmpf[4]);
  $a = rtrim($parts[6]);
  echo "$c $ce $a\n";
  exec ("rm cookies.txt");
  sleep(3);
}
