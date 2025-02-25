<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

echo "Bienvenue, " . $_SESSION['user']['nom'];

if ($_SESSION['user']['role'] == 'admin') {
    echo '<a href="../admin/index.php">Administration</a>';
}
?>

<a href="../auth/logout.php">Déconnexion</a>
