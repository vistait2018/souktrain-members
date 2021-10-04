<html>

<head>

        <meta charset="utf-8" />
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    
        <style>
            ::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: WhiteSmoke;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
            
            
            #container {
		margin: auto;
		border: 5px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
         width: 20%;
      // height: 500px;
        border: 3px solid green;
        padding: 10px;
        background-color: #dffbe1;
	}


            .gap{
                margin-top:150px;
            }
            .center {
      margin-top: 150px;
     float: none;
     margin-left: auto;
     margin-right: auto;
     width: 290px;
       }
           </style>
    <!-- Custom Fonts -->
    

        <title>Login</title>
    </head>
    <body>

<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>


                 
             
                   <div class="form-group">
                    
                     <input type="text" class="form-control" name="username" placeholder="UserName">
                </div>
  
                 <div>
                           <?php echo form_error('password'); ?>
                <input type="password" class="form-control" name="password" placeholder="Password"  autocomplete="off" /><br>
              </div>
              <div>
                 <a  href=""><button name="signin" class="btn btn-info " type="submit">Sign in</button></a>
                 <a  href="<?php print base_url('index.php/user/register') ; ?>"><button name="signin" class="btn btn-info " type="button">Sign in</button></a>
               <!-- <a class="reset_pass" href="#">Lost your password?</a>-->
              </div>
                

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                 <h1><img src="<?php print base_url('assets/images/sk-logo.jpg'); ?>" width="32px" />  ST-Login</h1>
                  <p>Powered By NetronIT</p>
                </div>
              </div>
               </form>
 <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- alert JavaScript -->
   <script src="<?php echo base_url()?>assets/js/alert.js"></script>
</body>
</html>