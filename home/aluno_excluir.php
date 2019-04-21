<?php
include "../config.php";

session_start();

if(!isset($_SESSION['id']) && !empty($_SESSION['id']) == false){
    header("Location: ../index.php");   
}

$id = $_GET['id'];

$sql = $pdo->query("UPDATE aluno set ativo = 0 WHERE id =$id");

header("Location: index.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir Aluno</title>
</head>
<body>
<h1>Excluir Aluno</h1>
    
</body>
</html>