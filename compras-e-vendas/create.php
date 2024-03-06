<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);
$compra = [
    'ativo' => trim(strtoupper($_POST['ativo'])),
    'tipo_da_operacao' => trim($_POST['tipo_da_operacao']),
    'quantidade' => intval($_POST['quantidade']),
    'preco_unitario' => floatval($_POST['preco_unitario']),
    'preco_total' => floatval($_POST['quantidade']) * floatval($_POST['preco_unitario']),
    'data' => DateTime::createFromFormat("d/m/Y", $_POST['data'])->format("Y-m-d")
];

$compras->insert($compra);
header("Location: index.php");
die();
