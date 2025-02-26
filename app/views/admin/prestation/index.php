<?php
require '../../../../config/config.php';
require '../../../managers/PrestationManager.php';
/** @var PDO $pdo */
$prestationManager = new PrestationManager($pdo);
$prestations = $prestationManager->getAll();
?>

<a href="create.php">Ajouter une prestation</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($prestations as $prestation): ?>
        <tr>
            <td><?= htmlspecialchars($prestation['num_prest']) ?></td>
            <td><?= htmlspecialchars($prestation['lib_prest']) ?></td>
            <td>
                <a href="edit.php?id=<?= htmlspecialchars($prestation['num_prest']) ?>">Modifier</a>
                <a href="delete.php?id=<?= htmlspecialchars($prestation['num_prest']) ?>" onclick="return confirm('Supprimer cette prestation ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
