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
                <h4 class="header-title">Daftar Pemesanan</h4>
                <p class="text-muted font-14"></p>
                <ul class="nav nav-tabs nav-bordered mb-3">
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="justified-tabs-preview">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <?php
                            $tabs = [
                                ['id' => 'approve', 'label' => 'Approve'],
                                ['id' => 'proccess', 'label' => 'Proccess'],
                                ['id' => 'delivery', 'label' => 'Delivery'],
                                ['id' => 'complete', 'label' => 'Complete'],
                            ];
                            foreach ($tabs as $tab) {
                            ?>
                                <li class="nav-item">
                                    <a href="#<?= $tab['id'] ?>" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 <?= $tab['id'] === 'approve' ? 'active' : '' ?>">
                                        <span class="d-none d-md-block"><?= $tab['label'] ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <?php
                            foreach ($tabs as $tab) {
                            ?>
                                <div class="tab-pane <?= $tab['id'] === 'approve' ? 'show active' : '' ?>" id="<?= $tab['id'] ?>">
                                    <p class="mb-3"><?= $tab['label'] ?></p>
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
                                            $status = $tab['id'];
                                            $query = "SELECT * FROM pesanan p inner join user u on p.id_user = u.id_user where p.ket = '$status'";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['nama'] ?></td>
                                                    <td><?= $row['total_harga'] ?></td>
                                                    <td><?= $row['tgl_terima'] ?></td>
                                                    <td>
                                                        <?php
                                                        $statusLabel = '';
                                                        if ($status === 'approve') {
                                                            $statusLabel = 'success';
                                                        } elseif ($status === 'proccess') {
                                                            $statusLabel = 'warning';
                                                        } elseif ($status === 'delivery') {
                                                            $statusLabel = 'primary';
                                                        } elseif ($status === 'complete') {
                                                            $status = 'complete';
                                                        }
                                                        ?>
                                                        <button class="btn btn-soft-<?= $statusLabel ?> rounded-pill"><?= $row['ket'] ?></button>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href=".?hal=ubahpesanan&id=<?= $row['id_pesanan'] ?>">
                                                            <i class=" ri-edit-2-fill"></i> Ubah
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')" href=".?hal=hapususer&id=<?= $row['id_user'] ?>">
                                                            <i class="ri-delete-bin-2-fill"></i> Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>