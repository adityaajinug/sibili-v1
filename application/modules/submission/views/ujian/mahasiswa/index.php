<div class="container-fluid">

  <div class="row">

    <div class="col-md-6">
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Proposal</span></br></h5>
            <div class="btn-data">
              <a href="<?= base_url('submission/proposal') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-file"></i>
          </div>
        </div>
      </div>
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Sertifikasi</span></br></h5>
            <div class="btn-data">
              <a href="<?= base_url('submission/sertifikasi') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-book"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Laporan</span></br></h5>
            <div class="btn-data">
              <a href="<?= base_url('submission/laporan') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-file-invoice"></i>
          </div>
        </div>
      </div>
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Proyek Akhir</span></br></h5>
            <div class="btn-data">
              <a href="<?= base_url('submission/proyekakhir') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-file-alt"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Jadwal Ujian</h4>

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Ujian</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($schedule as $s) : ?>

                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $s['schedule_name'] ?></td>
                    <td><?php $tgl = tgl_indo($s['schedule_start']);
                        echo $tgl ?></td>
                    <td><?php $tgl = waktu_indo($s['schedule_start']);
                        echo $tgl; ?> - Selesai</td>


                    <td>
                      <a href="#" data-toggle="modal" data-target="#detail-schedule<?= $s['id_schedule'] ?>" class="badge badge-pill badge-success py-2 px-3"> Detail</a>

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
<?php foreach ($schedule as $l) : $l++; ?>
  <div id="detail-schedule<?= $l['id_schedule'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Detail Ujian</p>
          </div>


          <p>Penguji Anda</p>
          <ul>
            <li><?= $l['assesor_one'] ?></li>
            <li><?= $l['assesor_two'] ?></li>
          </ul>

          <p>
            <a href="<?= base_url('submission/exportJadwal/' . $l['id_schedule']) ?>" class="badge badge-pill badge-success py-2 px-3 ml-3" style="font-size: 14px;">Selengkapnya</a>
          </p>







          <div class="form-group text-center">
            <button class=" btn btn-primary" data-dismiss="modal" style="border-radius:10px ;">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>