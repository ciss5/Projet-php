<?php
require '../../../../config/config.php';
require '../../../managers/TarifManager.php';
/** @var PDO $pdo */
$tarifManager = new TarifManager($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num_prest = $_POST['num_prest'];
    $num_categ = $_POST['num_categ'];
    $prix = $_POST['prix'];

    $tarifManager->update($num_prest, $num_categ, $prix);

    header("Location: index.php");
    exit();
}

$num_prest = $_GET['num_prest'];
$num_categ = $_GET['num_categ'];

$stmt = $pdo->prepare("SELECT * FROM tarif WHERE num_prest = ? AND num_categ = ?");
$stmt->execute([$num_prest, $num_categ]);
$tarif = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="POST">
    <input type="hidden" name="num_prest" value="<?= htmlspecialchars($tarif['num_prest']) ?>">
    <input type="hidden" name="num_categ" value="<?= htmlspecialchars($tarif['num_categ']) ?>">

    <label>Prix:</label>
    <input type="text" name="prix" value="<?= htmlspecialchars($tarif['prix']) ?>" required><br>

    <button type="submit">Modifier</button>
</form>
