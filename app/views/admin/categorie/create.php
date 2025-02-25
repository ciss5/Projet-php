<?php
require '../../../../config/config.php';
/** @var PDO $pdo */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $sql = "INSERT INTO categorie (nom) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom]);
    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom de la catégorie" required>
    <button type="submit">Ajouter</button>
</form>
