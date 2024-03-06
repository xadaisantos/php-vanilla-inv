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

    <h1>Adicionar Dividendos</h1>
    <div><a href="index.php">Voltar</a></div>

    <form action="create.php" method="post">
        <table>
            <tr>
                <td><label for="ativo">Ativo</label></td>
                <td><input type="text" name="ativo"></td>
            </tr>
            <tr>
                <td><label for="quantidade">Quantidade</label></td>
                <td><input type="number" name="quantidade" min="1" step="1"></td>
            </tr>
            <tr>
                <td><label for="valor">Valor</label></td>
                <td><input type="number" name="valor" min="0" step="0.01"></td>
            </tr>
            <tr>
                <td><label for="data">Data</label></td>
                <td><input type="text" name="data"></td>
            </tr>
        </table>
        <input type="submit" value="Adicionar">
    </form>
    
</body>
</html>