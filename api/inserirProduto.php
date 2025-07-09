<?php
require_once 'conexao.php';

$nome = $_POST['nomeProduto'];
$descricao = $_POST['descricaoProduto'];
$preco = $_POST['precoProduto'];
$estoque = $_POST['quantidadeEstoque'];
$categoria = $_POST['categoriaProduto'];

try {
    $sql = "INSERT INTO produtos (nomeProduto, descricao, preco, estoque, categorias)
            VALUES (:nome, :descricao, :preco, :estoque, :categoria)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':preco' => $preco,
        ':estoque' => $estoque,
        ':categoria' => $categoria
    ]);

    echo "Produto cadastrado com sucesso! <a href='cadastrarProduto.php'>Voltar</a>";

} catch (PDOException $e) {
    echo "Erro ao cadastrar produto: " . $e->getMessage();
}
?>
