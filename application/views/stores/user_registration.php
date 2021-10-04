<?php
/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/24/2017
 * Time: 11:45 AM
 */

?>
<script LANGUAGE="JavaScript">
<script type="text/javascript">
function checkButton(){

    if(document.form.agree.checked == false){
alert("Read Agreement Policy");
} 

}
</script>

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
            margin-top:50px;
        }
        .center {
            margin-top: 50px;
            float: none;
            margin-left: auto;
            margin-right: auto;
            width: 320px;
        }
        .fa-google{
            color : white ;
        }
        .fa-google:hover{
            color: whitesmoke;
        
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


    <title>ST-Store-Register</title>
</head>
<body>
 <?php include 'countries.php';
    $country = country();
    //var_dump($profile);
        ?>

<div class="container">

    <div class="row ">
        <div class="col-md-3 center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <img src="<?php print base_url('assets/images/sk-logo.jpg'); ?>" width="32px" /> &nbsp;ST-Store-Registration

                    </h3>
                </div>
                <div class="panel-body">
                        
                    <?php  echo form_open('');?>
                         <?php if( !isset($_POST['agree']) and  $_POST) $message = '<div class="/text text-danger"/>You must read the agreement policy.</div>';?>
                    <?php if (isset($message)) { ?>
                        <CENTER><h5><?php echo $message ?></h5></CENTER><br>
                    <?php } ?>
                        <table border="0" class="table-responsive">
                            
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group" >
                                    <?php echo '<div class="text text-danger">'. form_error('name').'</div>'; ?>  
                        <input type="text" class="form-control" name="name"
                               placeholder="Store Name"  value="<?php echo set_value('name')?>">
                    </div>
                                    
                                    </td>
                                    
                                </tr>
                       <tr>        
                                    <td colspan="2"> 
                                     <?php echo '<div class="text text-danger">'. form_error('address').'</div>'; ?>    
                                          <div class="form-group">  <input type="text" class="form-control" name="address" placeholder="Enter Address"
                                                   value="<?php echo set_value('address')?>"  >
                    </div>
                            </tr>
                             <tr>
                                 
                                <td><div class="form-group"><select class="form-control" name="country">
                                        <option value="Nigeria">Nigeria</option>
                                        <?php
                                        foreach ($country as  $value){?>
                                            <option value="<?php echo $value ;?>" ><?php echo $value ;?> </option>

                                        <?php }

                                        ?>

                                        </select></div></td>
                            </tr>
                            <tr>
                                    <td colspan="2"> 
                                        <?php echo '<div class="text text-danger">'. form_error('phone_no').'</div>'; ?>

                    <div class="form-group">

                        <input type="text" class="form-control" name="phone_no" placeholder="Enter Phone No(08068712345)" value="<?php echo set_value('phone_no')?>"  />
                    </div></td>
                                </tr>
                                <tr>
                                    
                    <td colspan="2"> <?php echo  '<div class="text text-danger">'. form_error('email').'</div>'; ?>

                    <div class="form-group">

                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo set_value('email')?>"  />
                    </div>

                        </td>    
                     </td>
                                </tr>
                                 <tr>
                                    <td colspan="2"><?php echo  '<div class="text text-danger">'.form_error('about'); ?>
                        <div>

                            <textarea rows="2" cols="50"class="form-control" name="about" value="<?php echo set_value('about')?>"  autocomplete="off" placeholder="About your Store" ></textarea> <br>
                    </div>
                 </td>               
                                </tr>
                                
                               
                                <tr>
                                    <td colspan="2"><?php echo '<div class="text text-danger">'. form_error('password').'</div>'; ?>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password"  autocomplete="off" /><br>
                    </div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo  '<div class="text text-danger">'.form_error('confirm_password'); ?>
                        <div>

                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"  autocomplete="off" /><br>
                    </div>
                 
                                </tr>
                                <tr>
                                    <td colspan="2">  <input class="pull-left" type="checkbox" name="agree" id="agree">&nbsp; <a href="<?php echo base_url()?>souktrain/souktrain.pdf" target="blank" class="to_register">Read Agreement </a >&nbsp;</td>
                                   
                                </tr>
                                 <tr>
                                    <td colspan="2"> <?php echo form_submit(array('id' => 'submit', 'value' => 'Register' ,'class' =>'btn btn-default','onClick'=>'return checkButton(this)')); ?>&nbsp;<button type="Reset" value ="Reset"  class="btn btn-default">Reset</button>
                                      <a  href="signin" class="to_register pull-right btn btn-default">Log in </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                      
  <?php echo form_close(); ?><br/></div>
             <div class="panel-footer">
                    <div class="footer"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
                </div>
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



