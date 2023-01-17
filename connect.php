
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "login_system";
$sql = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$sql) {
    echo  mysqli_connect_error();
} else {
    // echo "ok";
}


?>