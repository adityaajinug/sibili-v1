<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">


    <div class="col-12">
      <a href="<?= base_url('kaprodi/tahun_ajaran') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius:10px;">Kembali </a>

      <div class="card shadow-lg" style="border-radius:10px;">

        <div class="card-body">

          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tahun Ajaran</th>
                  <th>Semester Ganjil</th>
                  <th>Semester Genap</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($semester as $u) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u['year'] ?></td>

                    <td width="10%" align="center">
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input semester_check" name="semester_check<?= $u['id_semester']; ?>" id="check_semester<?= $u['id_semester']; ?>" <?= ($u['ganjil'] == 1) ? 'checked' : ''; ?> data-id=<?= $u['id_semester']; ?> data-semester=<?= $u['ganjil']; ?> data-year=<?= $u['id_year'] ?>>
                          <label class="custom-control-label" for="check_semester<?= $u['id_semester']; ?>"></label>
                        </div>
                      </div>

                    </td width="10%" align="center">
                    <td>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input read_check" name="check_read<?= $u['id_semester']; ?>" id="check_read<?= $u['id_semester']; ?>" <?= ($u['genap'] == 1) ? 'checked' : ''; ?> data-id=<?= $u['id_semester']; ?> data-read=<?= $u['genap']; ?> data-year=<?= $u['id_year'] ?>>
                          <label class="custom-control-label" for="check_read<?= $u['id_semester']; ?>"></label>
                        </div>
                      </div>

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

<script>
  $('.semester_check').on('click', function() {
    const id = $(this).data('id');
    const year = $(this).data('year');
    const check_semester = $(this).data('semester');

    $.ajax({
      url: "<?= base_url('kaprodi/check_semester'); ?>",
      type: "post",
      data: {
        id: id,
        check_semester: check_semester
      },
      success: function() {
        document.location.href = "<?= base_url('kaprodi/detail_th/'); ?>" + year
      }
    });
  });
</script>
<script>
  $('.read_check').on('click', function() {
    const id = $(this).data('id');
    const year = $(this).data('year');
    const check_read = $(this).data('read');

    $.ajax({
      url: "<?= base_url('kaprodi/check_read'); ?>",
      type: "post",
      data: {
        id: id,
        check_read: check_read
      },
      success: function() {
        document.location.href = "<?= base_url('kaprodi/detail_th/'); ?>" + year;
      }
    });
  });
</script>