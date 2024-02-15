<?php 
// load database connections
require "./config/connection.php";
require "modal.php";

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

//insert data
function insert($data) {
  global $conn;

  $nik = htmlspecialchars($data["nik"]);
  $nomor_kk = htmlspecialchars($data["nomor_kk"]);
  $nama = htmlspecialchars($data["nama"]);
  $banjar = htmlspecialchars($data["banjar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $email = htmlspecialchars($data["email"]);

  $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));

  $query = "INSERT INTO crud_data_penduduk (id, nik, nomor_kk, nama, banjar, tempat_lahir, tgl_lahir, jenis_kelamin, email, foto) VALUES 
            (NULL, '$nik', '$nomor_kk', '$nama', $banjar, '$tempat_lahir', '$tgl_lahir', $jenis_kelamin, '$email', '')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}
//insert data end

// delete data
function drop($id) {
  $operation = "Hapus Data";
  global $conn;

  mysqli_query($conn, "DELETE FROM crud_data_penduduk WHERE id=$id");
  if ( mysqli_affected_rows($conn) > 0 ) {
    show_result("Sukses hapus data", $operation);
  }

  
}

// delete data end



?>