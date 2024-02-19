<?php 
session_start();

if ( isset($_SESSION["loggedIn"]) ) {
  header("Location: index.php");
  exit;
}

require "../include/function.php";

if (isset($_POST["login"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  // cek username
  if ( mysqli_num_rows($result) === 1 ) {
    // cek password
    $rows = mysqli_fetch_assoc($result);
    if(password_verify($password, $rows["password"])) {
      // add session
      $_SESSION["loggedIn"] = true;
      header("Location: index.php");
      exit;
    } 

  }

  $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- My CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9ed35d004b.js" crossorigin="anonymous"></script>
  <style>

      body {
        background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,152,155,1) 0.1%, rgba(0,94,120,1) 94.2% );
      }

      main {
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      form {
        /* glassmorphism */
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        /* glassmorphism end */
        width: 20em;
        border-radius: 10px;
        margin-bottom: 200px;
        color: #fff;
      }

      form img {
        max-width: 80px;
      }

  </style>
</head>
<body>
  <main class="container-fluid">
    
    <form class="p-4" action="" method="post">
      <!-- logo -->
      <div class="container d-flex align-item-center justify-content-center mb-2">
        <img src="../assets/pic/logo-desa-mengwi-sm-300px.png" alt="logo desa mengwi">
      </div>
      <!-- message -->
      <?php if ( isset($error) ) : ?>

        <div class="alert alert-danger p-1 text-center" role="alert">
        <i class="fa-regular fa-circle-xmark"></i> Username / Password Salah!
        </div>

      <?php endif; ?>
      <!-- message end -->
      <!-- username -->
      <div class="mb-3">
        <label for="username" class="form-label" autofocus autocomplete="off" >Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">  
      </div>
      <!-- password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
      <!-- submit button -->
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>