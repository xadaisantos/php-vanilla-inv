<?php

require '../config.php';
require '../src/Dividendos.php';
require '../src/ComprasVendas.php';

$dividendos = new Dividendos($pdo);
$compras = new ComprasVendas($pdo);

$meses = $dividendos->getDividendosAgrupadosPorMes();
$maior = max(array_map(function ($x) { return $x['total']; }, $meses));

function mediaDosUltimosXMeses($array, $meses)
{
    $array = array_slice($array, 0, $meses);
    $array = array_map(function ($mes) { return $mes['total']; }, $array);
    $array = array_reduce($array, function ($carry, $item) { return $carry + $item; });
    return $array / $meses;
}

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

    <h1>Dividendos agrupados Por mes</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Media dos ultimos</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ([3, 6, 9, 12] as $numero) : ?>
                <tr>
                    <td><?= $numero ?> meses</td>
                    <td>R$ <?= number_format(mediaDosUltimosXMeses($meses, $numero), 2, ",", ".") ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Valor</th>
                <th>Yield no Mes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meses as $mes) : ?>
            <tr>
                <?php

                $periodo = "01" . "/" . $mes['mes'] . "/" . $mes['ano'];
                $periodo = DateTime::createFromFormat("d/m/Y", $periodo)->format("m/Y");

                $porcentagemPintado = number_format(($mes['total'] / $maior) * 100, 2);

                $ultimoDiaDoMesComData = DateTime::createFromFormat("d/m/Y", "01" . "/" . $mes['mes'] . "/" . $mes['ano'])->format("Y-m-t");
                $patrimonioNoFimDoMes = $compras->getPatrimonioTotalNaData($ultimoDiaDoMesComData)['total'];
                $yieldNoMes = ($mes['total'] / $patrimonioNoFimDoMes) * 100;
                
                ?>
                <td><?= $periodo ?></td>
                <td style="background: linear-gradient(90deg, lightgreen <?=$porcentagemPintado?>%, white <?=$porcentagemPintado?>% 100%);">R$ <?= number_format($mes['total'], 2, ",", ".") ?></td>
                <td><?= number_format($yieldNoMes, 2, ",", ".") ?>%</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    
</body>
</html>