<?php

abstract class Product {
  protected $name,
            $author,
            $releasedBy,
            $price;
  
  private $discount = 0;

  protected function __construct($name, $author, $releasedBy,$price) {
    $this -> name = $name;
    $this -> author = $author;
    $this -> releasedBy = $releasedBy;
    $this -> price = $price;
  }

  //setter
  public function setName($name) {
    $this -> name = $name;
  }

  public function setAuthor($author) {
    $this -> author = $author;
  }

  public function setReleased($releasedBy) {
    $this -> releasedBy = $releasedBy;
  }

  public function setBasePrice($price) {
    $this -> price = $price;
  }
  
  public function setDiscount($discount) {
    $this -> discount = $discount;
  }

  //getter
  public function getName() {
    return $this -> name;
  }

  public function getAuthor() {
    return $this -> author;
  }

  public function getReleased() {
    return $this -> releasedBy;
  }

  public function getPrice() {
    return $this->price - ($this->price * $this->discount / 100);
  }

  public function getLabel() {
    return "$this->author, $this->releasedBy";
  }

  // abstract method
  abstract public function getProductInfo();
  
}