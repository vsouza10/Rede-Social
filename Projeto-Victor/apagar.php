<?php

session_start();

include("conexao.php");

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM postagens
WHERE id = $id";

$conn->query($sql);

header("Location: historico.php");

?>