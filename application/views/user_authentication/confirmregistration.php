


<!DOCTYPE html>
<html lang="en">
    <head>
     

        <meta charset="utf-8" />
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    
        <style>
            ::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: white;
		margin: 0px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
            
            
            #container {
		margin: auto;
		border: 5px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
                 width: 20%;
      
                   border: 3px solid green;
                    padding: 10px;
                    background-color: #dffbe1;
	}


            .gap{
                margin-top:150px;
            }
            .center {
      margin-top: 100px;
     float: none;
     margin-left: auto;
     margin-right: auto;
     width: 350px;
       }

    .btn:hover{
        color:  #4800ff;
     background-color:  #d6ecec;
    }
    .footer{
       height: 30px;         
            }
    
           </style>
    <!-- Custom Fonts -->
    <!-- Custom Fonts -->
    <link href="<?php print base_url('assets/font-awesome/css/font-awesome.min.css') ;?>" rel="stylesheet" type="text/css">


        <title>Confirm Registration</title>
    </head>
   <body style="background-image: url('<?php print base_url('assets/pexels-photo-175328.jpeg') ?>');
       background-size: cover; background-repeat: no-repeat ">


 

      <div class="container">
  
            <div class="row ">
              <div class="col-md-3 center"> 
                  <div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<img src="<?php print base_url('assets/images/sk-logo.jpg'); ?>" width="20px" /> &nbsp;ST-Login
         
</h3>
</div>
<div class="panel-body">

                <?php  echo form_open();?>
    
                          <?php  if (isset($message)and !empty($message) ) echo '<div class="alert alert-danger">'.$message.'</div>'; ?>
                             <?php  if (isset($success)and !empty($success)) echo '<div class="alert alert-success">'.$success.'</div>'; ?>
                  <div>
                      <?php echo'<div class="text text-danger">'. form_error('username').'</div>'; ?>
                       <input type="text" class="form-control" name="username" placeholder="Enter UserName" autocomplete="off">
                   </div><br>
              <div>
                       <?php echo '<div class="text text-danger">'. form_error('password').'</div>'; ?>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password"   autocomplete="off" /><br>
                    </div>
              <div>
                  <a  href="<?php echo base_url('User_authentication/oauth')?>"><button name="reg" class="btn btn-default " type="button">Sign in</button></a>&nbsp;<button name="reg" class="btn btn-default " type="reset">Reset</button><br>

                 
               <!-- <a class="reset_pass" href="#">Lost your password?</a>-->
              </div>
                

                   <div class="clearfix"></div><br>

                  <p class="change_link">
                          <i class="fa fa-lock"> <a href="sendconfirmation" >forgot Password! </a></i>

                          <i class="fa fa-check pull-right"> &nbsp;<a href="register">Sign Up </a></i>
                  </p>

                      <?php echo form_close(); ?>
             
                </div>
                      <div class="panel-footer">
                         <div class="footer"> <p class="pull-right">Powered By<a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
                 </div>
                </div>
               </div>
              </div>
               


  
<!--column for login forms-->



        <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- alert JavaScript -->
  
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

