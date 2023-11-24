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
                                     <i class="ri-line-chart-line text-muted font-24"></i>
                                     <h3><span>93%</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                     <p class="text-muted font-15 mb-0">Produktivitas</p>
                                 </div>
                             </div>
                         </div>

                     </div> <!-- end row -->
                 </div>
             </div> <!-- end card-box-->
         </div> <!-- end col-->
     </div>
     <!-- end row-->
 </div> <!-- container -->