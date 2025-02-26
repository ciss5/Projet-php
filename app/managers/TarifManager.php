<?php
require_once __DIR__ . '/../models/Tarif.php';

class TarifManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM tarif");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCategory($num_categ) {
        $stmt = $this->pdo->prepare("SELECT prestation.lib_prest, tarif.prix 
                                     FROM tarif 
                                     JOIN prestation ON tarif.num_prest = prestation.num_prest 
                                     WHERE tarif.num_categ = ?");
        $stmt->execute([$num_categ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($num_prest, $num_categ, $prix) {
        $stmt = $this->pdo->prepare("INSERT INTO tarif (num_prest, num_categ, prix) VALUES (?, ?, ?)");
        return $stmt->execute([$num_prest, $num_categ, $prix]);
    }

    public function update($num_prest, $num_categ, $prix) {
        $stmt = $this->pdo->prepare("UPDATE tarif SET prix = ? WHERE num_prest = ? AND num_categ = ?");
        return $stmt->execute([$prix, $num_prest, $num_categ]);
    }

    public function delete($num_prest, $num_categ) {
        $stmt = $this->pdo->prepare("DELETE FROM tarif WHERE num_prest = ? AND num_categ = ?");
        return $stmt->execute([$num_prest, $num_categ]);
    }
}
?>
