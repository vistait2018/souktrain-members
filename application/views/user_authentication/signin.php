<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:30:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Souktrain- Login</title>
    <meta name="description" content="Material Style Theme">
   <link rel="shortcut icon" href="<?php print('assets/landing/assets/img/favicon30f4.png?v=3') ;?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/preload.min.css') ;?>">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/plugins.min.css') ;?>">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/style.light-blue-500.min.css') ;?>">
    <link rel="stylesheet" href="<?php print base_url('assets/landing/assets/css/width-boxed.min.css" id="ms-boxed" disabled="">');?>">
    <!--[if lt IE 9]>
    <script src="<?php print base_url('assets/landing/assets/js/html5shiv.min.js')?>" ></script>
    <script src="<?php print base_url('assets/landing/assets/js/respond.min.js')?> "></script>
    <![endif]-->

  <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>

   
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="bg-full-page bg-primary back-fixed">
      <div class="mw-500 absolute-center">
        <div class="card animated zoomInDown animation-delay-5">
          <div class="card-block">
            <h1 class="color-primary text-center"><img src="<?php print base_url('assets/images/logo.png'); ?>" width="50px" height="50px"  /> &nbsp;ST-Login</h1>
            <?php  echo form_open();?>
			<?php  if (isset($message)and !empty($message) ) echo '<div class="alert alert-danger">'.$message.'</div>'; ?>
				      <?php  if (isset($success)and !empty($success)) echo '<div class="alert alert-success">'.$success.'</div>'; ?>
              <fieldset>
                <div class="form-group label-floating">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-account"></i>
                    </span>
					 <?php echo'<div class="text text-danger">'. form_error('email').'</div>'; ?>
                    <label class="control-label" for="ms-form-email">Email</label>
                    <input type="text" id="ms-form-email" class="form-control" name="email" autocomplete="off"> 
					</div>
                </div>
                <div class="form-group label-floating">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-lock"></i>
                    </span>
					<?php echo '<div class="text text-danger">'. form_error('password').'</div>'; ?>
                    <label class="control-label" for="ms-form-pass">Password</label>
                    <input type="password" id="ms-form-pass" class="form-control" name="password"> 
					</div>
                </div>
                <div class="g-recaptcha" data-sitekey="6Le7AlcUAAAAAEqLa_-dVr951f2xJPoDPs27c-Cz" data-callback="recaptchaCallback" ></div>
                <div class="row ">
                  <div class="col-md-6">
                    <button class="btn btn-raised btn-primary btn-block" id="btnSubmit" type="submit">Login
                      <i class="zmdi zmdi-long-arrow-right no-mr ml-1"></i>
                    </button>
                  </div>
                  <div class="col-md-6">
				    <a href="<?php echo base_url()?>index.php/user_authentication/register" class="btn btn-primary btn-block">
                      <i class="zmdi zmdi-account-add mr-1"></i> Sign Up</a>
                  </div>
                </div>
              </fieldset>
            <?php echo form_close(); ?>

          </div>
        </div>
        <div class="text-center animated fadeInUp animation-delay-7">
          <a href="<?php echo base_url('landing')?>" class="btn btn-white">
            <i class="zmdi zmdi-home"></i> Go Home</a>
          <a href="<?php echo base_url()?>user_authentication/passwordresets" class="btn btn-white"> 
            <i class="zmdi zmdi-key"></i> Recovery Pass</a>
        </div>
      </div>
    </div>
      <script src="<?php print base_url('assets/landing/assets/js/plugins.min.js');?>"></script>
    <script src="<?php print base_url('assets/landing/assets/js/app.min.js');?>"></script>
    <script src="<?php print base_url('assets/landing/assets/js/configurator.min.js');?>"></script>
    <script>
      (function(i, s, o, g, r, a, m)
      {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function()
        {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-90917746-2', 'auto');
      ga('send', 'pageview');
    </script>
    <script>
      function recaptchaCallback() {
        var btnSubmit = document.getElementById("btnSubmit");

        if ( btnSubmit.classList.contains("hidden") ) {
          btnSubmit.classList.remove("hidden");
          btnSubmitclassList.add("show");
        }
      }
    </script>

  </body>

<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:30:46 GMT -->
</html>