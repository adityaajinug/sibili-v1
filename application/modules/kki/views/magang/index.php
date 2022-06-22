<div class="container-fluid">
  <div class="row">
    <?php
    if ($semester['ganjil'] == 1) {

    ?>
      <div class="col-md-6">
        <div class="card card-data shadow-sm">
          <div class="card-body body-data">
            <div class="data-desc">
              <h5>Magang Kuliah Kerja<br>Industri I</br></h5>
              <div class="btn-data">
                <a href="<?= base_url('kki/magang/kki_pertama') ?>" class="btn btn-blue">Detail</a>
              </div>
            </div>
            <div class="icon-data">
              <i class="fas fa-building"></i>
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
              <h5>Magang Kuliah Kerja<br>Industri II</br></h5>
              <div class="btn-data">
                <a href="<?= base_url('kki/magang/kki_kedua') ?>" class="btn btn-blue">Detail</a>
              </div>
            </div>
            <div class="icon-data">
              <i class="fas fa-city"></i>
            </div>
          </div>
        </div>
      </div>
    <?php }
    ?>

  </div>


</div>