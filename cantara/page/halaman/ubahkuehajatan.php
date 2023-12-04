<?php
include "koneksi.php";
$id     = $_GET['id'];
$query    = "SELECT * FROM kue WHERE id_kue = '$id'";
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
                    <h4 class="header-title">Ubah Data Kue Hajatan</h4>
                    <p class="text-muted font-14"></p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="horizontal-form-preview">
                            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input type="text" name="txtnama" class="form-control" id="inputEmail3" value="<?= $row['nama_kue'] ?>" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Harga</label>
                                    <div class="col-9">
                                        <input type="number" name="txtharga" class="form-control" id="inputPassword3" value="<?= $row['harga'] ?>" placeholder="Masukkan Harga Anda">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-3 col-form-label">Gambar</label>
                                    <div class="col-9">
                                        <input type="file" name="txtgbr" class="form-control" id="inputPassword3" >
                                        <?php
                                            $gambarData = $row['gambar']; // Ambil data gambar dari database

                                            if (!empty($gambarData)) {
                                                $gambarBase64 = base64_encode($gambarData); // Konversi blob ke base64

                                                echo '<img src="data:image/jpeg;base64,' . $gambarBase64 . '" style="margin-top: 10px;" width="100" height="60">';
                                            } else {
                                                echo 'Tidak ada gambar';
                                            }
                                            ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Kategori</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="txtkategori" id="password" class="form-control" value="<?= $row['kategori'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Jumlah</label>
                                    <div class="col-9">
                                        <div class="input-group input-group-merge">
                                            <input type="number" step="0.01" name="txtjumlah" id="password" class="form-control" value="<?= $row['jumlah'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword5" class="col-3 col-form-label">Satuan</label>
                                    <div class="col-9">
                                        <select class="form-control" data-toggle="select" name="txtsatuan">
                                            <option value="<?= $row['satuan'] ?>" selected>Pilih satuan</option>
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
                                if (isset($_POST['simpan'])) {
                                    $nama     = $_POST['txtnama'];
                                    $harga    = $_POST['txtharga'];
                                    $kategori = $_POST['txtkategori'];
                                    $jumlah   = $_POST['txtjumlah'];
                                    $satuan   = $_POST['txtsatuan'];
                                    $id       = $_GET['id'];

                                    // Periksa apakah ada file gambar yang diunggah
                                    if (!empty($_FILES['txtgbr']['name'])) {
                                        $gambar = addslashes(file_get_contents($_FILES['txtgbr']['tmp_name']));
                                        $updateQuery = "UPDATE kue SET nama_kue = '$nama', harga = '$harga', kategori = '$kategori', jumlah = '$jumlah', satuan = '$satuan', gambar = '$gambar' WHERE id_kue = '$id'";
                                    } else {
                                        $updateQuery = "UPDATE kue SET nama_kue = '$nama', harga = '$harga', kategori = '$kategori', jumlah = '$jumlah', satuan = '$satuan' WHERE id_kue = '$id'";
                                    }

                                    $result = mysqli_query($conn, $updateQuery);

                                    if ($result) {
                                        echo "<script>alert('Data berhasil disimpan');location='.?hal=kuehajatan'</script>";
                                    } else {
                                        echo "<script>alert('Gagal menyimpan data');</script>";
                                    }
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