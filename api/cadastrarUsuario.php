<?php
require_once 'conexao.php';

$usuario = "admin";
$nome = "Administrador";
$senha = "123456";
$nivel = "Administrador";

$stmt = $pdo->prepare("INSERT INTO usuarios (nome, usuario, senha, nivel_acesso) VALUES (:nome, :usuario, :senha, :nivel)");
$stmt->execute([
    ':nome' => $nome,
    ':usuario' => $usuario,
    ':senha' => $senha,
    ':nivel' => $nivel
]);

echo "Usuário criado com sucesso!";
?>
