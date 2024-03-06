<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);

$dados = $compras->getPatrimonioAgrupadoPorMes();
$meses = [12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1];
$anos = array_values(array_unique(array_map(function ($x) { return $x['ano']; }, $dados)));

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

    <h1>Patrimonio Agrupado Por Mes</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anos as $ano) : ?>
                <?php foreach ($meses as $mes) : ?>
                <tr>
                    <?php
                    
                    $periodo = "01" . "/" . $mes . "/" . $ano;
                    $periodo = DateTime::createFromFormat("d/m/Y", $periodo)->format("m/Y");
                    
                    ?>
                    <td><?= $periodo ?></td>
                    <?php
                    
                    $valor = array_values(array_filter($dados, function ($x) use ($ano, $mes) { return $x['ano'] == $ano and $x['mes'] == $mes; }));
                    
                    $valor = isset($valor[0]) && isset($valor[0]['total']) ? "R$ " . number_format($valor[0]['total'], 2, ",", ".") : '-';
                    
                    ?>
                    <td><?= $valor ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>