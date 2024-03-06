<?php

require '../config.php';
require '../src/Dividendos.php';
require '../src/ComprasVendas.php';

$dividendos = new Dividendos($pdo);
$compras = new ComprasVendas($pdo);

$ativos = $dividendos->getDividendosAgrupadosPorAtivos();

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

    <h1>Dividendos agrupados Por Ativos</h1>
    <div><a href="index.php">Voltar</a></div>
    <br>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ativo</th>
                <th>Valor</th>
                <th>Yield Ate Agora</th>
                <th>Primeiro Dividendo</th>
                <th>Ultimo Dividendo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ativos as $ativo) : ?>
                <?php

                $patrimonioDoAtivo = $compras->getPatrimonioTotalDoAtivoNaData($ativo['ativo'])['total'];
                $yieldDoAtivo = ($patrimonioDoAtivo == 0) ? 0 : ($ativo['total'] / $patrimonioDoAtivo) * 100 ;
                $yieldDoAtivo = is_finite($yieldDoAtivo) ? number_format($yieldDoAtivo, 2, ",", ".") . "%" : ' - ';
                
                ?>
            <tr>
                <td><?= $ativo['ativo'] ?></td>
                <td>R$ <?= number_format($ativo['total'], 2, ",", ".") ?></td>
                <td><?= $yieldDoAtivo ?></td>
                <td><?= DateTime::createFromFormat("Y-m-d", $ativo['primeiro_dividendo'])->format("d/m/Y") ?></td>
                <td><?= DateTime::createFromFormat("Y-m-d", $ativo['ultimo_dividendo'])->format("d/m/Y") ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    
</body>
</html>