<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="card card-radius">
    <div class="card-body">
      <div class="row text-center">
        <?php
        // var_dump($bimbingan_koreksi);
        if ($bimbingan_koreksi == null) : ?>
          <div class="col-md-6">
            <p>Tombol Koreksi Bimbingan</p>
            <a href="#" data-toggle="modal" data-target="#tambah-file" class="btn btn-primary" style="border-radius: 10px;">Upload</a>


          </div>
          <div class="col-md-6">
            <p>File Koreksi Bimbingan</p>
            <p></p>
          </div>
        <?php else : ?>
          <div class="col-md-6">
            <p>Unggah Fie Edit Bimbingan</p>
            <form action="<?= base_url('kki/laporan/edit_koreksi_satu') ?>" method="POST" enctype="multipart/form-data" style="display: flex; justify-content:space-between;">
              <div class="form-group" style="align-items:center; margin-bottom:auto; margin-top:auto">
                <input type="file" class="form-control" name="file">
                <input type="hidden" class="form-control" name="id_bimbingan_koreksi" value="<?= $bimbingan_koreksi['id_bimbingan_koreksi'] ?>">
                <input type="hidden" class="form-control" name="fileold" value="<?= $bimbingan_koreksi['file'] ?>">
                <input type="hidden" name="outgoing_file_id" id="" value="<?= $user['id_user'] ?>">
                <input type="hidden" name="incoming_file_id" id="" value="<?= $bab_detail['id_user'] ?>">
                <input type="hidden" name="pembimbing_id" id="" value="<?= $pembimbing['id_pembimbing'] ?>">
                <input type="hidden" name="kel" id="" value="<?= $bab_detail['group'] ?>">
                <input type="hidden" name="berkas" id="" value="<?= $bab_detail['file'] ?>">
                <input type="hidden" class="form-control" id="bab" name="bab_dosen_id" value="<?= $bab_detail['bab_dosen_id'] ?>" readonly>

                <input type="hidden" name="year_id" id="" value="<?= $dosen['year_id'] ?>">
              </div>
              <div class="btn py-2">
                <button class="btn btn-success" type="submit" style="border-radius: 10px; align-items:center">Edit</button>
              </div>

            </form>



          </div>
          <div class="col-md-6">
            <p>File Koreksi Bimbingan</p>
            <?php if ($bimbingan_koreksi['category_bimbingan_koreksi'] == 1) : ?>
              <a href="<?= base_url('assets/file/laporan/koreksi/' . $bimbingan_koreksi['file']) ?>" target="_blank"><?= $bimbingan_koreksi['file'] ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>


      </div>
    </div>
  </div>

  <?php if ($bab_detail === null) { ?>
    <p class="mx-auto justify-content-center">belum upload</p>
  <?php } else { ?>
    <?php if ($bab_detail['category_bimbingan'] == 1) : ?>
      <div class="row">
        <div class="col-md-6">
          <div class="card file-show">
            <div class="card-body file-show-box">

              <div id="adobe-dc-view"></div>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card chat">
            <div class="block">
              <div class="user-block">
                <div class="user-img">
                  <img src="<?= base_url('assets/vendor/images/users/agent.jpg') ?>" alt="" srcset="">
                </div>
                <div class="user-desc">
                  <ol id="user_st">
                    <li class="name"><?= $bab_detail['mhs_name'] ?></li>
                    <?php
                    if ($this->session->userdata('username')) {
                      $time = time();
                      $status = 'Offline';
                      $class = 'circle-offline';

                      if ($bab_detail['status'] > $time) {
                        $status = 'Online';
                        $class = "circle-online";
                      }
                    ?>
                      <li class=<?= $class ?>></li>
                      <li class="status"><?= $status ?></li>

                    <?php } ?>


                  </ol>
                </div>

              </div>
            </div>



            <div class="body-box">
              <div class="chat-box" id="chatting">





              </div>
            </div>
            <div class="typing-message">
              <form class="typing" id="type">
                <input type="hidden" name="outgoing_chat_id" id="outgoing_chat_id" value="<?php echo $user['id_user'] ?>">
                <input type="hidden" name="incoming_chat_id" id="incoming_chat_id" value="<?php echo $bab_detail['id_user'] ?>">
                <input type="hidden" name="bab_dosen_id" id="bab_dosen_id" value="<?php echo $bab_detail['bab_dosen_id'] ?>">
                <input type="hidden" name="bimbingan_id" id="bimbingan_id" value="<?php echo $bab_detail['id_bimbingan'] ?>">
                <input type="hidden" name="group" id="group" value="<?php echo $bab_detail['group'] ?>">
                <input type="hidden" name="file" value="<?php echo $bab_detail['file'] ?>">
                <textarea name="message" placeholder="Ketik Pesan" rows="2" class="input-message" id="input_message"></textarea>
                <button type="submit" class="btn btn-send" id="send"><i class="fas fa-paper-plane"></i></button>
              </form>

            </div>


          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php } ?>

