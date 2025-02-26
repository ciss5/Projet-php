<?php
require '../../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $avatar = htmlspecialchars($_POST['avatar']);

    /** @var PDO $pdo */
    $sql = "INSERT INTO utilisateurs (nom, email, password, avatar, role) VALUES (?, ?, ?, ?, 'user')";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nom, $email, $password, $avatar])) {
        echo "Compte créé avec succès ! <a href='login.php'>Se connecter</a>";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="text" name="avatar" placeholder="Lien vers avatar">
    <button type="submit">S'inscrire</button>
</form>
