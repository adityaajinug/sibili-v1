<div class="container-fluid">
  <div class="card card-radius">
    <div class="card-body">
      <div class="row text-center">
        <?php
        if ($bimbingan_koreksi == null) : ?>

          <div class="col-md">
            <p>Tidak ada koreksi berupa file dari Dosen Pembimbing</p>
            <p></p>
          </div>
        <?php else : ?>

          <div class="col-md">
            <p>File Koreksi Bimbingan</p>
            <a href="<?= base_url('assets/file/laporan/koreksi/' . $bimbingan_koreksi['file']) ?>" target="_blank"><?= $bimbingan_koreksi['file'] ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if ($bab_mhs === null) { ?>
    <p class="mx-auto justify-content-center">belum upload</p>
  <?php } else { ?>
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
                  <li class="name"><?= $user_chat['dosen_name'] ?></li>
                  <?php
                  if ($this->session->userdata('username')) {
                    $time = time();
                    $status = 'Offline';
                    $class = 'circle-offline';

                    if ($user_chat['status'] > $time) {
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
              <input type="hidden" name="incoming_chat_id" id="incoming_chat_id" value="<?php echo $user_chat['id_user'] ?>">
              <input type="hidden" name="bab_dosen_id" id="bab_id" value="<?php echo $bab_mhs['bab_dosen_id'] ?>">
              <input type="hidden" name="group" id="pembimbing_id" value="<?php echo $user_chat['group'] ?>">
              <input type="hidden" name="file" value="<?php echo $bab_mhs['file'] ?>">
              <textarea name="message" placeholder="Ketik Pesan" rows="2" class="input-message" id="input_message"></textarea>
              <button type="submit" class="btn btn-send" id="send"><i class="fas fa-paper-plane"></i></button>
            </form>

          </div>



        </div>
      </div>
    </div>
  <?php } ?>
</div>

<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
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
          url: "<?= base_url('assets/file/laporan/' . $bab_mhs['file']) ?>"
        }
      },
      metaData: {
        fileName: "<?= $bab_mhs['file'] ?>"
      }
    }, {});
  });
</script>


<script>
  $(document).ready(function() {
    message()

    function message() {
      let incoming_chat_id = '<?= $user_chat['id_user'] ?>';
      let bab_dosen_id = '<?= $bab_mhs['bab_dosen_id'] ?>';
      let group = '<?= $user_chat['group'] ?>';

      $.ajax({
        type: "get",
        url: "<?= base_url() ?>kki/api/chat_load",
        data: {
          outgoing_chat_id: '<?= $user['id_user'] ?>',
          incoming_chat_id: incoming_chat_id,
          bab_dosen_id: bab_dosen_id,
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
        url: '<?= base_url('kki/laporan/input_chat') ?>',
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