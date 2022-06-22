<div class="container-fluid">

  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kki/kelompok') ?>" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Kembali</a>
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title">Detail Kelompok <span class="text-primary"><?= $pembimbing['group'] ?></span>
            </h4>
            <div class="ml-auto mt-3">
              <a href="#" data-toggle="modal" data-target="#tambah-bimbingan" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Tambah</a>
              <!-- <a href="<?= base_url('kki/edit_kelompok/' . $pembimbing['group']) ?>" class="btn btn-success mb-4 shadow" style="border-radius: 10px;">Edit</a> -->
            </div>
          </div>
          <div class="card-text">
            <p class="font-weight-bold">Dosen Pembimbing : <?= $pembimbing['dosen_name'] ?></p>
          </div>


          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-0">
                  <th class="border-0 font-16 font-weight-medium text-muted">No
                  </th>
                  <th class="border-0 font-16 font-weight-medium text-muted">Mahasiswa
                  </th>
                  <th class="border-0 font-16 font-weight-medium text-muted px-2">NIM
                  </th>
                  <th class="border-0 font-16 font-weight-medium text-muted text-center">
                    Status
                  </th>
                  <th class="border-0 font-16 font-weight-medium text-muted text-center"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs shadow" style="border-radius: 10px;">Delete Multiple</button></th>

                </tr>
              </thead>
              <tbody>
                <?php
                if ($detail == null) { ?>

                  <tr>
                    <td colspan=" 3" class="text-center border-top-0 text-muted px-2 py-4 font-24 fw-bold">Data Kosong</td>
                  </tr>
                  <?php
                } else {
                  $no = 1;
                  foreach ($detail as $d) : ?>
                    <tr>
                      <td class="border-top-0 text-muted px-2 py-4 font-16"><?= $no++; ?></td>
                      <td class="border-top-0 px-2 py-4">
                        <div class="d-flex no-block align-items-center">
                          <div class="mr-3"><img src="<?= base_url('assets/vendor/') ?>images/profile.png" alt="user" class="rounded-circle" width="45" height="45" /></div>
                          <div class="">
                            <h5 class="text-dark mb-0 font-16 font-weight-medium"><?= $d['mhs_name'] ?></h5>
                            <span class="text-muted font-14"><?= $d['email']; ?></span>
                          </div>
                        </div>
                      </td>
                      <td class="border-top-0 text-muted px-2 py-4 font-16"><?= $d['username']; ?></td>
                      <td class="border-top-0 text-muted px-2 py-4 font-16 text-center">
                        <?php if ($d['status_mhs'] == 1) : echo "Aktif";
                        else : echo "Tidak Aktif"; ?> <?php endif; ?>
                      </td>
                      <td class="border-top-0 text-center">
                        <input type="checkbox" class="delete_checkbox" value="<?= $d['id_mhs_bimbingan'] ?>">
                      </td>

                    </tr>


                <?php endforeach;
                } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="tambah-bimbingan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Mahasiswa Bimbingan</p>
        </div>

        <form action="<?= base_url('kki/tambah_kelompok') ?>" method="POST" class="pl-3 pr-3">

          <div class="form-group">
            <label for="kelompok">Kelompok</label>
            <input class="form-control" type="text" name="group" id="kelompok" value="<?= $pembimbing['group']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="dosen">Dosen</label>
            <input class="form-control" type="text" name="dosen_name" id="kelompok" value="<?= $pembimbing['dosen_name']; ?>" readonly>
            <input class="form-control" type="hidden" name="pembimbing_id" id="kelompok" value="<?= $pembimbing['id_pembimbing']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="mahasiswa">Mahasiswa</label>
            <select class="js-example-basic-multiple js-stetes form-control" name="mhs_id[]" multiple="multiple" style="width:100%;font-size:18px">


              <?php
              $no = 1;

              foreach ($allMhs as $m) :
              ?>

                <option value="<?= $m['id_mhs'] ?>"><?= $no++; ?>. <?= $m['username'] ?> - <?= $m['mhs_name'] ?></option>
              <?php
              endforeach; ?>

            </select>
          </div>

          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

<style>
  .removeRow {
    background-color: #DFF0FF;
    color: #FFFFFF;
  }
</style>
<script>
  $(document).ready(function() {

    $('.delete_checkbox').click(function() {
      if ($(this).is(':checked')) {
        $(this).closest('tr').addClass('removeRow');
      } else {
        $(this).closest('tr').removeClass('removeRow');
      }
    });

    $('#delete_all').click(function() {
      var checkbox = $('.delete_checkbox:checked');
      if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
          checkbox_value.push($(this).val());
        });
        $.ajax({
          url: "<?php echo base_url(); ?>kki/delete_group_kelompok",
          method: "POST",
          data: {
            checkbox_value: checkbox_value
          },
          success: function() {
            $('.removeRow').fadeOut(900);
          }
        })
      } else {
        alert('Pilih Setidaknya 1 Record');
      }
    });

  });
</script>