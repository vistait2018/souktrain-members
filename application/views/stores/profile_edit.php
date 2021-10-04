<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Edit Profile Details</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-5  col-lg-offset-2">
               <div > <a href="<?php echo base_url('index.php/profile/profile/').$_SESSION['user_id']?>"><button class="btn btn-success">Profile</button></a><br></div>
                <br>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                           
                        }
                        ?>
                    </div>

                    <div class="panel-body">
                         <?php echo form_open('profile/go_Edit_Profile/'.$_SESSION['user_id']);?>
                        <div class="text text-danger">
                            <?php echo validation_errors(); ?>
                            <?php if(isset($message)) echo $message ;?>
                             <?php if(isset($success)) echo $success ;?>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Last Name</td>
                                <td>
                                    <input type="text" class="form-control" name="last_name" value="<?php if (isset($profile)) echo $profile->last_name;?>"  >

                                </td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="form-control" name="first_name" value="<?php if (isset($profile)) echo $profile->first_name;?>"  >
                                    </td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><select class="form-control" name="gender">
                                        <option value="<?php if (isset($profile)) echo $profile->gender;?>"><?php if (isset($profile)) echo $profile->gender;?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select></td>
                            </tr>
                            
                            </tbody>
                        </table>



                      <button type="submit" class="btn btn-success" >Edit</button>
                        <?php echo form_close(); ?><br>

                    </div>

                    <div class="panel-footer">
                        <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
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

 <script src="<?php echo base_url()?>assets/js/alert.js"></script>
<!-- Morris Charts JavaScript -->
<script src="<?php print base_url('assets/js/plugins/morris/raphael.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris-data.js') ;?>"></script>


<!-- END PLUGINS -->

</body>

</html>
