<?php
include "../config.php";

session_start();

if(!isset($_SESSION['id']) && !empty($_SESSION['id']) == false){
    header("Location: ../index.php");   
}

$id = $_GET['id'];

$sql = $pdo->query("SELECT * FROM aluno WHERE id = '$id'");

$sql = $sql->Fetch();

if(isset($_POST['nome']) && empty($_POST['nome'])==false){

    $nome = addslashes($_POST['nome']);
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);

    try {
        $sql = "UPDATE aluno SET nome=:nome, usuario=:usuario, senha=:senha WHERE id=$id";

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
    <title>Editar Aluno</title>
</head>
<body>
<h1>Editar Aluno</h1>
<br>

<form action="" method="post">

<input type="number" name="id" id="id" value="<?=$sql['id']?>"/><br>

<input type="text" name="nome" id="nome" value="<?=$sql['nome']?>" required/><br>

<input type="text" name="usuario" id="usuario" value="<?=$sql['usuario']?>"required/><br>

<input type="password" name="senha" id="senha" value="<?=$sql['senha']?>"required/><br>

<input type="submit" value="Alterar">

</form>
    
</body>
</html>