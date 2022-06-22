<div class="container-fluid">

  <div class="row">
    <?php
    if ($semester['ganjil'] == 1) {

    ?>
      <div class="col-md-6">
        <div class="card card-data shadow-sm">
          <div class="card-body body-data">
            <div class="data-desc">
              <h5>Laporan<br><span class="badge mt-2" style="color:#FECC00;padding:0;font-weight:600;font-size:24px">KKI I</span></br></h5>
              <div class="btn-data">
                <a href="<?= base_url('kki/laporan/kki-satu') ?>" class="btn btn-blue">Detail</a>
              </div>
            </div>
            <div class="icon-data">
              <i class="fas fa-file"></i>
            </div>
          </div>
        </div>
      </div>
    <?php }
    if ($semester['genap'] == 1) {
    ?>
      <div class="col-md-6">
        <div class="card card-data shadow-sm">
          <div class="card-body body-data">
            <div class="data-desc">
              <h5>Laporan<br><span class="badge mt-2" style="color:#FECC00;padding:0;font-weight:600;font-size:24px">KKI II</span></br></h5>
              <div class="btn-data">
                <a href="<?= base_url('kki/laporan/kki-dua') ?>" class="btn btn-blue">Detail</a>
              </div>
            </div>
            <div class="icon-data">
              <i class="fas fa-copy"></i>
            </div>
          </div>
        </div>
      </div>
    <?php }
    ?>

  </div>


</div>