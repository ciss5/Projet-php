<?php
class Prestation {
    public $num_prest;
    public $lib_prest;

    public function __construct($num_prest, $lib_prest) {
        $this->num_prest = $num_prest;
        $this->lib_prest = $lib_prest;
    }
}
?>
