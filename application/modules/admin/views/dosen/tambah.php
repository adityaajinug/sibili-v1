<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <label for="nama">NPP</label>
              <input type="text" class="form-control" name="username" id="nama" placeholder="Masukkan NPP">
              <?= form_error('npp') ?>
              <?php
              $npp = '0686.11.1995.070';

              ?>
            </div>
            <div class=" form-group">
              <label for="nama">Nama Dosen</label>
              <input type="text" class="form-control" name="dosen_name" id="nama" placeholder="Masukkan Nama Dosen">
              <input type="hidden" class="form-control" name="image" value="default.jpg">
              <input type="hidden" class="form-control" name="status" value="0">

            </div>

            <div class="form-group">
              <label for="nama">Email</label>
              <input type="text" class="form-control" id="nama" name="email" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
              <label for="nama">Role</label>
              <select class="js-choose-role form-control" name="role_id" style="width:100%;font-size:18px">
                <option value="">--Pilih Role--</option>
                <?php foreach ($role as $r) : ?>

                  <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                <?php endforeach; ?>

              </select>
            </div>
            <div class="form-group">
              <label for="nama">Status Penguji</label>
              <select class="js-choose-status form-control" name="status_penguji" style="width:100%;font-size:18px">
                <option value="">--Pilih Status--</option>
                <option value="1">Tersertifikasi</option>
                <option value="0">Belum Tersertifikasi</option>
              </select>
            </div>
            <div class="form-group">

              <button class="btn btn-primary" type="submit" style="border-radius: 10px;">Simpan</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php
$npp = '0686.11.1993.041';

// var_dump($pass)
?>