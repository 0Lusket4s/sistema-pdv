<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produto</title>
  <style>
    body {
      margin: auto 0;
      font-family: Arial;
      background-color: #CBCBCB;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
    }
    form {
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px #00000022;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    input, select, textarea {
      display: block;
      width: 100%;
      padding: 8px;
      margin-bottom: 12px;
    }
    button {
      background-color: #004aad;
      color: white;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 8px;
    }
.sair{ 
      height: 30px;
      margin-top: 20px;
      background-color: #004aad;
      color: white;
      text-decoration: none;
      padding: 10px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      text-align: center;      
    }
  </style>
</head>
<body>
  <form action="inserirProduto.php" method="POST">
    <h2>Cadastro de Produto</h2>
    <input type="text" name="nomeProduto" placeholder="Nome do Produto" required>
    <textarea name="descricaoProduto" placeholder="Descrição" required></textarea>
    <input type="number" step="0.01" name="precoProduto" placeholder="Preço" required>
    <input type="number" name="quantidadeEstoque" placeholder="Quantidade em Estoque" required>
    <select name="categoriaProduto" required>
      <option value="">Selecione a Categoria</option>
      <option value="Hambúrguer">Hambúrguer</option>
      <option value="Bebida">Bebida</option>
      <option value="Sobremesa">Sobremesa</option>
    </select>
    <button type="submit">Cadastrar Produto</button>
  </form>

    <a href="dashboard.php" class="sair">Voltar ao Menu Principal</a>

</body>
</html>
