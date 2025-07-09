<?php
session_start();
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $dados['senha'])) {
            $_SESSION['usuario'] = $dados['usuario'];
            $_SESSION['nivel'] = $dados['nivel_acesso'];
            header('Location: /dashboard.php');
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    header("Location: /login.php");
}
?>
