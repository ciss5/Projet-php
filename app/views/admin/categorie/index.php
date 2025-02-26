<?php
require '../../../../config/config.php';
/** @var PDO $pdo */
$sql = "SELECT * FROM categorie";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$categories) {
    echo "<p>Aucune catégorie trouvée.</p>";
} else {
    ?>
    <a href="create.php">Ajouter une catégorie</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($categories as $categorie): ?>
            <tr>
                <td><?= isset($categorie['num_categ']) ? htmlspecialchars($categorie['num_categ']) : 'N/A' ?></td>
                <td><?= isset($categorie['lib_categ']) ? htmlspecialchars($categorie['lib_categ']) : 'N/A' ?></td>
                <td>
                    <a href="delete.php?id=<?= htmlspecialchars($categorie['num_categ']) ?>">Modifier</a>
                    <a href="delete.php?id=<?= htmlspecialchars($categorie['num_categ']) ?>" onclick="return confirm('Supprimer cette catégorie ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
}
?>
