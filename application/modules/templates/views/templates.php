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
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/vendor/images/logo-sibili.png">
  <title>Sibili</title>
  <!-- Custom CSS -->
  <link href="<?= base_url() ?>/assets/vendor/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/vendor/extra-libs/c3/c3.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/vendor/libs/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/vendor/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css" />
  <!-- Custom CSS -->
  <link href="<?= base_url() ?>/assets/dist/css/style.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/dist/css/card.min.css" rel="stylesheet" type="text/css">


</head>

<body>

  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>

  <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin6">
      <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

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

          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">

          <ul class="navbar-nav float-left mr-auto ml-3 pl-1">


          </ul>

          <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- Notification -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><i data-feather="bell" class="svg-icon"></i></span>
                <span class="badge badge-primary notify-no rounded-circle">5</span>
              </a>

            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($user['role_id'] == 1) { ?>
                  <span class="ml-2 d-none d-lg-inline-block"><span><?= $user['username']; ?></span> - <span class="text-dark">Sibili Administrator</span>
                  <?php } else if ($user['role_id'] == 2) { ?>
                    <span class="ml-2 d-none d-lg-inline-block"><span><?= $user['username']; ?> - </span> <span class="text-dark"><?= $mhs['mhs_name'] ?></span>
                    <?php } else if ($user['role_id'] == 3) { ?>
                      <span class="ml-2 d-none d-lg-inline-block"><span><?= $user['username']; ?> - </span> <span class="text-dark"><?= $dosen['dosen_name'] ?></span>
                      <?php } ?>

                      <!-- <form action="<?= base_url('kki/update_status') ?>"> -->
                      <input type="hidden" value="<?= $user['status'] ?>" name="status">
                      <input type="hidden" value="<?= $user['id_user'] ?>" name="id">
                      <!-- </form> -->






                      </span>
                      <img src="<?= base_url('assets/vendor/') ?>/images/profile.png" alt="user" class="rounded-circle" width="40">
                      <i data-feather="chevron-down" class="svg-icon"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                <!-- <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                  My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                  Account Setting</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                  Logout</a>
                <!-- <div class="dropdown-divider"></div>
                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                    Profile</a></div>
              </div> -->
            </li>

          </ul>
        </div>
      </nav>
    </header>

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


    <div class="page-wrapper">

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

      <?= $contents; ?>

    </div>
    <footer class="footer text-center text-muted d-flex justify-content-center">
      All Rights Reserved by Sibili. Designed and Developed by <a href="https://www.instagram.com/adityaajinug/"> adityaajinug</a>.
    </footer>

  </div>

  <script src="<?= base_url() ?>/assets/vendor/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/libs/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="<?= base_url() ?>/assets/dist/js/app-style-switcher.js"></script>
  <script src="<?= base_url() ?>/assets/dist/js/feather.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/dist/js/sidebarmenu.js"></script>

  <script src="<?= base_url() ?>/assets/dist/js/custom.min.js"></script>
  <script src="<?= base_url() ?>/assets/dist/js/chat.js"></script>

  <script src="<?= base_url() ?>/assets/vendor/extra-libs/c3/d3.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/extra-libs/c3/c3.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/libs/chartist/dist/chartist.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= base_url() ?>/assets/dist/js/pages/dashboards/dashboard1.min.js"></script>


  <script src="<?= base_url() ?>/assets/vendor/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/assets/dist/js/pages/datatable/datatable-basic.init.js"></script>

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
            url: "<?= base_url('assets/file/laporan/' . $user_chat['file']) ?>"
          }
        },
        metaData: {
          fileName: "<?= $user_chat['file'] ?>"
        }
      }, {});
    });
  </script>
  <script>
    const btnDropdown = document.getElementById('btn-dropdown');
    const content = document.getElementById('dropdown-btn');
    btnDropdown.onclick = function() {
      if (content.classList.contains('dropdown-menu-add')) {
        content.classList.remove('dropdown-menu-add');
        content.classList.add('show-menu-dropdown-add');
      } else {
        content.classList.remove('show-menu-dropdown-add');
        content.classList.add('dropdown-menu-add');

      }


    }
  </script>
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

  <script>
    function updateUserStatus() {
      jQuery.ajax({
        url: "<?= base_url('kki/laporan/update_status') ?>",
        success: function() {

        }

      });
    }

    // function getUserStatus() {
    //   jQuery.ajax({
    //     url: "<?= base_url('kki/laporan/get_status') ?>",
    //     success: function(result) {
    //       jQuery('#user_st').html(result)
    //     }

    //   });
    // }
    setInterval(function() {
      updateUserStatus()

    }, 500)
    // setInterval(function() {
    //   getUserStatus()

    // }, 7000);
  </script>
</body>

</html>