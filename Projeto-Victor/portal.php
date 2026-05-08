<?php
session_start();

include("conexao.php");

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];

$sql = "SELECT p.id, p.titulo, p.texto, p.criado_em, a.amigo  
FROM postagens as p, 
     usuarios as u, 
     conexoes as c, 
     (SELECT c.id as id_con, u.nome as amigo, u.id as id_amigo 
      FROM conexoes as c, usuarios as u 
      WHERE c.amigo_id=u.id 
      and c.status='aceito' 
      and c.usuario_id = $id) as a
WHERE p.usuario_id = a.id_amigo 
  and c.usuario_id = u.id
  and c.amigo_id = a.id_amigo
  and a.id_con = c.id  
  and u.id=$id
ORDER BY p.criado_em DESC";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="topo">

    <h2>Portal</h2>

    <div class="menu">
        <a href="portal.php">Portal</a>
        <a href="usuario.php">Área de Usuário</a>
        <a href="historico.php">Histórico</a>
        <a href="amizades.php">Amizades</a>
        <a href="logout.php">Sair</a>
    </div>

</header>

<div class="container">

    <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>

    <form class="form-post">

        <label>Buscar usuário</label>

        <textarea placeholder="Digite o nome do usuário"></textarea>

        <button type="submit">Pesquisar</button>

    </form>

    <h2>Postagens</h2>

    <?php
    while($postagem = $resultado->fetch_assoc()){
    ?>

        <div class="post">

            <h3><?php echo $postagem['amigo']; ?></h3>

            <h4><?php echo $postagem['titulo']; ?></h4>

            <p><?php echo $postagem['texto']; ?></p>

            <small>
                <?php echo $postagem['criado_em']; ?>
            </small>

        </div>

    <?php
    }
    ?>

</div>

</body>
</html>