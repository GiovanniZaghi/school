<?php

session_start();

include "config.php";

if(isset($_POST['usuario']) && empty($_POST['usuario']) == false && isset($_POST['senha']) && empty($_POST['senha'])==false){

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);

$sql = "SELECT * FROM aluno WHERE usuario = :usuario and senha = :senha";

$sql = $pdo->prepare($sql);
$sql->bindvalue(':usuario',$usuario);
$sql->bindvalue(':senha',$senha);
$sql->execute();

if($sql->rowCount() > 0){
   $dado = $sql->fetch();
   $_SESSION['id'] = $dado['id'];

   header("Location: redirect_index.php");
}
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" value="Entrar">

    </form>
</body>
</html>