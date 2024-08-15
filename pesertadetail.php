<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">


  </head>
  <body>
    <header class="l-header" id="header">
      <nav class="nav bd-container">
          <a href="#" class="nav__logo"><img src="assets/img/LOGO KSM FEST.png" alt=""></a>
      </nav>
  </header>
  <main class="l-main">
    <div style="margin-top: 5rem;">
      <section class="form">
        <div class="container">
          <div class="card mx-auto" id="card1">
            <div class="card-body">
              <h5 class="card-title" style="color:black;">Detail Peserta</h5>
              
            </div>
          </div>
          <div class="card mt-3 mb-4 mx-auto" id="card3">
            <div class="card-body">
              <form class="row g-3" method="POST">
                <?php
                    include('connect.php');
                    $ids=$_GET['id'];
                    $sql = mysqli_query($conn, "SELECT peserta.id,peserta.nama_ketua,peserta.nim_ketua,peserta.nama_anggota1,peserta.nim_anggota1,peserta.nama_anggota2,peserta.nim_anggota2,peserta.universitas, lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba = lomba.id WHERE peserta.id = '$ids' ");
                    while($data = mysqli_fetch_array($sql)){
                ?>
                <div class="col-md-6">
                    <label class="form-label">Universitas</label>
                    <input type="text" class="form-control" placeholder="Nama Universitas" name="universitas" value="<?=$data['universitas']?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori Lomba</label>
                    <select class="form-control mb-2" name="kategori" value="<?=$data['lomba']?>" disabled>
                        <option value="1">Essay</option>
                        <option value="2">Karya Tulis Ilmiah</option>
                        <option value="3">Jurnal</option>
                    </select>
                </div>
                <p><i>*Ketua</i></p>
                <div class="col-md-6 mt-0">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Ketua" name="ketua" value="<?=$data['nama_ketua']?>"disabled>
                </div>
                <div class="col-md-6 mt-0">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" placeholder="NIM Ketua" name="ketuanim" value="<?=$data['nim_ketua']?>" disabled>
                </div>
                <p><i>*Anggota 1</i></p>
                <div class="col-md-6 mt-0">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Anggota 1" name="anggota1" value=
                    "<?=$data['nama_anggota1']?>" disabled>
                </div>
                <div class="col-md-6 mt-0">
                    <label class="form-label">NIM</label>
                    <input type="number" class="form-control" placeholder="NIM Anggota 1" name="anggota1nim" value="<?=$data['nim_anggota1']?>" disabled>
                </div>
                <p><i>*Anggota 2</i></p>
                <div class="col-md-6 pt mt-0">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Anggota 2" name="anggota2" value="<?=$data['nama_anggota2']?>" disabled>
                </div>
                <div class="col-md-6 mt-0">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" placeholder="NIM Anggota 2" name="anggota2nim" value="<?=$data['nim_anggota2']?>"disabled>
                </div>     
                <?php
                    }
                ?>
              </form>
                <div class="d-grid gap-2 col-6 mx-auto mt-3" id="button">
                        <a class="btn btn-outline-success" href="adminhome.php">Kembali</a>
                </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--main.js-->
    <script src="assets/js/main.js"></script>
  </body>
</html>