<?php

require '../config.php';
require '../src/Dividendos.php';

$dividendos = new Dividendos($pdo);
$dividendo = [
    'ativo' => trim(strtoupper($_POST['ativo'])),
    'quantidade' => intval($_POST['quantidade']),
    'valor' => floatval($_POST['valor']),
    'data' => DateTime::createFromFormat("d/m/Y", $_POST['data'])->format("Y-m-d")
];

$dividendos->insert($dividendo);
header("Location: index.php");
die();
