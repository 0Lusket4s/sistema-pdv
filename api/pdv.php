<?php
require_once '../Src/Database/conexao.php';

// Buscar produtos
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Buscar clientes
$stmtClientes = $pdo->query("SELECT id, nome FROM clientes ORDER BY nome");
$clientes = $stmtClientes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>PDV - Vendas</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f0f0f0;
      display: flex;
      gap: 20px;
      padding: 30px;
    }
    .produtos, .carrinho {
      flex: 1;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 8px #00000022;
    }
    .produto {
      border: 1px solid #ccc;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 8px;
    }
    .produto h4 {
      margin: 0 0 8px;
    }
    button {
      background-color: #004aad;
      color: #fff;
      border: none;
      padding: 8px;
      cursor: pointer;
      border-radius: 6px;
    }
    ul {
      list-style: none;
      padding: 0;
    }
    .carrinho-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 6px;
    }
  </style>
</head>
<body>
  <div class="produtos">
    <h2>Cardápio</h2>
    <?php foreach ($produtos as $produto): ?>
      <div class="produto">
        <h4><?= $produto['nomeProduto'] ?></h4>
        <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        <button onclick='adicionarCarrinho(<?= json_encode($produto) ?>)'>Adicionar</button>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="carrinho">
    <h2>Carrinho</h2>
    <ul id="listaCarrinho"></ul>
    <p><strong>Total: R$ <span id="total">0.00</span></strong></p>

    <form action="../Src/Venda/finalizarVenda.php" method="POST" onsubmit="return enviarCarrinho()">
      <input type="hidden" name="itens" id="itensInput">
      <label>Cliente:</label>
      <select name="cliente_id" required>
        <option value="">Selecione o cliente</option>
        <?php foreach ($clientes as $cliente): ?>
          <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
        <?php endforeach; ?>
      </select>
      <label>Forma de pagamento:</label>
      <select name="formaPagamento" required>
        <option value="Dinheiro">Dinheiro</option>
        <option value="Cartão">Cartão</option>
        <option value="Pix">Pix</option>
      </select>
      <br><br>
      <button type="submit">Finalizar Pedido</button>
    </form>
  </div>

  <script>
    let carrinho = [];

    function adicionarCarrinho(produto) {
      carrinho.push(produto);
      atualizarCarrinho();
    }

    function removerItem(index) {
      carrinho.splice(index, 1);
      atualizarCarrinho();
    }

    function atualizarCarrinho() {
      const lista = document.getElementById('listaCarrinho');
      const total = document.getElementById('total');
      let html = '';
      let soma = 0;

      carrinho.forEach((item, i) => {
        html += `<li class="carrinho-item">
                  ${item.nomeProduto} - R$ ${parseFloat(item.preco).toFixed(2)}
                  <button type="button" onclick="removerItem(${i})">Remover</button>
                </li>`;
        soma += parseFloat(item.preco);
      });

      lista.innerHTML = html;
      total.innerText = soma.toFixed(2);
    }

    function enviarCarrinho() {
      if (carrinho.length === 0) {
        alert("Adicione pelo menos 1 item ao carrinho.");
        return false;
      }
      document.getElementById('itensInput').value = JSON.stringify(carrinho);
      return true;
    }
  </script>
</body>
</html>
