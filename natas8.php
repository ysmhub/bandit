<?php


// bin2hex(strrev(base64_encode($x))) == '3d3d516343746d4d6d6c315669563362';

// a - base64_encode($x)
// b - strrev(a)
// c - bin2hex(b)
// d - 3d3d516343746d4d6d6c315669563362

// reverse

// d - 3d3d516343746d4d6d6c315669563362
// c - hex2bin(d)
// b - strrev(c)
// a - base64_decode(b)
// 0 - secret

$d = "3d3d516343746d4d6d6c315669563362";
$c = hex2bin($d);
$b = strrev($c);
$a = base64_decode($b);
echo "$a\n";