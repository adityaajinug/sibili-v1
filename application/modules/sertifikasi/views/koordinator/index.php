<div class="container-fluid">
  <div class="row">

    <div class="col-md-6">
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Kelola Pembimbing <br>Sertifikasi</br></h5>
            <div class="btn-data">
              <a href="<?= base_url('sertifikasi/kelompok') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-clone"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Ujian <br>Sertifikasi</br></h5>
            <div class="btn-data">
              <a href="<?= base_url('sertifikasi/ujian') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-user-friends"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Form Submit <br>User Guide</br></h5>
            <div class="btn-data">
              <a href="<?= base_url('sertifikasi/form_submit') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-plus-square"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-data shadow-sm">
        <div class="card-body body-data">
          <div class="data-desc">
            <h5>Kelola File <br>User Guide</br></h5>
            <div class="btn-data">
              <a href="<?= base_url('sertifikasi/show_file') ?>" class="btn btn-blue">Detail</a>
            </div>
          </div>
          <div class="icon-data">
            <i class="fas fa-book"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
$time = '22:30:00';
echo $time;

?>