<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <a href="#" data-toggle="modal" data-target="#tambah-form" class="btn btn-rounded btn-primary mb-2 shadow mb-3">Tambah </a>
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Tahun Ajaran </h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Semester</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($schedule as $f) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?php $time = $f['schedule_start'];
                        echo tgl_indo($time); ?></td>
                    <td><?php $time = $f['schedule_start'];
                        echo waktu_indo($time); ?> WIB - Selesai</td>
                    <td>
                      <?php if ($f['semester'] == 1) { ?>

                        <span class="badge badge-pill badge-primary py-2 px-3">Ganjil</span>
                    </td>
                  <?php } else { ?>
                    <span class="badge badge-pill badge-warning py-2 px-3">Genap</span>
                  <?php } ?>

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
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Jadwal</p>
        </div>

        <form action="<?= base_url('sertifikasi/tambah_jadwal') ?>" method="POST" class="pl-3 pr-3">
          <div class="form-group">
            <label for="akhir">Tanggal dan Waktu</label>
            <input class="form-control" type="datetime-local" name="schedule_start" id="akhir">
            <input class="form-control" type="hidden" name="category_schedule" value="2" id="akhir">
          </div>
          <div class="form-group">
            <label for="dosen">Semester</label>
            <select class="js-example-basic-single form-control" name="semester" style="width:100%;font-size:18px">

              <option value="1">Ganjil</option>
              <option value="2">Genap</option>

            </select>
          </div>
          <div class="form-group">
            <label for="topic">Tahun Ajaran</label>
            <select class="js-example-basic-single form-control" name="year_id" style="width:100%;font-size:18px">
              <?php foreach ($tahun as $t) :
              ?>
                <option value="<?= $t['id_year'] ?>"><?= $t['year'] ?></option>
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