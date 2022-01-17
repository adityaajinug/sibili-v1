<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">


    <div class="col-12">
      <a href="#" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">

        <div class="card-body">

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
                      <a href="<?= base_url('admin/roleAkses/' . $u['id']) ?>" class="badge badge-pill badge-warning py-2 px-3"> Menu</a>
                      <a href="<?= base_url('admin/akses_sub/' . $u['id']) ?>" class="badge badge-pill badge-secondary py-2 px-3"> Sub Menu</a>
                      <a href="http://" class="badge badge-pill badge-success py-2 px-3"> Edit</a>
                      <a href="http://" class="badge badge-pill badge-danger py-2 px-3"> Hapus</a>
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