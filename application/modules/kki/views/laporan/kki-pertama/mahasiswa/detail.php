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

  <?php if ($semester['genap'] != 1) : ?>
    <a href="#" data-toggle="modal" data-target="#tambah-file" class="btn btn-primary mb-2 shadow mb-3" style="border-radius: 10px;">Upload File</a>
  <?php endif; ?>
  <div class="row">

    <?php foreach ($bimbingan as $b) : ?>
      <?php if ($b['category_bimbingan'] == 1) : ?>
        <div class="col-md-4">
          <div class="card card-radius">

            <div class="card-body">

              <div class="sds"></div>

              <?php if ($b['status_konfirmasi'] == 1) : ?>
                <div class="confirm"> <span>Confirmed</span></div>
              <?php elseif ($b['status_konfirmasi'] == 0) : ?>
                <div class="pending"> <span>Pending</span></div>
              <?php endif; ?>

              <h3 class="card-title-text"><?= $b['name']; ?></h3>
              <p class="card-text-space"><?= $b['description']; ?></p>
              <a href="<?= base_url('kki/laporan/bab/' . $b['bab_dosen_id'] . '/' . $b['group']) ?>" class="btn btn-primary" style="border-radius: 10px;">Detail</a>
              <a href="#" data-toggle="modal" data-target="#edit-file<?= $b['bab_dosen_id'] ?>" class="btn btn-success" style="border-radius: 10px;">Edit</a>

            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

<div id="tambah-file" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Upload File</p>
        </div>

        <form action="<?= base_url('kki/laporan/tambah_file_satu') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">

          <div class="form-group">
            <label for="bab">Jenis File</label>

            <select class="js-choose form-control" name="bab_id" style="width:100%;font-size:18px">

              <?php foreach ($allBabDosen as $j) : ?>
                <option value="<?= $j['bab_id'] ?>"><?= $j['name'] ?> - <?= $j['bab_id'] ?></option>

              <?php endforeach; ?>
            </select>
          </div>
          <input type="hidden" name="user_id" id="" value="<?= $user['id_user'] ?>">
          <input type="hidden" name="year_id" id="" value="<?= $mhs['year_id'] ?>">
          <input type="hidden" name="pembimbing_id" value="<?= $pembimbing['id_pembimbing'] ?>">


          <div class="form-group">
            <label for="filedfd">File</label>
            <input class="form-control" type="file" id="filedfd" name="file">
            <small class="text-danger">Ekstensi : PDF, max 5MB</small>

          </div>

          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

<?php foreach ($bimbingan as $bim) : $bim++; ?>
  <div id="edit-file<?= $bim['bab_dosen_id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Edit File</p>
          </div>

          <form action="<?= base_url('kki/laporan/edit_lap_satu') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">

            <div class="form-group">
              <label for="exampleFormControlInput1">Jenis File</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $bim['name'] ?>" readonly>
            </div>
            <input type="hidden" name="bab_dosen_id" value="<?= $bim['bab_dosen_id'] ?>">
            <input type="hidden" name="id_bimbingan" value="<?= $bim['id_bimbingan'] ?>">
            <input type="hidden" name="user_id" id="" value="<?= $user['id_user'] ?>">
            <input type="hidden" name="pembimbing_id" value="<?= $pembimbing['id_pembimbing'] ?>">
            <input type="hidden" name="year_id" id="" value="<?= $mhs['year_id'] ?>">
            <input type="hidden" name="status_konfirmasi" value="<?= $bim['status_konfirmasi'] ?>">
            <div class="form-group">
              <label for="filedfd">File Saat ini</label>
              <input class="form-control" type="text" id="filedfd" name="fileold" value="<?= $bim['file'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="filedfd">Unggah File</label>
              <input class="form-control" type="file" id="filedfd" name="file">
              <small class="text-danger">Ekstensi : PDF, max 5MB</small>
            </div>

            <div class=" form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Edit File</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>