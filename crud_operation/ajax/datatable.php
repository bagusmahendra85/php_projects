<?php 

require '../include/function.php';

$keyword = $_GET['keyword'];
$category = $_GET['category'];
$currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$startingIndex = ($currentPage - 1) * $countPerPage;

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
    ORDER BY cp.nomor_kk ASC LIMIT $startingIndex, $countPerPage
";

$citizen_db = query($query);


?>

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
              $index = $startingIndex + 1;
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