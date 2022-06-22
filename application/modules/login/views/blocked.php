<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

  <style>
    * {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      padding: 0;
      margin: 0;
      background-color: #EEF7FF;
    }

    #notfound {
      position: relative;
      height: 100vh;
      /* background-image: url('./assets/img/bg-logo.png');
      background-size: cover; */

    }

    #notfound .logo {
      /* border: 1px solid red; */
      position: absolute;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }


    #notfound .notfound {
      position: absolute;
      left: 50%;
      top: 50%;
      padding-top: 10px;
      padding-right: 50px;
      padding-left: 50px;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      /* border: 1px solid red; */
    }

    .notfound {
      max-width: 788px;
      max-height: 355px;
      height: 100%;
      width: 100%;
      text-align: center;
      line-height: 1.4;
      /* border: 1px solid red; */
      background: #FFFFFF;
      box-shadow: 0px 20px 30px 10px rgba(0, 0, 0, 0.09);
      border-radius: 20px;

    }

    .notfound .notfound-404 {
      height: 190px;
    }

    .notfound .notfound-404 h1 {
      font-family: 'Montserrat', sans-serif;
      font-size: 146px;
      font-weight: 700;
      margin: 0px;
      color: #232323;
    }

    .notfound .notfound-404 h1 {
      color: #2940D3;

      text-shadow: 0px 5px 10px rgba(41, 64, 211, 0.5);
    }

    .notfound h2 {
      font-family: 'Montserrat', sans-serif;
      font-size: 22px;
      font-weight: 700;
      margin: 0;
      text-transform: uppercase;
      color: #232323;
    }

    .notfound p {
      font-family: 'Montserrat', sans-serif;
      color: #787878;
      font-weight: 300;
    }

    .notfound a {
      font-family: 'Montserrat', sans-serif;
      display: inline-block;
      padding: 12px 30px;
      font-weight: 700;
      background-color: #FECC00;
      color: #fff;
      box-shadow: 0px 2px 10px #FECC00;
      border-radius: 20px;
      text-decoration: none;
      -webkit-transition: 0.2s all;
      transition: 0.2s all;
    }

    .notfound a:hover {
      opacity: 0.8;
    }

    @media only screen and (max-width: 767px) {
      .notfound .notfound-404 {
        height: 115px;
      }

      .notfound .notfound-404 h1 {
        font-size: 86px;
      }

      .notfound .notfound-404 h1>span {
        width: 86px;
        height: 86px;
      }
    }
  </style>
</head>

<body>

  <div id="notfound">
    <div class="logo">
      <img src="<?= base_url('assets/vendor/images/bg-logo.png') ?>" alt="" srcset="">
    </div>
    <div class="notfound">
      <div class="notfound-404">
        <h1>404</h1>
      </div>
      <h2>Page Not Be Found</h2>
      <p>Sorry but the page you are looking for does not exist</p>
      <?php if (!$this->session->userdata('username')) : ?>
        <a href="<?= base_url('login') ?>">Back to Login</a>
      <?php else : ?>
        <a href="<?= base_url('dashboard') ?>">Back to Dashboard</a>

      <?php endif; ?>
    </div>
  </div>

</body>

</body>

</html>