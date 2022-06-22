<div class="container-fluid">
  <div class="row">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="col-12">
      <a href="<?= base_url('kki/info') ?>" class="btn btn-primary mb-4 shadow" style="border-radius: 10px;">Kembali</a>
      <div class="card shadow-lg" style="border-radius:10px;">
        <div class="card-body">
          <form action="<?= base_url('kki/tambah_info_db') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Judul</label>
              <input type="text" class="form-control" name="title" id="nama" placeholder="Masukkan Judul">
              <?= form_error('title') ?>

            </div>
            <div class=" form-group">
              <label for="nama">File</label>
              <input type="file" class="form-control" name="file">
              <small class="text-primary">Input File Jika diperlukan : <span class="text-danger">Pdf, Excel, Doc Max 5MB</span></small>

              <input type="hidden" name="year_id" value="<?= $dosen['year_id'] ?>">
              <input type="hidden" name="user_id" value="<?= $user['id_user'] ?>">



            </div>

            <div class="form-group">
              <label for="nama">Deskripsi</label>
              <textarea name="description" id="description"></textarea>
            </div>

            <div class="form-group">

              <button class="btn btn-primary" type="submit" style="border-radius: 10px;">Simpan</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/vendor/extra-libs/ckeditor/ckeditor.js') ?>"></script>
<script>
  CKEDITOR.replace('description');
</script>