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
                <a class="navbar-brand" href="<?php echo base_url('home')?>">Souktrain </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?php print base_url('index.php/home/wwdo') ;?>"><i class="fa fa-fw fa-industry"></i> What We Do</a>
                            </li>
                            <li>
                                <a href="<?php print base_url('index.php/home/culture') ;?>"><i class="fa fa-fw fa-industry"></i> Our Culture</a>
                            </li>
                            <li>
                                <a href="<?php print base_url('index.php/home/contact') ;?>"><i class="fa fa-fw fa-contact"></i> Contact</a>
                            </li>
                    
                        </ul>
                    </li>

                    <li>
                        <a href="<?php print base_url('index.php/home/policy') ;?>">Company Policy</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('index.php/home/questions') ;?>">Questions</a>
                    </li>
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Visit Our store </a>
                       <ul class="dropdown-menu">

                           <li>
                        <a href="https://store.souktrain.com" target="blank"><i class="fa fa-fw fa-sign-in"></i>Souktrain Online Store</a>
                    </li> 
                       </ul>
                        </li>                
                     <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw fa-power-off"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php print base_url('index.php/user_authentication/register') ;?>"  target="blank"><i class="fa fa-user fa-fw"></i> <span class="network-name">Register</span></a>
                            </li>
                        <li>
                            <a href="<?php if(@$_SESSION['is_logged'] === true) {


                                echo base_url('index.php/user_authentication/logout') ;

                            }else{
                                echo base_url('index.php/user_authentication/oauth');
                            }

                            ?>">
                            <?php if(@$_SESSION['is_logged'] === true){
                                echo'<i class="fa fa-fw fa-lock"></i>Log Out'   ;
                            } else{
                                echo'<i class="fa fa-fw fa-unlock"></i>Log In'   ;
                            }  ?>



                            </a>
                        </li>
                        </li>
                 </ul>
                 </ul>
                 

                    
                    
               
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>