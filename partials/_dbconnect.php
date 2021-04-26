<?php
//Script to connect to the database
$server = "localhost";
$user = "root";
$pass = "";
$db = "idiscuss";
$conn = mysqli_connect($server, $user, $pass, $db);
if(!$conn){
    die('Sorry we failed to connect');
}

?>