<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:30:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Souktrain Landing Page</title>
    <meta name="description" content="Souktrain Website">
    <link rel="shortcut icon" href="<?php print('assets/images/logo.png') ;?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/preload.min.css') ;?>">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/plugins.min.css') ;?>">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/style.light-blue-500.min.css') ;?>">
    <link rel="stylesheet" href="<?php print base_url('assets/landing/assets/css/width-boxed.min.css" id="ms-boxed" disabled="">');?>">
    <!--[if lt IE 9]>

    <script src="<?php print base_url('assets/landing/assets/js/html5shiv.min.js')?>" ></script>
    <script src="<?php print base_url('assets/landing/assets/js/respond.min.js')?> "></script>
    <![endif]-->
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
        <div class="card animated zoomInUp animation-delay-7 color-primary withripple">
            <div class="card-block">
                <div class="text-center color-dark">Error Page</h1>
                    <h2> <?php echo $heading; ?></h2>
                    <div id="message"><?php echo $message; ?></div>
                    <p class="lead lead-sm"></p>
                    <a href="<?php echo base_url('members') ;?>" class="btn btn-primary btn-raised">
                        <i class="zmdi zmdi-home"></i> Go Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="container">
    <h1><?php echo $heading; ?></h1>
    <div id="message"><?php echo $message; ?></div>
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
</body>

<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:30:50 GMT -->
</html>