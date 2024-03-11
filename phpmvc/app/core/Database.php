<?php 

class Database {
  private $db_host = DB_HOST;
  private $db_user = DB_USER;
  private $db_pass = DB_PASSWORD;
  private $db_name = DB_NAME;

  private $dbh;
  private $stmt;

  public function __construct()
  {
    // database source name
    $dsn = 'mysql:host=' . $this -> db_host . ';dbname=' . $this ->db_name;

    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRORMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this -> dbh = new PDO($dsn, $this -> db_user, $this -> db_pass, $this -> option);
    } catch (PDOException $e) {
      die($e -> getMessage());
    }

  }


  public function query($query) {
    $this -> stmt = $this -> dbh -> prepare($query);
  }



}