<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kki/koordinator') ?>" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Kembali</a>
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title"><?= $semester['year'] ?>
              <?php if ($semester['genap'] != 1) { ?>
                <span class="badge badge-pill badge-primary px-3 py-2 ml-2"> Ganjil
                </span>

              <?php } else if ($semester['genap'] == 1) { ?>
                <span class="badge badge-pill badge-danger px-3 py-2 ml-2"> Genap
                </span>

              <?php } ?>
            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">
                  <a class="dropdown-item" data-toggle="modal" data-target="#tambah-form" href="#" style="border-radius:5px;">Tambah Jadwal</a>
                  <a class="dropdown-item" href="<?= base_url('kki/exportJadwalExcel') ?>" style="border-radius:5px;">Export Excel</a>
                </div>
              </div>
            </div>
          </div>


          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-1">

                  <th class="border-1 font-16 font-weight-medium text-dark text-center">No
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">Nama Jadwal
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">Tanggal
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Waktu
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Aksi
                  </th>


                </tr>
              </thead>
              <tbody>


                <!-- 
                <tr>
                  <td colspan=" 3" class="text-center border-top-0 text-muted px-2 py-4 font-24 fw-bold">Data Kosong</td>
                </tr> -->

                <?php $no = 1;
                foreach ($schedule as $s) : ?>
                  <?php if ($s['year_id'] == $dosen['year_id']) : ?>
                    <?php if ($s['category_schedule'] == 1) : ?>
                      <tr>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++ ?></td>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"> <span class="badge badge-pill badge-secondary px-3 py-2 ml-2"> <?= $s['schedule_name'] ?>
                          </span></td>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?php $time = $s['schedule_start'];
                                                                                                            echo tgl_indo($time); ?></td>

                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                          <?php $time = $s['schedule_start'];
                          echo waktu_indo($time); ?> - Selesai
                        </td>
                        <td class="border-top-1 font-16 text-center">
                          <a href="<?= base_url('kki/detail_jadwal/' . $s['id_schedule']) ?>" class="badge badge-pill badge-success px-3 py-2">Detail</a>
                          <a href="#" data-toggle="modal" data-target="#edit-form<?= $s['id_schedule'] ?>" class="badge badge-pill badge-warning px-3 py-2">Edit</a>
                          <a href="#" class="badge badge-pill badge-danger px-3 py-2" data-toggle="modal" data-target="#hapus-form<?= $s['id_schedule'] ?>">Hapus</a>
                        </td>


                      </tr>

                    <?php endif; ?>

                  <?php endif; ?>
                <?php endforeach; ?>





              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center">

            <h4 class="card-title"><?= $semester['year'] ?>
              <?php if ($semester['genap'] != 1) { ?>
                <span class="badge badge-pill badge-primary px-3 py-2 ml-2"> Ganjil
                </span>

              <?php } else if ($semester['genap'] == 1) { ?>
                <span class="badge badge-pill badge-danger px-3 py-2 ml-2"> Genap
                </span>

              <?php } ?>
            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">
                  <a class="dropdown-item" data-toggle="modal" data-target="#tambah-submit" href="#" style="border-radius:5px;">Tambah Submission</a>

                </div>
              </div>
            </div>
          </div>
          <h3 class="card-title mt-2">Tabel Submit File Ujian</h3>


          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-1">

                  <th class="border-1 font-16 font-weight-medium text-dark text-center"> No </th>
                  <th class="border-1 font-16 font-weight-medium text-dark"> Title
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Batas Unggah
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">Interval</th>

                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Aksi
                  </th>


                </tr>
              </thead>
              <?php
              // $info = pathinfo($pathtofile);
              // if ($info["extension"] == "jpg") {
              // }
              // 
              ?>
              <tbody>
                <?php $no = 1;
                foreach ($form as $f) : ?>
                  <?php if ($f['year_id'] == $dosen['year_id']) : ?>
                    <?php if ($semester['genap'] != 1) : ?>
                      <?php if ($f['category_form'] == 1) : ?>
                        <tr>
                          <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++ ?></td>
                          <td class=" border-top-1 text-dark font-weight-normal px-2 py-4 font-16"><?= $f['title'] ?></td>


                          <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                            <?php $tgl = $f['limit_end'];
                            echo format_indo($tgl) ?>
                          </td>
                          <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $now = new DateTime();
                            $date_end =  $f['limit_end'];
                            $date = new DateTime(($date_end));


                            if ($now == $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else if ($now > $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else {
                              echo $date->diff($now)->format("%d hari, %h jam dan %i menit");
                            }
                            ?></td>
                          <td class="border-top-1 font-16 text-center">

                            <a href="#" data-toggle="modal" data-target="#edit-submit<?= $f['id_form'] ?>" class="badge badge-pill badge-warning px-3 py-2">Edit</a>
                            <a href="#" data-toggle="modal" data-target="#hapus-submit<?= $f['id_form'] ?>" class="badge badge-pill badge-danger px-3 py-2">Hapus</a>
                          </td>


                        </tr>
                      <?php endif; ?>
                    <?php elseif ($semester['genap'] == 1) : ?>
                      <?php if ($f['category_form'] == 2) : ?>
                        <tr>
                          <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++ ?></td>
                          <td class=" border-top-1 text-dark font-weight-normal px-2 py-4 font-16"><?= $f['title'] ?></td>


                          <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                            <?php $tgl = $f['limit_end'];
                            echo format_indo($tgl) ?>
                          </td>
                          <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $now = new DateTime();
                            $date_end =  $f['limit_end'];
                            $date = new DateTime(($date_end));


                            if ($now == $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else if ($now > $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else {
                              echo $date->diff($now)->format("%d hari, %h jam dan %i menit");
                            }
                            ?></td>
                          <td class="border-top-1 font-16 text-center">

                            <a href="#" data-toggle="modal" data-target="#edit-submit<?= $f['id_form'] ?>" class=" badge badge-pill badge-warning px-3 py-2">Edit</a>
                            <a href="#" data-toggle="modal" data-target="#hapus-submit<?= $f['id_form'] ?>" class=" badge badge-pill badge-danger px-3 py-2">Hapus</a>
                          </td>


                        </tr>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title"> Peraturan Ujian


            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">
                  <a class="dropdown-item" data-toggle="modal" data-target="#tambah-aturan" href="#" style="border-radius:5px;">Tambah Aturan</a>

                </div>
              </div>
            </div>
          </div>


          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-1">

                  <th class="border-1 font-16 font-weight-medium text-dark text-center">No
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">Peraturan
                  </th>


                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Aksi
                  </th>


                </tr>
              </thead>
              <tbody>


                <!-- 
                <tr>
                  <td colspan=" 3" class="text-center border-top-0 text-muted px-2 py-4 font-24 fw-bold">Data Kosong</td>
                </tr> -->

                <?php $no = 1;
                foreach ($rules as $r) : ?>
                  <?php if ($r['category_rules'] == 1) : ?>

                    <tr>
                      <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++; ?></td>
                      <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 "> <?= word_limiter($r['rules'], 6) ?> </td>


                      <td class="border-top-1 font-16 text-center">
                        <a href="#" data-toggle="modal" data-target="#detail-aturan<?= $r['id_rules'] ?>" class="badge badge-pill badge-success px-3 py-2">Detail</a>
                        <a href="#" data-toggle="modal" data-target="#edit-aturan<?= $r['id_rules'] ?>" class="badge badge-pill badge-warning px-3 py-2">Edit</a>
                        <a href="#" class="badge badge-pill badge-danger px-3 py-2 hapus-aturan" data-toggle="modal" data-target="#hapus-aturan<?= $r['id_rules'] ?>">Hapus</a>
                      </td>


                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>








              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- Jadwal
-------------------
-->

<div id="tambah-form" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Jadwal</p>
        </div>

        <form action="<?= base_url('kki/tambah_jadwal') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="akhir">Nama Jadwal</label>
            <select name="schedule_name" id="" class="form-control">
              <option value="Proposal">Proposal</option>
              <option value="Laporan">Laporan</option>

            </select>
          </div>
          <div class="form-group">
            <label for="akhir">Tanggal dan Waktu</label>
            <input class="form-control" type="datetime-local" name="schedule_start" id="akhir">
            <input class="form-control" type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>" id="akhir">
            <input class="form-control" type="hidden" name="category_schedule" value="1" id="akhir">



          </div>



          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
<?php foreach ($schedule as $sc) : $sc++ ?>
  <div id="edit-form<?= $sc['id_schedule'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Edit Jadwal</p>
          </div>

          <form action="<?= base_url('kki/edit_jadwal') ?>" method="POST" class="pl-3 pr-3">
            <div class="form-group">
              <label for="akhir">Nama Jadwal</label>

              <?php $sql = "SELECT DISTINCT schedule_name FROM schedule";
              $name = $this->db->query($sql)->result_array(); ?>

              <select name="schedule_name" id="" class="form-control">
                <optgroup label="Terpilih">
                  <?php foreach ($name as $n) : ?>
                    <?php if ($n['schedule_name'] == $sc['schedule_name']) { ?>
                      <option value="<?php echo $n['schedule_name'] ?>" selected disabled><?php echo $n['schedule_name'] ?></option>
                    <?php } ?>
                  <?php endforeach; ?>
                </optgroup>


                <optgroup label="Ganti Pilihan">
                  <option value="Proposal">Proposal</option>
                  <option value="Laporan">Laporan</option>
                </optgroup>
              </select>

            </div>
            <div class="form-group">
              <label for="akhir">Tanggal dan Waktu</label>
              <?php $date = date_create($sc['schedule_start']) ?>
              <input class="form-control" type="datetime-local" name="schedule_start" id="akhir" value="<?= date_format($date, 'Y-m-d\TH:i') ?>">
              <input class="form-control" type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>" id="akhir">
              <input class="form-control" type="hidden" name="category_schedule" value="1" id="akhir">
              <input class="form-control" type="hidden" name="id_schedule" value="<?= $sc['id_schedule'] ?>" id="akhir">
            </div>



            <div class="form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Ubah</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($schedule as $sc) : $sc++; ?>
  <div id="hapus-form<?= $sc['id_schedule'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan Hapus Jadwal?</p>
            <p class="text-center" style="font-size: 16px;"><?php $time = $sc['schedule_start'];
                                                            echo tgl_indo($time); ?>

          </div>

          <form action="<?= base_url('kki/delete_jadwal') ?>" method="POST" class="pl-3 pr-3">

            <div class="form-group">
              <input class="form-control" type="hidden" name="id_schedule" value="<?= $sc['id_schedule'] ?>" id="akhir">

            </div>
            <div class="form-group text-center">
              <button class="btn btn-danger px-5 py-1" type="submit" style="border-radius:10px;">Hapus</button>
              <button class=" btn btn-primary" data-dismiss="modal" style="border-radius:10px;">Close</button>
            </div>
          </form>

          <p></p>


        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- End Jadwal
-------------------
-->

<!-- ATURAN
------------------------------
-->


<div id="tambah-aturan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Peraturan</p>
        </div>
        <form action="<?= base_url('kki/tambah_peraturan') ?>" method="POST" class="pl-3 pr-3">
          <div class="form-group">
            <textarea name="rules" id="" cols="20" rows="5" class="form-control"></textarea>
            <input class="form-control" type="hidden" name="category_rules" value="1" id="akhir">
          </div>
          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php foreach ($rules as $l) : $l++; ?>
  <div id="detail-aturan<?= $l['id_rules'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Detail Peraturan</p>
          </div>


          <p><?= $l['rules'] ?></p>

          <div class="form-group text-center">
            <button class=" btn btn-primary" data-dismiss="modal" style="border-radius:10px ;">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($rules as $l) : $l++; ?>
  <div id="edit-aturan<?= $l['id_rules'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Edit Peraturan</p>
          </div>
          <form action="<?= base_url('kki/edit_peraturan') ?>" method="POST" class="pl-3 pr-3">
            <div class="form-group">
              <textarea name="rules" id="" cols="20" rows="5" class="form-control"><?= $l['rules'] ?></textarea>
              <input class="form-control" type="hidden" name="category_rules" value="1" id="akhir">
              <input class="form-control" type="hidden" name="id_rules" value="<?= $l['id_rules'] ?>" id="akhir">
            </div>
            <div class="form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Ubah</button>
            </div>
          </form>

          <p></p>


        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($rules as $l) : $l++; ?>
  <div id="hapus-aturan<?= $l['id_rules'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan Hapus Aturan?</p>

          </div>
          <form action="<?= base_url('kki/delete_peraturan') ?>" method="POST" class="pl-3 pr-3">
            <div class="form-group">
              <textarea name="rules" id="" cols="20" rows="5" class="form-control" disabled><?= $l['rules'] ?></textarea>
              <input class="form-control" type="hidden" name="category_rules" value="1" id="akhir">
              <input class="form-control" type="hidden" name="id_rules" value="<?= $l['id_rules'] ?>" id="akhir">
            </div>
            <div class="form-group text-center">
              <button class="btn btn-danger px-5 py-1" type="submit" style="border-radius:10px;">Hapus</button>
              <button class=" btn btn-primary" data-dismiss="modal" style="border-radius:10px;">Close</button>
            </div>
          </form>

          <p></p>


        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- END ATURAN
------------------------------
-->

<!-- 
  FORM SUBMIT
  -----------------------
 -->
<div id="tambah-submit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Submission</p>
        </div>

        <form action="<?= base_url('kki/tambah_submission_exam') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="akhir">Jenis Ujian</label>
            <select name="title" id="" class="form-control">
              <?php if ($semester['genap'] != 1) : ?>
                <option value="Ujian Proposal KKI I">Ujian Proposal KKI I</option>
                <option value="Ujian Laporan KKI I">Ujian Laporan KKI I</option>
              <?php elseif ($semester['genap'] == 1) : ?>
                <option value="Ujian Proposal KKI II">Ujian Proposal KKI II</option>
                <option value="Ujian Laporan KKI II">Ujian Laporan KKI II</option>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="akhir">Batas Submit File</label>
            <input class="form-control" type="datetime-local" name="limit_end" id="akhir">
            <input class="form-control" type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>" id="akhir">
            <?php if ($semester['genap'] != 1) : ?>
              <input class="form-control" type="hidden" name="category_form" value="1" id="akhir">
            <?php elseif ($semester['genap'] == 1) : ?>
              <input class="form-control" type="hidden" name="category_form" value="2" id="akhir">
            <?php endif; ?>
          </div>

          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
<?php foreach ($form as $f) : $f++; ?>
  <div id="edit-submit<?= $f['id_form'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Edit Submission</p>
          </div>

          <form action="<?= base_url('kki/edit_submission_exam') ?>" method="POST" class="pl-3 pr-3">

            <div class="form-group">
              <label for="akhir">Jenis Ujian</label>
              <?php $sql = "SELECT title FROM form_upload";
              $title = $this->db->query($sql)->result_array(); ?>
              <select name="title" id="" class="form-control">
                <optgroup label="Terpilih">
                  <?php foreach ($title as $t) : ?>
                    <?php if ($t['title'] == $f['title']) { ?>
                      <option value="<?php echo $t['title'] ?>" selected disabled><?php echo $t['title'] ?></option>
                    <?php } ?>
                  <?php endforeach; ?>
                </optgroup>


                <optgroup label="Ganti Pilihan">
                  <?php if ($semester['genap'] != 1) : ?>
                    <option value="Ujian Proposal KKI I">Ujian Proposal KKI I</option>
                    <option value="Ujian Laporan KKI I">Ujian Laporan KKI I</option>
                  <?php elseif ($semester['genap'] == 1) : ?>
                    <option value="Ujian Proposal KKI II">Ujian Proposal KKI II</option>
                    <option value="Ujian Laporan KKI II">Ujian Laporan KKI II</option>
                  <?php endif; ?>
                </optgroup>

              </select>
            </div>
            <div class="form-group">
              <label for="akhir">Batas Submit File</label>
              <input class="form-control" type="datetime-local" name="limit_end" id="akhir">
              <input class="form-control" type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>" id="akhir">
              <?php if ($semester['genap'] != 1) : ?>
                <input class="form-control" type="hidden" name="category_form" value="1" id="akhir">
              <?php elseif ($semester['genap'] == 1) : ?>
                <input class="form-control" type="hidden" name="category_form" value="2" id="akhir">
              <?php endif; ?>
            </div>

            <div class="form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($form as $h) : $h++; ?>
  <div id="hapus-submit<?= $h['id_form'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan Hapus Submission?</p>
            <p class="text-center"><?= $h['title'] ?></p>
          </div>

          <form action="<?= base_url('kki/delete_submission_exam') ?>" method="POST" class="pl-3 pr-3">


            <div class="form-group">

              <input class="form-control" type="hidden" name="id_form" value="<?= $h['id_form'] ?>" id="akhir">
            </div>

            <div class="form-group text-center">
              <button class="btn btn-danger px-5 py-1" type="submit" style="border-radius:10px;">Hapus</button>
              <button class=" btn btn-primary" data-dismiss="modal" style="border-radius:10px;">Close</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- 
 END FORM SUBMIT
  -----------------------
 -->