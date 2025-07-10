<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Cliente</title>
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
    input {
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
  <form action="inserirCliente.php" method="POST">
    <h2>Cadastro de Cliente</h2>
    <input type="text" name="nomeCliente" placeholder="Nome completo" required>
    <input type="text" name="telefoneCliente" placeholder="Telefone" required>
    <input type="email" name="emailCliente" placeholder="E-mail" required>
    <input type="text" name="enderecoCliente" placeholder="Endereço" required>
    <input type="text" name="cpfCliente" placeholder="CPF (somente números)" maxlength="11" required>
    <button type="submit">Cadastrar</button>
  </form>

    <a href="dashboard.php" class="sair">Voltar ao Menu Principal</a>
</body>
</html>
