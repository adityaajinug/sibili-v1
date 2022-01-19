<style>
  .icon-none {
    text-align: center;
  }

  .icon-none i {
    font-size: 20em;
  }

  .icon-none p {
    font-size: 20px;
    margin-top: 12px;
  }


  @media (max-width: 768px) {
    .card-data .body-data .data-desc {
      display: block;
    }

    .card-data .body-data .icon-data i {
      display: none !important;
    }

  }
</style>
<div class="container-fluid">

  <div class="row">

    <?php
    date_default_timezone_set('Asia/Jakarta');
    $now = (new DateTime())->format('Y-m-d H:i:s');
    // echo $now;


    if ($upload_form['limit_end'] < $now) { ?>
      <?php if ($upload_form == null) { ?>
        <div class="col-md">
          <div class="icon-none">
            <i class="fas fa-file-pdf"></i>
            <p>Saat ini belum ada submit laporan</p>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="col-md">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card card-data shadow-sm">
          <div class="card-body body-data">
            <div class="data-desc">

              <h5>Upload <?php if ($upload_form['category_form'] == 1) {
                            echo "Laporan KKI I";
                          } else {
                            echo "Laporan KKI II";
                          } ?></br></h5>
              <table class="mt-4">
                <tr>
                  <td>
                    <p>Batas Tanggal</p>
                  </td>
                  <td>
                    <p class="ml-1">:</p>
                  </td>
                  <td>
                    <p class="ml-2">
                      <?php $time = $upload_form['limit_end'];
                      echo format_indo($time); ?> WIB</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Batas Waktu </p>
                  </td>
                  <td>
                    <p class="ml-1">:</p>
                  </td>
                  <td>
                    <p class="ml-2">
                      <?php
                      date_default_timezone_set('Asia/Jakarta');
                      $now = new DateTime();
                      $date_end =  $upload_form['limit_end'];
                      $date = new DateTime(($date_end));
                      echo $date->diff($now)->format("%d hari, %h jam and %i menit");
                      ?></p>
                  </td>
                </tr>
                <?php
                // var_dump($upload);

                if ($upload == null) {

                ?>


                  <tr>
                    <td>
                      <p>Status</p>
                    </td>
                    <td>
                      <p class="ml-1">:</p>
                    </td>
                    <td>
                      <p class="ml-2"><span class="badge badge-pill badge-warning">Belum Upload</span></p>
                    </td>
                  </tr>
                <?php } else  if ($upload != null) {


                ?>



                  <tr>
                    <td>
                      <p>Status</p>
                    </td>
                    <td>
                      <p class="ml-1">:</p>
                    </td>
                    <td>
                      <p class="ml-2"><span class="badge badge-pill badge-success">Sudah Upload</span></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>File</p>
                    </td>
                    <td>
                      <p class="ml-1">:</p>
                    </td>

                    <td> <a href="<?= base_url('assets/file/laporan/' . $upload['file']) ?>" target="_blank"> <?= word_limiter($upload['file'], 5);  ?>
                      </a>
                      <p class="ml-2">

                      </p>
                    </td>

                  </tr>
                <?php
                }
                ?>

              </table>
              <?php if ($upload != null) {

              ?>
                <div class="btn-data">

                  <a href="#" data-toggle="modal" data-target="#tambah-user-guide" class="btn btn-success" style="border-radius: 10px; font-weight: 700;
        padding: 5px 30px; font-size: 16px;">Edit</a>
                </div>

              <?php
              } else { ?>
                <div class="btn-data">
                  <a href="#" data-toggle="modal" data-target="#tambah-user-guide" class="btn btn-primary" style="border-radius: 10px; font-weight: 700;
        padding: 5px 30px; font-size: 16px;">Tambah</a>
                </div>
              <?php } ?>

            </div>
            <div class="icon-data" style="margin-top:auto; margin-bottom:auto">
              <i class="fas fa-upload" style="font-size:120px"></i>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>


  </div>
</div>

<div id="tambah-user-guide" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Upload File Laporan</p>
        </div>

        <form action="<?= base_url('kki/ujian/tambah_ujian') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">

          <div class="form-group">
            <label for="kelompok">File</label>
            <input class="form-control" type="file" name="file">
            <input class="form-control" type="hidden" name="category_upload" value="<?php if ($upload_form['category_form'] == 1) {
                                                                                      echo "1";
                                                                                    } else if ($upload_form['category_form'] == 2) {
                                                                                      echo "2";
                                                                                    } ?>">
            <input class="form-control" type="hidden" name="user_id" value="<?= $user['id_user'] ?>">
            <?php $nim = $user['username'];
            $substr = substr($nim, 4, 4);
            ?>
            <input type="hidden" name="th" value="<?= $substr ?>">

          </div>


          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Kirim</button>
          </div>

        </form>


      </div>
    </div>
  </div>
</div>
<?php


?>

<!-- <td></td> -->