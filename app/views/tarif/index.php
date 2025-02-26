<?php
session_start();
require '../../../config/config.php';
require '../../managers/TarifManager.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}

$userCategory = $_SESSION['user']['num_categ'];
/** @var PDO $pdo */
$tarifManager = new TarifManager($pdo);
$tarifs = $tarifManager->getByCategory($userCategory);
?>

<h2>Tarifs des prestations pour votre catégorie</h2>
<table border="1">
    <tr>
        <th>Prestation</th>
        <th>Prix</th>
    </tr>
    <?php foreach ($tarifs as $tarif): ?>
        <tr>
            <td><?= htmlspecialchars($tarif['lib_prest']) ?></td>
            <td><?= htmlspecialchars($tarif['prix']) ?> €</td>
        </tr>
    <?php endforeach; ?>
</table>
