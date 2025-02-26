<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Tarif</title>
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

<h2>Ajouter un Tarif</h2>
<form method="POST">
    <label>ID Prestation:</label>
    <input type="number" name="num_prest" required>

    <label>ID Catégorie:</label>
    <input type="number" name="num_categ" required>

    <label>Prix:</label>
    <input type="text" name="prix" required>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
