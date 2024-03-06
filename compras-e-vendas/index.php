<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);
$compras = $compras->getAll();

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
        Compras e Vendas
        <?= $compras ? " ({$compras->rowCount()})" : "" ?>
    </h1>

    <ul>
        <li><a href="../index.php">Voltar</a></li>
        <li><a href="./formulario_adicionar.php">Adicionar</a></li>
    </ul>

    <table class="tabela-padrao">
        <thead>
            <tr>
                <th>Ativo</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Preco Unitario</th>
                <th>Preco Total</th>
                <th>Data</th>
                <th>Acoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra) : ?>
                <tr>
                    <td><?= $compra['ativo'] ?></td>
                    <td><?= $compra['tipo_da_operacao'] ?></td>
                    <td><?= $compra['quantidade'] ?></td>
                    <td>R$ <?= number_format($compra['preco_unitario'], 2, ",", ".") ?></td>
                    <td>R$ <?= number_format($compra['preco_total'], 2, ",", ".") ?></td>
                    <td><?= DateTime::createFromFormat("Y-m-d", $compra['data'])->format("d/m/Y") ?></td>
                    <td>
                        <button onclick="excluir('<?= $compra['id'] ?>')">Excluir</button>
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