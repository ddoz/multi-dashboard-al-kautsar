<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.4.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Multi Dashboard Application</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="<?=template('default')?>css/style.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css" integrity="sha512-PlmS4kms+fh6ewjUlXryYw0t4gfyUBrab9UB0vqOojV26QKvUT9FqBJTRReoIZ7fO8p0W/U9WFSI4MAdI1Zm+A==" crossorigin="anonymous" /> -->
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <form id="formLogin" method="post">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to your account</p>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                            <use xlink:href="<?=template('node')?>/@coreui/icons/sprites/free.svg#cil-user"></use>
                        </svg></span></div>
                    <input name="username" required class="form-control" type="text" placeholder="Username">
                    </div>
                    <div class="input-group mb-4">
                    <div class="input-group-prepend"><span class="input-group-text">
                        <svg class="c-icon">
                            <use xlink:href="<?=template('node')?>/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                        </svg></span></div>
                    <input name="password" required class="form-control" type="password" placeholder="Password">
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div>
                    </div>
                </form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Selamat Datang</h2>
                  <p>Aplikasi Multi Dashboard</p>
                  <h4>Yayasan Al Kautsar Lampung <br>Unggul Islami Global</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?=template('node')?>/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="<?=template('node')?>/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="<?=template('default')?>/js/notify.min.js"></script>
    <script>
        $('#formLogin').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?=base_url()?>login/auth',
                data: $(this).serialize(),
                type: 'POST',
                beforeSend: function() {
                    console.log('init to call auth');
                },
                complete: function() {
                    console.log('process done');
                },
                success: function(res) {
                    console.log('sukses');
                    var response = JSON.parse(res);
                    if(response.status == "OK") {
                        $.notify("Selamat Datang, Silahkan tunggu sejenak", "success");
                        setTimeout(function() {
                            location.href='<?=base_url()?>welcome/app';
                        },3000);
                    }else {
                        $.notify(response.message, "error");
                    }
                },
                error: function(err) {
                    $.notify(err, "error");
                }
            })
        })
    </script>
  </body>
</html>
