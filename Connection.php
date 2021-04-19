<?php /** connecting to the database */
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'rguintlstudentcommunity';

$db = mysqli_connect($host, $user, $password, $database);

if(!$db){
    die("Error, database connectivity failed!");
}
?>
