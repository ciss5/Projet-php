<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Catégories</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>

<div class="navbar">
    <a href="/app/views/home/index.php">Accueil</a>
    <a href="/app/views/admin/categorie/index.php">Catégories</a>
    <a href="/app/views/admin/prestation/index.php">Prestations</a>
    <a href="/app/views/admin/tarif/index.php">Tarifs</a>
    <a href="/app/views/auth/logout.php">Déconnexion</a>
</div>

<h2>Gestion des Catégories</h2>
<a href="create.php">Ajouter une catégorie</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><?= htmlspecialchars($categorie['num_categ']) ?></td>
            <td><?= htmlspecialchars($categorie['lib_categ']) ?></td>
            <td class="action-buttons">
                <a class="edit-btn" href="edit.php?num_categ=<?= htmlspecialchars($categorie['num_categ']) ?>">Modifier</a>
                <a class="delete-btn" href="delete.php?num_categ=<?= htmlspecialchars($categorie['num_categ']) ?>" onclick="return confirm('Supprimer cette catégorie ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
