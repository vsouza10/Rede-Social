<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM postagens
WHERE usuario_id = $id
ORDER BY criado_em DESC";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="topo">

    <h2>Histórico</h2>

    <div class="menu">
        <a href="portal.php">Portal</a>
        <a href="usuario.php">Área de Usuário</a>
        <a href="historico.php">Histórico</a>
        <a href="amizades.php">Amizades</a>
        <a href="logout.php">Sair</a>
    </div>

</header>

<div class="container">

    <h2>Minhas Postagens</h2>

    <?php
    while($post = $resultado->fetch_assoc()){
    ?>

    <div class="post">

        <h3><?php echo $post['titulo']; ?></h3>

        <p><?php echo $post['texto']; ?></p>

        <small>
            <?php echo $post['criado_em']; ?>
        </small>

        <br><br>

        <a href="editar.php?id=<?php echo $post['id']; ?>">
            Atualizar
        </a>

        <a href="apagar.php?id=<?php echo $post['id']; ?>">
            Apagar
        </a>

    </div>

    <?php
    }
    ?>

</div>

</body>
</html>