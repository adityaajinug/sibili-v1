<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/vendor') ?>/images/logo-sibili.png">
  <title>Sibili</title>
  <!-- Custom CSS -->
  <link href="<?= base_url('assets/vendor') ?>/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor') ?>/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor') ?>/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/vendor') ?>/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="<?= base_url('assets/dist') ?>/css/style.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/dist') ?>/css/card.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
      <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-brand">
            <!-- Logo icon -->
            <a href="index.html">
              <b class="logo-icon">
                <!-- Dark Logo icon -->
                <img src="<?= base_url('assets/vendor/') ?>/images/Group 91 (1).png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="<?= base_url('assets/vendor/') ?>/images/logo-icon.png" alt="homepage" class="light-logo" />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text" style="margin-left: 10px;">
                <!-- dark Logo text -->
                <img src="<?= base_url('assets/vendor/') ?>/images/Sibili (4).png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="<?= base_url('assets/vendor/') ?>/images/logo-light-text.png" class="light-logo" alt="homepage" />
              </span>
            </a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

            <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings" class="svg-icon"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- Notification -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><i data-feather="bell" class="svg-icon"></i></span>
                <span class="badge badge-primary notify-no rounded-circle">5</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                <ul class="list-style-none">
                  <li>
                    <div class="message-center notifications position-relative">
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay" class="text-white"></i></div>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                          <span class="font-12 text-nowrap d-block text-muted">Just see
                            the my new
                            admin!</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-success text-white rounded-circle btn-circle"><i data-feather="calendar" class="text-white"></i></span>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Event today</h6>
                          <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                            a reminder that you have event</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-info rounded-circle btn-circle"><i data-feather="settings" class="text-white"></i></span>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Settings</h6>
                          <span class="font-12 text-nowrap d-block text-muted text-truncate">You
                            can customize this template
                            as you want</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box" class="text-white"></i></span>
                        <div class="w-75 d-inline-block v-middle pl-2">
                          <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span class="font-12 text-nowrap d-block text-muted">Just
                            see the my admin!</span>
                          <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                        </div>
                      </a>
                    </div>
                  </li>

                </ul>
              </div>
            </li>

            <!-- End Notification -->
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($user['role_id'] == 1) { ?>
                  <span class="ml-2 d-none d-lg-inline-block"><span><?= $user['username']; ?></span> - <span class="text-dark">Sibili Administrator</span>
                  <?php } else if ($user['role_id'] == 2) { ?>
                    <span class="ml-2 d-none d-lg-inline-block"><span><?= $user['username']; ?> - </span> <span class="text-dark"><?= $mhs['mhs_name'] ?></span>
                    <?php } else if ($user['role_id'] == 3) { ?>
                      <span class="ml-2 d-none d-lg-inline-block"><span><?= $user['username']; ?> - </span> <span class="text-dark"><?= $dosen['dosen_name'] ?></span>
                      <?php } ?>

                      </span>
                      <img src="<?= base_url('assets/vendor/') ?>/images/profile.png" alt="user" class="rounded-circle" width="40">
                      <i data-feather="chevron-down" class="svg-icon"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                  My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                  Account Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                  Logout</a>
                <div class="dropdown-divider"></div>
                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                    Profile</a></div>
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard') ?>" aria-expanded="false"><i class="fas fa-tachometer-alt awesome-icon"></i><span class="hide-menu">Dashboard</span></a></li>
            <li class="list-divider"></li>

            <?php
            $role_id = $this->session->userdata('role_id');
            $ambilMenu = "SELECT `user_menu`.`id`,`menu`
                          FROM `user_menu` JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`role_id` = $role_id
                          ORDER BY `user_access_menu`.`menu_id` ASC


            ";
            $menu = $this->db->query($ambilMenu)->result_array();


            ?>
            <?php foreach ($menu as $m) : ?>
              <li class="nav-small-cap"><span class="hide-menu"><?= $m['menu']; ?></span></li>

              <?php
              $role_id = $this->session->userdata('role_id');
              $menuId = $m['id'];
              $ambilsubmenu = "SELECT *
                          FROM `user_sub_menu` JOIN `user_access_sub_menu` 
                          ON `user_sub_menu`.`id_sub` = `user_access_sub_menu`.`submenu_id`  JOIN `user_menu`
                           ON `user_sub_menu`.`menu_id` = `user_menu`.`id`  
                          WHERE `user_sub_menu`.`menu_id` = $menuId AND `user_access_sub_menu`.`role_id` = $role_id
                          AND `user_sub_menu`. `is_active` = 1 
                           
                           ";
              $submenu = $this->db->query($ambilsubmenu)->result_array();
              ?>
              <?php foreach ($submenu as $sub) : ?>
                <li class="sidebar-item">
                  <a class="sidebar-link sidebar-link" href="<?= base_url($sub['url']); ?>" aria-expanded="false"><i class="<?= $sub['icon']; ?> awesome-icon">
                    </i><span class="hide-menu"><?= $sub['title']; ?>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>
              <li class="list-divider"></li>

            <?php endforeach; ?>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Pagi Aditya</h3>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-5 align-self-center">
            <div class="customize-input float-right">
              <div class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                <option>2 Okt 21</option>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <?= $contents; ?>
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->

      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <footer class="footer text-center text-muted d-flex justify-content-center">
      All Rights Reserved by Sibili. Designed and Developed by <a href="https://www.instagram.com/adityaajinug/">adityaajinug</a>.
    </footer>

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="<?= base_url('assets/vendor') ?>/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/libs/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- apps -->
  <!-- apps -->
  <script src="<?= base_url('assets/dist') ?>/js/app-style-switcher.js"></script>
  <script src="<?= base_url('assets/dist') ?>/js/feather.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url('assets/dist') ?>/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="<?= base_url('assets/dist') ?>/js/custom.min.js"></script>
  <!--This page JavaScript -->
  <script src="<?= base_url('assets/vendor') ?>/extra-libs/c3/d3.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/extra-libs/c3/c3.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/libs/chartist/dist/chartist.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?= base_url('assets/vendor') ?>/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= base_url('assets/dist') ?>/js/pages/dashboards/dashboard1.min.js"></script>

  <!--This page plugins -->
  <script src="<?= base_url('assets/vendor') ?>/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/dist') ?>/js/pages/datatable/datatable-basic.init.js"></script>


  <script>
    $('.cek').on('click', function() {
      const menu_id = $(this).data('menu');
      const role_id = $(this).data('role');


      $.ajax({
        url: "<?= base_url('admin/role_change_access') ?>",
        type: "POST",
        data: {
          menuid: menu_id,
          roleid: role_id,

        },
        success: function() {
          document.location.href = "<?= base_url('admin/roleAkses/'); ?>" + role_id
        }
      })


    })
  </script>
  <script>
    $('.cek_sub').on('click', function() {
      const role_id = $(this).data('role');
      const submenu_id = $(this).data('submenu');

      $.ajax({
        url: "<?= base_url('admin/sub_change_access') ?>",
        type: "POST",
        data: {
          submenuid: submenu_id,
          roleid: role_id,

        },
        success: function() {
          document.location.href = "<?= base_url('admin/akses_sub/'); ?>" + role_id
        }
      })


    });
  </script>
</body>

</html>