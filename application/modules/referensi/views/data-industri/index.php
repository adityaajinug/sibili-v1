<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <h4 class="card-title">Tabel Dosen Pembimbing</h4>

          <div class="table-responsive-sm">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="th-sm">No</th>
                  <th class="th-sm">Nama Industri</th>
                  <th class="th-sm">Alamat Indusri</th>
                  <th class="th-sm">Maps</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($industri as $i) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $i['industry_name']; ?></td>
                    <td><?= $i['address']; ?></td>
                    <td>
                      <a href="<?= $i['maps']; ?>" class="badge badge-pill badge-primary py-2 px-3">Link</a>
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