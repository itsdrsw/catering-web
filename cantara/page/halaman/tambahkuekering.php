<?php
function generateRandomID()
{
    $letters = 'K'; 

    $date = date('Ymd'); 

    $randomNumber = sprintf('%04d', mt_rand(0, 9999)); // Angka acak empat digit

    $randomID = $letters . $date . $randomNumber; 

    return $randomID;
}
// Menggunakan fungsi untuk mengisi $id
$id = generateRandomID();
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
                    <h4 class="header-title">Tambah Data Kue Kering</h4>
                    <p class="text-muted font-14"></p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="horizontal-form-preview">
                            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input type="text" name="txtnama" class="form-control" id="inputEmail3" placeholder="Masukkan nama kue">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Harga</label>
                                    <div class="col-9">
                                        <input type="number" name="txtharga" class="form-control" id="inputPassword3" placeholder="Masukkan harga kue">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Gambar</label>
                                    <div class="col-9">
                                        <input type="file" name="txtgbr" class="form-control" id="inputPassword3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Kategori</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="txtkategori" id="password" class="form-control" value="kering" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Jumlah</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-merge">
                                            <input type="number" step="0.01" name="txtjumlah" id="password" class="form-control" placeholder="Masukkan jumlah">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Satuan</label>
                                    <div class="col-9">
                                        <select class="form-control" data-toggle="select" name="txtsatuan">
                                            <option value="" selected>Pilih satuan</option>
                                            <option value="kg">kg</option>
                                            <option value="pcs">pcs</option>
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
                                    $nama        = $_POST['txtnama'];
                                    $harga       = $_POST['txtharga'];
                                    $kategori    = $_POST['txtkategori'];
                                    $gambar      = $_FILES['txtgbr']['name'];
                                    $tmp         = $_FILES['txtgbr']['tmp_name'];
                                    $jumlah      = $_POST['txtjumlah'];
                                    $satuan      = $_POST['txtsatuan'];
                                    $id          = generateRandomID();

                                    if (empty($gambar)) {
                                        mysqli_query($conn, "INSERT INTO kue (id_kue,nama_kue,harga,kategori,jumlah,satuan)VALUES
                                    ('$id', '$nama', '$harga', '$kategori', '$jumlah', '$satuan') ");
                                    }else{
                                         mysqli_query($conn, "INSERT INTO kue (id_kue,nama_kue,harga,kategori,gambar,jumlah,satuan)VALUES
                                                ('$id', '$nama', '$harga', '$kategori', '$gambar', '$jumlah', '$satuan') ");
                                    copy($tmp, "img/$gambar");
                                    }
                                    echo "<script>alert('Data berhasil disimpan');location='.?hal=kuekering'</script>";
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