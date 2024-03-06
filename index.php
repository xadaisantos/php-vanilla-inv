<?php

require './config.php';
require './src/ComprasVendas.php';

if ( empty($pdo) ) {
    echo "Database nao conectado.";
    die;
}

// $compras = new ComprasVendas($pdo);
// var_dump($compras->dropTable());
// var_dump($compras->createTable());

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
</head>
<body>

    <h1>Sua pagina de investimentos.</h1>

    <ol>
        <li><a href="compras-e-vendas/index.php">Compras e Vendas</a></li>
        <li><a href="dividendos/index.php">Dividendos</a></li>
        <li><a href="relatorios/index.php">Relatorios</a></li>
    </ol>
    
</body>
</html>