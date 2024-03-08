<?php 

class ProductRegistered {
  public $productLists = [];

  public function insertNew($product) {
    $this -> productLists[] = $product;
  }

  public function displayAll() {
    ?>
    <h3>Product Lists : </h3>

    <ul>
      <?php foreach ($this -> productLists as $product) : ?>
        <li><?= $product -> getInfo() ?></li>  
      <?php endforeach; ?>
    </ul>

    <?php
  }
}