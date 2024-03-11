<?php 

class Employee_model {
  public function getAllEmployees()
  {
    $this -> stmt = $this -> dbh -> prepare('SELECT * FROM employees');
    $this -> stmt -> execute();
    return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);
  }
}