<div class="container">
  <div class="row">
    <div class="col-md">
      <div class="box shadow-lg">
        <div class="logo">
          <img src="<?= base_url('assets/vendor/') ?>images/logo.png" alt="" srcset="">
        </div>
        <?= $this->session->flashdata('message'); ?>
        <form method="POST" action="<?= base_url('login') ?>">
          <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
            <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
            <small class="form-text text-muted  mt-2">
              <a href="">Lupa Password?</a>
            </small>
          </div>
          <input type="hidden" name="status">
          <div class="form-group mt-5">
            <button type="submit" class="btn btn-login">Login</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>