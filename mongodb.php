<?php
session_start();
include_once("config.php");

$transactions = $mysql_connect->query("SELECT * FROM transactionsmysql");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Adnan Maltiti">
    <title>Dashboard - Transaction Monitor</title>


    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<meta name="theme-color" content="#7952b3">


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

    
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Transaction Monitor</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="signout.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dashboard.html">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transactions</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a type="button" href="new-transaction.html" class="btn btn-sm btn-outline-secondary">Add new transaction</a>
          </div>
        </div>
      </div>

      <h2>Database: MongoDB</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Address</th>
              <th>Goods</th>
              <th>Quantity</th>
              <th>Date</th>
              <th>Database</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($results = $transactions->fetch_object()) { ?>
            <tr>
              <td><?php echo $results->transactionid; ?></td>
              <td><?php echo $results->customer; ?></td>
              <td><?php echo $results->Address; ?></td>
              <td><?php if($results->goods == 1){ echo "Watches and Jewelry"; } elseif($results->goods == 2){ echo "Shoes and Bags"; } elseif($results->goods == 3){ echo "General Merchandise"; } else { echo "Goods"; } ?></td>
              <td><?php echo $results->quantity; ?></td>
              <td><?php echo $results->transactiondate; ?></td>
              <td><?php if($results->dbselect == 1){ echo "MariaDB"; } elseif($results->dbselect == 2){ echo "MySQL"; } elseif($results->dbselect == 3){ echo "Postgresql"; } elseif($results->dbselect == 4){ echo "SQLite"; } else { echo "Goods"; } ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
  </body>
</html>