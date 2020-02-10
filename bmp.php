BMP
<?php
$link = mysql_connect('localhost', 'natas17', '8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9cw');
mysql_select_db('natas17', $link);
$query = "SELECT * from users where username=\"natas18\"";
if(array_key_exists("debug", $_GET)) {
    echo "Executing query: $query<br>";
}
$res = mysql_query($query, $link);
echo $res;
?>