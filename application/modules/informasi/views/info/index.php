<style>
  .content a {
    color: #000;
  }

  .content a:hover {
    color: #A1A6B0;
  }
</style>

<div class="container-fluid">
  <div class="accordion" id="accordionExample">
    <div class="card" style="border-radius: 10px;">
      <div class="card-header" id="headingOne" style="background-color: #2940D3;">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <span style="color: #FFFF;font-weight:600; font-size:18px">KKI</span>
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">

          <?php
          foreach ($form as $f) : ?>

            <?php if ($f['year_id'] == $semester['year_id']) : ?>
              <?php if ($f['category_form'] == 4) : ?>
                <div class="ml-3 mt-3">
                  <div class="d-flex align-items-center content">
                    <i class="fas fa-clipboard" style=" font-size:20px;color:#FD2F39"></i>

                    <a href="<?= base_url('informasi/detail_submit/') . $f['slug']  ?>" style="margin-left: 20px;font-size:16px"><?= $f['title'] ?> <br>
                      <span style="font-size:14px;color:#FD2F39;"> Tersedia hingga :
                        <?php
                        $tgl =  $f['limit_end'];
                        echo format_indo($tgl); ?>
                      </span>
                    </a>
                  </div>

                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php

          foreach ($announce as $a) : ?>
            <?php if ($a['year_id'] == $semester['year_id']) : ?>
              <?php if ($a['category_announce'] == 1) : ?>
                <div class=" ml-3 mt-3 content">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-bullhorn" style=" font-size:20px;color:#10AD62"></i>
                    <a href="<?= base_url('informasi/detail_info/') . $a['slug']  ?>" style="margin-left: 13px;font-size:16px" class=""><?= $a['title'] ?> <br>
                      <span style="font-size:14px;  color: #7F8898;">
                        Tanggal : <?php $tgl =  $a['date_created'];
                                  echo format_indo($tgl); ?> WIB</span> </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
    <div class="card" style="border-radius: 10px;">
      <div class="card-header" style="background-color: #FECC00;">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
            <span style="color: #FFFF;font-weight:600; font-size:18px">Sertifikasi</span>
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
        <div class="card-body">


          <?php foreach ($form as $f) : ?>

            <?php if ($f['year_id'] == $semester['year_id']) : ?>
              <?php if ($f['category_form'] == 5) : ?>
                <div class="ml-3 mt-3">
                  <div class="d-flex align-items-center content">
                    <i class="fas fa-clipboard" style=" font-size:20px;color:#FD2F39"></i>
                    <a href="#" style="margin-left: 20px;font-size:16px"><?= $f['title'] ?> <br>
                      <span style="font-size:14px;color:#FD2F39;"> Tersedia hingga : <?php $tgl =  $f['limit_end'];
                                                                                      echo format_indo($tgl); ?></span>
                    </a>
                  </div>

                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php foreach ($announce as $a) : ?>
            <?php if ($a['year_id'] == $semester['year_id']) : ?>
              <?php if ($a['category_announce'] == 2) : ?>
                <div class=" ml-3 mt-3 content">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-bullhorn" style=" font-size:20px;color:#10AD62"></i>
                    <a href="#" style="margin-left: 13px;font-size:16px" class=""><?= $a['title'] ?> <br>
                      <span style="font-size:14px;color:#FD2F39;">
                        Tanggal : <?php $tgl =  $a['date_created'];
                                  echo format_indo($tgl); ?> WIB</span> </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>





        </div>
      </div>
    </div>
    <div class="card" style="border-radius: 10px;">
      <div class="card-header" style="background-color: #2BDC87;">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
            <span style="color: #FFFF;font-weight:600; font-size:18px">Proyek Akhir</span>
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
        <div class="card-body">

          <?php foreach ($form as $f) : ?>
            <?php if ($f['year_id'] == $semester['year_id']) : ?>
              <?php if ($f['category_form'] == 6) : ?>
                <div class="ml-3 mt-3">
                  <div class="d-flex align-items-center content">
                    <i class="fas fa-clipboard" style=" font-size:20px;color:#FD2F39"></i>
                    <a href="#" style="margin-left: 20px;font-size:16px"><?= $f['title'] ?> <br>
                      <span style="font-size:14px;color:#FD2F39;"> Tersedia hingga : <?php $tgl =  $f['limit_end'];
                                                                                      echo format_indo($tgl); ?> WIB</span>
                    </a>
                  </div>

                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php foreach ($announce as $a) : ?>
            <?php if ($a['year_id'] == $semester['year_id']) : ?>
              <?php if ($a['category_announce'] == 3) : ?>
                <div class=" ml-3 mt-3 content">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-bullhorn" style=" font-size:20px;color:#10AD62"></i>
                    <a href="#" style="margin-left: 13px;font-size:16px" class=""><?= $a['title'] ?> <br>
                      <span style="font-size:14px;color:#FD2F39;">
                        Tanggal : <?php $tgl =  $a['date_created'];
                                  echo format_indo($tgl); ?> WIB</span> </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>



        </div>
      </div>
    </div>


  </div>
</div>