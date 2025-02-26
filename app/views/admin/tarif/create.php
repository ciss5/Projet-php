<?php
require '../../../../config/config.php';
require '../../../managers/TarifManager.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num_prest = $_POST['num_prest'];
    $num_categ = $_POST['num_categ'];
    $prix = $_POST['prix'];
    /** @var PDO $pdo */
    $tarifManager = new TarifManager($pdo);
    $tarifManager->create($num_prest, $num_categ, $prix);

    header("Location: index.php");
    exit();
}
?>

<form method="POST">
    <label>ID Prestation:</label>
    <input type="number" name="num_prest" required><br>

    <label>ID Catégorie:</label>
    <input type="number" name="num_categ" required><br>

    <label>Prix:</label>
    <input type="text" name="prix" required><br>

    <button type="submit">Ajouter</button>
</form>
