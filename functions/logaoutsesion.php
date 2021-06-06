<?php 

if(!isset($_SESSION)) { session_start();} 
  
if(isset($_SESSION['user_active'])){
    session_unset();
    session_destroy();
    header('Location: ../index.php');
}
?>