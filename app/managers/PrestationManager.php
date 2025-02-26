<?php
require_once __DIR__ . '/../models/Prestation.php';

class PrestationManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM prestation");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($num_prest) {
        $stmt = $this->pdo->prepare("SELECT * FROM prestation WHERE num_prest = ?");
        $stmt->execute([$num_prest]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($lib_prest) {
        $stmt = $this->pdo->prepare("INSERT INTO prestation (lib_prest) VALUES (?)");
        return $stmt->execute([$lib_prest]);
    }

    public function update($num_prest, $lib_prest) {
        $stmt = $this->pdo->prepare("UPDATE prestation SET lib_prest = ? WHERE num_prest = ?");
        return $stmt->execute([$lib_prest, $num_prest]);
    }

    public function delete($num_prest) {
        $stmt = $this->pdo->prepare("DELETE FROM prestation WHERE num_prest = ?");
        return $stmt->execute([$num_prest]);
    }
}
?>
