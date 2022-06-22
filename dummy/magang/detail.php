<style>
  .card-radius .confirm {
    height: 100px;
    width: 120px;
    /* background-color: red; */
    position: absolute;
    top: -10px;
    right: -10px;
    overflow: hidden;

  }

  .card-radius .confirm::before,
  .card-radius .confirm::after {
    position: absolute;
    content: "";
    display: block;
    border: 5px solid #f8c701;
    border-top-color: transparent;
    border-right-color: transparent;
  }



  .card-radius .confirm::after {
    top: 90px;
    right: 0px;
  }

  .card-radius .confirm span {
    position: absolute;
    background-color: #fecc00;
    width: 170px;
    padding: 3px 1px;
    color: #000;
    font-weight: 500;
    text-align: center;
    top: 28px;
    /* right: 5px; */
    left: -10px;
    transform: rotate(39deg);
  }

  .card-radius .pending {
    height: 100px;
    width: 120px;
    /* background-color: red; */
    position: absolute;
    top: -10px;
    right: -10px;
    overflow: hidden;

  }

  .card-radius .pending::before,
  .card-radius .pending::after {
    position: absolute;
    content: "";
    display: block;
    border: 5px solid #10AD62;
    border-top-color: transparent;
    border-right-color: transparent;
  }



  .card-radius .pending::after {
    top: 90px;
    right: 0px;
  }

  .card-radius .pending span {
    position: absolute;
    background-color: #2BDC87;
    width: 170px;
    padding: 3px 1px;
    color: #fff;
    font-weight: 500;
    text-align: center;
    top: 28px;
    /* right: 5px; */
    left: -10px;
    transform: rotate(39deg);
  }
</style>
<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-12">
      <div class="card card-radius">
        <div class="card-body">
          <h4 class="card-title">
            Tempat Magang
          </h4>
          <div class="pending"> <span>Pending</span></div>
          <table class="mt-3">
            <tr>
              <td>
                <p>Instansi</p>
              </td>
              <td>
                <p class="ml-3 mr-3">:</p>
              </td>
              <td>
                <p>Balai Pengembangan Multimedia Pendidikan dan Kebudayaan</p>
              </td>
            </tr>
            <tr>
              <td>
                <p>Alamat</p>
              </td>
              <td>
                <p class="ml-3 mr-3">:</p>
              </td>
              <td>
                <p>Jl. Mr. Koessoebiyono Tjondro Wibowo, Gn. Pati,, Pakintelan, Kec. Gn. Pati, Kota Semarang, Jawa Tengah 50227</p>
              </td>
            </tr>
            <tr>
              <td>
                <p>Penyelia</p>
              </td>
              <td>
                <p class="ml-3 mr-3">:</p>
              </td>
              <td>
                <p>Bu wiwik, M.Kom</p>
              </td>
            </tr>
            <tr>
              <td>

                <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah-magang" style="border-radius:10px;">Isi</a>

              </td>
            </tr>
          </table>


        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-12">
      <!-- <a href="#" data-toggle="modal" data-target="#tambah-bimbingan" class="btn btn-rounded btn-primary mb-2 shadow mb-3">Tambah </a> -->

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">

          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title">Log Harian

            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">
                  <a class="dropdown-item" data-toggle="modal" data-target="#tambah-form" href="#" style="border-radius:5px;">Tambah Log Harian</a>
                  <a class="dropdown-item" href="<?= base_url('kki/exportJadwalExcel') ?>" style="border-radius:5px;">Export Excel</a>
                </div>
              </div>
            </div>
          </div>
          <!-- <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Tanggal</th>
                  <th>Kegiatan</th>
                  <th>Aksi</th>
                </tr> -->
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>

                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Tempat Magang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($internship as $in) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $in['username'] ?></td>
                    <td><?= $in['mhs_name'] ?></td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#internship<?= $in['id_internship'] ?>" class="badge badge-pill badge-success py-2 px-3">Detail</a>
                      <!-- <?php
                            if ($in == $industri) {
                              echo $industri['industry_name'];
                            } else {
                              echo $in['internship_industry_name'];
                            }


                            ?> -->

                    </td>


                    <td>
                      <a href="#" class="badge badge-pill badge-success py-2 px-3">Edit</a>
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
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Log Harian</p>
        </div>

        <form action="<?= base_url('kki/tambah_log') ?>" method="POST" class="pl-3 pr-3">
          <div class="form-group">
            <label for="akhir">Tanggal dan Waktu</label>
            <input class="form-control" type="date" name="date" id="akhir">
            <input class="form-control" type="hidden" name="year_id" value="<?= $mhs['year_id'] ?>" id="akhir">
            <input class="form-control" type="hidden" name="category_schedule" value="1" id="akhir">



          </div>
          <div class="form-group">
            <label for="akhir">Kegiatan</label>
            <textarea class="form-control" type="text" name="activity" rows="6" id="akhir" maxlength="100"></textarea>
          </div>



          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>


