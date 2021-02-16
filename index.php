<?php 
session_start();
include_once("config.php");
// if($_SESSION['userid'] != ''){
//  header('Refresh:1; url= '.$url.'dashboard.html', true, 303);
// } ?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Adnan Maltiti">
    <title>Signin - Access your dashboard</title>
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
    <form method="post" action="signin.php">
      <h2>CPEN 643</h2>
      <h1 class="h3 mb-3 fw-normal">Sign in</h1>
      <label for="inputEmail" class="visually-hidden">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="visually-hidden">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label>No account? <a href="signup-html.php">Signup</a></label><br>
      <button class="w-100 btn btn-lg btn-primary" name="signin" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>
</body>
</html>
