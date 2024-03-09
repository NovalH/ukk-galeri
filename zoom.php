<?php
include "config/header.php";
$id = $_GET['id'];
?>

<body>
    <style>

    </style>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($conn, "select * from foto where fotoid=$id");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <div class="container mt-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-7">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="gambar/<?= $data['lokasifile'] ?>" download>Download</a></li>
                                <li><a class="dropdown-item" href="gambar/<?= $data['lokasifile'] ?>">Zoom</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <img src="gambar/<?= $data['lokasifile'] ?>" alt="..." width=500px;>
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['judulfoto'] ?></h5>
                            <p class="card-text"><?= $data['deskripsifoto'] ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $data['tanggalunggah'] ?></small></p>
                        </div>
                        <form action="proses-komentar.php" method="post">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan Komentar" aria-describedby="button-addon2" name="isikomentar" required>
                                    <input type="hidden" class="form-control" name="fotoid" value="<?= $id ?>">
                                    <input type="hidden" class="form-control" name="userid" value="<?= $_SESSION['userid'] ?>">
                                    <button class="btn btn-outline-secondary" type="submit">Send</button>
                                </div>
                            </div>
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <a href="like.php?fotoid=<?= $data['fotoid'] ?>">
                                            <h5 class="bi bi-heart-fill btn btn-danger"></h5>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="bi bi-hand-thumbs-down-fill btn btn-secondary" href="dislike.php?fotoid=<?= $data['fotoid'] ?>"></a>
                                    </div>
                                    <div class="col">
                                        <a class="bi bi-download  btn btn-primary" href="gambar/<?= $data['lokasifile'] ?>" download></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group">
                                <?php
                                include "koneksi.php";
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($conn, "select * from komentarfoto where fotoid=$id");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <li class="list-group-item"><?= $data['isikomentar'] ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    <?php
    }
    ?>
</body>

<?php
include "config/footer.php";
?>