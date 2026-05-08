<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM postagens
WHERE id = $id";

$resultado = $conn->query($sql);

$post = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Postagem</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h2>Editar Postagem</h2>

    <form action="atualizar.php" method="POST">

        <input type="hidden"
               name="id"
               value="<?php echo $post['id']; ?>">

        <label>Título</label>

        <input type="text"
               name="titulo"
               value="<?php echo $post['titulo']; ?>">

        <label>Texto</label>

        <textarea name="texto"><?php echo $post['texto']; ?></textarea>

        <button type="submit">
            Atualizar
        </button>

    </form>

</div>

</body>
</html>