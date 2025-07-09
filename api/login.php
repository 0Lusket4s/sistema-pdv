<?php session_start(); if (isset($_SESSION['usuario'])) { header('Location: dashboard.php'); exit(); } ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - PDV</title>
  <style>
    body {
      font-family: Arial;
      background-color: #173c6e;
      color: #000;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: #a8c2e6;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px #00000033;
    }
    input {
      display: block;
      margin: 10px 0;
      padding: 8px;
      width: 100%;
    }
    button {
      background-color: #004aad;
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Acesso ao PDV</h2>
    <form method="POST" action="../Src/Auth/verificarLogin.php">
      <input type="text" name="usuario" placeholder="Usuário" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>