<?php
include_once("../inc/constants.php");

$dhhost = 'calvar.fatcowmysql.com:3306';
$dbuser = 'calvar';
$dbpass = DBPASS;
$dbname = 'ccc';

// $dhhost = 'localhost:3306';
// $dbuser = 'root';
// $dbpass = DBPASS;
// $dbname = 'ccc';

function dbConnect($db='') {
    global $dbhost, $dbuser, $dbpass, $dbname, $dbport, $socket;

    $mysqli = new mysqli($dbhost, $dbuser, $dbuser, $dbname); 
    // $mysqli = new mysqli('calvar.fatcowmysql.com:3306', 'calvar', 'narnia3#', 'ccc'); 
    if (!$mysqli) { 
        die('Could not connect: ' . mysqli_error()); 
    } 
    echo 'Connected successfully';  
    
    // $dbcnx = new mysqli('clavar.fatcowmysql.com', 'calvar', 'calvary1986', 'ccc')
    //     or die('The site database appears to be down.');
    return $mysqli;
}
?>
