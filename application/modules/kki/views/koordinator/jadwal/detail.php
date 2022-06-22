<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">

    <div class="col-12">
      <a href="<?= base_url('kki/jadwal') ?>" class="btn btn-primary mb-2 shadow mb-3" style="border-radius: 10px;">Kembali </a>
      <a href="#" data-toggle="modal" data-target="#tambah-form" class="btn btn-success mb-2 shadow mb-3 float-right" style="border-radius: 10px;">Tambah </a>

      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <div class="d-flex align-items-center mb-4">
            <h4 class="card-title"><?php $time = $scheduleId->schedule_start;
                                    echo tgl_indo($time); ?>
              <span class="badge badge-pill badge-warning px-3 py-2 ml-2"> <?php $time = $scheduleId->schedule_start;
                                                                            echo waktu_indo($time);  ?> - Selesai
              </span>
            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">

                  <a class="dropdown-item" href="<?= base_url('kki/exportJadwalExcelId/' . $scheduleId->id_schedule) ?>" style="border-radius:5px;">Export Excel</a>
                  <a class="dropdown-item" href="<?= base_url('kki/exportJadwalPDF/' . $scheduleId->id_schedule) ?>" style="border-radius:5px;">Export PDF</a>
                </div>
              </div>
            </div>

          </div>
          <div class="table-responsive">
            <table id="" class="table table-bordered no-wrap">
              <thead>
                <tr class="text-dark">
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Dosen Pembimbing</th>
                  <th>Ketua Penguji</th>
                  <th>Anggota Penguji</th>
                  <th>Room</th>
                  <th><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs shadow" style="border-radius: 10px;">Delete Multiple</button></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($mhs_exam as $m) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $m->username ?></td>
                    <td><?= $m->mhs_name ?></td>
                    <td><?= $m->dosen_name ?></td>
                    <td><?= $m->assesor_one ?></td>
                    <td><?= $m->assesor_two ?></td>
                    <td><?= $m->room_exam ?></td>
                    <td>
                      <input type="checkbox" class="delete_checkbox" value="<?= $m->id_exam ?>">
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
<div id="tambah-form" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Jadwal <br> <?php $time = $scheduleId->schedule_start;
                                                                                    echo tgl_indo($time); ?></p>
        </div>

        <form action="<?= base_url('kki/tambah_mhs_ujian') ?>" method="POST" class="pl-3 pr-3">
          <input type="hidden" value="<?= $scheduleId->id_schedule ?>" name="id_schedule">
          <div class="form-group">
            <label for="nama">Dosen Pembimbing</label>
            <select class="js-example-basic-single form-control" name="dosen_pembimbing" id="dosen_pembimbing" style="width:100%;font-size:18px">
              <option value="">--Pilih Dosen-</option>
              <?php foreach ($kelompok as $kel) : ?>
                <option value="<?= $kel['id_pembimbing'] ?>"><?= $kel['dosen_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Mahasiswa</label>
            <select class="form-control js-example-basic-multiple" name="mhs_id[]" multiple="multiple" id="bimbingan" style="width:100%;font-size:18px">
              <option value="">--Pilih Mahasiswa--</option>

            </select>
          </div>
          <div class="form-group">
            <label for="nama">Ketua Penguji</label>
            <select class="form-control js-penguji" name="assesor_one" style="width:100%;font-size:18px">
              <option value="">--Pilih Dosen-</option>
              <?php foreach ($allDosen as $d) : ?>
                <option value="<?= $d['dosen_name'] ?>"><?= $d['dosen_name'] ?></option>

              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Anggota Penguji</label>

            <select class="form-control js-penguji" name="assesor_two" style="width:100%;font-size:18px">
              <option value="">--Pilih Dosen-</option>
              <?php foreach ($allDosen as $d) : ?>
                <option value="<?= $d['dosen_name'] ?>"><?= $d['dosen_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Ruang</label>
            <select class="js-choose-status form-control" name="group_exam" style="width:100%;font-size:18px">
              <option value="">--Pilih Status--</option>
              <option value="1">Ruang 1</option>
              <option value="2">Ruang 2</option>
              <option value="3">Ruang 3</option>
              <option value="4">Ruang 4</option>
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
    background-color: #FF5470;
    color: #ffff;

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
          url: "<?php echo base_url(); ?>kki/delete_mhs_ujian",
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
<script>
  $(document).ready(function() {
    $('#dosen_pembimbing').change(function() {
      let id = $(this).val()
      // console.log(id)
      $.ajax({
        type: "POST",
        url: "<?= base_url('kki/getMhsBimbingan') ?>",
        data: {
          id: id
        },
        dataType: "json",
        success: function(response) {
          $('#bimbingan').html(response);

        }

      })
    })

  })
</script>
<script>
  $(document).ready(function() {
    $('.js-penguji').select2({
      placeholder: 'Pilih Penguji',
      width: 'resolve'
    });
  });
</script>