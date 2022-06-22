<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">


    <div class="col-12">
      <a href="<?= base_url('admin/mahasiswa/tambah_mhs') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>
      <form action="<?= base_url('admin/mahasiswa/update_all_year') ?>" method="post">
        <div class="form-group">
          <select name="year_id" id="" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>

        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah Year</button>
        </div>
      </form>
      <div class="card shadow-lg" style="border-radius:10px;">

        <div class="card-body">

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($mhs as $d) : ?>
                  <tr>
                    <td><?= $no++; ?></td>

                    <td><?= $d['username'] ?></td>
                    <td><?= $d['mhs_name'] ?></td>

                    <td><?= $d['email'] ?></td>
                    <td><?= $d['status_mhs'] ?></td>


                    <td>
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