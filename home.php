<?php
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--box icon-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
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
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>

                    <li class="nav__item"><a href="#competition" class="nav__link">Competition</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                    <li class="nav__item"><a href="form.php" class="nav__link">Join Now</a></li>

                    <li class="nav__item"><a href="loginx.php" class="nav__link">Login</a></li>

                    <li><i id="theme-button"></i></li>
                </ul>
            </div>


        </nav>
    </header>

    <main class="l-main">
        <!--home-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">Competition KSM Fest 2022</h1>
                    <h2 class="home__subtitle">Kompetisi Nasional <br> Tahun ini .</h2>
                </div>

                <img src="assets/img/home.png" alt="" class="home__img">
            </div>
        </section>

        <!--about-->
        <section class="about section bd-container" id="about">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="section-subtitle about__initial">About us</span>
                    <p class="about__description">KSM Fest merupakan sebuah acara yang diselenggarakan oleh UKM Kelompok
                        Studi Mahasiswa Eka Prasetya UI, sebagai salah satu program kerja dari Departemen Penelitian,
                        Departemen Kajian dan Literasi serta Departemen Bisnis dan Proyek tahun kepengurusan 2022 yang
                        ditujukan secara umum kepada mahasiswa/mahasiswi jenjang D3/S1 yang terdaftar di seluruh
                        perguruan tinggi di Indonesia. KSM Fest 2022 diselenggarakan untuk mendukung potensi kearifan
                        lokal dalam rangka optimalisasi penerapan isu prioritas G20.</p>
                </div>

                <img src="assets/img/about.png" alt="" class="about__img">
            </div>
        </section>



        <!--menu-->
        <section class="menu section bd-container" id="competition">
            <span class="section-subtitle">Competition</span>
            <h2 class="section-title">List Competition</h2>

            <div class="menu__container bd-grid">
                <?php
                    $sql= "SELECT * FROM lomba";
                    $hasil=mysqli_query($conn,$sql);
                    $num =1;
                    while($data= mysqli_fetch_array($hasil)){
                ?>
                <div class="menu__content">
                    <img src="assets/img/plate<?=$num?>.png" alt="" class="menu__img">
                    <h3 class="menu__name"><?=$data['lomba'];?></h3>
                    <span class="menu__detail">Deadline <?=$data['deadline'];?></span>
                    <span class="menu__preci">Fee : <?=$data['harga'];?></span>
                    <a href="form.php" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                </div>
                <?php
                    $num++;
                    }
                ?>
            </div>
        </section>



        <!--contactus-->
        <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <span class="section-subtitle contact__initial">Mari Bertanya !</span>
                    <h2 class="section-title contact__initial">Contact us</h2>
                    <p class="contact__description">Jika ada yang ingin ditanyakan silahkan chat kami, siap melayani!
                    </p>
                </div>

                <div class="contact__button">
                    <button onclick="WhatsApp()" class="button">WhatsApp</button>
                    <script>
                        function WhatsApp() {
                            var phone = "+628978544104"; // Isi dengan nomor telepon tujuan
                            var message = "Halo! Apakah Anda dapat membantu saya?"; // Isi dengan pesan yang ingin dikirim
                            var url = "https://api.whatsapp.com/send?phone=" + phone + "&text=" + message;
                            window.open(url, '_blank');
                        }
                    </script>
                </div>


            </div>
        </section>
    </main>

    <!--footer-->
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo"><img src="assets/img/LOGO KSM FEST.png" alt=""></a>
                <span class="footer__description">KSM FEST 2022</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>



            <div class="footer__content">
                <h3 class="footer__title">Information</h3>
                <ul>
                    <li><a href="#" class="footer__link">Event</a></li>
                    <li><a href="#" class="footer__link">Contact us</a></li>
                    <li><a href="#" class="footer__link">Privacy policy</a></li>
                    <li><a href="#" class="footer__link">Terms of services</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Adress</h3>
                <ul>
                    <li>Jl. Prof. Dr. Fuad Hassan,</li>
                    <li> Kukusan, Kecamatan Beji,</li>
                    <li>Kota Depok, Jawa Barat 16425</li>
                    <li>ksmf22@gmail.com</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2023 Project</p>
    </footer>

    <!--scroll reveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--main.js-->
    <script src="assets/js/main.js"></script>
</body>

</html>