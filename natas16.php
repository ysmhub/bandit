<?php
# [;|&`\'"]

$key = "-v echo /home/hope/etc/a.txt";

if($key != "") {
    if(preg_match('/[;|&`\'"]/',$key)) {
        print "Input contains an illegal character!";
    } else {
        echo "grep -i \"$key\" dictionary.txt";
        echo "\n";
        #passthru("grep -i \"$key\" dictionary.txt");
    }
}
