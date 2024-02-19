<?php 
session_start();

if ( !isset($_SESSION["loggedIn"]) ) {
  header("Location: login.php");
  exit;
}

require "../include/function.php";

if ( isset($_POST["signupCta"]) ) {
  if ( userSignup($_POST) ) {
    echo "<script>alert('User baru berhasil dibuat!'); </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- My CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9ed35d004b.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #e4e8f0;
    }

    main {
      display: grid;
      place-items: center;
      min-height: 100vh;
    }

    main .container {
      background: #f5f9ff;
      border-radius: 1em;
      max-width: 30em;
      display: grid;
      place-self: center;
      
    }
  </style>
</head>
<body>
  <main>
    <div class="container p-4">

      <h2 class="text-center">Register</h2>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="username" class="form-label"><i class="fa-solid fa-user"></i> Username</label>
          <input type="text" autocomplete="off" class="form-control" id="username" name="username" placeholder="Create Username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label"><i class="fa-solid fa-key"></i> Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Create a Password" aria-describedby="passwordHelpBlock">
          <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters.
          </div>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label"><i class="fa-solid fa-key"></i> Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Your Password" aria-describedby="confirmPasswordHelpBlock">
          <div id="confirmPasswordHelpBlock" class="form-text">
            Enter your password once again to avoid unwanted typo.
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label"><i class="fa-solid fa-envelope"></i> Email address</label>
          <input type="email" autocomplete="off" class="form-control" name="email" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label"><i class="fa-solid fa-id-card"></i> Full Name</label>
          <input type="text" autocomplete="off" class="form-control" id="fullname" name="fullname" placeholder="Enter your Full Name">
        </div>
        <div class="mb-3 d-flex align-items-center">
          <input class="form-check-input me-2" type="checkbox" id="termAndCond">
          <label for="termAndCond">I have read and agree to the <a href="#">Terms and Conditions</a></label>
        </div>
        <div class="mb-3 d-flex align-items-center">
          <input class="form-check-input me-2" type="checkbox" id="dataValidation">
          <label for="dataValidation">My data was valid and i have store my password safely.</label>
        </div>
        <button type="submit" name="signupCta" id="signupCta" class="btn btn-primary disabled">Sign Me Up</button>
      </form>
    </div>
  </main>
  <script>
    const termCheckbox = document.querySelector('#termAndCond');
    const signupButton = document.querySelector('#signupCta');
    const dataCheckbox = document.querySelector('#dataValidation');

    const enableSignupButton = () => {
      if (termCheckbox.checked && dataCheckbox.checked) {
        signupButton.classList.remove('disabled');
      } else {
        signupButton.classList.add('disabled');
      }
    }

    termCheckbox.addEventListener('change', enableSignupButton);
    dataCheckbox.addEventListener('change', enableSignupButton);


  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>