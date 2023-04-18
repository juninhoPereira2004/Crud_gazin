<?php
include 'config.php';
$sql = "INSERT INTO niveis (nome) VALUES (:nome)";
$cadastro = $pdo->prepare($sql);
$cadastro->bindParam(":nome", $_POST['nome']);
$cadastro->execute();
header( "Location: index.php");

?>