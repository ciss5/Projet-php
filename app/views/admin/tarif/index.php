<?php
session_start();
require '../../../../config/config.php';

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../../auth/login.php");
    exit();
}

// Récupération de la catégorie de l'utilisateur connecté
$userCategory = $_SESSION['user']['num_categ'];

$sql = "SELECT prestation.lib_prest, tarif.prix 
        FROM tarif 
        JOIN prestation ON tarif.num_prest = prestation.num_prest 
        WHERE tarif.num_categ = ?";
/** @var PDO $pdo */
$stmt = $pdo->prepare($sql);
$stmt->execute([$userCategory]);
$tarifs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Tarifs des prestations</h2>
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
