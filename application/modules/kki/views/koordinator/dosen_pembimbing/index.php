<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="<?= base_url('kki/tambah_dosen_pembimbing') ?>" class="btn btn-primary mb-2 shadow mb-3">Tambah </a>

            <div class="card shadow-lg">
                <div class="card-body">
                    <h4 class="card-title">Tabel Dosen Pembimbing</h4>

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelompok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kelompok as $k) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $k['group']; ?></td>

                                        <td>
                                            <a href="http://" class="badge badge-pill badge-secondary"> Detail</a>
                                            <a href="http://" class="badge badge-pill badge-success"> Edit</a>
                                            <a href="http://" class="badge badge-pill badge-danger"> Hapus</a>
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