<?php 
session_start();

if ( !isset($_SESSION["loggedIn"]) ) {
  header("Location: login.php");
  exit;
}

require_once "../include/function.php";

// database query

// data ref query
$ref_banjar = query('SELECT * FROM ref_banjar');
$ref_gender = query('SELECT * FROM ref_gender');

// main db query
$citizen_db = query("
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
    ORDER BY cp.nomor_kk, id ASC;
    ");

// logic

// logout redirect
if ( isset($_POST["logout"]) ) {
  logout();
  exit;
}

// insert redirect
if ( isset($_POST["insert"]) ) {
  header('Location: insert.php');
}

// search logic

if ( isset($_POST["search"]) ) {  
  $citizen_db = search($_POST["keyword"],$_POST["search_category"]);
}

//debug

// if ( isset($_POST["search"]) ) {
//   var_dump($_POST);
//   die;
// }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <!-- my css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9ed35d004b.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar mb-5">
      <div class="container d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="#">
          <img src="../assets/pic/logo-desa-mengwi-sm-300px.png" alt="Logo" width="30" class="d-inline-block align-text-top"> Project//CRUD
        </a>
        <form action="" method="post">
          <button type="submit" class="btn btn-danger" name="logout">Logout</button>
        </form>
      </div>
    </nav>
    <!-- Navbar End -->
    <!-- content -->
    <main class="container">
      <h1>Data Penduduk</h1>
      <nav class="navbar">
        <div class="d-flex justify-content-between container p-0">
          <form action="" method="post">
            <button type="submit" class="btn btn-success" name="insert"><i class="fa-regular fa-square-plus"></i> Tambah Data</button>
          </form>
          <!-- search -->
          <form class="d-flex col-md-5" role="search" action="" method="post">
            <input class="form-control me-2" type="search" name="keyword" placeholder="Cari ..." aria-label="Search" autocomplete="off" autofocus required>
            <div class="col-md-3">
              <select name="search_category" id="search_category" class="form-select ms-1">
                <option value="cp.nik" name="search_category" >NIK</option>
                <option value="cp.nomor_kk" name="search_category" >Nomor KK</option>
                <option value="cp.nama" name="search_category" >Nama</option>
                <option value="rb.nama_banjar" name="search_category" >Banjar</option>
                <option value="cp.email" name="search_category" >Email</option>
              </select>
            </div>
            <button class="btn btn-outline-primary ms-2" type="submit" name="search">Cari</button>
          </form>
          <!-- search end -->
        </div>
      </nav>
      <div class="table-responsive">
        <table class="table table-hover table-bordered text-nowrap">
          <thead class="table-secondary text-center">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Foto</th>
              <th scope="col">Aksi</th>
              <th scope="col">NIK</th>
              <th scope="col">Nomor KK</th>
              <th scope="col">Nama</th>
              <th scope="col">Banjar</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php 
              $index = 1;
              foreach ($citizen_db as $citizen) : 
            ?>
            <tr>
              <!-- hidden field -->
              <input type="hidden" name="id">
              <!-- Index Field -->
              <th scope="row"><?= $index++; ?></th>
              <!-- Profile Photo Field -->
              <td><img src="../usr/data/photos/<?= $citizen["foto"]; ?>" width="50px" alt="Photo of <?= $citizen["nama"]; ?>"></td>
              <!-- Actions Field -->
              <td>
                <a href="update.php?id=<?= $citizen["id"]; ?>"><button class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
                <a href="drop.php?id=<?= $citizen["id"]; ?>" ><button class="btn btn-outline-danger btn-sm" onclick="return confirm('Konfirmasi Hapus Data')"><i class="fa-solid fa-trash"></i></button></a>
              </td>
              <!-- NIK Field -->
              <td><a href="#"><?= $citizen["nik"]; ?></a></td>
              <!-- Nomor KK Field -->
              <td><a href="#"><?= $citizen["nomor_kk"]; ?></a></td>
              <!-- Nama Field -->
              <td><?= $citizen["nama"]; ?></td>
              <!-- Banjar Field -->
              <td><?= $citizen["banjar"]; ?></td>
              <!-- Tempat Lahir Field -->
              <td><?= $citizen["tempat_lahir"]; ?></td>
              <!-- Tgl Lahir Field -->
              <td><?= $citizen["tgl_lahir"]; ?></td>
              <!-- Jenis Kelamin Field -->
              <td><?= $citizen["jenis_kelamin"]; ?></td>
              <!-- Email Field -->
              <td><?= $citizen["email"]; ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>