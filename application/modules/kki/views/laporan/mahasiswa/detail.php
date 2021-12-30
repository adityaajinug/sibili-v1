<div class="container-fluid">
  <a href="<?= base_url('kki/tambah_dosen_pembimbing') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

  <div class="row">

    <?php foreach ($bab as $b) : ?>
      <div class="col-md-4">
        <div class="card card-radius">
          <div class="card-body">
            <h3 class="card-title-text"><?= $b['name']; ?></h3>
            <p class="card-text-space"><?= $b['description']; ?></p>
            <a href="<?= base_url('kki/laporan/detail_bab/' . $b['id_bab']) ?>" class="btn btn-primary">Detail</a>
            <a href="javascript:void(0)" class="btn btn-success">Edit</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


  </div>

  <!-- End Row -->
  <!-- Row -->