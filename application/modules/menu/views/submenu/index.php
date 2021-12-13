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
              <form class="mt-3" method="POST" action="<?= base_url('menu/tambah_submenu'); ?>">

                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" class="form-control" id="nametext" name="title" placeholder="Title">
                  <?= form_error('title'); ?>
                </div>
                <div class="form-group">
                  <label for="">Menu</label>
                  <select class="form-control" id="menu_id" name="menu_id">
                    <option value="">Select Menu</option>
                    <?php foreach ($menu as $m) : ?>
                      <option value="<?= $m['id']; ?>"><?= $m['menu'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('menu_id'); ?>
                </div>
                <div class=" form-group">
                  <label for="">Url</label>
                  <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                  <?= form_error('url'); ?>
                </div>
                <div class="form-group">
                  <label for="">Icon</label>
                  <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
                  <?= form_error('icon'); ?>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="is_active" checked>
                  <label class="form-check-label" for="defaultCheck1">
                    Active
                  </label>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Simpan</button>
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
                    <th>Title</th>
                    <th>Menu</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Active</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($submenu as $sub) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $sub['title'] ?></td>
                      <td><?= $sub['menu'] ?></td>
                      <td><?= $sub['url'] ?></td>
                      <td><i class="<?= $sub['icon'] ?>"></i>
                      </td>
                      <td>

                        <?php if ($sub['is_active'] == 1) {
                          echo '<span class="badge badge-info">Active</span>';
                        } ?>

                      </td>
                      <td>
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