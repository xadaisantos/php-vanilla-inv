<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);

$anos = $compras->getPatrimonioAgrupadoPorAno();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <h1>Patrimonio Agrupado Por Ano</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Total</th>
            </tr>
            <tr>
                <th>Total</th>
                <th>R$ <?= number_format(array_reduce($anos, function ($carry, $item) { return $carry + $item['preco_total']; }), 2, ",", ".") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anos as $ano) : ?>
                <tr>
                    <td><?= $ano['ano'] ?></td>
                    <td>R$ <?= number_format($ano['preco_total'], 2, ",", ".") ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>