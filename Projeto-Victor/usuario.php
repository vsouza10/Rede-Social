<?php
session_start();
include("conexao.php");


if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];


$sql = "SELECT COUNT(*) AS total_amigos 
        FROM conexoes 
        WHERE (usuario_id = $user_id OR amigo_id = $user_id)
        AND status = 'aceito'";

$result = $conn->query($sql);
$amigos = $result->fetch_assoc()['total_amigos'] ?? 0;


$sql = "SELECT COUNT(*) AS total_posts 
        FROM postagens 
        WHERE usuario_id = $user_id";

$result = $conn->query($sql);
$posts = $result->fetch_assoc()['total_posts'] ?? 0;


$sql = "SELECT SUM(visualizacoes) AS total_views 
        FROM postagens 
        WHERE usuario_id = $user_id";

$result = $conn->query($sql);
$views = $result->fetch_assoc()['total_views'] ?? 0;

if ($views == null) {
    $views = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="topo">
    <h2>Área do Usuário</h2>

    <div class="menu">
        <a href="login.php">Login</a>
        <a href="portal.php">Portal</a>
        <a href="usuario.php">Área de Usuário</a>
        <a href="historico.php">Histórico</a>
        <a href="amizades.php">Amizades</a>
    </div>
</header>

<div class="perfil">
    <h2>Perfil do Usuário</h2>

    <div class="info-box">

        <div class="info">
            <h3>Nome</h3>
            <p><?php echo $_SESSION['nome']; ?></p>
        </div>

        <div class="info">
            <h3>Amigos</h3>
            <p><?php echo $amigos; ?></p>
        </div>

        <div class="info">
            <h3>Postagens</h3>
            <p><?php echo $posts; ?></p>
        </div>

        <div class="info">
            <h3>Visualizações</h3>
            <p><?php echo $views; ?></p>
        </div>

    </div>
</div>

</body>
</html>