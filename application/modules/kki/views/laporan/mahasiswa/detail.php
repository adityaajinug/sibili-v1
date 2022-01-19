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
</style>

<div class="container-fluid">



  <?= $this->session->flashdata('pesan'); ?>
  <a href="#" data-toggle="modal" data-target="#tambah-file" class="btn btn-primary mb-2 shadow mb-3" style="border-radius: 10px;">Upload File</a>

  <input type="hidden" value="<?= $pembimbing['id_pembimbing'] ?>">
  <div class="row">

    <?php foreach ($bimbingan as $b) : ?>
      <div class="col-md-4">
        <div class="card card-radius">

          <div class="card-body">

            <div class="sds"></div>

            <?php if ($b['status_konfirmasi'] == 1) : ?>
              <div class="confirm"> <span>Confirmed</span></div>
            <?php else : ?>
              <div class="confirm d-none"></div>
            <?php endif; ?>

            <h3 class="card-title-text"><?= $b['name']; ?></h3>
            <p class="card-text-space"><?= $b['description']; ?></p>
            <a href="<?= base_url('kki/laporan/detail_bab/' . $b['bab_dosen_id'] . '/' . $b['group']) ?>" class="btn btn-primary" style="border-radius: 10px;">Detail</a>
            <a href="#" class="btn btn-success" style="border-radius: 10px;">Edit</a>




          </div>
        </div>
      </div>
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

        <form action="<?= base_url('kki/laporan/tambah_file_kki') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">

          <div class="form-group">
            <label for="bab">Jenis File</label>
            <select class="js-choose form-control" name="bab_id" style="width:100%;font-size:18px">
              <?php foreach ($allBabDosen as $j) : ?>
                <option value="<?= $j['bab_id'] ?>"><?= $j['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <input type="hidden" name="user_id" id="" value="<?= $user['id_user'] ?>">
          <input type="hidden" name="pembimbing_id" value="<?= $pembimbing['id_pembimbing'] ?>">
          <div class="form-group">
            <label for="filedfd">File</label>
            <input class="form-control" type="file" id="filedfd" name="file">

          </div>

          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>