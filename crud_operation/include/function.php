<?php 
// load database connections
require "../include/connection.php";
//------------------------------
// query functions ------------------------------
function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}
// query functions end ------------------------------

//insert data ------------------------------
function insert($data) {
  global $conn;

  // store data into variables
  $nik = htmlspecialchars($data["nik"]);
  $nomor_kk = htmlspecialchars($data["nomor_kk"]);
  $nama = htmlspecialchars($data["nama"]);
  $banjar = htmlspecialchars($data["banjar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $email = htmlspecialchars($data["email"]);
  $foto = upload();
  if (!$foto) {
    return false;
  }
  // Validate and sanitize $tgl_lahir (date of birth)
  $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));

  $query = "INSERT INTO crud_data_penduduk (id, nik, nomor_kk, nama, banjar, tempat_lahir, tgl_lahir, jenis_kelamin, email, foto) VALUES 
            (NULL, '$nik', '$nomor_kk', '$nama', $banjar, '$tempat_lahir', '$tgl_lahir', $jenis_kelamin, '$email', '$foto')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}
//insert data end ------------------------------

// delete data ------------------------------
function drop($id) {
  global $conn;

  mysqli_query($conn, "DELETE FROM crud_data_penduduk WHERE id=$id");
  
  return mysqli_affected_rows($conn);
}

// delete data end ------------------------------

// search function ------------------------------
function search($keyword, $category) {
  $query = "
  SELECT
        cp.id,
        cp.nik,
        cp.nomor_kk,
        cp.nama,
        rb.nama_banjar AS banjar,
        rg.jenis_kelamin AS jenis_kelamin,
        cp.tempat_lahir,
        cp.tgl_lahir,
        cp.email,
        cp.foto
    FROM
        crud_data_penduduk AS cp
    JOIN
        ref_banjar AS rb ON cp.banjar = rb.id
    JOIN
        ref_gender AS rg ON cp.jenis_kelamin = rg.id
    WHERE
        $category LIKE '%$keyword%' 
    ORDER BY cp.nomor_kk ASC;
  ";

  return query($query);
}
// search function end ------------------------------

//update data ------------------------------

function update($data) {
  global $conn;
  
  $id = $data["id"];
  $nik = htmlspecialchars($data["nik"]);
  $nomor_kk = htmlspecialchars($data["nomor_kk"]);
  $nama = htmlspecialchars($data["nama"]);
  $banjar = htmlspecialchars($data["banjar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $email = htmlspecialchars($data["email"]);
  $oldPhoto = htmlspecialchars($data["oldPhoto"]);
  $tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));

  if ( $_FILES["photo"]["error"] == 4 ) {
    $foto = $oldPhoto;
  } else {
    $foto = upload();
  }

  $query = "UPDATE crud_data_penduduk SET 
            nik = '$nik', 
            nomor_kk = '$nomor_kk', 
            nama = '$nama', 
            banjar = $banjar,
            tempat_lahir = '$tempat_lahir', 
            tgl_lahir = '$tgl_lahir', 
            jenis_kelamin = $jenis_kelamin,
            email = '$email', 
            foto = '$foto' WHERE id = $id;";

  mysqli_query($conn, $query);


  return mysqli_affected_rows($conn);

}
//update data end ------------------------------

// upload ------------------------------

function upload() {
  $fileName = $_FILES['photo']['name'];
  $fileSize = $_FILES['photo']['size']; // in bytes
  $error = $_FILES['photo']['error'];
  $tmpName = $_FILES['photo']['tmp_name'];

  // check if there is photo uploaded
  if ($error === 4) {
    echo "
    <script>alert('Silahkan upload foto terlebih dahulu!');</script>
    ";
    return false;
  }
  // file type validation
  $allowedExtensions = ['jpg', 'jpeg', 'png','bmp','webp'];
  $photoExtension = explode('.', $fileName);
  $photoExtension = strtolower(end($photoExtension));

  if ( !in_array($photoExtension, $allowedExtensions) ) {
    echo "
    <script>alert('File foto tidak valid!');</script>
    ";

    return false;
  }
  // file size validation
  if ($fileSize > 2500000) { // higher than 2MB
    echo "
    <script>alert('File tidak boleh melebihi 2MB');</script>
    ";

    return false;
  }

  // checking passed
  // generate new file name
  $newFileName = uniqid();
  $newFileName .= '.';
  $newFileName .= $photoExtension;

  // move uploaded photo dir
  move_uploaded_file($tmpName, "../usr/data/photos/". $newFileName);

  return $newFileName;
}

// upload end ------------------------------

// register/sign up ------------------------------

function userSignup($data) {
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confirmPassword = mysqli_real_escape_string($conn, $data["confirmPassword"]);
  $user_email = $data["email"];
  $user_fullname = htmlspecialchars($data["fullname"]);

  //existing username on database check
  $usernameQuery = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username';");

  if (mysqli_fetch_assoc($usernameQuery)) {
    echo "
    <script>alert('Username sudah terdaftar!');</script>
    ";

    return false;
  }

  //password confirmation check

  if ( $password != $confirmPassword ) {
    echo "<script>alert('Password tidak sama!');</script>";
    return false;
  }

  //encrypt password
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  //pass data on to database
  mysqli_query($conn, "
    INSERT INTO users (id, username, password, email, fullname) VALUES 
    (NULL, '$username', '$password', '$user_email', '$user_fullname')
  ;");

  return mysqli_affected_rows($conn);

}

// register/sign up end ------------------------------



?>