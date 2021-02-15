<?php 
session_start();
include_once("config.php");
if($_SESSION['userid'] != ''){
  header('Refresh:1; url= '.$url.'dashboard.html', true, 303);
} ?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Adnan Maltiti">
    <title>Signup - Create an account</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>
<body class="text-center">

  <main class="form-signin">
    <form method="post" action="signup.php">
      <h2>CPEN 643</h2>
      <!-- <img class="mb-4" src="assets/brand/use-logo.svg" alt="" width="220" height="157"> -->
      <h1 class="h3 mb-6 fw-normal">Create an account</h1>
      <label for="inputFname" class="visually-hidden">First Name</label>
      <input type="text" name="fname" id="inputFname" class="form-control" placeholder="First Name" required autofocus>
      <label for="inputLname" class="visually-hidden">Last Name</label>
      <input type="text" name="lname" id="inputLname" class="form-control" placeholder="Last Name" required autofocus>
      <label for="inputEmail" class="visually-hidden">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="visually-hidden">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" required>
      <label>Already have an account? <a href="index.html">Sign in</a></label><br>
      <button class="w-100 btn btn-lg btn-primary" name="signup" type="submit">Create your account</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>
</body>
</html>
