<?php 
session_start();

if ( !isset($_SESSION["loggedIn"]) ) {
  header("Location: login.php");
  exit;
}

require '../include/function.php';

$id = $_GET["id"];
if (drop($id) > 0) {
  echo "
  <script>
    alert('Data Berhasil Dihapus');
    document.location.href = 'index.php';
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data Gagal Dihapus');
    document.location.href = 'index.php';
  </script>
  ";
}

?>