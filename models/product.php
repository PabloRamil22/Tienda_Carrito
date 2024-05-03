<?php
class Product {
    // Propiedades
    public $idproduct;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $image;
    public $idcartdetail;
    // Constructor
    public function __construct($idproduct, $quantity) {
      $this->idproduct=$idproduct;
      $this->quantity=$quantity;
    }

}
?>