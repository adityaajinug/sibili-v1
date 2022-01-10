<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <a href="#" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Dosen Pembimbing</h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Industri</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($allbab as $i) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $i['name']; ?></td>
                    <td><?= $i['description']; ?></td>

                    <td>
                      <a href="<?= base_url('kki/edit_bab/' . $i['id_bab']) ?>" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
                      <a href="<?= base_url('kki/hapus_bab/' . $i['id_bab']) ?>" class="badge badge-pill badge-danger py-2 px-3"> Hapus</a>
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
</div>