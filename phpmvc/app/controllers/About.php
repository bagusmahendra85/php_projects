<?php 

class About extends Controller{
  
  public function index() {
    $this -> view('about/index');
  }

  public function page() {
    echo "About/page";
  }
}