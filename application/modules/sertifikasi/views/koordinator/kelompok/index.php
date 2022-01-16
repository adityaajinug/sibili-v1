<style>
  .form-group select {
    border-radius: 20px !important;
    /* padding: 60px;
        font-size: 18px !important; */

  }

  .form-group label {
    font-size: 16px;
  }

  .form-group input {
    border-radius: 5px;
    font-size: 16px;
  }
</style>
<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <a href="#" data-toggle="modal" data-target="#tambah-bimbingan" class="btn btn-rounded btn-primary mb-2 shadow mb-3">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Dosen Pembimbing</h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kelompok</th>
                  <th>Dosen Pembimbing</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($pembimbing as $k) :

                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $k['group']; ?></td>
                    <td><?= $k['dosen_name']; ?></td>

                    <td>
                      <a href="<?= base_url('sertifikasi/detail_kelompok/' . $k['group']) ?>" class="badge badge-pill badge-success py-2 px-3"> Detail</a>
                    </td>
                  </tr>

                <?php

                endforeach; ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div id="tambah-bimbingan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Kelompok Bimbingan</p>
        </div>

        <form action="<?= base_url('sertifikasi/tambah_oembimbing') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="kelompok">Kelompok</label>
            <input class="form-control" type="text" name="group" id="kelompok" value="" readonly>
          </div>
          <div class="form-group">
            <label for="dosen">Dosen</label>
            <select class="js-example-basic-single form-control" name="dosen_id" style="width:100%;font-size:18px">
              <?php foreach ($allDosen as $d) : ?>
                <option value="<?= $d['id_dosen'] ?>"><?= $d['dosen_name'] ?></option>
              <?php endforeach; ?>
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