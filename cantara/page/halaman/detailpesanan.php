<?php
include "koneksi.php";
$id     = $_GET['id'];
$query    = "SELECT * FROM pesanan p inner join detail_pesanan d on p.id_pesanan = d.id_pesanan inner join kue k on d.id_kue = k.id_kue inner join user u on p.id_user = u.id_user WHERE p.id_pesanan = '$id'";
$result   = mysqli_query($conn, $query);
$row      = mysqli_fetch_assoc($result);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail Pesanan </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10 col-sm-11">

            <?php if ($row['ket'] == 'Disetujui') : ?>
                <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                    <div class="horizontal-steps-content">
                        <div class="step-item current">
                            <span title="">Disetujui</span>
                        </div>
                        <div class="step-item">
                            <span>Diproses</span>
                        </div>
                        <div class="step-item">
                            <span>Dikirim</span>
                        </div>
                        <div class="step-item">
                            <span>Selesai</span>
                        </div>
                    </div>
                    <div class="process-line" style="width: 0%;"></div>
                </div>
            <?php elseif ($row['ket'] == 'Dibuat') : ?>
                <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                    <div class="horizontal-steps-content">
                        <div class="step-item">
                            <span title="">Disetujui</span>
                        </div>
                        <div class="step-item current">
                            <span>Diproses</span>
                        </div>
                        <div class="step-item">
                            <span>Dikirim</span>
                        </div>
                        <div class="step-item">
                            <span>Selesai</span>
                        </div>
                    </div>
                    <div class="process-line" style="width: 33%;"></div>
                </div>
            <?php elseif ($row['ket'] == 'Dikirim') : ?>
                <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                    <div class="horizontal-steps-content">
                        <div class="step-item">
                            <span title="">Disetujui</span>
                        </div>
                        <div class="step-item ">
                            <span>Diproses</span>
                        </div>
                        <div class="step-item current">
                            <span>Dikirim</span>
                        </div>
                        <div class="step-item">
                            <span>Selesai</span>
                        </div>
                    </div>
                    <div class="process-line" style="width: 66%;"></div>
                </div>
            <?php elseif ($row['ket'] == 'Selesai') : ?>
                <div class="horizontal-steps mt-4 mb-4 pb-5" id="tooltip-container">
                    <div class="horizontal-steps-content">
                        <div class="step-item">
                            <span title="">Disetujui</span>
                        </div>
                        <div class="step-item ">
                            <span>Diproses</span>
                        </div>
                        <div class="step-item">
                            <span>Dikirim</span>
                        </div>
                        <div class="step-item current">
                            <span>Selesai</span>
                        </div>
                    </div>
                    <div class="process-line" style="width: 100%;"></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">ID Detail Pesanan : <?= $row['id_detailpesanan'] ?></h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Kue</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($conn, $query);
                                while ($p = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?= $p['nama_kue'] ?></td>
                                        <td><?= $p['jumlah_pesan'] ?></td>
                                        <td><?= $p['harga'] ?></td>
                                        <td><?= $p['total_harga'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Ringkasan Pesanan</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($conn, $query);
                                while ($p = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td>Grand Total :</td>
                                        <td><?= $p['total_harga'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Informasi Pemesan</h4>

                    <h5><?= $row['nama'] ?></h5>

                    <address class="mb-0 font-14 address-lg">
                        <?= $row['alamat_lengkap'] ?><br>
                        Kecamatan <?= $row['kecamatan'] ?> <br>
                        <p class="mb-0"><b>Telepon :</b> <?= $row['telp'] ?></p>
                        <p class="mb-0"><b>Pesan :</b> <?= $row['pesan'] ?></p>
                    </address>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Informasi Pembayaran</h4>
                    <div class="text-left">
                        <i class="ri-wallet-3-fill h2 text-muted"></i>
                        <h5><b>Pembayaran</b></h5>
                        <p class="mb-1"><b>ID Pesanan :</b> <?php echo $id; ?></p>
                        <p class="mb-0"><b>Metode Pembayaran :</b> Deposito</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <!-- <div class="row"> -->
        <div class="col-sm-6 col-lg-6">
            <!-- Simple card -->
            <!-- <div class="card d-block"> -->
            <?php
            /**   $gambarData = $row['bukti']; // Ambil data gambar dari database
                    if (!empty($gambarData)) {
                        $gambarBase64 = base64_encode($gambarData); // Konversi blob ke base64

                        echo '<img src="data:image/jpeg;base64,' . $gambarBase64 . '" width="100%" height="auto">';
                    } else {
                        echo 'Tidak ada gambar';
                    }
             */
            ?>
            <!-- <img class="card-img-top" src="assets/images/small/small-1.jpg" alt="Card image cap"> -->
            <!-- <div class="card-body"> -->
            <!-- <h5 class="card-title text-center">Bukti Pesanan</h5> -->
            <!-- <p class="card-text"></p> -->
            <!-- <a href="javascript: void(0);" class="btn btn-primary"></a> -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div><!-- end col -->
</div>
</div>
</div>