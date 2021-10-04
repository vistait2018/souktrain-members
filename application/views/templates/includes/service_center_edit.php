<?php include 'countries.php';
$country = country();
//var_dump($profile);
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Edit Service Center Detail</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-5  col-lg-offset-2">
                <div > <a href="<?php echo base_url('index.php/profile/service_center/')?>"><button class="btn btn-success">Service Center</button></a><br></div>
                <br>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                           //  var_dump($sc);
                            echo'<div class=" alert alert-success center">EDIT| Service Center Record .</div>';
                        }
                        ?>
                    </div>

                    <div class="panel-body">
                        <?php echo form_open();?>
                        <div class="text text-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php if(@isset($message)) echo $message;?>

                        <table class="table table-bordered">
                            <tbody>

                            <td>Center Name</td>
                            <td>
                                <input type="text" size="150" class="form-control" name="name" value="<?php if(isset($sc->name)) echo $sc->name ; ?>"  >

                            </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" class="form-control" name="address" value="<?php if(isset($sc->address)) echo $sc->address ; ?>"  >
                                </td>
                            </tr>
                            </tr>

                            <td>Country</td>
                            <td><select class="form-control" name="country">
                                    <option value="<?php echo @$sc->country;?>"><?php if(isset($sc->country)) echo @$sc->country ;?></option>
                                    <?php
                                    foreach ($country as  $value){?>
                                        <option value="<?php echo $value ;?>" ><?php echo $value ;?> </option>

                                    <?php }

                                    ?>

                                </select></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td><input type="text" class="form-control" name="telephone" value="<?php if(isset($sc->telephone)) echo @$sc->telephone ;?>" placeholder="08067815342"  >
                                </td>

                            </tbody>
                        </table>


                        <button type="submit" class="btn btn-success" >Edit</button>
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
<script src="<?php echo base_url()?>assets/js/alert.js"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js') ;?>"></script>


<!-- Morris Charts JavaScript -->
<script src="<?php print base_url('assets/js/plugins/morris/raphael.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris-data.js') ;?>"></script>


<!-- END PLUGINS -->

</body>

</html>
