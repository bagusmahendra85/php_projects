<?php namespace App\Product;

class Game extends Product implements ProductInfo {
  protected $playTime;

  public function __construct($name, $author, $releasedBy, $price, $playTime)
  {
    parent::__construct($name, $author, $releasedBy, $price);
    $this -> playTime = $playTime;
  }

  public function getProductInfo() {
    return "{$this -> name} | {$this -> author}, {$this -> releasedBy} (Rp. {$this -> getPrice()})";
  }

  public function getInfo()
  {
    return "Game : " . $this -> getProductInfo() . " ~ {$this -> playTime} Hours.";
  }
}