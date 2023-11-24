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
                <h4 class="header-title">Daftar Kue Hajatan</h4>
                <p class="text-muted font-14"></p>
                <a href=".?hal=tambahkuehajatan"><button class="btn btn-primary btn-sm mb-2">Tambah</button></a>
                <ul class="nav nav-tabs nav-bordered mb-3">
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="buttons-table-preview">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th style="width: 25%;">Nama Kue</th>
                                    <th style="width: 25%;">Gambar</th>
                                    <th style="width: 15%;">Harga</th>
                                    <th style="width: 10%;">Jumlah</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = "SELECT * FROM kue where kategori = 'hajatan'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $modalId = "modal-" . $row['id_kue'];
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_kue'] ?></td>
                                        <td>
                                            <img src="img/<?= $row['gambar'] ?>" width="60" height="40">
                                        </td>
                                        <td><?= $row['harga'] ?></td>
                                        <td><?= $row['jumlah'] ?> <?= $row['satuan'] ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href=".?hal=ubahkuehajatan&id=<?= $row['id_kue'] ?>">
                                                <i class=" ri-edit-2-fill"></i> Ubah</a>

                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')" href=".?hal=hapuskuehajatan&id=<?= $row['id_kue'] ?>">
                                                <i class="ri-delete-bin-2-fill"></i> Hapus</a>

                                            <button type="button" class="btn btn-success ri-picture-in-picture-exit-line" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">Lihat Foto</button>
                                            <div id="<?= $modalId ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="<?= $modalId ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h4 class="modal-title" style="color: #fff;" id="<?= $modalId ?> label">Foto Kue <?= $row['nama_kue'] ?></h4>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="img/<?= $row['gambar'] ?>" style="max-width: 100%;" height="auto">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php   } ?>
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>
</div> 