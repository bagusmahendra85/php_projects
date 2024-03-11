<?php 

class About extends Controller{
  
  public function index($name = "Mahendra", $job = "Full-stack Web Developer", $age = 28) {
    $data["name"] = $name;
    $data["job"] = $job;
    $data["age"] = $age;
    $data["page-title"] = "About Page";
    $this -> view('templates/header', $data);
    $this -> view('about/index', $data);
    $this -> view('templates/footer');
  }

  public function page() {
    $data["page-title"] = "Archives";
    $this -> view('templates/header', $data);
    $this -> view('about/page');
    $this -> view('templates/footer');
  }
}