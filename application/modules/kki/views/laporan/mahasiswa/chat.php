<div class="container-fluid">
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
              <input type="hidden" name="bab_id" id="bab_id" value="<?php echo $user_chat['bab_id'] ?>">
              <input type="hidden" name="pembimbing_id" id="pembimbing_id" value="<?php echo $user_chat['group'] ?>">
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
<!-- <script src="<?= base_url() ?>/assets/dist/js/chat.js"></script> -->
<!-- <script>
  $(document).ready(function() {
    $.ajax({
      url: '<?= base_url('kki/laporan/getChat') ?>',
      success: function(html) {
        $("#chatting").html(html);
      }

    })
  })
</script> -->

<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script type="text/javascript">
  document.addEventListener("adobe_dc_view_sdk.ready", function() {
    var adobeDCView = new AdobeDC.View({
      clientId: "e9b9630a0936415881a08f207874da7b",
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