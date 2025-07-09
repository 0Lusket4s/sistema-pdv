<?php
require_once 'conexao.php';

$nome = $_POST['nomeCliente'];
$telefone = $_POST['telefoneCliente'];
$email = $_POST['emailCliente'];
$endereco = $_POST['enderecoCliente'];
$cpf = $_POST['cpfCliente'];
$dataCadastro = date('Y-m-d');

try {
    $sql = "INSERT INTO clientes (nome, telefone, email, endereco, cpf, data_cadastro)
            VALUES (:nome, :telefone, :email, :endereco, :cpf, :data)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':telefone' => $telefone,
        ':email' => $email,
        ':endereco' => $endereco,
        ':cpf' => $cpf,
        ':data' => $dataCadastro
    ]);

    echo "Cliente cadastrado com sucesso! <a href='cadastrarCliente.php'>Voltar</a>";

} catch (PDOException $e) {
    echo "Erro ao cadastrar cliente: " . $e->getMessage();
}
?>
