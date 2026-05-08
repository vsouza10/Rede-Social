<?php
session_start();
include("conexao.php");

$user_id = $_SESSION['id'];
$amigo_id = $_GET['id'];

$sql = "INSERT INTO conexoes (usuario_id, amigo_id, status)
        VALUES ($user_id, $amigo_id, 'pendente')";

$conn->query($sql);

header("Location: amizades.php");
?>