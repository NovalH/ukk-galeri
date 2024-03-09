<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION['userid'])) {
  ?>
    <ul>
      <a href="register.php" type="button" class="btn btn-primary">Register</a>
      <a href="login.php" type="button" class="btn btn-primary">Login</a>
    </ul>
  <?php
  } else {
  ?>

    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand"><?= $_SESSION['namalengkap'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Gambar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="album.php">Album</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="foto.php">Foto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php
  }
  ?>

  <div class="container mx-auto mt-4">
    <div class="row">
      <?php
      include "koneksi.php";
      $sql = mysqli_query($conn, "select * from foto,user where foto.userid=user.userid");
      while ($data = mysqli_fetch_array($sql)) {
      ?>

        <div class="col-md-3">

          <div class="card" style="width: 16rem;">
            <a href="zoom.php?id=<?= $data['fotoid'] ?>"><img src="gambar/<?= $data['lokasifile'] ?>" class="card-img-top" width="100px" alt="..."></a>


          </div>

        </div>
      <?php
      }
      ?>
    </div>
  </div>
</body>

</html>

<?php
include "config/footer.php";
?>