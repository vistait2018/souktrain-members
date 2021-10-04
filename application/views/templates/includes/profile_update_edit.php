<?php  @$profile = $this->Profile_model->profile_update_details($_SESSION['user_id']);
?>
<div id="page-wrapper">
    <?php include 'countries.php';
    $country = country();
    //var_dump($profile);
    ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">
                    Souktrain |<small> Profile Update Edit</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-5  col-lg-offset-2">
                <div ><a href="<?php echo base_url('index.php/profile/profile/').$_SESSION['user_id'] ?>" ><button class="btn btn-success">Profile</button></a><br></div>
                <br>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            // var_dump($profile);
                            echo'<div class=" alert alert-success center">Profile Update| Edit .</div>';
                        }
                        ?>
                    </div>

                    <div class="panel-body">
                        <?php echo form_open_multipart('profile/profile_update_edit/'.$_SESSION['user_id']);?>
                        <div class="text text-danger">
                            <?php echo validation_errors(); ?>
                            <?php if(@isset($message)) echo $message;?>
                            <?php if(@isset($error)) echo $error;?>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Address</td>
                                <td>
                                    <textarea rows="2" cols="50"class="form-control" name="address"  autocomplete="off" placeholder="Your Address" > <?php if (isset($profile)) echo $profile->address;?></textarea> <br>

                                </td>
                            </tr>

                            <tr>
                                <td>Date of Birth</td>
                                <td>
                                    <div class="bootstrap-iso">
                                        <div class="form-group ">


                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar">
                                                    </i>
                                                </div>
                                                <input class="form-control" id="date" name="dob"  value="<?php if (isset($profile)) echo $profile->dob;?>" placeholder="YYYY/MM/DD" type="text"/>
                                            </div>

                                        </div>
                                    </div>
                    </div>
                    </td>
                    </tr>
                    <tr>
                        <td>Passport Photo</td>
                        <td><img id="blah"  alt="your passport photo" width="50" height="50" /><br><br>

                            <input  type="file" name="picture_url"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </td>
                    </tr>
                    <tr>
                        <td>Mother's Maiden Name</td>
                        <td><input type="text" class="form-control" name="maiden" value="<?php if (isset($profile)) echo $profile->maiden;?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>Secret Word</td>
                        <td><input type="text" class="form-control" name="secret" value="<?php if (isset($profile)) echo $profile->secret;?>"   >
                        </td>
                    </tr>
                    </tbody>
                    </table>



                    <button type="submit" class="btn btn-success" >Save profile information</button>

                    <?php echo form_close(); ?><br>

                </div>

                <div class="panel-footer">
                    <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">DiamondWeb &copy<?php echo date('Y');?></p></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->


<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php print base_url('assets/js/jquery.js') ;?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url('assets/js/bootstrap.min.js') ;?>"></script>
<!-- START PLUGINS -->

<script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js') ;?>"></script>


<!-- Morris Charts JavaScript -->




<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/jquery.dateselect.js" charset="UTF-8"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="dob"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>



</html>
