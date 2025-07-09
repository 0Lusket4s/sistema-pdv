<?php
require_once '../conexao.php';

$itensJson = $_POST['itens'];
$formaPagamento = $_POST['formaPagamento'];
$cliente_id = $_POST['cliente_id'];
$itens = json_decode($itensJson, true);
$total = 0;

try {
    foreach ($itens as $item) {
        $total += $item['preco'];
    }

    $stmt = $pdo->prepare("INSERT INTO vendas (cliente_id, valor_total, formas_pagamento, status)
                           VALUES (:cliente_id, :valor_total, :formas_pagamento, 'Concluído')");
    $stmt->execute([
        ':cliente_id' => $cliente_id,
        ':valor_total' => $total,
        ':formas_pagamento' => $formaPagamento
    ]);
    $vendaId = $pdo->lastInsertId();

    foreach ($itens as $item) {
        $stmtItem = $pdo->prepare("INSERT INTO itens_venda (venda_id, produto_id, quantidade, preco_unitario)
                                   VALUES (:venda_id, :produto_id, 1, :preco)");
        $stmtItem->execute([
            ':venda_id' => $vendaId,
            ':produto_id' => $item['id'],
            ':preco' => $item['preco']
        ]);

        $pdo->prepare("UPDATE produtos SET estoque = estoque - 1 WHERE id = :id")
            ->execute([':id' => $item['id']]);
    }

    echo "Pedido finalizado com sucesso! <a href='../../pdv.php'>Voltar</a>";

} catch (PDOException $e) {
    echo "Erro ao finalizar pedido: " . $e->getMessage();
}
?>