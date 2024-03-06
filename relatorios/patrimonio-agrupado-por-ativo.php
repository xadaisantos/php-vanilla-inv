<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);

$ativos = $compras->getPatrimonioAgrupadoPorAtivos();
$soma = array_reduce($ativos, function ($carry, $item) { return $carry + $item['total']; });

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

    <h1>Patrimonio Agrupado Por Ativo</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ativo</th>
                <th>Cotas</th>
                <th>Preco Medio</th>
                <th>Total</th>
                <th>Porcentagem</th>
                <th>Primeira Compra</th>
                <th>Ultima Compra</th>
            </tr>
            <tr>
                <th>Todos</th>
                <th></th>
                <th></th>
                <th>R$ <?= number_format($soma, 2, ",", ".") ?></th>
                <th><?= number_format(100, 2, ",", ".") ?> %</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ativos as $ativo) : ?>
                <tr>
                    <td><?= $ativo['ativo'] ?></td>
                    <td><?= $ativo['cotas'] ?></td>
                    <td>R$ <?= $ativo['preco_medio'] ?></td>
                    <td>R$ <?= number_format($ativo['total'], 2, ",", ".") ?></td>
                    <td><?= number_format(($ativo['total'] / $soma) * 100, 2) ?> %</td>
                    <td><?= DateTime::createFromFormat("Y-m-d", $ativo['primeira_compra'])->format("d/m/Y") ?></td>
                    <td><?= DateTime::createFromFormat("Y-m-d", $ativo['ultima_compra'])->format("d/m/Y") ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>