<?php
require '../../../../config/config.php';
require '../../../managers/TarifManager.php';
/** @var PDO $pdo */
$tarifManager = new TarifManager($pdo);
$tarifs = $tarifManager->getAll();
?>

<a href="create.php">Ajouter un tarif</a>
<table border="1">
    <tr>
        <th>ID Prestation</th>
        <th>ID Catégorie</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tarifs as $tarif): ?>
        <tr>
            <td><?= htmlspecialchars($tarif['num_prest']) ?></td>
            <td><?= htmlspecialchars($tarif['num_categ']) ?></td>
            <td><?= htmlspecialchars($tarif['prix']) ?> €</td>
            <td>
                <a href="edit.php?num_prest=<?= htmlspecialchars($tarif['num_prest']) ?>&num_categ=<?= htmlspecialchars($tarif['num_categ']) ?>">Modifier</a>
                <a href="delete.php?num_prest=<?= htmlspecialchars($tarif['num_prest']) ?>&num_categ=<?= htmlspecialchars($tarif['num_categ']) ?>" onclick="return confirm('Supprimer ce tarif ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
