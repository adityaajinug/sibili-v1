<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kki/koordinator') ?>" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Kembali</a>
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center">

            <h4 class="card-title"><?= $semester['year'] ?>

            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">
                  <a class="dropdown-item" href="<?= base_url('kki/tambah_informasi') ?>" style="border-radius:5px;">Tambah Informasi</a>

                </div>
              </div>
            </div>
          </div>
          <h3 class="card-title mt-2">Tabel Informasi</h3>


          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-1">

                  <th class="border-1 font-16 font-weight-medium text-dark text-center"> No </th>
                  <th class="border-1 font-16 font-weight-medium text-dark"> Title
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    File
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Tanggal
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Aksi
                  </th>


                </tr>
              </thead>
              <?php
              //  {
              // }
              // 
              ?>
              <tbody>
                <?php $no = 1;
                foreach ($announce as $a) : ?>
                  <?php if ($a['year_id'] == $dosen['year_id']) : ?>
                    <?php if ($a['category_announce'] == 1) : ?>
                      <tr>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++ ?></td>
                        <td class=" border-top-1 text-dark font-weight-normal px-2 py-4 font-16"><?= $a['title'] ?></td>

                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                          <?php if ($a['file'] != null) :
                            $info = pathinfo($a['file']);
                            if ($info["extension"] == "xlsx") : ?>

                              <a href="<?= base_url('assets/file/announcement/' . $a['file']) ?>" download class="badge badge badge-pill badge-success px-3 py-2"><i class="fas fa-file-excel" style="color: #ffff;"></i><span class="ml-2">Download</span></a>
                            <?php elseif ($info["extension"] == "docx") : ?>
                              <a href="<?= base_url('assets/file/announcement/' . $a['file']) ?>" download class="badge badge badge-pill badge-primary px-3 py-2"><i class="fas fa-file-word" style="color: #ffff;"></i><span class="ml-2">Download</span></a>
                            <?php elseif ($info["extension"] == "pdf") : ?>
                              <a href="<?= base_url('assets/file/announcement/' . $a['file']) ?>" download class="badge badge badge-pill badge-danger px-3 py-2"><i class="fas fa-file-pdf" style="color: #ffff;"></i><span class="ml-2">Download</span></a>
                            <?php endif; ?>
                          <?php else : ?>
                            <p>Tidak Unggah File</p>
                          <?php endif; ?>
                        </td>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                          <?php $tgl = $a['date_created'];
                          echo format_indo($tgl) ?>
                        </td>
                        <td class="border-top-1 font-16 text-center">

                          <a href="<?= base_url('kki/edit_info/') . $a['id_announce'] ?>" class="badge badge-pill badge-warning px-3 py-2">Edit</a>
                          <a href="#" data-toggle="modal" data-target="#hapus-announce<?= $a['id_announce'] ?>" class="badge badge-pill badge-danger px-3 py-2">Hapus</a>
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
                  <a class="dropdown-item" data-toggle="modal" data-target="#tambah-form" href="#" style="border-radius:5px;">Tambah Submission</a>

                </div>
              </div>
            </div>
          </div>
          <h3 class="card-title mt-2">Tabel Submit File</h3>


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
                    <?php if ($f['category_form'] == 4) : ?>
                      <tr>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++ ?></td>
                        <td class=" border-top-1 text-dark font-weight-normal px-2 py-4 font-16"><?= $f['title'] ?></td>


                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                          <?php $tgl = $f['limit_end'];
                          echo format_indo($tgl) ?>
                        </td>
                        <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                          <?php


                          // date_default_timezone_set("Asia/Ujung_Pandang");

                          $now = new DateTime();
                          $date_end =  $f['limit_end'];
                          $date = new DateTime(($date_end));

                          if (date_default_timezone_set('Asia/Jakarta')) {
                            if ($now == $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else if ($now > $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else {
                              echo $date->diff($now)->format("%d hari, %h jam dan %i menit");
                            }
                          } else if (date_default_timezone_set('Asia/Ujung_Pandang')) {
                            if ($now == $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else if ($now > $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else {
                              echo $date->diff($now)->format("%d hari, %h jam dan %i menit");
                            }
                          } else if (date_default_timezone_set('Asia/Jayapura')) {
                            if ($now == $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else if ($now > $date) {
                              echo "0 hari, 0 jam, dan 0 menit";
                            } else {
                              echo $date->diff($now)->format("%d hari, %h jam dan %i menit");
                            }
                          }



                          ?></td>
                        <td class="border-top-1 font-16 text-center">

                          <a href="#" data-toggle="modal" data-target="#edit-form<?= $f['id_form'] ?>" class="badge badge-pill badge-warning px-3 py-2">Edit</a>
                          <a href="#" data-toggle="modal" data-target="#hapus-form<?= $f['id_form'] ?>" class="badge badge-pill badge-danger px-3 py-2">Hapus</a>
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
</div>
<?php foreach ($announce as $j) : $j++; ?>
  <div id="hapus-announce<?= $j['id_announce'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan Hapus Informasi?</p>
            <p class="text-center"><?= $j['title'] ?></p>
          </div>

          <form action="<?= base_url('kki/delete_info') ?>" method="POST" class="pl-3 pr-3">

            <input type="hidden" class="form-control" name="fileold" value="<?= $j['file'] ?>" readonly>
            <div class="form-group">

              <input class="form-control" type="hidden" name="id_announce" value="<?= $j['id_announce'] ?>" id="akhir">
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
<div id="tambah-form" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Submission</p>
        </div>

        <form action="<?= base_url('kki/tambah_submission') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="akhir">Judul</label>
            <input type="text" class="form-control" maxlength="50" name="title" placeholder="Contoh : Submit File Laporan KKI I">
            <small class="text-danger">Max : <span class="text-danger">50 Kata</span></small>
          </div>
          <div class="form-group">
            <label for="akhir">Batas Submit File</label>
            <input class="form-control" type="datetime-local" name="limit_end" id="akhir">
            <input class="form-control" type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>" id="akhir">
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
<?php foreach ($form as $h) : $h++; ?>
  <div id="edit-form<?= $h['id_form'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Edit Submission</p>
          </div>

          <form action="<?= base_url('kki/edit_submission') ?>" method="POST" class="pl-3 pr-3">

            <div class="form-group">
              <label for="akhir">Judul</label>
              <input type="text" class="form-control" maxlength="50" name="title" value="<?= $h['title'] ?>">
              <small class="text-danger">Max : <span class="text-danger">50 Kata</span></small>
            </div>
            <div class="form-group">
              <label for="akhir">Batas Submit File</label>
              <?php $date = date_create($h['limit_end']); ?>
              <input class="form-control" type="datetime-local" name="limit_end" min="<?= date_format($date, 'Y-m-d\TH:i') ?>" id="akhir" value="<?= date_format($date, 'Y-m-d\TH:i') ?>">
              <input class="form-control" type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>" id="akhir">
              <input class="form-control" type="hidden" name="category_form" value="4" id="akhir">
              <input class="form-control" type="hidden" name="id_form" value="<?= $h['id_form'] ?>" id="akhir">
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
<?php foreach ($form as $h) : $h++; ?>
  <div id="hapus-form<?= $h['id_form'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan Hapus Submission?</p>
            <p class="text-center"><?= $h['title'] ?></p>
          </div>

          <form action="<?= base_url('kki/delete_submission') ?>" method="POST" class="pl-3 pr-3">


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