</div>
<div id="tambah-file" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-body">
        <div class="text-center mt-2 mb-4">
          <p style="font-size: 24px;color:black;font-weight:500">Upload File</p>
        </div>

        <form action="<?= base_url('kki/laporan/tambah_koreksi_satu') ?>" method="POST" class="pl-3 pr-3" enctype="multipart/form-data">
          <div class="form-group">

            <div class="form-group">
              <label for="bab">Jenis File</label>
              <input type="text" class="form-control" id="bab" name="bab_dosen_id" value="<?= $bab_detail['name'] ?>" readonly>
              <input type="hidden" class="form-control" id="bab" name="bab_dosen_id" value="<?= $bab_detail['bab_dosen_id'] ?>" readonly>
            </div>

            <div class="form-group">
              <label for="bab">File</label>
              <input type="file" class="form-control" id="bab" name="file">
            </div>

            <input type="hidden" name="outgoing_file_id" id="" value="<?= $user['id_user'] ?>">
            <input type="hidden" name="incoming_file_id" id="" value="<?= $bab_detail['id_user'] ?>">
            <input type="hidden" name="pembimbing_id" id="" value="<?= $pembimbing['id_pembimbing'] ?>">
            <input type="hidden" name="kel" id="" value="<?= $bab_detail['group'] ?>">
            <input type="hidden" name="berkas" id="" value="<?= $bab_detail['file'] ?>">

            <input type="hidden" name="year_id" id="" value="<?= $dosen['year_id'] ?>">


            <div class="form-group text-center">
              <button class="btn btn-rounded btn-primary" type="submit">Simpan</button>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>

<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script type="text/javascript">
  document.addEventListener("adobe_dc_view_sdk.ready", function() {
    var adobeDCView = new AdobeDC.View({
      clientId: "89b471e6fc18483f977ce6fc688d66f3",
      divId: "adobe-dc-view"
    });
    adobeDCView.previewFile({
      content: {
        location: {
          url: "<?= base_url('assets/file/laporan/' . $bab_detail['file']) ?>"
        }
      },
      metaData: {
        fileName: "<?= $bab_detail['file'] ?>"
      }
    }, {});
  });
</script>
<script>
  $(document).ready(function() {
    message()

    function message() {
      let incoming_chat_id = '<?= $bab_detail['id_user'] ?>';
      let bab_dosen_id = '<?= $bab_detail['bab_dosen_id'] ?>';
      let bimbingan_id = '<?= $bab_detail['id_bimbingan'] ?>';
      let group = '<?= $bab_detail['group'] ?>';

      $.ajax({
        type: "get",
        url: "<?= base_url() ?>kki/api/chat_load",
        data: {
          outgoing_chat_id: '<?= $user['id_user'] ?>',
          incoming_chat_id: incoming_chat_id,
          bab_dosen_id: bab_dosen_id,
          bimbingan_id: bimbingan_id,
          group: group,
        },
        dataType: "json",
        success: function(e) {

          const chatContent = document.getElementById("chatting");

          const data = e.chat;
          chatContent.innerHTML = data.map(d => {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = dd + '-' + mm + '-' + yyyy;


            var times = new Date(d.time)
            var time = times.toLocaleTimeString([], {
              hour: '2-digit',
              minute: '2-digit'
            })
            var tanggal = String(times.getDate()).padStart(2, '0');


            var bulan = String(times.getMonth() + 1).padStart(2, '0');
            var tahun = times.getFullYear()
            var lengkapDB = tanggal + '-' + bulan + '-' + tahun
            var kapan = "Hari ini"
            var tanggal_bulan = tanggal + "-" + bulan + "-" + tahun
            if (lengkapDB != today) {
              kapan = tanggal_bulan
            }
            return `<div class="chat-${d.sender?'right': 'left'}">
                <div class="message">
                  <p id="right">${d.message}</p>
                </div>
                <div class="chat-time">
                  <p>${kapan}, ${time}</p>
                </div>
              </div>`

          }).join('')

        },


      })

    }
    setInterval(() => {
      message()

    }, 1000);

    $(".typing").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?= base_url('kki/laporan/input_chat_satu') ?>',
        type: 'post',
        data: $(this).serialize(),
        success: function(data) {
          document.getElementById("type").reset();
          scrollToBottom()

        }
      });
    });
    scrollToBottom()

    function scrollToBottom() {
      $("#chatting").animate({
        scrollTop: 200000000000000000000000000000000
      }, "slow");
    }

  })
</script>