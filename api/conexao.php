<?php
$host = 'mysql-sistema-pdv.alwaysdata.net';
$dbname = 'sistema-pdv_sistema-pdv';
$usuario = '422099';
$senha = 'lucascarvalho';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
