<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">

    <div class="col-md">
      <div class="card">

        <div class="card-body">
          <h4 class="card-title">Tabel Data Bab</h4>
          </h6>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
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
                      <a href="<?= base_url('kki/laporan/bab_detail/' . $l['bab_dosen_id'] . '/' . $l['group'] . '/' . $l['file']) ?>" class="badge badge-pill badge-success pr-3 pl-3 pt-2 pb-2"> Detail </a>

                      <?php if ($l['status_konfirmasi'] == 1) : ?>
                        <a href="#" class="badge badge-pill badge-warning font-weight-bold pr-3 pl-3 pt-2 pb-2""> Confirmed</a>
                      <?php else : ?>
                        <a href=" #" class="badge badge-pill badge-danger font-weight-normal pr-3 pl-3 pt-2 pb-2" data-toggle="modal" data-target="#confirm-file<?php echo $l['user_id']; ?>"> Konfirmasi </a>
                      <?php endif; ?>







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
</div>
<?php
$i = 0;
foreach ($laporan as $lap) : $i++; ?>
  <div id="confirm-file<?php echo $lap['user_id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan di Konfirmasi?</p>
            <p class="mt-1" style="font-size: 16px;color:black;font-weight:500">File akan terkonfirmasi</p>
          </div>

          <form action="<?= base_url('kki/laporan/konfirmasi') ?>" method="POST" class="pl-3 pr-3">

            <input type="hidden" name="user_id" value="<?= $lap['user_id'] ?>">
            <input type="hidden" name="mhs_name" value="<?= $lap['mhs_name'] ?>">
            <input type="hidden" name="status_konfirmasi" value="1">
            <input type="hidden" name="bab_dosen_id" value="<?= $lap['bab_dosen_id'] ?>">
            <input type="hidden" name="group" value="<?= $lap['group'] ?>">

            <div class="form-group text-center">
              <button class="btn btn-primary" type="submit" style="border-radius:5px;"">Konfirmasi</button>
              <button class=" btn btn-primary" data-dismiss="modal" style="background-color: #fecc00;border-color: #fecc00; border-radius:5px;">Close</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- 
<script src="<?= base_url('assets/vendor/extra-libs/sweetalert2/') ?>sweetalert2.min.js"></script>
<script>
  $('.button-confirm').on('click', function(e) {
    var link = $(this).attr('href');
    e.preventDefault();
    Swal.fire({
      title: 'Yakin ingin di konfirmasi?',
      text: "File akan Terkonfirmasi",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#2940d3',
      cancelButtonColor: '#fecc00',
      confirmButtonText: 'Ya, Konfirmasi!'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          // 'Confirmed!',
          // 'File telah di konfirmasi.',
          // 'success'
        )
        document.location.href = link;
      }
    })

  })
</script>
</script> -->