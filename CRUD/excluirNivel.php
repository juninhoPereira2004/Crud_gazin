<?php
include 'config.php';

$sql = "DELETE FROM niveis WHERE id = :id";
$cadastro = $pdo->prepare($sql);
$cadastro->bindParam(":id", $_POST['id']);
$cadastro->execute();
header( "Location: index.php");

?>