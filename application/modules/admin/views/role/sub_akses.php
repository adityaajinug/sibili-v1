<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <div class="accordion" id="accordionExample">

        <div class="card">


          <div class="card-body">
            <h5>Role : <?= $role['role'] ?></h5>
            <h4 class="card-title">Tabel Role Submenu</h4>
            </h6>
            <div class="table-responsive">
              <table class="table table-striped table-bordered no-wrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>SubMenu</th>
                    <!-- <th>Sub Menu</th> -->
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($submenu as $m) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $m['title'] ?></td>

                      <td>
                        <fieldset class="checkbox">
                          <label>
                            <input type="checkbox" class="cek_sub" <?= check_access_sub($role['id'], $m['id_sub']); ?> data-role="<?= $role['id'] ?>" data-submenu="<?= $m['id_sub'] ?>">
                          </label>
                        </fieldset>


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