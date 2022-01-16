<div class="container-fluid">

  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kki/kelompok') ?>" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Kembali</a>
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title">Detail Kelompok <span class="text-primary"><?= $kelompok['group'] ?></span>
            </h4>
          </div>
          <div class="card-text">
            <p class="font-weight-bold">Dosen Pembimbing : <?= $kelompok['dosen_name'] ?></p>
          </div>

          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-0">
                  <th class="border-0 font-16 font-weight-medium text-muted">Mahasiswa
                  </th>
                  <th class="border-0 font-16 font-weight-medium text-muted px-2">NIM
                  </th>
                  <th class="border-0 font-16 font-weight-medium text-muted">
                    Status
                  </th>

                </tr>
              </thead>
              <tbody>
                <?php
                if ($detail === 0) { ?>

                  <tr>
                    <td colspan="3" class="border-top-0 text-muted px-2 py-4 font-16">Data Kosong</td>
                  </tr>
                  <?php
                } else {
                  foreach ($detail as $d) : ?>
                    <tr>
                      <td class="border-top-0 px-2 py-4">
                        <div class="d-flex no-block align-items-center">
                          <div class="mr-3"><img src="<?= base_url('assets/vendor/') ?>images/profile.png" alt="user" class="rounded-circle" width="45" height="45" /></div>
                          <div class="">
                            <h5 class="text-dark mb-0 font-16 font-weight-medium"><?= $d['mhs_name'] ?></h5>
                            <span class="text-muted font-14"><?= $d['email']; ?></span>
                          </div>
                        </div>
                      </td>
                      <td class="border-top-0 text-muted px-2 py-4 font-16"><?= $d['username']; ?></td>
                      <td class="border-top-0 text-muted px-2 py-4 font-16"><?= $d['status']; ?></td>

                    </tr>


                <?php endforeach;
                } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>