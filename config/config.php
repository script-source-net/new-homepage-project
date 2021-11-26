<?php
define('DB_SERVER',sConstrMain::getDbCredentials('host'));
define('DB_USERNAME',sConstrMain::getDbCredentials('user'));
define('DB_PASSWORD',sConstrMain::getDbCredentials('pw'));
define('DB_NAME',sConstrMain::getDbCredentials('db'));


/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
