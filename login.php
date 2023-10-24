<?php
session_start();
include "koneksi.php";
if (empty($_SESSION['user'])) {

    if (isset($_POST['submit'])) {
        $username  = $_POST['txt_username'];
        $pass   = $_POST['txt_pass'];

        //select data
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$pass'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['telp'] = $row['telp'];
            $_SESSION['security'] = $row['security'];
            $_SESSION['status'] = $row['status'];
            echo "<script>location='.'</script>";
        } else {
            echo "<script>alert('Data yang dimasukkan salah');location='login.php'</script>";
        }
    }else{
        echo "" ;
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="icon" type="images/png" href="img/logo komersial sip transparant.png">

        <!-- Theme Config Js -->
        <script src="assets/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg position-relative">
        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
                </g>
            </svg>
        </div>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header py-4 text-center bg-success">
                                <a href=".">
                                    <span><img src="assets/images/logo-new.png" alt="logo" height="22"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Silahkan Masuk</h4>
                                </div>

                                <form action="login.php" method="POST">
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Username </label>
                                        <input class="form-control" name="txt_username" type="text" id="emailaddress" required="" placeholder="Masukkan username Anda">
                                    </div>
                                    <div class="mb-3">
                                        <a href="#" class="text-muted float-end"><small>Lupa password?</small></a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="txt_pass" id="password" class="form-control" placeholder="Masukkan password Anda">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center d-grid">
                                        <button class="btn btn-lg btn-success" type="submit" name="submit"> Masuk </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Tidak memiliki akun? <a href="register.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>
                document.write(new Date().getFullYear())
            </script> &copy; Allright. reserved
        </footer>
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>
    </html>
    <?php } ?>
