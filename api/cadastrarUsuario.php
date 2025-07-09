<?php
require_once 'conexao.php';

$usuario = "lucas";
$nome = "Administrador";
$senha = password_hash("123", PASSWORD_DEFAULT);
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
