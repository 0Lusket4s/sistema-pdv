<?php
require_once 'conexao.php';

$stmtVendas = $pdo->query("SELECT v.id, v.data_venda, v.valor_total, v.formas_pagamento, c.nome
                            FROM vendas v
                            LEFT JOIN clientes c ON v.cliente_id = c.id
                            ORDER BY v.data_venda DESC");
$vendas = $stmtVendas->fetchAll(PDO::FETCH_ASSOC);

$stmtEstoque = $pdo->query("SELECT nomeProduto, estoque, preco, categorias FROM produtos ORDER BY nomeProduto");
$produtos = $stmtEstoque->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Relatórios</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f2f2f2;
      padding: 20px;
    }
    h2 {
      color: #004aad;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #a8c2e6;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    a {
      color: #004aad;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h2>Relatório de Vendas</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Data</th>
      <th>Cliente</th>
      <th>Valor Total (R$)</th>
      <th>Forma de Pagamento</th>
    </tr>
    <?php foreach ($vendas as $venda): ?>
      <tr>
        <td><?= $venda['id'] ?></td>
        <td><?= date('d/m/Y H:i', strtotime($venda['data_venda'])) ?></td>
        <td><?= $venda['nome'] ?? 'Não informado' ?></td>
        <td><?= number_format($venda['valor_total'], 2, ',', '.') ?></td>
        <td><?= $venda['formas_pagamento'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h2>Estoque Atual</h2>
  <table>
    <tr>
      <th>Produto</th>
      <th>Categoria</th>
      <th>Preço (R$)</th>
      <th>Estoque</th>
    </tr>
    <?php foreach ($produtos as $produto): ?>
      <tr>
        <td><?= $produto['nomeProduto'] ?></td>
        <td><?= $produto['categorias'] ?></td>
        <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
        <td><?= $produto['estoque'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <a href="dashboard.php">← Voltar ao PDV</a>
</body>
</html>
