<?php

require '../config.php';
require '../src/ComprasVendas.php';

$compras = new ComprasVendas($pdo);
$id = intval($_GET['id']);
$compras->delete($id);
header("Location: index.php");
die();
