<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>index.php/profile">ST Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php print base_url('index.php/home/vision') ;?>"><i class="fa fa-fw fa-video-camera"></i> Our Vision</a>
                            </li>
                            <li>
                                <a href="<?php print base_url('index.php/home/mission') ;?>"><i class="fa fa-fw fa-taxi"></i> Our Mission</a>
                            </li><li>
                                <a href="<?php print base_url('index.php/home/ideal') ;?>"><i class="fa fa-fw fa-thermometer-1"></i> Our Ideal</a>
                            </li>
                            <li>
                                <a href="<?php print base_url('index.php/home/wwdo') ;?>"><i class="fa fa-fw fa-industry"></i> What We Do</a>
                            </li>
                             <li>
                        <a href="<?php print base_url('index.php/home/products') ;?>"><i class="fa fa-fw fa-table"></i> Our Product</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('index.php/home/contact') ;?>"><i class="fa fa-fw fa-address-card"></i> Contact</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('index.php/home/policy') ;?>"><i class="fa fa-fw fa-certificate"></i> Company Policy</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('index.php/home/questions') ;?>"><i class="fa fa-fw fa-question-circle-o"></i> Questions</a>
                    </li>
                    
                    <li>
                        <a href="<?php print base_url('index.php/home/downloader') ;?>"><i class="fa fa-fw fa-download"></i> Download</a>
                    </li>
                        </ul>
                    </li>
                </ul>
                    <li class="dropdown">
                          <ul class="dropdown-menu nav navbar-nav navbar-left">
                            <li >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Online store <b class="caret"></b></a>

                </li>

                        <li>
                            <a href="<?php if(@$_SESSION['is_logged'] === true) {


                                echo base_url('index.php/user_authentication/logout') ;

                            }else{
                                echo base_url('index.php/user_authentication/oauth');
                            }

                            ?>"><i class="fa fa-fw fa-power-off"></i>
                            <?php if(@$_SESSION['is_logged'] === true){
                                echo'Log Out'   ;
                            } else{
                                echo'Log In'   ;
                            }  ?>



                            </a>
                        </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>