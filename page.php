<?

function myopen($path, $name) { return true; }
function myclose() { return true; }
function mydestroy($sid) { return true; }
function mygarbage($t) { return true; }

function debug($msg) {
    if(array_key_exists("debug", $_GET)) {
        print "DEBUG: $msg<br>";
    }
}

function print_credentials() {
    if ($_SESSION and array_key_exists("admin", $_SESSION) and $_SESSION["admin"] == 1) {
        print "You are an admin. The credentials for the next level are:<br>";
        print "<pre>Username: natas21\n";
        print "Password: <censored></pre>";
    } else {
        print "You are logged in as a regular user. Login as an admin to retrieve credentials for natas21.";
    }
}

function myread($sid) { 
    
    debug("MYREAD $sid"); 
    if (strspn($sid, "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-") != strlen($sid)) {
        debug("Invalid SID"); 
        return "";
    }

    $filename = session_save_path() . "/" . "mysess_" . $sid;
    if(!file_exists($filename)) {
        debug("Session file doesn't exist");
        return "";
    }

    debug("Reading from ". $filename);
    $data = file_get_contents($filename);

    $_SESSION = array();
    // name a
    // admin 1
    foreach(explode("\n", $data) as $line) {
        debug("Read [$line]");
        $parts = explode(" ", $line, 2);
        if ($parts[0] != "") {
            $_SESSION[$parts[0]] = $parts[1];
        }
    }

    return session_encode();
}

function mywrite($sid, $data) { 
    
    // $data contains the serialized version of $_SESSION
    // but our encoding is better
    
    debug("MYWRITE $sid $data"); 
    
    // make sure the sid is alnum only!!
    if (strspn($sid, "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-") != strlen($sid)) {
        debug("Invalid SID");
        return;
    }
    
    $filename = session_save_path() . "/" . "mysess_" . $sid;
    $data = "";
    debug("Saving in ". $filename);
    
    ksort($_SESSION);
    foreach($_SESSION as $key => $value) {
        debug("$key => $value");
        $data .= "$key $value\n";
    }
    file_put_contents($filename, $data);
    chmod($filename, 0600);
}

// main code
// When session_start() is called or when a session auto starts, PHP will call the open and read session save handlers.
// ..or can be custom handler as defined by session_set_save_handler()
session_set_save_handler("myopen", "myclose", "myread", "mywrite", "mydestroy", "mygarbage");

// The read callback will retrieve any existing session data (stored in a special serialized format) and 
// will be unserialized and used to automatically populate the $_SESSION superglobal 
// when the read callback returns the saved session data back to PHP session handling. 
session_start();

if (array_key_exists("name", $_REQUEST)) {
    $_SESSION["name"] = $_REQUEST["name"];
    debug("Name set to " . $_REQUEST["name"]);
}

print_credentials();

$name = "";
if (array_key_exists("name", $_SESSION)) {
    $name = $_SESSION["name"];
}
