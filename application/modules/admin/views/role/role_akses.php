<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="accordion" id="accordionExample">

        <div class="card">


          <div class="card-body">
            <h5>Role : <?= $role['role'] ?></h5>
            <h4 class="card-title">Tabel User</h4>
            </h6>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered no-wrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <!-- <th>Sub Menu</th> -->
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
                      <!-- <td><?= $m['title'] ?></td> -->

                      <td>
                        <fieldset class="checkbox">
                          <label>
                            <input type="checkbox" class="cek" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                          </label>
                        </fieldset>

                        <!-- <a href="<?= base_url('admin/akses_sub/' . $m['id']) ?>" class="badge badge-pill badge-success"> Akses</a> -->
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