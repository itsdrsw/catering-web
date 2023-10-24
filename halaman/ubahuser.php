<?php
include "koneksi.php";
$id     = $_GET['id'];
$query    = "SELECT * FROM user WHERE id_user = '$id'";
$result   = mysqli_query($conn, $query);
$row      = mysqli_fetch_assoc($result);
?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">ubah data user</h4>
                    <p class="text-muted font-14"></p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="horizontal-form-preview">
                            <form method="post" action="" class="form-horizontal" meth>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input type="text" name="txtnama" class="form-control" id="inputEmail3" value="<?= $row['nama'] ?>" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Alamat</label>
                                    <div class="col-9">
                                        <input type="text" name="txtalamat" class="form-control" id="inputPassword3" value="<?= $row['alamat'] ?>" placeholder="Masukkan email Anda">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Telp</label>
                                    <div class="col-9">
                                        <input type="number" name="txttelp" class="form-control" id="inputPassword3" value="<?= $row['telp'] ?>" placeholder="Masukkan email Anda">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Password</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="txtpass" id="password" class="form-control" value="<?= $row['password'] ?>" placeholder="Masukkan ">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <input type="submit" name="simpan" class="btn btn-info" value="Kirim">
                                    </div>
                                </div>
                                <?php
                                if (@$_POST['simpan']) {
                                    $nama  = $_POST['txtnama'];
                                    $pass    = $_POST['txtpass'];
                                    $telp = $_POST['txttelp'];
                                    $alamat = $_POST['txtalamat'];
                                    $id = $_GET['id'];
                                    if (!empty($pass)) {
                                        mysqli_query($conn, "UPDATE user SET nama = '$nama', alamat = '$alamat', telp = '$telp', password = '$pass' WHERE id_user = '$id'") or die(mysqli_error($conn));
                                    }
                                    $_SESSION['alamat'] = $alamat;
                                    echo "<script>alert('Data berhasil disimpan');location='.?hal=datauser'</script>";
                                }
                                ?>
                            </form>
                        </div>
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
    </div><!-- end row -->
</div>