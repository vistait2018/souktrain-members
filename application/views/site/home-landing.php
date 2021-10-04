<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Souktrain Landing Page</title>
    <meta name="description" content="Souktrain Website">
    <link rel="shortcut icon" href="<?php print base_url('assets/images/logo.png') ;?>">
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
    <div class="ms-site-container ms-nav-fixed">
      <nav class="navbar navbar-expand-md navbar-fixed ms-lead-navbar navbar-mode navbar-mode mb-0" id="navbar-lead">
        <div class="container container-full">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php print  base_url('landing')  ?>">
              <img src="<?php print base_url('assets/images/logo.png '); ?>" width="40" height ="40" alt="logo">
              

              <span class="ms-title">Souktrain
                           </span>
            </a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a data-scroll class="nav-link active" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a data-scroll class="nav-link" href="#ideals">Ideals</a>
              </li>
              <li class="nav-item">
                <a data-scroll class="nav-link" href="#products">Products</a>
              </li>
              <li class="nav-item">
                <a data-scroll class="nav-link" href="#plans">Plans</a>
              </li>
              <li class="nav-item">
                <a data-scroll class="nav-link" href="#about">About us</a>
              </li>
              <li class="nav-item">
                <a data-scroll class="nav-link" href="#quotes">Quotes</a>
              </li>
              
                <li class="nav-item">
                    <a data-scroll class="nav-link" href="https://store.souktrain.com" target="blank"><i class="fa fa-shopping-cart"> </i> </a>
                </li>

            </ul>
          </div>
          <!-- navbar-collapse collapse -->
            <!-- navbar-collapse collapse -->


        </div>
        <!-- container -->
          <!-- navbar-collapse collapse -->
          <a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu">
              <i class="zmdi zmdi-menu"></i>
          </a>
    </div>
    <!-- container -->
      </nav>
        <div class="intro-fixed ms-hero-img-airplane ms-hero-bg-royal color-white" id="home">
            <div class="intro-fixed-content index-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-center mb-4">
                                <span class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 mt-2 animated zoomInDown animation-delay-5">ST</span>
                                <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5"> <span class="color-warning">Souktrain
                                    Millionaires</span>
                                </h1>
                                <p class="d-sm-none d-lg-block lead lead-lg color-white center-block mt-2 mb-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">At Souktrain, We take you through the
                                    rigorous process of  Training,Marketing,Investment and Preparing for early Retirement.<br>It is not the worth of a penny that matters but what you do with a penny .</p>

                                <a href="<?php if(@$_SESSION['is_logged'] === true) {


                                    echo base_url('index.php/user_authentication/logout') ;

                                }else{
                                    echo base_url('index.php/user_authentication/oauth');
                                }
                                ;?>" class="animated zoomInUp animation-delay-9 btn btn-raised btn-primary btn-xlg">
                                    <?php if(@$_SESSION['is_logged'] === true){
                                        echo'<i class="fa fa-fw fa-lock"></i>Log Out'   ;
                                    } else{
                                        echo'<i class="fa fa-fw fa-unlock"></i>Log In'   ;
                                    }  ?>

                                    <a href="<?php print base_url('index.php/user_authentication/register') ;?>" class="animated zoomInUp animation-delay-11 btn btn-raised btn-warning btn-xlg">
                                    <i class="zmdi zmdi-nature"></i> Register</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card index-1 animated zoomInRight animation-delay-7">
                                <div class="card-block-big color-dark">

                                    <h2 class="color-primary"><i class="color-primary fa fa-fw fa-gift"></i> How to Join</h2>
                                    <p calss="lead"><a href="<?php echo base_url();?>index.php/user_authentication/register"> Sign Up free</a>. After <a href="<?php echo base_url();?>index.php/user_authentication/register">registration</a> a link will be sent to your email.
                                            From your mail click on the link to continue your registration.You can then
                                        <a href="<?php echo base_url();?>index.php/user_authentication/oauth">login</a>.Pay to  our GT Bank Account using your user Id as name
                                            of depositor.As soon as your deposit is confirmed your account will be activated.
                                            Our company 's Account details :
                                            A/C Name : Diamondweb Business Systems Limited
                                            A/C : 0049944304
                                            Bank: GTbank</p>

                                        <a href="<?php echo base_url();?>index.php/user_authentication/register" class="btn btn-raised btn-primary btn-block withoutripple" >
                                            <i  class="zmdi zmdi-email"></i> Subscribe</a>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="btn-back-top">
            <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
                <i class="zmdi zmdi-long-arrow-up"></i>
            </a>
        </div>


      <div class="bg-light index-1 intro-fixed-next pt-6" id="intro-next">
        <div class="container mt-4">
          <h2 class="text-center color-primary mb-2 wow fadeInDown animation-delay-4">4 Simple Steps To Success</h2>
         
          <div class="row">
            <div class="ms-feature col-xl-3 col-lg-3 col-md-6 col-sm-6 card wow fadeInUp animation-delay-4">
              <div class="text-center card-block">
                <span class="ms-icon ms-icon-circle ms-icon-xxlg color-info">
                  <i class="zmdi zmdi-cloud-outline"></i>
                </span>
                <h4 class="color-info">Join The Community</h4>
                  <p class=""><a href="<?php echo base_url();?>index.php/user_authentication/register">Sign up</a> today to be a member of the community. This first easy step gives you
                  full access to all our educational programmes, financial tools and leverages available.  </p>
                
              </div>
            </div>
            <div class="ms-feature col-xl-3 col-lg-3 col-md-6 col-sm-6 card wow fadeInUp animation-delay-8">
              <div class="text-center card-block">
                <span class="ms-icon ms-icon-circle ms-icon-xxlg color-warning">
                  <i class="zmdi zmdi-desktop-mac"></i>
                </span>
                <h4 class="color-warning">Attend training</h4>
                <p class="">Attend meetings, lectures, seminars and workshops. We coach and train our members with games and practical-real-life experiences.
                   You will have fun while you learn.</p>
               
              </div>
            </div>
            <div class="ms-feature col-xl-3 col-lg-3 col-md-6 col-sm-6 card wow fadeInUp animation-delay-10">
              <div class="text-center card-block">
                <span class="ms-icon ms-icon-circle ms-icon-xxlg color-success">
                  <i class="zmdi zmdi-download"></i>
                </span>
                <h4 class="color-success">Practise, practise</h4>
                <p class="">Practise what you learn. It is the doing that brings results.
                    Our members work as a team. And so will you. One secret of success is cooperation and team work.
                    In fact, cooperation and team work create the magic of life.
                </p>
                
              </div>
            </div>
            <div class="ms-feature col-xl-3 col-lg-3 col-md-6 col-sm-6 card wow fadeInUp animation-delay-6">
              <div class="text-center card-block">
                <span class="ms-icon ms-icon-circle ms-icon-xxlg  color-danger">
                  <i class="zmdi zmdi-flower-alt"></i>
                </span>
                <h4 class="color-danger">Success</h4>
                <p class="">Success follows automatically when you do the first three steps as listed above. Success is accomplishment that brings along with it fulfilment in all areas of your life. 
          This is the time you sit back and enjoy the fruits of your labour and pass the legacy down to the following generations. 
