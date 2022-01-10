<div class="container-fluid">

  <div class="row">
    <?php foreach ($param as $p) : ?>
      <div class="col-md-4">
        <div class="card card-radius">
          <div class="card-body">
            <h3 class="card-title-text"><?= $p['name'] ?></h3>
            <p class="card-text-space"><?= $p['description'] ?></p>
            <a href="<?= base_url('kki/laporan/detail_bab/' . $p['id_bab'] . '/' . $p['group']) ?>" class="btn btn-primary" style="border-radius: 10px;">Detail</a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>



  </div>

</div>
<!-- End Row -->
<!-- Row -->