<?

$arr = array();

ksort($arr);
foreach($_SESSION as $key => $value) {
    debug("$key => $value");
    $data .= "$key $value\n";
}