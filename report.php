<?php
    // Include file php untuk koneksi ke database
    include('connect.php');
    // Session Start
    session_start();
    
    // Query mengambil data dari tabel barang
    $lomba = mysqli_query($conn, "SELECT peserta.id_lomba, COUNT(peserta.id_lomba) AS total,lomba.lomba FROM peserta INNER JOIN lomba on peserta.id_lomba=lomba.id GROUP BY id_lomba;");
    // Extract data hasil query di atas dan menyimpan datanya di variable $row
    while($row = mysqli_fetch_array($lomba)){
        // Array $nama_produk digunakan untuk menyimpan hasil query ke dalam bentuk array dengan perintah fetch_array
        $lomba_name[] = $row['lomba'];
        // Array $jumlah_lomba digunakan untuk menyimpan hasil query kedalam bentuk array dengan perintah fetch_array
        $jumlah_lomba[]=$row['total'];
    }  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>KSM Fest</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital@0;1&family=Montserrat:wght@300;400&family=Poppins:wght@300&family=Recursive:wght@300;400&display=swap" rel="stylesheet">    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">  
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styles.css">

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
      


    <body>
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo"><img src="assets/img/LOGO KSM FEST.png" alt=""></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="adminhome.php" class="nav__link active-link">Table</a></li>
                    <li class="nav__item"><a href="" class="nav__link">Chart</a></li>
                    <li class="nav__item"><a href="home.php" class="nav__link text-danger">Log Out</a></li>
                    <li><i id="theme-button"></i></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container overflow-hidden text-center" style="padding-top: 150px; padding-bottom: 55px">
            <div class="row gy-5">
                <!-- GRAFIK BAR -->
                <div class="col-6">
                    <div class="card text-bg-light" style="width: 620px; height: 380px">
                        <div class="card-header">
                            <b>Lomba Bar Chart</b>
                        </div>
                        <div class="card-body">
                            <div style="width: 550px; height:260px; margin: auto; margin-top: 20px">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GRAFIK PIE -->
                <div class="col-6">
                    <div class="card text-bg-light" style="width: 620px; height: 380px">
                        <div class="card-header">
                            <b>Lomba Line Chart</b>
                        </div>
                        <div class="card-body">
                            <div style="width: 550px; height: 260px; margin: auto; margin-top: 20px">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- START CHART SCRIPT -->
<script>

            // BAR CHART
            var ctx = document.getElementById("barChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // Menuliskan label chart dengan menggunakan array $nama_produk yang sudah dibuat sebelumnya yang berisi nama produk yang dijual.
                    labels: <?php echo json_encode($lomba_name); ?>,
                    datasets: [{
                        label: 'Jumlah Kelompok Per Lomba',
                        // Menuliskan bagian data chart dengan array $jumlah_produk yang sudah dibuat sebelumnya yang berisikan jumlah produk yang sudah terjual dan menggunakan json_encode untuk konversi array $jumlah_produk ke dalam bentuk JSON
                        data: <?php echo json_encode ($jumlah_lomba); ?>,
                        // Modifikasi warna chart
                        backgroundColor:'rgba(6, 156, 84, 0.2)',
                        // Modifikasi border chart
                        borderColor: 'rgba(6, 156, 84, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            // LINE CHART
            var ctx = document.getElementById("lineChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($lomba_name)?>,
                    datasets: [{
                        label: 'Line Chart Kelompok Lomba',
                        data: <?php echo json_encode($jumlah_lomba)?>,
                        fill: {
                        target: 'origin',
                        below: 'rgb(6, 156, 80)'    // And blue below the origin
                        }
                    }]
                },
                options: {
                    indexAxis: 'x',
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                }
            });

            

            

            
</script>
    
       

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>