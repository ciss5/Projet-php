<?php
class Tarif {
    public $num_prest;
    public $num_categ;
    public $prix;

    public function __construct($num_prest, $num_categ, $prix) {
        $this->num_prest = $num_prest;
        $this->num_categ = $num_categ;
        $this->prix = $prix;
    }
}
?>
