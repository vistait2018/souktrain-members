<body>

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
            <a class="navbar-brand" href="#">My Store</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            
            <li> <img class="img-rounded "style="margin-top: 10px;" src="<?php if($_SESSION['image_url'] and $_SESSION['picture_url'] != 'NIL'
                )echo $_SESSION['image_url'];?>" height="30" width="30"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php if(@$_SESSION['is_logged_store'] === true){
                        echo @$_SESSION['name'] ;
                    } else{
                        echo 'store name' ;
                    }
                    ?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url()?>index.php/Stores_profile_account/profile"><i class="fa fa-fw fa-user"></i> Store Profile</a>
                    </li>
                   

                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url('index.php/stores/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
