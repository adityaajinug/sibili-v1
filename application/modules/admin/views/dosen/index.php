<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">


    <div class="col-12">
      <a href="<?= base_url('admin/dosen/tambah_dosen') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">

        <div class="card-body">

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPP</th>
                  <th>Nama Dosen</th>
                  <th>Email</th>
                  <th>Role</th>
                  <!-- <th>Status Penguji</th> -->
                  <th>Aksi</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($dosen as $d) : ?>
                  <tr>
                    <td><?= $no++; ?></td>

                    <td><?= $d['username'] ?></td>
                    <td><?= $d['dosen_name'] ?></td>

                    <td><?= $d['email'] ?></td>
                    <td><span class="badge badge-pill badge-secondary py-2 px-3"><?= $d['role'] ?></span></td>
                    <!-- <td><?php if ($d['status_penguji'] == 1) : ?>
                        Tersertifikasi
                      <?php else : ?>
                        Belum Tersertifikasi
                      <?php endif; ?>
                    </td> -->

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