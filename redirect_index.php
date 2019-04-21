<?php

session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){

    header("Location: home/index.php");
    
}else{
    header("Location: ../index.php");
}

?>

