<?php
include 'page/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/LogoPerson.png">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="cdn.jsdelivr.net/npm/boxicons%40latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title class="judul">Home Catering Nusantara</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo judul">Cantara
                <!-- <img class="df" src="images/LogoUMKM.png" alt="" width="50%" > -->
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About us</a>
                    </li>
                    <li class="nav__item">
                        <a href="#services" class="nav__link">Services</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Contact us</a>
                    </li>


                    <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

            <a href="#" class="button button__header">Login</a>
        </nav>
    </header>

    <main class="main">
        <!--=============== HOME ===============-->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <img class="svg__img svg__color home__img" src="assets/img/gambarperson.png" alt="">
                <div class="home__data">
                    <h1 class="home__title judul">Home Catering Nusantara</h1>
                    <p class="home__description">Selamat datang di dunia kelezatan di mana setiap keinginan rasa Anda
                        dapat terpenuhi. Kami adalah penyedia catering kue yang siap membawa sentuhan manis dan tak
                        terlupakan ke setiap momen spesial Anda.</p>

                    <a href="#" class="button">Login</a>

                </div>
            </div>
        </section>

        <!--=============== ABOUT ===============-->
        <section class="about section container" id="about">
            <div class="about__container grid">
                <div class="about__data">
                    <h2 class="section__title-center">Tentang <br> Aplikasi Kami</h2>
                    <p class="about__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo unde
                        voluptate in, rem ratione, natus, quia repudiandae officiis numquam magni tempora neque.
                        Delectus, maxime! Reprehenderit impedit dignissimos molestiae quae voluptates..</p>
                </div>
                <img class="svg__img svg__color about__img" src="assets/img/gambarhp.png" alt="">

            </div>
        </section>

        <!--=============== SERVICES ===============-->
        <section class="services section container" id="services">
            <h2 class="section__title">Daftar Kue Terbaru di<br> Cantara</h2>
            
            <div class="services__container grid">
            <?php
                $sql    = "SELECT * FROM kue LIMIT 3";
                $q      = mysqli_query($conn,$sql);
                while($r = mysqli_fetch_assoc($q)){
            ?>
                <div class="services__data">
                    <h3 class="services__subtitle"><?=$r['nama_kue']?></h3>
                    <img class="svg__color services__img" src="page/img/<?=$r['gambar']?>" alt="" >

                    <p class="services__description">Kue dadar gulung adalah makanan tradisional Indonesia yang populer.
                        Nama "dadar" berasal dari bahasa Melayu yang artinya "tebal" atau "berlapis-lapis",
                        sedangkan "gulung" mengacu pada cara kue ini dibuat, yaitu dengan digulung seperti pancake.
                    <div>
                        <a href="#" class="button button-link">Learn More</a>
                    </div>
                </div>
                
            <?php } ?>
<!-- 
                <div class="services__data">
                    <h3 class="services__subtitle">Kue Dadar Gulung</h3>
                    <img class="svg__color services__img" src="images/kue gulung_prev_ui 1.png" alt="">

                    <p class="services__description">Kue dadar gulung adalah makanan tradisional Indonesia yang populer.
                        Nama "dadar" berasal dari bahasa Melayu yang artinya "tebal" atau "berlapis-lapis",
                        sedangkan "gulung" mengacu pada cara kue ini dibuat, yaitu dengan digulung seperti pancake.</p>
                    <div>
                        <a href="#" class="button button-link">Learn More</a>
                    </div>
                </div>

                <div class="services__data">
                    <h3 class="services__subtitle">Kue Dadar Gulung</h3>
                    <img class="svg__color services__img" src="images/kue gulung_prev_ui 1.png" alt="">

                    <p class="services__description">Kue dadar gulung adalah makanan tradisional Indonesia yang populer.
                        Nama "dadar" berasal dari bahasa Melayu yang artinya "tebal" atau "berlapis-lapis",
                        sedangkan "gulung" mengacu pada cara kue ini dibuat, yaitu dengan digulung seperti pancake.</p>
                    <div>
                        <a href="#" class="button button-link">Learn More</a>
                    </div>
                </div> -->
            </div>
        </section>

        <!--=============== APP ===============-->
        <section class="app section container">
            <div class="app__container grid">
                <div class="app__data">
                    <h2 class="section__title-center">AYO DOWNLOAD<br> SEKARANG</h2>
                    <p class="app__description">Buruan download untuk mendapatkan voucher diskon.</p>
                    <div class="app__buttons">
                        <a href="#" class="button button-flex">
                            <i class='bx bxl-apple button__icon'></i> App Store
                        </a>
                        <a href="#" class="button button-flex">
                            <i class='bx bxl-play-store button__icon'></i> Google Play
                        </a>
                    </div>
                </div>
                <img class="svg__img svg__color app__img" src="assets/img/downloading.html" alt="">

            </div>
        </section>

        <!--=============== CONTACT US ===============-->

        <footer class="footer section">
            <div class="contact container" id="contact">
                <div class="contact__container grid">
                    <div class="contact__content">
                        <h2 class="section__title-center">Hubungi Kami <br> Disini </h2>
                        <p class="contact__description">Hubungi kami dan beri tahu kami bagaimana kami dapat membuat acara Anda lebih istimewa. Tim kami siap memberikan pelayanan terbaik dan membantu Anda merencanakan setiap detail. Jangan ragu untuk menghubungi kami!"</p>
                    </div>

                    <ul class="contact__content grid">
                        <li class="contact__address">Telephone: <span class="contact__information">+6283 XXX XXX</span>
                        </li>
                        <li class="contact__address">Alamat : <span class="contact__information">Jawa Timur,
                                Indonesia</span></li>
                        <li class="contact__address">Email : <span
                                class="contact__information">cantara@polije.go.id </span></li>
                    </ul>

                    <div class="contact__content">
                        <a href="#" class="button">Contact Us</a>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <!-- =============== FOOTER ===============-->
    <!-- <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">Delivery</a>
                <p class="footer__description">Order Products Faster <br> Easier</p>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Services</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Pricing </a></li>
                    <li><a href="#" class="footer__link">Discounts</a></li>
                    <li><a href="#" class="footer__link">Report a bug</a></li>
                    <li><a href="#" class="footer__link">Terms of Service</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Company</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Blog</a></li>
                    <li><a href="#" class="footer__link">Our mision</a></li>
                    <li><a href="#" class="footer__link">Get in touch</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Community</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Support</a></li>
                    <li><a href="#" class="footer__link">Questions</a></li>
                    <li><a href="#" class="footer__link">Customer help</a></li>
                </ul>
            </div>

            <div class="footer__social">
                <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
            </div>
        </div>

        <p </p>
    </footer> -->

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>