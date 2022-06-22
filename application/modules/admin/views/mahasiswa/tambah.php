<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <form action="#" method="post">
            <div class="form-group">
              <label for="nama">NIM</label>
              <input type="text" class="form-control" name="username" id="nama" placeholder="Masukkan NIM">
              <?= form_error('npp') ?>
              <?php
              $npp = '0686.11.1995.070';

              ?>
            </div>
            <div class=" form-group">
              <label for="nama">Nama Mahasiswa</label>
              <input type="text" class="form-control" name="mhs_name" id="nama" placeholder="Masukkan Nama Dosen">
              <input type="hidden" class="form-control" name="image" value="default.jpg">
              <input type="hidden" class="form-control" name="status" value="0">
              <input type="hidden" class="form-control" name="role_id" value="2">


            </div>

            <div class="form-group">
              <label for="nama">Email</label>
              <input type="text" class="form-control" id="nama" name="email" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
              <label for="nama">Status Mahasiswa</label>
              <select class="js-choose-status form-control" name="status_mhs" style="width:100%;font-size:18px">
                <option value="">--Pilih Status--</option>
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
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