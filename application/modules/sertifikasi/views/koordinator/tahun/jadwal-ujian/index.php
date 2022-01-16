<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <a href="#" data-toggle="modal" data-target="#tambah-form" class="btn btn-rounded btn-primary mb-2 shadow mb-3">Tambah </a>
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Mahasiswa Ujian </h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>Dosen Pembimbing</th>
                  <th>Assesor 1</th>
                  <th>Assesor 2</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($mhs_exam as $f) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>
                      <a href="<?= base_url('sertifikasi/detail_schedule/' . $f['id_year'] . '/' .  $f['id_schedule']) ?>" class="badge badge-pill badge-success py-2 px-3"> Detail</a>
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
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Mahasiswa Ujian</p>
        </div>

        <form action="<?= base_url('sertifikasi/tambah_jadwal') ?>" method="POST" class="pl-3 pr-3">
          <div class="form-group">
            <input class="form-control" type="hidden" name="category_schedule" value="<?= $schedule['id_schedule']; ?>" id="akhir">
          </div>

          <div class="form-group">
            <label for="dosen">Dosen Pembimbing</label>
            <select class="js-example-basic-single form-control" name="semester" style="width:100%;font-size:18px">
              <?php foreach ($mhsBimbingan as $p) :
              ?>
                <option value="<?= $p['id_pembimbing'] ?>"><?= $p['dosen_name'] ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="dosen">Mahasiswa</label>
            <select class="js-example-basic-single form-control" name="semester" style="width:100%;font-size:18px">
              <?php foreach ($mhsBimbingan as $p) :
              ?>
                <option value="<?= $p['id_pembimbing'] ?>"><?= $p['mhs_name'] ?> </option>
              <?php endforeach; ?>
            </select>

          </div>
          <div class="form-group">
            <label for="dosen">Assesor 1</label>
            <select class="js-example-basic-single form-control" name="semester" style="width:100%;font-size:18px">
              <?php foreach ($allDosen as $p) :
              ?>
                <option value="<?= $p['id_dosen'] ?>"><?= $p['dosen_name'] ?> </option>
              <?php endforeach; ?>
            </select>

          </div>
          <div class="form-group">
            <label for="dosen">Assesor 2</label>
            <select class="js-example-basic-single form-control" name="semester" style="width:100%;font-size:18px">
              <?php foreach ($allDosen as $p) :
              ?>
                <option value="<?= $p['id_dosen'] ?>"><?= $p['dosen_name'] ?> </option>
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