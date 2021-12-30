<div class="container-fluid">
  <?php if ($detailbab === null) { ?>
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