<?php
include "../config.php";

session_start();

if(!isset($_SESSION['id']) && !empty($_SESSION['id']) == false){
    header("Location: ../index.php");   
}

$id = $_SESSION['id'];

$usr = $pdo->query("SELECT * FROM aluno WHERE id =$id");

$nomeusr = $usr->fetch();

$sql = "SELECT * FROM aluno WHERE ativo=1";

$sql = $pdo->query($sql);

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
    <h3>Seje bem vindo: </h3> <?= $nomeusr['nome'];?>
    <br>
    <br>
    <a href="aluno_criar.php">Criar Aluno</a>
    <br>
    <table border="1">
    <tr><th colspan="4">Alunos</th></tr>
    <tr>
      <td>Id</td>
      <td>Nome</td>
      <td>Usuario</td>
      <td>Ações</td>
    </tr>

    <?php foreach ($sql->fetchAll() as $aluno) { ?>
    <tr>
      <td><?php echo $aluno['id']; ?></td>
      <td><?php echo $aluno['nome']; ?></td>
      <td><?php echo $aluno['usuario']; ?></td>
      <td>
        <a href="aluno_editar.php?id=<?php echo $aluno['id']; ?>">Editar</a>
        <a href="aluno_excluir.php?id=<?php echo $aluno['id']; ?>">Excluir</a>
      </td>
    </tr>
    <?php } ?>
  </table>
<br>
<br>

<a href="deslogar.php">Sair</a>
</body>
</html>