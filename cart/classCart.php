<?php

class Cart {
    public $id;
    public $intitule;
    public $prix;
    public $description;


    public function hydrateCart(array $datas) {
        foreach($datas as $key => $value) {
            if (property_exists('Cart', $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>