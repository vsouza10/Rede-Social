<?php

session_start();

include("conexao.php");

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

$sql = "UPDATE postagens
SET titulo='$titulo',
texto='$texto'
WHERE id = $id";

$conn->query($sql);

header("Location: historico.php");

?>