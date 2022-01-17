<div class="container-fluid">
  <div class="row">
    <?php foreach ($all as $a) :
      // var_dump($a);
    ?>

      <div class="col-md-4">
        <div class="card card-file shadow-lg">
          <div class="card-body card-body-file">
            <div class="icon-file">
              <i class="fas fa-file-pdf"></i>
            </div>
            <div class="card-text text-file"><?= $a['username'] ?></div>
            <div class="action">
              <div class="description">
                <p class="text-size">File Size :</p>
                <p class="file-size"><?php $file =  FCPATH . './assets/file/laporan/' . $a['file'];
                                      echo fsize($file); ?></p>
              </div>
              <div class="download">
                <a href="<?= base_url('assets/file/laporan/' . $a['file']); ?>" class="btn btn-download" download> <i class="fas fa-download"></i></a>

              </div>
            </div>

          </div>
        </div>

      </div>
    <?php endforeach; ?>

  </div>
</div>