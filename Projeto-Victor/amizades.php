<?php
session_start();
include("conexao.php");

$user_id = $_SESSION['id'];

/* =========================
   BUSCA DE USUÁRIOS
========================= */
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$sqlUsuarios = "SELECT id, nome 
                FROM usuarios 
                WHERE nome LIKE '%$busca%' 
                AND id != $user_id";

$usuarios = $conn->query($sqlUsuarios);


/* =========================
   AMIGOS (CONEXÕES ACEITAS)
========================= */
$sqlAmigos = "SELECT u.id, u.nome
              FROM conexoes c
              JOIN usuarios u 
              ON (u.id = c.amigo_id OR u.id = c.usuario_id)
              WHERE (c.usuario_id = $user_id OR c.amigo_id = $user_id)
              AND c.status = 'aceito'
              AND u.id != $user_id";

$amigos = $conn->query($sqlAmigos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Amizades</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="topo">
    <h2>Amizades</h2>

    <div class="menu">
        <a href="login.php">Login</a>
        <a href="portal.php">Portal</a>
        <a href="usuario.php">Área de Usuário</a>
        <a href="historico.php">Histórico</a>
        <a href="amizades.php">Amizades</a>
    </div>
</header>

<div class="container">

    <!-- ================= BUSCA ================= -->
    <h2>Buscar novos amigos</h2>

    <form method="GET">
        <input type="text" name="busca" placeholder="Buscar pessoas...">
        <button type="submit">Buscar</button>
    </form>

    <?php while($u = $usuarios->fetch_assoc()) { ?>
        <div class="amigo">
            <span><?php echo $u['nome']; ?></span>

            <div class="acoes">
                <a href="enviar_amizade.php?id=<?php echo $u['id']; ?>">
                    <button>Solicitar amizade</button>
                </a>
            </div>
        </div>
    <?php } ?>


    <!-- ================= AMIGOS ================= -->
    <h2>Seus amigos</h2>

    <?php while($a = $amigos->fetch_assoc()) { ?>
        <div class="amigo">
            <span><?php echo $a['nome']; ?></span>

            <div class="acoes">
                <a href="remover_amizade.php?id=<?php echo $a['id']; ?>">
                    <button>Cancelar amizade</button>
                </a>
            </div>
        </div>
    <?php } ?>

</div>

</body>
</html>