<?php
require_once 'conexao.php';

$usuario = 'admin';
$senha = password_hash('1234', PASSWORD_DEFAULT);
$nivel = 'admin';

$stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha, nivel_acesso) VALUES (?, ?, ?)");
$stmt->execute([$usuario, $senha, $nivel]);

echo "Usuário inserido com sucesso!";
?>
