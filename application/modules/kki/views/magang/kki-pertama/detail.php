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
                <?php if ($internship == null) :  ?>
                  <p></p>
                <?php else : ?>
                  <p><?= $internship['internship_industry_name'] ?></p>
                <?php endif; ?>
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
                <?php if ($internship == null) :  ?>
                  <p></p>
                <?php else : ?>
                  <p><?= $internship['address'] ?></p>
                <?php endif; ?>
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
                <?php if ($internship == null) :  ?>
                  <p></p>
                <?php else : ?>
                  <p><?= $internship['supervisor'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <td>
                <?php if ($internship == null) :  ?>
                  <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#tambah-magang" style="border-radius:10px;">Isi</a>

                <?php endif; ?>
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

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>

                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Kegiatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($activity as $a) :
                  if ($a['year_id'] == $mhs['year_id']) :
                ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?php $date = tgl_indo($a['date_activity']);
                          echo $date; ?></td>
                      <td><?= $a['activity'] ?></td>


                      <td>
                        <!-- <a href="#" class="badge badge-pill badge-primary py-2 px-3"> Detail</a> -->
                        <a href="#" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
                        <a href="#" class="badge badge-pill badge-danger py-2 px-3"> Hapus</a>
                      </td>
                    </tr>
                <?php endif;
                endforeach; ?>
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

        <form action="<?= base_url('kki/magang/tambah_log') ?>" method="POST" class="pl-3 pr-3">
          <div class="form-group">
            <label for="akhir">Tanggal</label>
            <input class="form-control" type="date" name="date_activity" id="akhir">
            <input class="form-control" type="hidden" name="year_id" value="<?= $mhs['year_id'] ?>" id="akhir">
            <input class="form-control" type="hidden" name="mhs_id" value="<?= $mhs['id_mhs'] ?>" id="akhir">
            <input class="form-control" type="hidden" name="category_activity" value="1" id="akhir">



          </div>
          <div class="form-group">
            <label for="akhir">Kegiatan</label>
            <textarea class="form-control" type="text" name="activity" rows="6" id="akhir" maxlength="100"></textarea>
            <small class="text-danger">Max 100 kata</small>
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
            <label for="akhir">Instansi</label>
            <input class="form-control" type="text" name="internship_industry" id="akhir">

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
            <input class="form-control" type="hidden" name="status_internship" id="akhir" value="0">
            <input class="form-control" type="hidden" name="category_internship" id="akhir" value="1">

          </div>



          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>


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