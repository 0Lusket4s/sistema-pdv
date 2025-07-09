<?php

if (!isset($_COOKIE['usuario'])) {
    header('Location: login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Menu Principal - PDV</title>
  <style>
    body {
      margin: auto;
      display: flex;
      justify-content: center;
      font-family: Arial;
      background-color: #a8c2e6;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px;
    }
    h1 {
      color: #004aad;
    }
    .menu {
      display: grid;
      margin-left: auto;
      margin-right: auto;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-top: 30px;
      width: 100%;
      max-width: 700px;
    }
    .menu a {
      text-align: center;
      background-color: #004aad;
      color: white;
      text-decoration: none;
      padding: 20px;
      border-radius: 12px;
      font-size: 16px;
      box-shadow: 0 4px 8px #00000033;
      transition: 0.3s;
    }
    .menu a:hover {
      background-color: #173c6e;
    }
    .sair {
      margin-top: 40px;
      background: none;
      color: #000;
      font-size: 14px;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Sistema PDV - Menu Principal</h1>

  <div class="menu">
    <a href="pdv.php">🛒 Iniciar Venda (PDV)</a>
    <a href="cadastrarCliente.php">👤 Cadastrar Cliente</a>
    <a href="cadastrarProduto.php">🍔 Cadastrar Produto</a>
    <a href="relatorio.php" style="position: relative; left: 240px;">📊 Relatórios</a>
  </div>

  <a href="logout.php" class="sair">Sair do Sistema</a>
</body>
</html>
