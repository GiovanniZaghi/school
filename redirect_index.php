<?php

session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){

    header("Location: home.php");
    
}else{
    header("Location: index.php");
}

?>

