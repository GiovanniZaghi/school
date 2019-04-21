<?php
include "../config.php";

session_start();

if(!isset($_SESSION['id']) && !empty($_SESSION['id']) == false){
    header("Location: ../index.php");   
}

if(isset($_POST['nome']) && empty($_POST['nome']) ==false){

    $nome = addslashes($_POST['nome']);
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);


    try {
        
        $sql = "INSERT INTO aluno(nome, usuario, senha) VALUES(:nome,:usuario,:senha)";

        $sql = $pdo->prepare($sql);
        $sql->bindvalue(':nome',$nome);
        $sql->bindValue(':usuario',$usuario);
        $sql->bindvalue(':senha',$senha);
        $sql->execute();

        header("Location: index.php");

    } catch (PDOException $e) {
        echo "Message: ".$e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Aluno</title>
</head>
<body>
<h1>Cadastrar Aluno</h1>
<br>
<form action="" method="post">

<input type="text" name="nome" id="nome" placeholder="Nome completo: " required/><br>

<input type="text" name="usuario" id="usuario" placeholder="Usuario: " required/><br>

<input type="password" name="senha" id="senha" placeholder="Senha: " required/><br>

<input type="submit" value="Cadastrar">

</form>
    
</body>
</html>