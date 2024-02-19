<?php 
session_start();
require "../include/function.php";

//cookie check
if ( isset($_COOKIE["user_id"]) && isset($_COOKIE['token']) ) {
  $user_id = $_COOKIE['user_id'];
  $token = $_COOKIE['token'];

  $stmt = $conn -> prepare (' SELECT * FROM sessions WHERE user_id = ? AND token = ? ');
  $stmt -> bind_param('is', $user_id, $token);
  $stmt -> execute();
  $result = $stmt -> get_result();
  
  
  if ( $result -> num_rows === 1 ) {
    $_SESSION["loggedIn"] = true;
  }
}

if ( isset($_SESSION["loggedIn"]) ) {
  header("Location: index.php");
  exit;
}


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

      //set cookie
      if ( isset($_POST["rememberMe"]) ) {
        $user_id = $rows['id'];
        $token = bin2hex(random_bytes(32));
        $hashedToken = hash('sha256', $token);

        $stmt = $conn -> prepare('INSERT INTO sessions (id, user_id, token) VALUES (NULL, ?, ?)');
        $stmt -> bind_param ('is', $user_id, $hashedToken);
        $stmt -> execute();

        setcookie('user_id', $user_id, time() + 86400 * 5);
        setcookie('token', $hashedToken, time() + 86400 * 5);
      }

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
      background-color:#ff999e;
      background-image:
      radial-gradient(at 59% 53%, hsla(264,68%,73%,1) 0px, transparent 50%),
      radial-gradient(at 84% 83%, hsla(261,60%,73%,1) 0px, transparent 50%),
      radial-gradient(at 9% 25%, hsla(350,66%,64%,1) 0px, transparent 50%),
      radial-gradient(at 72% 98%, hsla(201,67%,65%,1) 0px, transparent 50%),
      radial-gradient(at 49% 39%, hsla(285,84%,60%,1) 0px, transparent 50%),
      radial-gradient(at 60% 6%, hsla(279,86%,73%,1) 0px, transparent 50%),
      radial-gradient(at 58% 55%, hsla(266,83%,66%,1) 0px, transparent 50%);
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
        background: rgba(255, 255, 255, 0.7);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        /* glassmorphism end */
        width: 25em;
        border-radius: 10px;
        
      }

      form img {
        max-width: 7em;
      }

  </style>
</head>
<body>
  <main class="container-fluid d-flex flex-column">
    
    <form class="p-4 mb-2" action="" method="post">
      <!-- logo -->
      <div class="container grid text-center mb-4">
        <img src="../assets/pic/logo-garuda.png" alt="logo">
        <p class="fw-bold">SISTEM INFORMASI DESA MENGWI</p>
      </div>
      <!-- message -->
      <?php if ( isset($error) ) : ?>

        <div class="alert alert-danger p-1 text-center" role="alert">
        <i class="fa-regular fa-circle-xmark"></i> Username/Password Salah!
        </div>

      <?php endif; ?>
      <!-- message end -->
      <!-- username -->
      <div class="mb-3">
        <label for="username" class="form-label" autofocus autocomplete="off" >Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">  
      </div>
      <!-- password -->
      <div class="mb-1">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
      <!-- forgot password -->
      <div class="mb-3">
        <a href="#" class="link">Lupa Password</a>
      </div>
      <!-- remember me -->
      <div class="mb-3">
        <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
        <label for="rememberMe"> Ingat Saya</label>
      </div>
      <!-- submit button -->
      <div class="d-flex justify-content-between">
        <button type="submit" name="login" class="btn btn-primary">Masuk</button>
      </div>
    </form>
    <p class="fw-medium text-light">Belum mempunyai username ? <a href="register.php">Daftar Sekarang</a></p>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>