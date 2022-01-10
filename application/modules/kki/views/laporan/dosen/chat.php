<div class="container-fluid">
  <?php if ($bab_detail === null) { ?>
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
            <div class="chat-box">
              <div class="chat-left">
                <div class="message">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, suscipit at?</p>
                </div>
                <div class="chat-time">
                  <p>10.30 am</p>
                </div>
              </div>
              <div class="chat-right">
                <div class="message">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, suscipit at?</p>
                </div>
                <div class="chat-time">
                  <p>10.30 am</p>
                </div>
              </div>
              <div class="chat-left">
                <div class="message">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, suscipit at?</p>
                </div>
                <div class="chat-time">
                  <p>10.30 am</p>
                </div>
              </div>
              <div class="chat-right">
                <div class="message">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, suscipit at?</p>
                </div>
                <div class="chat-time">
                  <p>10.30 am</p>
                </div>
              </div>
              <div class="chat-left">
                <div class="message">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, suscipit at?</p>
                </div>
                <div class="chat-time">
                  <p>10.30 am</p>
                </div>
              </div>
              <div class="chat-right">
                <div class="message">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, suscipit at?</p>
                </div>
                <div class="chat-time">
                  <p>10.30 am</p>
                </div>
              </div>

            </div>
          </div>
          <div class="typing-message">
            <form class="typing">
              <input type="text" name="" value="<?php echo $this->session->userdata('username') ?>">
              <input type="text" name="" value="<?php echo $user['id_user'] ?>">
              <textarea placeholder="Ketik Pesan" rows="2" class="input-message"></textarea>
              <button class="btn btn-send"><i class="fas fa-paper-plane"></i></button>
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
          url: "<?= base_url('assets/file/laporan/' . $bab_detail['file']) ?>"
        }
      },
      metaData: {
        fileName: "<?= $bab_detail['file'] ?>"
      }
    }, {});
  });
</script>