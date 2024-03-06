exemplo de codigo pra copiar csv pro postgres pelo php:

$path = $path = "../../../../../Downloads/compras.csv";

$row = 1;
if (($handle = fopen($path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $item = [];
        $item['ativo'] = $data[0];
        $item['tipo_da_operacao'] = $data[1];
        $item['quantidade'] = intval($data[2]);
        $item['preco_unitario'] = floatval( str_replace(",", ".", str_replace(".", "", $data[3])) );
        $item['preco_total'] = floatval( str_replace(",", ".", str_replace(".", "", $data[4])) );
        $item['data'] = DateTime::createFromFormat("d/m/Y", $data[5])->format("Y-m-d");
        $compras = new ComprasVendas($pdo);
        //$compras->insert($item);
    }
    fclose($handle);
}

no navegador, digite http://localhost:8084/index.php
