<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <a href="#" data-toggle="modal" data-target="#tambah-form" class="btn btn-rounded btn-primary mb-2 shadow mb-3">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Dosen Pembimbing</h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>File</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($userGuide as $f) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $f['username'] ?></td>
                    <td><?= $f['mhs_name'] ?></td>


                    <td>
                      <a href="<?= base_url('assets/file/user_guide/' . $f['file']) ?>" target="_blank" class="badge badge-pill badge-danger py-2 px-3"> Pdf</a>
                    </td>

                    <td>
                      <a href="<?= base_url('kki/detail_kelompok/') ?>" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
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
<div id="tambah-form" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Buat Form Submit User Guide</p>
        </div>

        <form action="<?= base_url('sertifikasi/tambah_form_submit') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="topic">Topic</label>
            <input class="form-control" type="text" name="topic" id="topic">

          </div>

          <div class="form-group">
            <label for="akhir">Batas Akhir</label>
            <input class="form-control" type="datetime-local" name="limit_end" id="akhir">
            <input class="form-control" type="hidden" name="user_id" value="<?= $user['id_user'] ?>" id="akhir">
            <input class="form-control" type="hidden" name="category_form" value="4" id="akhir">
          </div>


          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>