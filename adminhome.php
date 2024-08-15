<?php
    session_start();
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--box icon-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/styles.css">



    <title>KSM FEST 2022</title>
</head>

<body>

    <!--scrol atas-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--header-->
    <header class="l-header" id="header">

        <nav class="nav bd-container">
            <a href="#" class="nav__logo"><img src="assets/img/LOGO KSM FEST.png" alt=""></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="adminhome.php" class="nav__link active-link">Table</a></li>
                    <li class="nav__item"><a href="report.php" class="nav__link">Chart</a></li>
                    <li class="nav__item"><a href="home.php" class="nav__link text-danger">Log Out</a></li>
                    <li><i id="theme-button"></i></li>
                </ul>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <br>

    <main class="l-main">
     <?php include('message.php');?>
        <div class="container mt-4">
        <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header text-dark text-center ">
                    <h4>Detail Peserta</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <div class="col-5 mb-3">
                            <form class="d-flex" role="search" method="get">
                                <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search"> &nbsp;&nbsp;
                                <button class="btn btn-success text-light " type="submit">Search</button>
                            </form>
                        </div>
                    </div>                    
                    <table class="table table-bordered table-striped table-hover">
                        <tr class="text-center text-dark">
                            <th>#</th>
                            <th>Anggota Kelompok</th>
                            <th>Universitas</th>
                            <th>Lomba</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                            <?php
                            $batas = 5; 
                            $halaman = $_GET['halaman'] ?? null;
                            $sql = "SELECT peserta.id,peserta.nama_ketua,peserta.nama_anggota1,peserta.nama_anggota2,peserta.universitas, lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba = lomba.id";
                            // $result = mysqli_query($conn, $sql);
                            if(empty($halaman)){
                            $posisi = 0; $halaman = 1;
                            }else{
                            $posisi = ($halaman-1) * $batas;
                            }
                            if(isset($_GET['search'])){ 
                            $search = $_GET['search']; 
                            $sql="SELECT peserta.id,peserta.nama_ketua,peserta.nama_anggota1,peserta.nama_anggota2,peserta.universitas, lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba = lomba.id WHERE peserta.id LIKE '%$search%' OR peserta.nama_ketua LIKE '%$search%' OR peserta.nama_anggota1 LIKE '%$search%' OR peserta.nama_anggota2 LIKE '%$search%' OR peserta.universitas LIKE '%$search%' OR lomba.lomba LIKE '%$search%' ORDER BY peserta.id ASC LIMIT $posisi, $batas"; 
                            }else{ 
                            $sql="SELECT peserta.id,peserta.nama_ketua,peserta.nama_anggota1,peserta.nama_anggota2,peserta.universitas, lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba = lomba.id ORDER BY peserta.id ASC LIMIT $posisi, $batas";
                            }
                            $hasil=mysqli_query($conn, $sql); 
                                while ($data = mysqli_fetch_array($hasil)) {
                            ?>
                            <tr class="text-center">
                                    <td class="col-1"><?=$data['id']?></td>
                                    <td>
                                       <?=$data['nama_ketua']?><br>
                                       <?=$data['nama_anggota1']?><br>
                                       <?=$data['nama_anggota2']?>
                                    </td>
                                    <td><?=$data['universitas']?></td>
                                    <td><?=$data['lomba']?></td>
                                    <td class="text-center col-2 ">
                                        <a href="pesertadetail.php?id=<?=$data['id']?>" class="btn btn-info btn-sm">View</a>&nbsp
                                        <a href="pesertaedit.php?id=<?=$data['id']?>" class="btn btn-success btn-sm">Edit</a> &nbsp
                                        <a href="deletepeserta.php?id=<?=$data['id']?>" class="mt-0 btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                            </tr>                            
                            <?php
                                }
                            ?>  
                        </tbody>
                        </thead>
                    </table>
                    <?php

                    if(isset($_GET['search'])){
                        $search= $_GET['search']; 
                        $query2="SELECT peserta.id,peserta.nama_ketua,peserta.nama_anggota1,peserta.nama_anggota2,peserta.universitas, lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba = lomba.id WHERE peserta.id LIKE '%$search%' OR peserta.nama_ketua LIKE '%$search%' OR peserta.nama_anggota1 LIKE '%$search%' OR peserta.nama_anggota2 LIKE '%$search%' OR peserta.universitas LIKE '%$search%' OR lomba.lomba LIKE '%$search%' ORDER BY peserta.id ASC"; 
                    }else{ 
                        $query2="SELECT peserta.id,peserta.nama_ketua,peserta.nama_anggota1,peserta.nama_anggota2,peserta.universitas, lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba = lomba.id ORDER BY peserta.id ASC";
                    }
                        $result2 = mysqli_query($conn, $query2); 
                        $jmldata = mysqli_num_rows($result2); 
                        $jmlhalaman = ceil($jmldata/$batas);
                    ?>
                </div>
                <div class="mx-5 text-center mb-3">
                    <ul class="pagination"> 
                    <?php 
                        for($i=1;$i<=$jmlhalaman; $i++) {
                            if ($i != $halaman) { 
                                if(isset($_GET['search'])){ 
                                    $search = $_GET['search'];
                                    echo "<li class='page-item'><a class='page-link' href='adminhome.php?halaman=$i&search=$search'>
                                        $i</a></li>";
                                }else{ 
                                    echo "<li class='page-item'><a class='page-link' href='adminhome.php?halaman=$i'>$i</a></li>";
                                }
                            } else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                            }
                        }
                        ?>
                    </ul>      
                </div>                            
            </div>  
            </div>            
            </div>
        </div>
    </main>

    <!--scroll reveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--main.js-->
    <script src="assets/js/main.js"></script>
</body>

</html>