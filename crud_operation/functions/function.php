<?php 
// load database connections
require "./config/connection.php";

// query functions
function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}
// query functions end

?>