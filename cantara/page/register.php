<?php
include "koneksi.php";

if (isset($_POST['kirim'])) {
    $email  = $_POST['txtemail'];
    $pass   = $_POST['txtpass'];
    $nama   = $_POST['txtnama'];

    if (!empty($pass)) {
        mysqli_query($conn, "INSERT INTO user (user_email, user_fullname, user_password) VALUES 
        ('$email', '$nama', '$pass')") or die(mysqli_error($conn));
        echo "<script>alert('Data berhasil ditambah');location='login.php'</script>";
    } else {
        echo "<script>alert('Data yang dimasukkan tidak sesuai');location='#'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- App favicon -->
    <link rel="icon" type="images/png" href="img/logo komersial sip transparant.png">

    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">

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
                        <!-- Logo-->
                        <div class="card-header py-4 text-center bg-success">
                            <a href=".">
                                <span><img src="assets/images/logo-regis.png" alt="logo" height="22"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Silahkan Daftar Akun Baru</h4>
                                <p class="text-muted mb-4"> </p>
                            </div>
                            <form>
                                            <div id="basicwizard">

                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                                    <li class="nav-item">
                                                        <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"  class="nav-link rounded-0 py-2"> 
                                                            <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Account</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="mdi mdi-face-man-profile font-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Profile</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline font-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Finish</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content b-0 mb-0">
                                                    <div class="tab-pane" id="basictab1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="userName">User name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="userName" name="userName" value="hyper">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="password"> Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="password" id="password" name="password" class="form-control" value="123456789">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="confirm">Re Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="password" id="confirm" name="confirm" class="form-control" value="123456789">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="list-inline wizard mb-0">
                                                            <li class="next list-inline-item float-end">
                                                                <a href="javascript:void(0);" class="btn btn-info">Add More Info <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane" id="basictab2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="name"> First name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="name" name="name" class="form-control" value="Francis">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="surname"> Last name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="surname" name="surname" class="form-control" value="Brinkman">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="email" id="email" name="email" class="form-control" value="cory1979@hotmail.com">
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Account</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Add More Info <i class="mdi mdi-arrow-right ms-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane" id="basictab3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="text-center">
                                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                    <h3 class="mt-0">Thank you !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                        mattis dictum aliquet.</p>

                                                                    <div class="mb-3">
                                                                        <div class="form-check d-inline-block">
                                                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                            <label class="form-check-label" for="customCheck1">I agree with the Terms and Conditions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="mdi mdi-arrow-left me-1"></i> Back to Profile</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Submit</button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #basicwizard-->
                                        </form>
                            <!-- <form action="" method="post">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="fullname" name="txtnama" placeholder="Silahkan masukkan nama" maxlength="35" data-toggle="maxlength" required>
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Telepon </label>
                                    <input class="form-control" type="text" id="emailaddress" name="txtemail" required placeholder="Silaahkan masukkan email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Alamat</label>
                                    <input class="form-control" type="text" id="fullname" name="txtnama" placeholder="Silahkan masukkan nama" maxlength="35" data-toggle="maxlength" required>
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email </label>
                                    <input class="form-control" type="email" id="emailaddress" name="txtemail" required placeholder="Silaahkan masukkan email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="fullname" name="txtnama" placeholder="Silahkan masukkan nama" maxlength="35" data-toggle="maxlength" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="txtpass" placeholder="Silahkan masukkan password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 text-center d-grid">
                                    <input class="btn btn-lg btn-success" name="kirim" type="submit" value="Kirim">
                                </div>
                            </form> -->
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="login.php" class="text-muted ms-1"><b>Log In</b></a></p>
                        </div> <!-- end col-->
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