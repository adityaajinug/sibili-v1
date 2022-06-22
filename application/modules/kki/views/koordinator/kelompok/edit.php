<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h3 style="font-weight: 600;">Edit Kelompok <?= $pembimbing['group'] ?> </h3>
          <hr>
          <form action="<?= base_url('kki/update_kelompok') ?>" method="post">

            <div class=" form-group">
              <label for="nama">Kelompok</label>
              <input type="text" class="form-control" name="group" id="nama" value="<?= $pembimbing['group'] ?>" readonly>



            </div>

            <div class="form-group">
              <label for="nama">Dosen Pembimbing</label>
              <input type="text" class="form-control" id="nama" name="dosen_id" value="<?= $pembimbing['dosen_name'] ?>" readonly>
              <input class="form-control" type="hidden" name="pembimbing_id" id="kelompok" value="<?= $pembimbing['id_pembimbing']; ?>" readonly>
            </div>
            <div class=" form-group">

              <?php
              $dibimbing = [];
              foreach ($mhs_bimbingan as $mhs) {
                $dibimbing[] = $mhs['mhs_id'];
              } ?>
              <input type="hidden" class="form-control" name="id_mhs_bimbingan" id="nama" value="<?= $mhs['id_mhs_bimbingan'] ?>" readonly>
              <label for="mahasiswa">Mahasiswa</label>
              <select class="js-example-basic-multiple js-stetes form-control" name="mhs[]" multiple="multiple" style="width:100%;font-size:18px">
                <?php
                $no = 1;
                foreach ($allMhs as $m) :
                ?>
                  <option value="<?= $m['id_mhs'] ?>" <?= in_array($m['id_mhs'], $dibimbing) ? 'selected' : '' ?>>

                    <?= $no++; ?>. <?= $m['username'] ?> - <?= $m['mhs_name'] ?></option>
                <?php
                endforeach;
                ?>
              </select>
            </div>
            <div class="form-group">

              <button class="btn btn-primary" type="submit" style="border-radius: 10px;">Ubah</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>