<div id="tambah-magang" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Isi Magang Kamu</p>
        </div>

        <form action="<?= base_url('kki/magang/tambah_magang') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="nama">Pilih Instansi</label>
            <select class="js-choose-instansi form-control" name="industries" id="industries" style="width:100%;font-size:18px">
              <option value="">--Pilih Instansi-</option>
              <?php foreach ($industri as $kel) : ?>
                <option value="<?= $kel['id_industries'] ?>"><?= $kel['industry_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="akhir">Instansi</label>
            <input class="form-control" type="text" name="internship_industry" id="akhir">
            <small class="text-danger">Isi Instansi Jika Tidak ada di dalam Pilihan</small>

          </div>
          <div class="form-group">
            <label for="akhir">Alamat</label>
            <textarea class="form-control" type="text" name="address" rows="6" id="address"></textarea>

          </div>
          <div class="form-group">
            <label for="akhir">Penyelia</label>
            <input class="form-control" type="text" name="supervisor" id="akhir">
            <input class="form-control" type="hidden" name="mhs_id" id="akhir" value="<?= $mhs['id_mhs'] ?>">
            <input class="form-control" type="hidden" name="year_id" id="akhir" value="<?= $mhs['year_id'] ?>">

          </div>



          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

<?php foreach ($internship as $h) : $h++; ?>
  <div id="internship<?= $h['id_internship'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Detail</p>
          </div>


          <form action="<?= base_url('kki/edit_submission') ?>" method="POST" class="pl-3 pr-3">
            <?php $sql = "SELECT DISTINCT `internship`.`internship_industry_name`, `internship`.`industries_id`, `industries`.`id_industries`, `industries`.`industry_name` , `industries_address`.`address` FROM `industries` JOIN `internship` ON `internship`.`industries_id` = `industries`.`id_industries`  JOIN `industries_address` ON `industries`.`id_industries` = `industries_address`.`industries_id`";
            $industries = $this->db->query($sql)->result_array(); ?>
            <?php foreach ($industries as $n) : ?>


              <table class="mt-3">
                <tr>
                  <td>
                    <p>Instansi</p>
                  </td>
                  <td>
                    <p class="ml-3 mr-3">:</p>
                  </td>
                  <td>
                    <p> <?php
                        if ($n['id_industries'] == $h['industries_id']) {
                          echo $n['industry_name'];
                        } else if ($n['id_industries'] != $h['industries_id']) {
                          echo $h['internship_industry_name'];
                        }
                        ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Alamat</p>
                  </td>
                  <td>
                    <p class="ml-3 mr-3">:</p>
                  </td>
                  <td>
                    <p> <?php
                        if ($n['id_industries'] == $h['internship_industry_name']) {
                          echo $n['address'];
                        } else {
                          echo $h['address'];
                        }
                        ?></p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Penyelia</p>
                  </td>
                  <td>
                    <p class="ml-3 mr-3">:</p>
                  </td>
                  <td>
                    <p><?= $h['supervisor'] ?></p>
                  </td>
                </tr>

              </table>

            <?php endforeach; ?>
            <!-- <?php echo $h['internship_industry_name'] ?> -->
            <div class="form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Ubah</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<script>
  $(document).ready(function() {
    $('#industries').change(function() {
      let id = $(this).val()
      // console.log(id)
      $.ajax({
        type: "POST",
        url: "<?= base_url('kki/magang/getAddress') ?>",
        data: {
          id: id
        },
        dataType: "json",
        success: function(response) {
          $('#address').html(response);
          // console.log(response)

        }

      })
    })

  })
</script>