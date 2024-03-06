<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);
$dados = $compras->getPatrimonioAgrupadoPorAnoPorAtivo();
$ativos = array_values(array_unique(array_map(function ($x) { return $x['ativo']; }, $dados)));
$anos = array_values(array_unique(array_map(function ($x) { return $x['ano']; }, $dados)));
sort($ativos);
rsort($anos);

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

    <h1>Patrimonio Agrupado Por Ano e por ativos</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ativo</th>
                <?php foreach ($anos as $ano) : ?>
                    <th colspan="3"><?= $ano ?></th>
                <?php endforeach; ?>
            </tr>
            <tr>
                <th></th>
                <?php foreach ($anos as $ano) : ?>
                    <th>Valor</th>
                    <th>Cotas</th>
                    <th>Preco Medio</th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ativos as $ativo) : ?>
                <tr>
                    <td><?= $ativo ?></td>
                    <?php foreach ($anos as $ano) : ?>
                        <?php
                            
                        $valor = array_values(array_filter($dados, function ($x) use ($ano, $ativo) { return $x['ano'] == $ano && $x['ativo'] == $ativo; }));

                        $total = isset($valor[0]) && isset($valor[0]['total']) ? "R$ " . number_format($valor[0]['total'], 2, ",", ".") : '-';

                        $quantidade = isset($valor[0]) && isset($valor[0]['quantidade']) ? $valor[0]['quantidade'] : '-';

                        $precoMedio = isset($valor[0]) && isset($valor[0]['total']) && isset($valor[0]['quantidade']) ? "R$ " . number_format($valor[0]['total'] / $valor[0]['quantidade'], 2, ",", ".") : '-';
                            
                        ?>
                        <td>
                            <?= $total ?>
                        </td>
                        <td>
                            <?= $quantidade ?>
                        </td>
                        <td><?= $precoMedio ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>            
        </tbody>
    </table>
    
</body>
</html>