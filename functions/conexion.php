<?php 

if(!isset($_SESSION)) {
    session_start();  
}

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'blog';
        
$db = mysqli_connect($host, $user, $password, $database);
        
mysqli_query($db, "SET NAME utf-8 ");
?>