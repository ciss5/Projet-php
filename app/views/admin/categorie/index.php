<?php
require '../../../../config/config.php';
/** @var PDO $pdo */
$sql = "SELECT * FROM categorie";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll();
?>

<a href="create.php">Ajouter une catégorie</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><?= $categorie['id'] ?></td>
            <td><?= $categorie['nom'] ?></td>
            <td>
                <a href="edit.php?id=<?= $categorie['id'] ?>">Modifier</a>
                <a href="delete.php?id=<?= $categorie['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
