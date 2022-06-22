<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-12">
      <a href="<?= base_url('kki/koordinator') ?>" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Kembali</a>
      <div class="card" style="border-radius: 10px;">
        <div class="card-body">


          <div class="d-flex align-items-center">
            <h4 class="card-title">Tabel Dokumen Format

            </h4>


            </h4>
            <div class="ml-auto mt-2">
              <div class="dropdown sub-dropdown">
                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="border-radius:10px;">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#tambah-form" style=" border-radius:5px;">Tambah Dokumen</a>

                </div>
              </div>
            </div>
          </div>



          <div class="table-responsive">
            <table class="table no-wrap v-middle mb-0">
              <thead>
                <tr class="border-1">

                  <th class="border-1 font-16 font-weight-medium text-dark text-center">No
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Nama Format
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    File
                  </th>
                  <th class="border-1 font-16 font-weight-medium text-dark text-center">
                    Aksi
                  </th>


                </tr>
              </thead>
              <tbody>


                <!-- 
                <tr>
                  <td colspan=" 3" class="text-center border-top-0 text-muted px-2 py-4 font-24 fw-bold">Data Kosong</td>
                </tr> -->

                <?php $no = 1;
                foreach ($dokumen as $d) : ?>

                  <tr>

                    <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center"><?= $no++; ?></td>
                    <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                      <?= $d['format_name'] ?>
                    </td>
                    <td class="border-top-1 text-dark font-weight-normal px-2 py-4 font-16 text-center">
                      <?php if ($d['file'] != null) :
                        $info = pathinfo($d['file']);
                        if ($info["extension"] == "xlsx") : ?>

                          <a href="<?= base_url('assets/file/format/' . $d['file']) ?>" download class="badge badge badge-pill badge-success px-3 py-2"><i class="fas fa-file-excel" style="color: #ffff;"></i><span class="ml-2">Download</span></a>
                        <?php elseif ($info["extension"] == "docx") : ?>
                          <a href="<?= base_url('assets/file/format/' . $d['file']) ?>" download class="badge badge badge-pill badge-primary px-3 py-2"><i class="fas fa-file-word" style="color: #ffff;"></i><span class="ml-2">Download</span></a>
                        <?php elseif ($info["extension"] == "pdf") : ?>
                          <a href="<?= base_url('assets/file/format/' . $d['file']) ?>" download class="badge badge badge-pill badge-danger px-3 py-2"><i class="fas fa-file-pdf" style="color: #ffff;"></i><span class="ml-2">Download</span></a>
                        <?php endif; ?>
                      <?php else : ?>
                        <p>Tidak Unggah File</p>
                      <?php endif; ?>
                    </td>
                    <td class="border-top-1 font-16 text-center">
                      <a href="#" data-toggle="modal" data-target="#edit-form<?= $d['id_format'] ?>" class="badge badge-pill badge-warning px-3 py-2">Edit</a>
                      <a href="#" data-toggle="modal" data-target="#hapus-form<?= $d['id_format'] ?>" class="badge badge-pill badge-danger px-3 py-2">Hapus</a>
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
          <p style="font-size: 24px;color:black;font-weight:500">Tambah Submission</p>
        </div>

        <form action="<?= base_url('kki/tambah_dokumen') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">

          <div class="form-group">
            <label for="akhir">Nama Format</label>
            <input type="text" class="form-control" maxlength="50" name="format_name" placeholder="Contoh : Format Laporan">

          </div>
          <div class="form-group">
            <label for="akhir">File</label>
            <input class="form-control" type="file" name="file" id="akhir">
            <small class="text-danger">Extensi : <span class="text-danger">pdf dan docx. Max : 3 MB</span></small>
            <input class="form-control" type="hidden" name="category_form" value="1" id="akhir">
          </div>

          <div class="form-group text-center">
            <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
<?php foreach ($dokumen as $h) : $h++; ?>
  <div id="edit-form<?= $h['id_format'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <p style="font-size: 24px;color:black;font-weight:500">Edit Format</p>
          </div>

          <form action="<?= base_url('kki/edit_dokumen') ?>" method="POST" class="pl-3 pr-3">

            <div class="form-group">
              <label for="akhir">Nama Format</label>
              <input type="text" class="form-control" maxlength="50" name="format_name" value="<?= $h['format_name'] ?>">

            </div>
            <div class="form-group">
              <label for="akhir">File Saat ini</label>
              <input class="form-control" type="text" readonly name="fileold" id="akhir" value="<?= $h['file'] ?>">
            </div>
            <div class="form-group">
              <label for="akhir">Ubah File</label>
              <input class="form-control" type="file" name="file" id="akhir">
              <small class="text-danger">Extensi : <span class="text-danger">pdf dan docx. Max : 3 MB</span></small>
            </div>
            <input class="form-control" type="hidden" name="id_format" value="<?= $h['id_format'] ?>" id="akhir">

            <div class="form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Ubah</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($dokumen as $h) : $h++; ?>
  <div id="hapus-form<?= $h['id_format'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 10px;">
        <div class="modal-body">
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-question-circle" style="font-size: 120px;"></i>
            <p class="mt-3" style="font-size: 24px;color:black;font-weight:600">Yakin Akan Hapus Format?</p>
            <p class="text-center"><?= $h['format_name'] ?></p>
          </div>

          <form action="<?= base_url('kki/delete_dokumen') ?>" method="POST" class="pl-3 pr-3">


            <div class="form-group">
              <input class="form-control" type="hidden" readonly name="fileold" id="akhir" value="<?= $h['file'] ?>">
              <input class="form-control" type="hidden" name="id_format" value="<?= $h['id_format'] ?>" id="akhir">
            </div>

            <div class="form-group text-center">
              <button class="btn btn-danger px-5 py-1" type="submit" style="border-radius:10px;">Hapus</button>
              <button class=" btn btn-primary" data-dismiss="modal" style="border-radius:10px;">Close</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>