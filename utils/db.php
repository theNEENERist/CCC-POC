<?php // db.php

$dhhost = 'localhost';
$dbuser = 'root';
$dbpass = 'narnia3#';
$dbname = 'ccc';
// $socket = '';
// $dbport = '3306';

// $dbhost = '127.0.0.1:3036';
// 		$dbuser = 'root';
// 		$dbpass = 'narnia3#';
// 		$database = 'ccc';
// 		$host="localhost";
// 		$port=3306;
// 		$socket="";
// 		$user="root";
// 		$password="";
// 		$dbname="";

function dbConnect($db='') {
    global $dbhost, $dbuser, $dbpass, $dbname, $dbport, $socket;
    
    $dbcnx = new mysqli('localhost', 'root', '', 'ccc')
        or die('The site database appears to be down.');

    // if ($db!='' and !@mysqli_select_db($db))
    //     die('The site database is unavailable.');
    
    return $dbcnx;
}
?>
