<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Tambah Menu
              </button>
            </h2>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <form class="mt-3" method="POST" action="<?= base_url('menu/tambah'); ?>">
                <label for="">Nama Menu</label>
                <div class="form-group">
                  <input type="text" class="form-control" id="nametext" name="menu" placeholder="Menu">
                  <?= form_error('menu') ?>
                  <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                </div>
              </form>

            </div>
          </div>
        </div>
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">Tabel Menu</h4>
            </h6>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered no-wrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($menu as $m) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $m['menu'] ?></td>
                      <td>
                        <a href="http://" class="badge badge-pill badge-success"> Edit</a>
                        <a href="http://" class="badge badge-pill badge-danger"> Edit</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- order table -->
  </div>