<div class="container-fluid">
  <div class="card card-radius">
    <div class="card-body">
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
        <input type="text" name="pembimbing_id" value="<?= $pembimbing['id_pembimbing'] ?>">
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