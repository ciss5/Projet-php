<?php
require '../../../config/config.php';
require '../../../managers/TarifManager.php';

$num_prest = $_GET['num_prest'];
$num_categ = $_GET['num_categ'];

$tarifManager = new TarifManager($pdo);
$tarifManager->delete($num_prest, $num_categ);

header("Location: index.php");
exit();
?>
