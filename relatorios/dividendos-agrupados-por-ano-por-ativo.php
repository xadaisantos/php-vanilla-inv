<?php

require '../config.php';
require '../src/Dividendos.php';

$dividendos = new Dividendos($pdo);

$dados = $dividendos->getDividendosAgrupadosPorAnoPorAtivo();
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

    <h1>Dividendos agrupados Por ano e por Ativos</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ativo</th>
                <?php foreach ($anos as $ano) : ?>
                    <th><?= $ano ?></th>
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

                        $valor = isset($valor[0]) && isset($valor[0]['total']) ? "R$ " . number_format($valor[0]['total'], 2, ",", ".") : '-';
                        
                        ?>
                        <td>
                            <?= $valor ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    
</body>
</html>