</p>
               
              </div>
            </div>
          </div>
        </div>
        <!-- container -->
        <section id="ideals" class="mt-6">
          <div class="wrap ms-hero-img-meeting ms-hero-bg-info color-white ms-bg-fixed">
            <div class="container">
              <div class="text-center mb-4">
                <h1 class="wow zoomInDown">Our Ideals</h1>
                
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="wow fadeInUp animation-delay-2 color-warning">Vision & Mission </h3>
                  <p class="wow fadeInUp animation-delay-3">To create 100 million successful entrepreneurs in every 
                    continent of the world: Entrepreneurs, who are by words and deeds,
                     blessings and inspiration to the world and the people around them.
                  </p>
                  <p class="wow fadeInUp animation-delay-4 ">To create entrepreneurs in every continent 
                    who work together in love to transform individuals, communities, cities and nations
                     of the world into better and fulfilling people to live with, and places to live in.
                   
                </div>
                <div class="col-lg-6">
                  <div class="ms-collapse" id="accordion2" role="tablist" aria-multiselectable="true">
                    <div class="mb-0 card card-info wow fadeInUp animation-delay-2">
                      <div class="card-header" role="tab" id="headingOne2">
                        <h4 class="card-title">
                          <a class="withripple" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                            <i class="fa fa-lightbulb-o"></i> 	Human Capital Development and Management </a>
                        </h4>
                      </div>
                      <div id="collapseOne2" class="card-collapse collapse show" role="tabpanel" aria-labelledby="headingOne2">
                        <div class="card-block color-dark">
                          <p>Management Training and Development.</p>
                          <p>Executive Selection.</p>
                         <p>Organisational Development. </p>
                       <p>Labour/ Management Relations.</p>
                   <p>	Organisation of Public Seminars/ Lectures.</p>
               <p>Provision of Public/ Customized Coaching & Mentoring.</p>
                         
                        </div>
                      </div>
                    </div>
                    <div class="mb-0 card card-info wow fadeInUp animation-delay-5">
                      <div class="card-header" role="tab" id="headingTwo2">
                        <h4 class="card-title">
                          <a class="collapsed withripple" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                            <i class="fa fa-desktop"></i>Sales of Books, DVDs, CDs and Souvenirs </a>
                        </h4>
                      </div>
                      <div id="collapseTwo2" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                        <div class="card-block color-dark">
                          <p>	Home/ Office Appliances.</p>
                          <p>	Laptops/ Business Machines.</p>
                          <p>	Shoes, bags, belts.</p>
                          <p>	Dresses, shirts, trousers.</p>
                          <p>Wrist Watches, Jewellery.</P>
                          <p>Foods & beverages, health supplements.</p> 

                          
                        </div>
                      </div>
                    </div>
                    <div class="mb-0 card card-info wow fadeInUp animation-delay-7">
                      <div class="card-header" role="tab" id="headingThree3">
                        <h4 class="card-title">
                          <a class="collapsed withripple" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                            <i class="fa fa-user"></i> 	Affiliate Programme </a>
                        </h4>
                      </div>
                      <div id="collapseThree2" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingThree2">
                        <div class="card-block color-dark">
                          <p>Apart from being our customer and/ or client or mentee, you can as well sign
                             up as an affiliate to make our products and services accessible to people around you. This could be your own little way of contributing to making more people in Nigeria and around the world financially literate and helping
                             to set them free from financial slavery, thereby making our society a better place to live in.</p>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </section>
        <section id="products" class="">
          <div class="wrap ms-hero-bg-dark ms-hero-img-keyboard ms-bg-fixed">
            <div class="container index-1">
              <div class="text-center color-white mb-4 mw-800 center-block">
                <h1 class="wow fadeInUp animation-delay-2">Our Products</h1>
                <p class="lead color-medium wow fadeInUp animation-delay-2">Different categories of products are available at our
                  <span class="color-white"> <a href="https://store.souktrain.com" target="blank">Store</a></span>.We give you purchasing power through our affiliate programs.</p>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="<?php print base_url('assets/landing/assets/img/demo/books.jpg')?> " alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                        <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">Learning Resources</h3>
                          <p>Visit our online  <a href="https://store.souktrain.com" target="blank">Store</a>.</p>
                            <a href="https://store.souktrain.com" target="blank" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-eye"></i> View more</a>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="<?php print base_url('assets/landing/assets/img/demo/rice.jpg')?>" height="603px" width="900px" alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                        <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">Food Stuffs</h3>
                           <p>Visit our online  <a href="https://store.souktrain.com" target="blank">Store</a>.</p>
                          <a  href="https://store.souktrain.com" target="blank" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-eye"></i> View more</a>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="<?php print base_url('assets/landing/assets/img/demo/clothes.jpg')?>" alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                         <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">Clothes Shoes and Bags</h3>
                          <p>Visit our online  <a href="https://store.souktrain.com" target="blank">Store</a>.</p>
                          <a  href="https://store.souktrain.com" target="blank" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-eye"></i> View more</a>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="<?php print base_url('assets/landing/assets/img/demo/laptops.jpg')?>" alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                        <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">Laptops and Electronic Items</h3>
                         <p> Visit our online  <a href="https://store.souktrain.com" target="blank">Store</a>.</p>
                          <a  href="https://store.souktrain.com" target="blank" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-eye"></i> View more</a>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="<?php print base_url('assets/landing/assets/img/demo/beverages.jpg')?>" alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                         <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">Beverages and Provisions</h3>
                           <p> Visit our online  <a href="https://store.souktrain.com" target="blank">Store</a>.</p>
                          <a  href="https://store.souktrain.com" target="blank" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-eye"></i> View more</a>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                  <div class="ms-thumbnail-container wow fadeInUp">
                    <figure class="ms-thumbnail ms-thumbnail-top ms-thumbnail-info">
                      <img src="<?php print base_url('assets/landing/assets/img/demo/phones.jpg')?>" alt="" class="img-fluid">
                      <figcaption class="ms-thumbnail-caption text-center">
                        <div class="ms-thumbnail-caption-content">
                          <h3 class="ms-thumbnail-caption-title">Phones and Accessories</h3>
                           <p>Visit our online  <a href="https://store.souktrain.com" target="blank">Store</a>.</p>
                          <a  href="https://store.souktrain.com" target="blank" class="btn btn-raised btn-danger">
                            <i class="zmdi zmdi-eye"></i> View more</a>
                        </div>
                      </figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       < section id="plans">
          <div class="wrap ms-hero-img-airplane ms-hero-bg-royal ms-bg-fixed">
            <div class="container">
              <div class="text-center mb-4">
                <h2 class="uppercase color-white wow fadeInDown animation-delay-2">Our Affiliate Plans</h2>
               
              </div>
              <div class="row no-gutters">
                <div class="col-lg-4">
                  <div class="price-table price-table-success wow zoomInUp">
                    <header class="price-table-header">
                      <span class="price-table-category">Cadet</span>
                      <h3>
                        <sub>&#8358;</sub>18000
                       
                      </h3>
                    </header>
                    <div class="price-table-body">
                      <ul class="price-table-list">
                        <li>
                          <i class="zmdi zmdi-star"></i> No of downline: &nbsp; Unlimited</li>
                        <li>
                          <i class="zmdi zmdi-globe"></i> Product: <sub>&#8358;</sub>5000 /downline after upgrade</li>
                         
						 <li><i class="zmdi zmdi-cloud"></i> Cash :<sub>&#8358;</sub>10000</li>
						 
                        <li><i class="zmdi zmdi-cloud"></i> Car Bonus : Nil</li>
                        <li>
                          <i class="zmdi zmdi-money-box"></i> Profit Sharing : Nil</li>
						 <li>
                        <i class="zmdi zmdi-airplane"></i>Local Travel : Nil
						</li> 
                          <li>
                        <i class="zmdi zmdi-airplane"></i>International Travel: Nil
						</li> 
                        <li>
                        <i class="zmdi zmdi-home"></i>House Bonus: Nil
						</li> 
                        <li>
                        <i class="zmdi zmdi-star"></i>Level: One
						</li> 						
                      </ul>
                      <div class="text-center">
                        <a href="<?php print base_url('index.php/home/') ;?>cadet" class="btn btn-success btn-raised">
                          <i class="zmdi zmdi-cloud-download"></i> Get Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="price-table price-table-info prominent wow zoomInDown">
                    <header class="price-table-header">
                      <span class="price-table-category">Coral</span>
                      <h3>
                        Automatic
                        
                      </h3>
                    </header>
                    <div class="price-table-body">
                      <ul class="price-table-list">
                        <li>
                          <i class="zmdi zmdi-star"></i> No of downline: &nbsp; Unlimited</li>
                        <li>
                          <i class="zmdi zmdi-globe"></i> Product: <sub>&#8358;</sub>12000/8000</li>
                        
						<li><i class="zmdi zmdi-cloud"></i> Cash :<sub>&#8358;</sub>Nil/10000</li>
						
                        <li>
                          <i class="zmdi zmdi-cloud"></i> Car Bonus : Nil</li>
                        <li>
                          <i class="zmdi zmdi-money-box"></i> Profit Sharing : Nil</li>
						 <li>
                        <i class="zmdi zmdi-airplane"></i>Local Travel : Nil
						</li> 
                          <li>
                        <i class="zmdi zmdi-airplane"></i>International Travel: Nil
						</li> 
                        <li>
                        <i class="zmdi zmdi-home"></i>House Bonus: Nil
						</li> 
                        <li>
                        <i class="zmdi zmdi-star"></i>Level: One
						</li> 						
                      </ul>
                      <div class="text-center">
                         <a href="<?php print base_url('index.php/home/') ;?>coral" class="btn btn-success btn-raised">
                          <i class="zmdi zmdi-cloud-download"></i> Get Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="price-table price-table-danger wow zoomInUp">
                    <header class="price-table-header">
                      <span class="price-table-category">Silver</span>
                      <h3>
                        <sup> &#8358</sup>116000
                        
                      </h3>
                    </header>
                    <div class="price-table-body">
                      <ul class="price-table-list">
                        <li>
                          <i class="zmdi zmdi-star"></i> No of downline: &nbsp; Unlimited</li>
                        <li>
                          <i class="zmdi zmdi-globe"></i> Product: <sub>&#8358;</sub>5000 /15000</li>
                         <li><i class="zmdi zmdi-cloud"></i> Cash :<sub>&#8358;</sub>nil/55000</li>
                        <li>
                          <i class="zmdi zmdi-cloud"></i> Car Bonus : Nil</li>
                        <li>
                          <i class="zmdi zmdi-money-box"></i> Profit Sharing : Nil</li>
						 <li>
                        <i class="zmdi zmdi-airplane"></i>Local Travel : Nil
						</li> 
                          <li>
                        <i class="zmdi zmdi-airplane"></i>International Travel: Nil
						</li> 
                        <li>
                        <i class="zmdi zmdi-home"></i>House Bonus: Nil
						</li> 
                        <li>
                        <i class="zmdi zmdi-star"></i>Level: One
						</li> 						
                      </ul>
                      <div class="text-center">
                        <a href="<?php print base_url('index.php/home/') ;?>silver" class="btn btn-success btn-raised">
                          <i class="zmdi zmdi-cloud-download"></i> Get Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--container -->
          </div>
        </section>
        <section id="about">
          <div class="container pt-6">
            <h2 class="right-line">About Us</h2>
            <div class="row">
              <div class="col-lg-6">
               
                <p class="wow fadeInUp animation-delay-2">The Executive Management Team of DIAMONDWEB Business 
				Systems Ltd. is made up of seasoned Training and Management Consultants, Business & 
				Investment Analysts, Researchers, Real Estate Operators, Commodities Dealers, as well as,
				Human Capital Development and Personal Finance Experts. This is a crop of experts with varied
				experience from diversified areas of Business, Investing, Marketing, Corporate and Human Performance
				Enhancement Training. Leading the team is Terry Noah Esq. IOCN The company’s   Board of Directors 
				is composed of well respected and renowned Nigerians with very good track records of performance 
				in the Public and Private Sectors. They provide the needed support for delivery of consistently 
				excellent services and products to our clients and customers.
                </p>
              </div>
              <div class="col-lg-6">
                <h3 class="color-primary wow fadeInUp animation-delay-2">Products</h3>
                <div class="progress progress-lg wow fadeInUp animation-delay-6">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">Personal Development Education </div>
                </div>
                <div class="progress progress-lg wow fadeInUp animation-delay-8">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> Financial Literacy Education </div>
                </div>
                <div class="progress progress-lg wow fadeInUp animation-delay-10">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"> Purchasing Power </div>
                </div>
                <div class="progress progress-lg wow fadeInUp animation-delay-12">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">Entrepreneurship </div>
                </div>
                <div class="progress progress-lg wow fadeInUp animation-delay-14">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> Leadership Education </div>
                </div>
                <div class="progress progress-lg wow fadeInUp animation-delay-16">
                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> Networking </div>
                </div>
              </div>
            </div>
          </div>

            <div class="container mt-6">
                <br><br>
                <h1 class="font-light">Our Motivations and Drive</h1>
                <p class="lead color-primary">— We help you fulfil your dreams. </p>

                <div class="panel panel-light panel-flat">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-5" role="tablist">
                        <li class="nav-item wow fadeInDown animation-delay-6" role="presentation">
                            <a href="#drive" aria-controls="drive" role="tab" data-toggle="tab" class="nav-link withoutripple">
                                <i class="zmdi zmdi-car"></i>
                                <span class="d-none d-md-inline">Drive</span>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInDown animation-delay-4" role="presentation">
                            <a href="#knowledge" aria-controls="knowledge" role="tab" data-toggle="tab" class="nav-link withoutripple active">
                                <i class="zmdi zmdi-book"></i>
                                <span class="d-none d-md-inline">knowledge</span>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInDown animation-delay-2" role="presentation">
                            <a href="#community" aria-controls="community" role="tab" data-toggle="tab" class="nav-link withoutripple">
                                <i class="fa fa-user"></i>
                                <span class="d-none d-md-inline">Community</span>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInDown animation-delay-4" role="presentation">
                            <a href="#empowerment" aria-controls="empowerment" role="tab" data-toggle="tab" class="nav-link withoutripple">
                                <i class="zmdi zmdi-power"></i>
                                <span class="d-none d-md-inline">Empowerment</span>
                            </a>
                        </li>
                        <li class="nav-item wow fadeInDown animation-delay-6" role="presentation">
                            <a href="#marketting" aria-controls="marketting" role="tab" data-toggle="tab" class="nav-link withoutripple">
                                <i class="zmdi zmdi-network"></i>
                                <span class="d-none d-md-inline">Marketting</span>
                            </a>
                        </li>
                    </ul>
                    <div class="panel-body">
                        <!-- Tab panes -->
                        <div class="tab-content mt-4">
                            <div role="tabpanel" class="tab-pane fade" id="drive">
                                <div class="row">
                                    <div class="col-lg-6 order-lg-2">
                                        <img src="<?php print base_url('assets/landing/assets/img/demo/souk1.png');?>" alt="hhhhhhh" class="img-fluid animated zoomIn animation-delay-8"> </div>
                                    <div class="col-lg-6 order-lg-1">
                                        <br><br>

                                        <p class="lead lead-md animated fadeInUp animation-delay-6">SOUKTRAIN is dynamically pioneering a revolutionary and a distinctive solution to financial management and wealth building challenges in black nations as a whole.</p>
                                        <p class="lead lead-md animated fadeInUp animation-delay-7"> This approach is designed to generate massive involvement of all categories of people who are desirous in uplifting their financial status, create growth,stability, freedom and abundance for themselves and loved ones, and be a blessing to their communities and neighbours.</p>
                                        <div class="">

                                            <a href="<?php print base_url('index.php/user_authentication/register') ;?>" class="btn btn-danger btn-raised mr-1 animated zoomIn animation-delay-12">
                                                <i class="zmdi zmdi-chart-donut"></i> Action here </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane active show fade" id="knowledge">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="<?php print  base_url('assets/landing/assets/img/demo/souk2.png');?>" alt="" class="img-fluid wow animated zoomIn animation-delay-8"> </div>
                                    <div class="col-lg-6">
                                        <br><br>
                                        <p class="lead lead-md  wow animated fadeInUp animation-delay-6">Two major challenges confront every would-be business owner in Africa – lack of sound and practical
                                            knowledge and adequate start-up capital to finance their ideas and take it to the market place.</p>
                                        <p class="lead lead-md wow animated fadeInUp animation-delay-7"> We create this platform to get together people who sincerely want
                                            a better and an improved personal and family standard of living.</p>
                                        <div class="">

                                            <a href="<?php print base_url('index.php/user_authentication/register') ;?>" class="btn btn-danger btn-raised mr-1 wow animated zoomIn animation-delay-12">
                                                <i class="zmdi zmdi-chart-donut"></i> Action here </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="community">
                                <div class="row">
                                    <div class="col-lg-6 order-lg-2">
                                        <img src="<?php print  base_url('assets/landing/assets/img/demo/souk3.png');?>" alt="" class="img-fluid animated zoomIn animation-delay-8"> </div>
                                    <div class="col-lg-6 order-lg-1">
                                        <br><br>
                                        <p class="lead lead-md animated fadeInUp animation-delay-6">We bring together teachers and learners in a community-style-learning environment
                                            to teach and learn financial literacy, business, investment, marketing, leadership,
                                            etc. in an unconventional manner, starting first, with games before proceeding to real-life
                                            investments.</p>
                                        <p class="lead lead-md animated fadeInUp animation-delay-7">Our teachers and coaches are practising entrepreneurs in diverse areas of
                                            businesses and investments. This gives our community members practical knowledge and methods to
                                            create, build and run their businesses.</p>
                                        <div class="">

                                            <a href="<?php print base_url('index.php/user_authentication/register');?>" class="btn btn-danger btn-raised mr-1 animated zoomIn animation-delay-12">
                                                <i class="zmdi zmdi-chart-donut"></i> Action here </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="empowerment">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="<?php print  base_url('assets/landing/assets/img/demo/souk1.png');?>" alt="" class="img-fluid animated zoomIn animation-delay-8"> </div>
                                    <div class="col-lg-6">
                                        <br><br>
                                        <p class="lead lead-md  animated fadeInUp animation-delay-6">Next, are the financial tools and leverages which are provided by the very structure of
                                            our business – mlm (multilevel marketing)
                                            to empower our members to earn enough money to buy assets and invest in the businesses of their choices</p>
                                        <p class="lead lead-md animated fadeInUp animation-delay-7"> Our mission is to create entrepreneurs who are, by their words and deeds, inspiration and blessings
                                            to their loved ones, neighbours and the world at large.</p>
                                        <div class="">

                                            <a href="<?php print base_url('index.php/user_authentication/register');?>" class="btn btn-danger btn-raised mr-1 animated zoomIn animation-delay-12">
                                                <i class="zmdi zmdi-chart-donut"></i> Action here </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="marketting">
                                <div class="row">
                                    <div class="col-lg-6 order-lg-2">
                                        <img src="<?php print  base_url('assets/landing/assets/img/demo/souk1.png');?>" alt="" class="img-fluid animated zoomIn animation-delay-8"> </div>
                                    <div class="col-lg-6 order-lg-1">
                                        <br><br>
                                        <p class="lead lead-md animated fadeInUp animation-delay-6">Distribution and marketting of products to our clients, customers and affiliates is our core priority.</p>
                                        <p class="lead lead-md animated fadeInUp animation-delay-7">Customers are assured of quality products at affordable prices.Our products are standardized and produced using the world's best practices.</p>

                                            <a href="<?php print base_url('index.php/user_authentication/register') ;?>" class="btn btn-danger btn-raised mr-1 animated zoomIn animation-delay-12">
                                                <i class="zmdi zmdi-chart-donut"></i> Action here </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- panel -->
            </div>

        </section>
        <section id="quotes">
          <div class="container pt-6">
            <h1 class="color-primary text-center wow fadeInUp animation-delay-2">Quotable Quotes</h1>
            <div class="row">
              <div class="col-lg-4 col-sm-6">
                <div class="card mt-4 card-danger wow zoomInUp animation-delay-7">
                  <div class="ms-hero-bg-danger ms-hero-img-city">
                    <img src="<?php print base_url('assets/landing/assets/img/demo/avatarjohn.jpg')?>" alt="..." class="img-avatar-circle"> </div>
                  <div class="card-block pt-6 text-center">
                    <h3 class="color-danger">John Maxwell</h3>
                    <p>"There is no traffic jam on the extra mile."</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card mt-4 card-info wow zoomInUp animation-delay-7">
                  <div class="ms-hero-bg-info ms-hero-img-city">
                    <img src="<?php print base_url('assets/landing/assets/img/demo/avatarsteve.jpg')?>" alt="..." class="img-avatar-circle"> </div>
                  <div class="card-block pt-6 text-center">
                    <h3 class="color-info">Steve Covey</h3>
                    <p>"Private victory precedes public victory."</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card mt-4 card-warning wow zoomInUp animation-delay-7">
                  <div class="ms-hero-bg-warning ms-hero-img-city">
                    <img src="<?php print base_url('assets/landing/assets/img/demo/avatarkeller.jpg')?>" alt="..." class="img-avatar-circle"> </div>
                  <div class="card-block pt-6 text-center">
                    <h3 class="color-warning">Hellen Keller</h3>
                    <p>"The only thing worse than being blind is having sight but no vision."</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card mt-4 card-royal wow zoomInUp animation-delay-7">
                  <div class="ms-hero-bg-royal ms-hero-img-city">
                    <img src="<?php print base_url('assets/landing/assets/img/demo/avatarwilliam.jpg')?>" alt="..." class="img-avatar-circle"> </div>
                  <div class="card-block pt-6 text-center">
                    <h3 class="color-royal">William Shakespeare</h3>
                    <p> "Be not afraid of greatness. Some are born great, some achieve greatness, and others have greatness thrust upon them.".</p>
                   
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card mt-4 card-success wow zoomInUp animation-delay-7">
                  <div class="ms-hero-bg-success ms-hero-img-city">
                    <img src="<?php print base_url('assets/landing/assets/img/demo/avatarjim1.jpg')?>" alt="..." class="img-avatar-circle"> </div>
                  <div class="card-block pt-6 text-center">
                    <h3 class="color-success">Jim Rohn</h3>
                    <p>“If you are not financially independent by the time you are forty or fifty, it doesn’t mean that you are living in
					the wrong country or at the wrong time. It simply means that you have the wrong plan.”</p>
                   
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card mt-4 card-primary wow zoomInUp animation-delay-7">
                  <div class="ms-hero-bg-primary ms-hero-img-city">
                    <img src="<?php print base_url('assets/landing/assets/img/demo/avatarjim1.jpg')?>" alt="..." class="img-avatar-circle"> </div>
                  <div class="card-block pt-6 text-center">
                    <h3 class="color-primary">Jim Rohn</h3>
                    <p>“Learning is the beginning of wealth. Learning is the beginning of health. Learning
					is the beginning of spirituality. Searching and learning is where the miracle process all begins.”
                      
                           </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="mt-6">

            <!-- ms-site-container -->
            <div class="ms-slidebar sb-slidebar sb-left sb-momentum-scrolling sb-style-overlay">
                <header class="ms-slidebar-header">
                    <div class="ms-slidebar-login">
                        <a href="javascript:void(0)" class="withripple">
                            <i class="zmdi zmdi-account"></i> Login</a>
                        <a href="javascript:void(0)" class="withripple">
                            <i class="zmdi zmdi-account-add"></i> Register</a>
                    </div>
                    <div class="ms-slidebar-title">
                        <form class="search-form">
                            <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
                            <label for="search-box-slidebar">
                                <i class="zmdi zmdi-search"></i>
                            </label>
                        </form>
                        <div class="ms-slidebar-t">
                            <span class="ms-logo ms-logo-sm">ST</span>
                            <h3>Souktrain
                                <span>Millionaire</span>
                            </h3>
                        </div>
                    </div>
                </header>
                <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
                    <li>
                        <a data-scroll class="link" href="#home">
                            <i class="zmdi zmdi-home"></i> Home</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#ideals">
                            <i class="zmdi zmdi-flight-takeoff"></i> Ideals</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#products">
                            <i class="zmdi zmdi-desktop-mac"></i> Products</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#plans">
                            <i class="zmdi zmdi-money-box"></i> Plans</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#about">
                            <i class="zmdi zmdi-info-outline"></i> About Us</a>
                    </li>
                    <li>
                        <a data-scroll class="link" href="#quotes">
                            <i class="zmdi zmdi-accounts"></i> Ouotes</a>
                    </li>

                    <li>
                        <a data-scroll class="link" href="<?php print base_url('home/info');?>">
                            <i class="zmdi zmdi-email"></i> More Info</a>
                    </li>

                </ul>

        </section>
        <footer class="ms-footer">
          <div class="container">
            <p>Copyright &copy;DiamondWeb <?php echo date('Y')?></p>
          </div>
        </footer>
        <div class="btn-back-top">
          <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
            <i class="zmdi zmdi-long-arrow-up"></i>
          </a>
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
    <script src="<?php print base_url('assets/landing/assets/js/lead.js')?>"></script>
  </body>

<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/home-landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:29:42 GMT -->
</html>