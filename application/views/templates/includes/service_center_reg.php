<div id="page-wrapper">
    <?php include 'countries.php';
    $country = country();
    //var_dump($profile);
    ?>



    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Account registration</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-4  col-lg-offset-2">
                <div ><a href="<?php echo base_url('index.php/profile/service_center') ?>" ><button class="btn btn-success">Service Center</button></a><br></div>
                <br>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            // var_dump($profile);
                            echo'<div class=" alert alert-success center">Service Center | registration .</div>';
                        }
                        ?>
                    </div>

                    <div class="panel-body">
                        <?php echo form_open('profile/service_center_registration/'.$_SESSION['user_id']);?>
                        <div class="text text-danger">
                            <?php echo validation_errors(); ?>
                            <?php if(@isset($message)) echo $message;?>
                        </div>
                        <table class="table table-bordered">
                            <tbody>

                            <td>Center Name</td>
                            <td>
                                <input type="text" size="150" class="form-control" name="name" value="<?php echo set_value('name' ); ?>"  >

                            </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" class="form-control" name="address" value="<?php echo set_value('address' ); ?>"  >
                                </td>
                            </tr>
                            </tr>

                            <td>Country</td>
                            <td><select class="form-control" name="country">
                                    <option value="Nigeria">Nigeria</option>
                                    <?php
                                    foreach ($country as  $value){?>
                                        <option value="<?php echo $value ;?>" ><?php echo $value ;?> </option>

                                    <?php }

                                    ?>

                                </select></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td><input type="text" class="form-control" name="telephone" value="<?php echo set_value('phone_no' ); ?>" placeholder="08067815342"  >
                                </td>

                            </tbody>
                        </table>



                        <button type="submit" class="btn btn-success" >Save center information</button>
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

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
!-- jQuery -->
<script src="<?php print base_url('assets/js/jquery.js') ;?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url('assets/js/bootstrap.min.js') ;?>"></script>
<!-- START PLUGINS -->

<script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js') ;?>"></script>


<!-- Morris Charts JavaScript -->
<script src="<?php print base_url('assets/js/plugins/morris/raphael.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris-data.js') ;?>"></script>
<script src="<?php echo base_url()?>assets/js/alert.js"></script>

<!-- END PLUGINS -->

</body>

</html>
