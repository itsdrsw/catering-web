<?php
include "koneksi.php";
$id     = $_GET['id'];
$query    = "SELECT * FROM pesanan p inner join user u on p.id_user = u.id_user WHERE p.id_pesanan = '$id'";
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
                    <h4 class="header-title">Konfirmasi Pesanan</h4>
                    <p class="text-muted font-14"></p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="horizontal-form-preview">
                            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input type="text" name="txtnama" class="form-control" id="inputEmail3" value="<?= $row['nama'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Alamat</label>
                                    <div class="col-9">
                                        <input type="text" name="txtalamat" class="form-control" id="inputEmail3" value="<?= $row['alamat'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Telp</label>
                                    <div class="col-9">
                                        <input type="number" name="txtnama" class="form-control" id="inputEmail3" value="<?= $row['telp'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Total Harga</label>
                                    <div class="col-9">
                                        <input type="number" name="txtharga" class="form-control" id="inputPassword3" value="<?= $row['total_harga'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Tanggal Terima</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="txtkategori" id="password" class="form-control" value="<?= $row['tgl_terima'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Status</label>
                                    <div class="col-9">
                                        <select class="form-control" data-toggle="select" name="txtstatus">
                                            <option value="<?= $row['ket'] ?>" selected>Pilih status</option>
                                            <option value="approve">Approve</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="justify-content-end row">
                                    <div class="col-9">
                                        <input type="submit" name="simpan" class="btn btn-info" value="Kirim">
                                    </div>
                                </div>
                                <?php
                                if (@$_POST['simpan']) {
                                    $status      = $_POST['txtstatus'];
                                    $id          = $_GET['id'];
                                   
                                        mysqli_query($conn, "UPDATE pesanan SET ket = '$status' WHERE id_pesanan = '$id'");
                                    
                                    echo "<script>alert('Data berhasil disimpan');location='.?hal=pesanan'</script>";
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