<div id="page-wrapper">




    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Plans</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-4  col-lg-offset-2">
                <div ><a href="<?php echo base_url('index.php/profile/profile/').$_SESSION['profile_id'] ?>" ><button class="btn btn-success">Profile</button></a><br></div>
                <br>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php
                        if (!isset($_SESSION['profile_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            // var_dump($profile);
                            echo'<div class=" alert alert-success center">Plans| creation .</div>';
                        }
                        ?>
                    </div>

                    <div class="panel-body">
                        <?php
                        echo form_open('Plans/ createplans/'.@$Plan_id)
                        ?>
                        <div class="text text-danger">
                            <?php echo validation_errors(); ?>
                            <?php if(isset($message)) echo $message;?>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Plan Name</td>
                                <td>
                                    <input type="text" class="form-control" name="name" value="<?php echo set_value('name' ); ?>" >

                                </td>
                            <tr>
                                <td>Plan Level</td>
                                <td><select class="form-control" name="order">

                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>

                                    </select></td>
                            </tr>
                            <tr>
                                <td>Value</td>
                                <td><input type="text" class="form-control" name="price" value="<?php echo set_value('price' ); ?>"  >
                                </td>
                            </tr>

                            <tr>
                                <td>First Generation</td>
                                <td><input type="text" class="form-control" name="gen1" value="<?php echo set_value('gen1' ); ?>"   >
                                </td>
                            </tr>
                            <tr>
                                <td>Scond Generation</td>
                                <td><input type="text" class="form-control" name="gen2" value="<?php echo set_value('gen2' ); ?>"   >
                                </td>
                            </tr>
                            <tr>
                                <td>Third Generation</td>
                                <td><input type="text" class="form-control" name="gen3" value="<?php echo set_value('gen3' ); ?>"  >
                                </td>
                            </tr>
                            <tr>
                                <td>Fourth Generation</td>
                                <td><input type="text" class="form-control" name="gen4" value="<?php echo set_value('gen4' ); ?>"   >
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <input type="hidden" class="form-control" name="id" value="<?php echo set_value('id' )?>">

                        <button type="submit" class="btn btn-success" >Save Plans information</button>
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
