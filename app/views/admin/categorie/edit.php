<?php
require '../../../../config/config.php';

if (isset($_GET['id'])) {
    $sql = "DELETE FROM categorie WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
}

header("Location: index.php");
?>
