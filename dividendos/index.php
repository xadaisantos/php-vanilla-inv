<?php

require '../config.php';
require '../src/Dividendos.php';

$dividendos = new Dividendos($pdo);
$dividendos = $dividendos->getAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <h1>
        Dividendos
        <?= $dividendos ? " ({$dividendos->rowCount()})" : "" ?>
    </h1>

    <ul>
        <li><a href="../index.php">Voltar</a></li>
        <li><a href="./formulario_adicionar.php">Adicionar</a></li>
    </ul>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ativo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Acoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dividendos as $dividendo) : ?>
                <tr>
                    <td><?= $dividendo['ativo'] ?></td>
                    <td><?= $dividendo['quantidade'] ?></td>
                    <td>R$ <?= number_format($dividendo['valor'], 2, ",", ".") ?></td>
                    <td><?= DateTime::createFromFormat("Y-m-d", $dividendo['data'])->format("d/m/Y") ?></td>
                    <td>
                        <button onclick="excluir('<?= $dividendo['id'] ?>')">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>

    <script>
        function excluir(id) {
            if (confirm("Deseja excluir o registro?") && confirm("Tem certeza?")) {
                window.open(`delete.php?id=${id}`, '_self')
            }
        }
    </script>
    
</body>
</html>