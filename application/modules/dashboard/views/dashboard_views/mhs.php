<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-total-file shadow-sm">
        <div class="card-body body-total-file d-flex align-items-center">
          <div class="text-total-file">
            <span class="sum">8</span>
            <p class="desc">FIle Proposal</p>
          </div>
          <div class="icon-total-file">
            <i class="fas fa-file"></i>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-total-file shadow-sm">
        <div class="card-body body-total-file d-flex align-items-center">
          <div class="text-total-file">
            <span class="sum">5</span>
            <p class="desc">File Laporan</p>
          </div>
          <div class="icon-total-file">
            <i class="fas fa-file-invoice"></i>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-total-file shadow-sm">
        <div class="card-body body-total-file d-flex align-items-center">
          <div class="text-total-file">
            <span class="sum">1</span>
            <p class="desc">File User Guide</p>
          </div>
          <div class="icon-total-file">
            <i class="fas fa-book"></i>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-total-file shadow-sm">
        <div class="card-body body-total-file d-flex align-items-center">
          <div class="text-total-file">
            <span class="sum">1</span>
            <p class="desc">File Proyek Akhir</p>
          </div>
          <div class="icon-total-file">
            <i class="fas fa-file-alt"></i>
          </div>

        </div>
      </div>
    </div>

  </div>
  <div class="card shadow-lg" style="border-radius:10px;">
    <div class="card-body">
      <h4 class="card-title">Pengumuman</h4>

      <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered no-wrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Pengumuman</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($announce as $i) :
              if ($i['year_id'] == $mhs['year_id']) :
            ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $i['title']; ?></td>
                  <td><?php $date = tgl_indo($i['date_created']);
                      echo $date; ?></td>



                  <td>

                    <a href="#" class="badge badge-pill badge-success py-2 px-3"> Detail</a>
                  </td>
                </tr>

            <?php
              endif;
            endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>