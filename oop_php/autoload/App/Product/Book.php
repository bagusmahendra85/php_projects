<?php 

class Book extends Product implements ProductInfo {
  protected $pages;

  public function __construct($name, $author, $releasedBy, $price, $pages)
  {
    parent::__construct($name, $author, $releasedBy, $price);
    $this -> pages = $pages;
  }

  public function getProductInfo() {
    return "{$this -> name} | {$this -> author}, {$this -> releasedBy} (Rp. {$this -> getPrice()})";
  }

  public function getInfo()
  {
    return "Book : " . $this -> getProductInfo() . " - {$this -> pages} Pages.";
  }
}