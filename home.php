<?php
session_start();

if(!isset($_SESSION['id']) && !empty($_SESSION['id']) == false){
    header("Location: index.php");   
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
</body>
</html>