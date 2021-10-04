<?php
if(!isset($_SESSION['is_logged']) or $_SESSION['is_logged'] == false or empty($_SESSION['is_logged'])) redirect('user_authentication/oauth');

?>

    <!DOCTYPE html>
    <html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Dashboard</title>
    <meta name="description" content="Souktrain Website">
    <link rel="shortcut icon" href="<?php print base_url('assets/images/logo.png') ;?>">

    <script src="<?php echo base_url()?>assets/js/alert.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php print base_url('assets/css/bootstrap.min.css') ;?>" rel="stylesheet">
    
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
 
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<link href="<?php print base_url('assets/font-awesome/css/font-awesome.min.css') ;?>" rel="stylesheet" type="text/css">
<link href="<?php print base_url('assets/bootstrap/css/bootstrap-datetimepicker.min.css') ;?>" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?php print base_url('assets/css/sb-admin.css') ;?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php print base_url('assets/font-awesome/css/font-awesome.css') ;?>" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

</head>
<?php
/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/26/2017
 * Time: 1:06 PM
 */