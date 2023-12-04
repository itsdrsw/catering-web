 <!-- Start Content-->
 <div class="container-fluid">
     <!-- start page title -->
     <div class="row">
         <div class="col-12">
             <div class="page-title-box">
                 <h4 class="page-title">Dashboard</h4>
             </div>
         </div>
     </div>
     <!-- end page title -->
     <div class="row">
         <div class="col-12">
             <div class="card widget-inline">
                 <div class="card-body p-0">
                     <div class="row g-0">
                         <div class="col-sm-6 col-lg-3">
                             <div class="card rounded-0 shadow-none m-0">
                                 <div class="card-body text-center">
                                     <?php
                                        $pesanan = mysqli_query($conn, "SELECT * FROM pesanan ");
                                        $jumlah_pesan = mysqli_num_rows($pesanan);
                                        ?>
                                     <i class=" ri-shopping-bag-line text-muted font-24"></i>
                                     <h3><span><?php echo $jumlah_pesan ?></span></h3>
                                     <p class="text-muted font-15 mb-0">Total Pesanan</p>
                                 </div>
                             </div>
                         </div>

                         <div class="col-sm-6 col-lg-3">
                             <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                 <div class="card-body text-center">
                                     <?php
                                        $kue = mysqli_query($conn, "SELECT * FROM kue ");
                                        $jumlah_pesan = mysqli_num_rows($kue);
                                        ?>
                                     <i class="ri-cake-3-fill text-muted font-24"></i>
                                     <h3><span><?php echo $jumlah_pesan ?></span></h3>
                                     <p class="text-muted font-15 mb-0">Total Kue</p>
                                 </div>
                             </div>
                         </div>

                         <div class="col-sm-6 col-lg-3">
                             <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                 <div class="card-body text-center">
                                     <?php
                                        $pengguna = mysqli_query($conn, "SELECT * FROM user ");
                                        $jumlah_pesan = mysqli_num_rows($pengguna);
                                        ?>
                                     <i class=" ri-user-3-line text-muted font-24"></i>
                                     <h3><span><?php echo $jumlah_pesan ?></span></h3>
                                     <p class="text-muted font-15 mb-0">Jumlah Pengguna</p>
                                 </div>
                             </div>
                         </div>

                         <div class="col-sm-6 col-lg-3">
                             <div class="card rounded-0 shadow-none m-0 border-start border-light">
                                 <div class="card-body text-center">
                                     <?php
                                        $hittot = mysqli_query($conn, "SELECT COUNT(*) AS tot FROM pesanan ");
                                        $totolpesanan = mysqli_num_rows($hittot);
                                        ?>
                                     <i class="ri-shopping-basket-2-line font-24"></i>
                                     <h3><span><?php echo $totolpesanan ?></span> </h3>
                                     <p class="text-muted font-15 mb-0">Pesanan Selesai</p>
                                 </div>
                             </div>
                         </div>

                     </div> <!-- end row -->
                 </div>
             </div> <!-- end card-box-->
         </div> <!-- end col-->
     </div>
     <div class="row">
         <div class="col-xxl-6">
             <div class="card">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <h4 class="header-title mb-0">Informasi Pesanan Terkini</h4>
                 </div>

                 <div class="card-body pt-0">
                     <div class="table-responsive">
                         <table class="table table-hover table-centered mb-0">
                             <thead>
                                 <tr>
                                     <th>Nama Pelanggan</th>
                                     <th>Tanggal Terima</th>
                                     <th>Status Pesanan</th>
                                     <th>Kuantitas</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    function getTodayDate()
                                    {
                                        return date("Y-m-d", strtotime("tomorrow")); // Format: tahun-bulan-hari 
                                    }

                                    // Pastikan koneksi ke database telah dibuat sebelumnya
                                    $no = 1;
                                    $tgl = getTodayDate();
                                    $query = "SELECT * FROM pesanan p INNER JOIN user u ON u.id_user = p.id_user INNER JOIN detail_pesanan dp ON dp.id_pesanan = p.id_pesanan INNER JOIN kue k ON k.id_kue = dp.id_kue WHERE tgl_terima = '$tgl' ";
                                    $result = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                     <tr>
                                         <td><?= $row['nama'] ?></td>
                                         <td><?= $row['tgl_terima'] ?></td>

                                         <td>
                                             <?php if ($row['ket'] == 'Dibuat') : ?>
                                                 <span class="badge bg-warning"><?= $row['ket'] ?></span>
                                             <?php elseif ($row['ket'] == 'Dikirim') : ?>
                                                 <span class="badge bg-info"><?= $row['ket'] ?></span>
                                             <?php elseif ($row['ket'] == 'Selesai') : ?>
                                                 <span class="badge bg-success"><?= $row['ket'] ?></span>
                                             <?php endif; ?>
                                         </td>
                                         <td>Kue <?= $row['nama_kue'] ?> sebanyak <?= $row['jumlah_pesan'] ?> <?= $row['satuan'] ?></td>
                                     </tr>
                                 <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- end row-->
 </div> <!-- container -->