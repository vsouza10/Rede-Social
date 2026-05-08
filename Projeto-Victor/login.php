<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="topo">

    <h2>Login</h2>

    <div class="menu">
        <a href="login.php">Login</a>
        <a href="portal.php">Portal</a>
        <a href="usuario.php">Área de Usuário</a>
        <a href="historico.php">Histórico</a>
        <a href="amizades.php">Amizades</a>
    </div>

</header>

<div class="login-container">

    <form action="validar_login.php" method="POST">

        <label>Email</label>

        <input type="email"
               name="email"
               placeholder="Digite seu Email"
               required>

        <label>Senha</label>

        <input type="password"
               name="senha"
               placeholder="Digite sua senha"
               required>

        <button type="submit">Entrar</button>

        <button type="reset" class="limpar">
            Limpar
        </button>

        <p class="recuperar">
            <a href="#">Recuperar senha por Email</a>
        </p>

    </form>

</div>

</body>
</html>