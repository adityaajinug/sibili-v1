<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kki/tambah_dosen_pembimbing') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Data Industri</h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Industri</th>
                  <th>Alamat</th>
                  <th>Maps</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($industri as $i) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $i['industry_name']; ?></td>
                    <td><?= $i['address']; ?></td>
                    <td>
                      <a href="<?= $i['maps']; ?>" class="badge badge-pill badge-secondary py-2 px-3">Link</a>
                    </td>

                    <td>
                      <!-- <a href="<?= base_url('kki/detail_kelompok/' . $i['id_industries']) ?>" class="badge badge-pill badge-success py-2 px-3"> Detail</a> -->
                      <a href="<?= base_url('kki/detail_kelompok/' . $i['id_industries']) ?>" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
                      <a href="<?= base_url('kki/detail_kelompok/' . $i['id_industries']) ?>" class="badge badge-pill badge-danger py-2 px-3"> Hapus</a>
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