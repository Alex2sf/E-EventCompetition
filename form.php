<?php
    require('connect.php');
    $error='';
    if(isset($_POST['submit'])){
        $univ = stripslashes($_POST['universitas']);
        $univ = mysqli_real_escape_string($conn, $univ);
        $kategori = stripslashes($_POST['kategori']);
        $kategori = mysqli_real_escape_string($conn, $kategori );
        $namaketua = stripslashes($_POST['ketua']);
        $namaketua = mysqli_real_escape_string($conn, $namaketua);
        $nimketua = stripslashes($_POST['ketuanim']);
        $nimketua = mysqli_real_escape_string($conn, $nimketua);
        $anggota1 = stripslashes($_POST['anggota1']);
        $anggota1 = mysqli_real_escape_string($conn, $anggota1);
        $nimanggota1 = stripslashes($_POST['anggota1nim']);
        $nimanggota1 = mysqli_real_escape_string($conn, $nimanggota1);
        $anggota2 = stripslashes($_POST['anggota2']);
        $anggota2 = mysqli_real_escape_string($conn, $anggota2);
        $nimanggota2 = stripslashes($_POST['anggota2nim']);
        $nimanggota2 = mysqli_real_escape_string($conn, $nimanggota2);

        if(!empty(trim($univ)) && !empty(trim($kategori)) && !empty(trim($namaketua)) && !empty(trim($nimketua)) && !empty(trim($anggota1)) && !empty(trim($nimanggota1)) && !empty(trim($anggota2)) && !empty(trim($nimanggota2))){
            $query="INSERT INTO peserta (id_lomba, nama_ketua, nim_ketua, nama_anggota1, nim_anggota1, nama_anggota2, nim_anggota2, universitas) VALUES ('$kategori','$namaketua','$nimketua','$anggota1','$nimanggota1','$anggota2','$nimanggota2','$univ')";
            $result= mysqli_query($conn,$query);
            if($result){
                header('Location: home.php');
            }
        }else{
          $error='Data tidak boleh kosong';
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form KSMFEST</title>
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
              <h5 class="card-title">FORMULIR REGISTRASI LOMBA KSMFEST</h5>
            </div>
          </div>
      
          <div class="card mt-3 mx-auto" id="card2">
            <div class="card-body">
              <h5 class="card-title">Syarat & Ketentuan lomba:</h5>
              <p class="card-text">1. Peserta lomba merupakan mahasiswa aktif<br>
                2. Setiap kelompok dalam lomba wajib membayar pendaftaran sesuai dengan ketentuan<br>
                3. peserta lomba mengirimkan karya sesuai dengan jadwal yang telah ditentukan <br>
                4. Keputusan pemenang dalam lomba tidak dapat diganggu gugat
              </p>
            </div>
          </div>
      
          <div class="card mt-3 mb-4 mx-auto" id="card3">
            <?php if($error != ''){ ?>
                <div class="alert alert-danger text-center" role="alert"><?= $error; ?></div>
            <?php } ?>
            <div class="card-body">
              <form class="row g-3" method="POST">
                <div class="col-md-6">
                  <label class="form-label">Universitas</label>
                  <input type="text" class="form-control" placeholder="Nama Universitas" name="universitas">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Kategori Lomba</label>
                  <select class="form-control mb-2" name="kategori" >
                    <option value="1">Essay</option>
                    <option value="2">Karya Tulis Ilmiah</option>
                    <option value="3">Jurnal</option>
                  </select>
                </div>
                <p><i>*Ketua</i></p>
                <div class="col-md-6 mt-0">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" placeholder="Nama Ketua" name="ketua">
                </div>
                <div class="col-md-6 mt-0">
                  <label class="form-label">NIM</label>
                  <input type="text" class="form-control" placeholder="NIM Ketua" name="ketuanim">
                </div>
      
                <p><i>*Anggota 1</i></p>
                <div class="col-md-6 mt-0">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" placeholder="Nama Anggota 1" name="anggota1">
                </div>
                <div class="col-md-6 mt-0">
                  <label class="form-label">NIM</label>
                  <input type="number" class="form-control" placeholder="NIM Anggota 1" name="anggota1nim">
                </div>
      
                <p><i>*Anggota 2</i></p>
                <div class="col-md-6 pt mt-0">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" placeholder="Nama Anggota 2" name="anggota2">
                </div>
                <div class="col-md-6 mt-0">
                  <label class="form-label">NIM</label>
                  <input type="text" class="form-control" placeholder="NIM Anggota 2" name="anggota2nim">
                </div>     
                <div class="d-grid gap-2 col-6 mx-auto" id="button">
                  <button class="btn btn-success" type="submit"  name="submit">Submit</button>
                  
                </div>
              </form>
              <div class="d-grid gap-2 col-6 mx-auto mt-3">
                    <a href="home.php" class="btn mt-2 btn-outline-success">Kembali</a>
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