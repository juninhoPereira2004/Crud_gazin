<?php
include 'config.php';

$sql = "INSERT INTO desenvolvedores (nome, nivel) VALUES (:nome, :nivel)";
$cadastro = $pdo->prepare($sql);
$cadastro->bindParam(":nome", $_POST['nome']);
$cadastro->bindParam(":nivel", $_POST['nivel']);
$cadastro->execute();
header( "Location: index.php");

?>