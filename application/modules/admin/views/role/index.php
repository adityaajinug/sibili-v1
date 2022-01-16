<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="accordion" id="accordionExample">

        <div class="card">

          <div class="card-body">

            <button class="btn btn-primary mb-2">Tambah </button>

            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered no-wrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($role as $u) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $u['role'] ?></td>

                      <td>
                        <a href="<?= base_url('admin/roleAkses/' . $u['id']) ?>" class="badge badge-pill badge-warning"> Menu</a>
                        <a href="<?= base_url('admin/akses_sub/' . $u['id']) ?>" class="badge badge-pill badge-secondary"> Sub Menu</a>
                        <a href="http://" class="badge badge-pill badge-success"> Edit</a>
                        <a href="http://" class="badge badge-pill badge-danger"> Hapus</a>
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