<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="<?= base_url('kki/tambah_dosen_pembimbing') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

            <div class="card shadow-lg" style="border-radius:10px;">
                <div class="card-body">
                    <h4 class="card-title">Tabel Dosen Pembimbing</h4>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Kelompok</th> -->
                                    <th>Dosen Pembimbing</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kelompok as $k) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <!-- <td><?= $k['code']; ?></td> -->
                                        <td><?= $k['dosen_name']; ?></td>

                                        <td>
                                            <a href="<?= base_url('kki/detail_kelompok/' . $k['code']) ?>" class="badge badge-pill badge-success py-2 px-3"> Detail</a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>