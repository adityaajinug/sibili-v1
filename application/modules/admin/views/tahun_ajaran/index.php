<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">


    <div class="col-12">
      <a href="#" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">

        <div class="card-body">

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tahun Ajaran</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($th as $u) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u['year'] ?></td>

                    <td>
                      <a href="http://" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
                      <a href="http://" class="badge badge-pill badge-danger py-2 px-3"> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- order table -->
</div>

<div id="tambah-data" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Tahun Ajaran</p>
        </div>

        <form action="<?= base_url('admin/tambah_tahun_ajaran') ?>" method="POST" class="pl-3 pr-3">
          <div class="form-group">
            <label for="th">Tahun Ajaran</label>
            <input type="text" class="form-control" id="th" name="year" placeholder="Contoh : 2020/2021">
          </div>

          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>