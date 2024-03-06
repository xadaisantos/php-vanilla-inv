<?php

require '../config.php';
require '../src/Dividendos.php';

$dividendos = new Dividendos($pdo);
$id = intval($_GET['id']);
$dividendos->delete($id);
header("Location: index.php");
die();
