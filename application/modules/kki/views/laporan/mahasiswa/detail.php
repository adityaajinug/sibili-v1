<div class="container-fluid">
  <a href="#" data-toggle="modal" data-target="#tambah-file" class="btn btn-primary mb-2 shadow mb-3" style="border-radius: 10px;">Upload</a>
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">

    <?php foreach ($bab as $b) : ?>
      <div class="col-md-4">
        <div class="card card-radius">
          <div class="card-body">
            <h3 class="card-title-text"><?= $b['name']; ?></h3>
            <p class="card-text-space"><?= $b['description']; ?></p>
            <a href="<?= base_url('kki/laporan/detail_bab/' . $b['id_bab'] . '/' . $b['group'] . '/' . $b['file']) ?>" class="btn btn-primary" style="border-radius: 10px;">Detail</a>
            <a href="<?= base_url('kki/laporan/detail_bab/' . $b['id_bab']) ?>" class="btn btn-success" style="border-radius: 10px;">Edit</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <!-- . '/' . $b['file']) -->
  </div>

</div>

<div id="tambah-file" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Upload File</p>
        </div>

        <form action="<?= base_url('kki/laporan/tambah_file_kki1') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">

          <div class="form-group">
            <label for="bab">Jenis File</label>
            <select class="js-choose form-control" name="bab_id" style="width:100%;font-size:18px">
              <?php foreach ($allbab as $j) : ?>
                <option value="<?= $j['id_bab'] ?>"><?= $j['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <input type="hidden" name="user_id" id="" value="<?= $user['id_user'] ?>">
          <input type="hidden" name="pembimbing_id" id="" value="<?= $pembimbing['id_pembimbing'] ?>">
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