<?php 

require "../include/function.php";

// logout redirect
if ( isset($_POST["logout"]) ) {
  header('Location: login.php');
}

// back redirect
if ( isset($_POST["home"]) ) {
  header('Location: index.php');
}

// data ref query
$ref_banjar = query('SELECT * FROM ref_banjar');
$ref_gender = query('SELECT * FROM ref_gender');

// citizen db query
$crud_db = query('SELECT * FROM crud_data_penduduk');

// insert data logic
// get id
$id = $_GET["id"];

//query

$data = query("SELECT * FROM crud_data_penduduk WHERE id = $id")[0];

if (isset($_POST["update"])) {
  if (update($_POST) > 0) {
      echo "
      <script>
        alert('Data Berhasil Diedit!');
        document.location.href = 'index.php';
      </script>
      ";
  } else {
      echo "
      <script>
        alert('Data Gagal Diedit');
        document.location.href = 'index.php';
      </script>
      ";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <!-- My CSS -->
    <link rel="stylesheet" href="./css/style.css">
     <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/9ed35d004b.js" crossorigin="anonymous"></script>
    <style>
      main {
        max-width: 60rem;
        background: #F8F9FA;
        border-radius: 1em;
        margin: 0 auto;
      }

      .content-nav {
        max-width: 60rem;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar bg-body-tertiary mb-3">
      <div class="container d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="index.php">
          <img src="../assets/pic/logo-desa-mengwi-sm-300px.png" alt="Logo" width="30" class="d-inline-block align-text-top"> Project//CRUD
        </a>
        <form action="" method="post">
          <button type="submit" class="btn btn-danger" name="logout">Logout</button>
        </form>
      </div>
    </nav>
    <!-- Navbar End -->
    <!-- Conten Navigation -->
    <div class="container content-nav mb-3">
      <form action="" method="post">
        <button type="submit" class="btn btn-warning" name="home"><i class="fa-regular fa-circle-left"></i> Kembali</button>
      </form>
    </div>
    <!-- Conten Navigation end -->
    <!-- Content -->
    <main class="p-3">
      <div class="container">
        <h2 class="mb-3">Edit Data Penduduk</h2>
        <form action="" method="post" class="mb-2" id="add_citizen" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $data["id"]; ?>">
          <input type="hidden" name="oldPhoto" value="<?= $data["foto"]; ?>">
          <!-- NIK -->
          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" autocomplete="off" value="<?= $data["nik"]; ?>" >
          </div>
          <!-- Nomor KK -->
          <div class="mb-3">
            <label for="nomor_kk" class="form-label">Nomor KK</label>
            <input type="text" class="form-control" id="nomor_kk" name="nomor_kk" autocomplete="off" value="<?= $data["nomor_kk"]; ?>">
          </div>
          <!-- Nama -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $data["nama"]; ?>">
          </div>
          <!-- Banjar -->
          <div class="mb-3">
            <label for="banjar" class="form-label">Banjar</label>
            <select class="form-select" name="banjar" id="banjar" form="add_citizen">
              <option selected>- Pilih Banjar -</option>
              <?php foreach ($ref_banjar as $banjar) : ?>
              <option value="<?= $banjar['id'] ?>" <?= $data["banjar"] == $banjar['id'] ? "selected" : ""; ?> name="banjar"><?= $banjar["nama_banjar"] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <!-- Tempat Lahir -->
          <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" value="<?= $data["tempat_lahir"]; ?>">
          </div>
          <!-- Tanggal Lahir -->
          <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data["tgl_lahir"]; ?>">
          </div>
          <!-- Jenis Kelamin -->
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label" form="add_citizen">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
              <option selected>- Pilih Jenis Kelamin -</option>
              <?php foreach ($ref_gender as $gender) : ?>
              <option value="<?= $gender["id"] ?>" <?= $data["jenis_kelamin"] == $gender["id"] ? "selected" : "" ; ?> name="jenis_kelamin"><?= $gender["jenis_kelamin"] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" autocomplete="off" value="<?= $data["email"]; ?>">
          </div>
          <!-- Foto Profil -->
          <div class="mb-4">
            <label for="photo" class="form-label">Foto</label>
            <img src="../usr/data/photos/<?= $data["foto"]; ?>" class="img-thumbnail" alt="">
            <input class="form-control" type="file" id="photo" name="photo">
          </div>  
          <!-- submit button -->
          <button type="submit" class="btn btn-primary" name="update">Ubah</button>
        </form>
      </div>
    </main>
    <!-- Content end -->
    
    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
  </body>
</html>