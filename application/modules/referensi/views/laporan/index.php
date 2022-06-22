<div class="container-fluid">
  <div class="row">
    <?php foreach ($th as $lap) :

    ?>
      <div class="col-md-3">
        <a href="<?php echo base_url('referensi/detail_laporan/' . $lap['id_year']) ?>">
          <div class="card card-folder mt-4">
            <div class="card-body card-body-folder">
              <i class="fas fa-folder"></i>
              <div class="card-text file-text"><?= $lap['year'] ?></div>
            </div>
          </div>
        </a>

      </div>
    <?php endforeach; ?>
  </div>
</div>