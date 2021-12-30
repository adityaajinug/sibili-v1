<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">

      <!--  -->
      <div class="card">

        <div class="card-body">
          <!-- <h4 class="card-title">Tabel Menu</h4> -->
          </h6>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>File</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $no = 1;
                foreach ($laporan as $l) : ?>

                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $l['mhs_name'] ?></td>
                    <td><span class="badge badge-pill badge-primary pr-5 pl-5 pt-2 pb-2"> <?= $l['name'] ?></span></td>

                    <td>
                      <a href="http://" class="badge badge-pill badge-success pr-3 pl-3 pt-2 pb-2"> Detail </a>
                      <a href="http://" class="badge badge-pill badge-warning pr-3 pl-3 pt-2 pb-2"> Konfirmasi </a>
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
  <!-- order table -->