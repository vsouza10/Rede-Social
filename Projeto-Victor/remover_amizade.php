<?php
session_start();
include("conexao.php");

$user_id = $_SESSION['id'];
$amigo_id = $_GET['id'];

$sql = "DELETE FROM conexoes 
        WHERE (usuario_id = $user_id AND amigo_id = $amigo_id)
        OR (usuario_id = $amigo_id AND amigo_id = $user_id)";

$conn->query($sql);

header("Location: amizades.php");
?>