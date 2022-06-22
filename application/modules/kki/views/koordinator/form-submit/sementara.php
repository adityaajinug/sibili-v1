<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">

    <div class="col-12">
      <a href="#" data-toggle="modal" data-target="#tambah-form" class="btn btn-rounded btn-primary mb-2 shadow mb-3">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Form Submit</h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Batas Upload</th>
                  <th>Status</th>
                  <th>Interval</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($form as $f) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>
                      <?php
                      $time = $f['limit_end'];
                      echo format_indo($time); ?> WIB</td>
                    <td><?php if ($f['category_form'] == 1) : ?>
                        <span class="badge badge-pill badge-primary py-2 px-3">KKI Pertama</span>
                      <?php elseif ($f['category_form'] == 2) : ?>
                        <span class="badge badge-pill badge-primary py-2 px-3">KKI Kedua</span>
                      <?php elseif ($f['category_form'] == 3) : ?>
                        <span class="badge badge-pill badge-warning py-2 px-3">Proposal KKI Pertama</span>
                      <?php elseif ($f['category_form'] == 4) : ?>
                        <span class="badge badge-pill badge-warning py-2 px-3">Proposal KKI Kedua</span>
                      <?php endif; ?>
                    </td>

                    <td>

                      <?php
                      date_default_timezone_set('Asia/Jakarta');
                      $now = new DateTime();
                      $date_end =  $f['limit_end'];
                      $date = new DateTime(($date_end));
                      echo $date->diff($now)->format("%d hari, %h jam and %i menit");
                      ?>
                    </td>

                    <td>
                      <a href="#" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
                      <a href="#" class="badge badge-pill badge-danger py-2 px-3">Hapus</a>
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
          <p style="font-size: 24px;color:black;font-weight:500">Buat Form Submit KKI</p>
        </div>

        <form action="<?= base_url('kki/tambah_form_submit') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="akhir">Batas Akhir</label>
            <input class="form-control" type="datetime-local" name="limit_end" id="akhir">
            <input class="form-control" type="hidden" name="user_id" value="<?= $user['id_user'] ?>" id="akhir">

          </div>
          <div class="form-group">
            <label for="nama">Status KKI</label>
            <select class="js-choose-status form-control" name="category_form" style="width:100%;font-size:18px">
              <option value="">--Pilih Status--</option>
              <option value="1">Laporan KKI Pertama</option>
              <option value="2">Laporan KKI Kedua</option>
              <option value="3">Proposal KKI Pertama</option>
              <option value="4">Proposal KKI Kedua</option>
            </select>
          </div>


          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>