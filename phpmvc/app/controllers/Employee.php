<?php 

class Employee extends Controller {
  public function index()
  {
    $data["page-title"] = 'Employee Lists';
    $data["employees"] = $this -> model ("Employee_model") -> getAllEmployees();
    $this -> view ('templates/header', $data);
    $this -> view ('employee/index', $data);
    $this -> view ('templates/footer');
  }
}