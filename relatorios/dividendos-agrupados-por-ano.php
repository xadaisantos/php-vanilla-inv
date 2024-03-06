<?php

require '../config.php';
require '../src/Dividendos.php';
require '../src/ComprasVendas.php';

$dividendos = new Dividendos($pdo);
$compras = new ComprasVendas($pdo);

$anos = $dividendos->getDividendosAgrupadosPorAno();

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

    <h1>Dividendos agrupados Por Ano</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Valor</th>
                <th>Yield do Ano</th>
            </tr>
            <tr>
                <th>Total</th>
                <th>R$ <?= number_format(array_reduce($anos, function ($carry, $item) { return $carry + $item['total'];}), 2, ",", ".") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anos as $ano) : ?>
                <?php

                $ultimoDiaDoAnoComData = "{$ano['ano']}-12-31";
                $patrimonioNoFimDoAno = $compras->getPatrimonioTotalNaData($ultimoDiaDoAnoComData)['total'];
                $yieldNoAno = ($ano['total'] / $patrimonioNoFimDoAno) * 100;
                    
                ?>
            <tr>
                <td><?= $ano['ano'] ?></td>
                <td>R$ <?= number_format($ano['total'], 2, ",", ".") ?></td>
                <td><?= number_format($yieldNoAno, 2, ",", ".") ?>%</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    
</body>
</html>