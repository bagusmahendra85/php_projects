<?php 

require "./functions/function.php";

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
    <div class="container">
      <h1>Data Penduduk</h1>
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <button type="button" class="btn btn-success "><i class="fa-regular fa-square-plus"></i> Tambah Data</button>
          <form class="d-flex" role="search" action="" method="post" id="search">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
          </form>
        </div>
      </nav>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-secondary">
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
          <tbody>
            <tr>
              <!-- Index Field -->
              <th scope="row">1</th>
              <!-- Profile Photo Field -->
              <td><img src="" alt=""></td>
              <!-- Actions Field -->
              <td>
                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
              </td>
              <!-- NIK Field -->
              <td><a href="#">5103020805960008</a></td>
              <!-- Nomor KK Field -->
              <td><a href="#">5103021415210012</a></td>
              <!-- Nama Field -->
              <td>I Gst. Ngr. Bagus Putra Mahendra Yasa</td>
              <!-- Banjar Field -->
              <td>Alangkajeng</td>
              <!-- Tempat Lahir Field -->
              <td>Mengwi</td>
              <!-- Tgl Lahir Field -->
              <td>1996-05-08</td>
              <!-- Jenis Kelamin Field -->
              <td>Laki-Laki</td>
              <!-- Email Field -->
              <td>ngurahmahendra@mengwi-badung.desa.id</td>
            </tr>
            <tr>
              <!-- Index Field -->
              <th scope="row">2</th>
              <!-- Profile Photo Field -->
              <td><img src="" alt=""></td>
              <!-- Actions Field -->
              <td>
                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
              </td>
              <!-- NIK Field -->
              <td><a href="#">5103025805960002</a></td>
              <!-- Nomor KK Field -->
              <td><a href="#">5103021415210012</a></td>
              <!-- Nama Field -->
              <td>Ni Komang Urmila Dewi</td>
              <!-- Banjar Field -->
              <td>Alangkajeng</td>
              <!-- Tempat Lahir Field -->
              <td>Denpasar</td>
              <!-- Tgl Lahir Field -->
              <td>1996-05-18</td>
              <!-- Jenis Kelamin Field -->
              <td>Perempuan</td>
              <!-- Email Field -->
              <td>urmiladewi18@gmail.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>