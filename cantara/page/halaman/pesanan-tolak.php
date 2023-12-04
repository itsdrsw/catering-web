<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Daftar Pesanan yang di tolak</h4>
                <p class="text-muted font-14"></p>
                <div class="tab-pane show active" id="rounded-buttons-preview">
                    <div class="d-flex flex-wrap gap-2 mb-2">
                        <a href=".?hal=pesanan-approve"><button type="button" class="btn btn-soft-primary ">Pesanan Disetujui</button></a>
                        <a href=".?hal=pesanan-proccess"><button type="button" class="btn btn-soft-warning ">Pesanan Dibuat</button></a>
                        <a href=".?hal=pesanan-delivery"><button type="button" class="btn btn-soft-info ">Pesanan Dikirim</button></a>
                        <a href=".?hal=pesanan-complete"><button type="button" class="btn btn-soft-success ">Pesanan Selesai</button></a>
                        <a href=".?hal=pesanan-tolak"><button type="button" class="btn btn-danger ">Pesanan Ditolak</button></a>
                    </div>
                </div> <!-- end preview-->
                <ul class="nav nav-tabs nav-bordered mb-3">
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal Terima</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = "SELECT * FROM pesanan p inner join user u on p.id_user = u.id_user where p.ket = 'Ditolak'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['total_harga'] ?></td>
                                        <td><?= $row['tgl_terima'] ?></td>
                                        <td>
                                            <h4><a href="#" class="badge badge-danger-lighten"><?= $row['ket'] ?></a></h4>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href=".?hal=ubahpesanan&id=<?= $row['id_pesanan'] ?>">
                                                <i class=" ri-edit-2-fill"></i> Ubah</a>

                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')" href=".?hal=hapususer&id=<?= $row['id_user'] ?>">
                                                <i class="ri-delete-bin-2-fill"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php   } ?>
                            </tbody>
                        </table>
                    </div> <!--  end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->