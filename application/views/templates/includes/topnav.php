<body>
<?php @$sc_income = $this->Profile_model->profile_update_picture($_SESSION['user_id']);
 @$sc_picture = $sc_income->picture_url;?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>index.php/profile">Dashboard</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Online store <b class="caret"></b></a>

            </li>
            <li> <img class="img-rounded "style="margin-top: 10px;" src="<?php echo base_url('/assets/uploads/passport/'). @$sc_picture;?>" height="30" width="30"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php if($_SESSION['is_logged'] === true){
                        echo $_SESSION['first_name'] ;
                    } else{
                        echo 'profile' ;
                    }
                    ?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url()?>index.php/profile/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-google-wallet"></i> Wallet</a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url('index.php/user_authentication/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
