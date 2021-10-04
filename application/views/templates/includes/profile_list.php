<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Profile</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-6">

                <div class="panel panel-suceess">
                    <div class="panel-heading">
                       <h3 class="text text-center">Profile Information</h3>
                    </div>
                    <?php if(!isset($sc) or empty($sc)){
                        echo'<a  href="'. base_url('index.php/profile/service_center_registration').'" class="btn btn-success pull-right">Register as Service Center. </a>';
                    } ?><br><br>

                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table  table-hover ">
                                <tbody>

                                <?php
                                if (isset($profile)) {

                                    echo'<tr><th> Last Name</th>';
                                    echo'<td>'. $profile->last_name.'</td>
                                   </tr>';
                                    echo'<tr><th> First Name</th>';
                                    echo'<td>'. $profile->first_name.'</td>
                                   </tr>';
                                    echo'<tr><th> Gender</th>';
                                    echo'<td>'. $profile->gender.'</td>
                                   </tr>';
                                    echo'<tr><th>Phone No</th>';
                                    echo'<td>'. $profile->phone_no.'</td>
                                   </tr>';
                                    echo'<tr><th> My ID</th>';
                                    echo'<td>'. $profile->my_id.'</td>
                                   </tr>';
                                    echo'<tr><th> Date registered</th>';
                                    echo'<td>'. $profile->created_at.'</td>
                                   </tr>';
                                    echo'<tr><th> Edited Last</th>';
                                    echo'<td>'. $profile->updated_at.'</td>
                                   </tr>';



                                }
                                ?>
                                </tbody>
                            </table>


                            &nbsp;
                            <a href="<?php echo base_url('index.php/profile/edit_profile/').$profile->user_id ;?>"><button class="btn btn-primary ">Edit Profile Information</button></a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-suceess">
                    <div class="panel-heading">
                        <h3 class="text text-center">Profile update Information</h3>
                    </div>


                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table  table-hover ">
                                <tbody>

                                <?php
                                if (isset($profile_update)) {
                                    echo'<tr><th> </th>';
                                    echo'<td><img class="img-rounded" src="'.base_url('/assets/uploads/passport/'). $profile_update->picture_url.'" width="150px" height="150ps"></td>
                                   </tr>';
                                    echo'<tr><th> Date registered</th>';
                                    echo'<td>'.  $profile_update->created_at.'</td>
                                   </tr>';
                                    echo'<tr><th> Edited Last</th>';
                                    echo'<td>'.  $profile_update->updated_at.'</td>
                                   </tr>';
                                    echo'<tr><th> Address</th>';
                                    echo'<td>'.  $profile_update->address.'</td>
                                   </tr>';
                                    echo'<tr><th> Date of birth</th>';
                                    echo'<td>'.  $profile_update->dob.'</td>
                                   </tr>';
                                    echo'<tr><th> Mothers\' Maiden Name</th>';
                                    echo'<td>'.  $profile_update->maiden.'</td>
                                   </tr>';
                                    echo'<tr><th> Secret</th>';
                                    echo'<td>'.  $profile_update->secret.'</td>
                                   </tr>';
                                    echo'<tr><th> </th>';
                                    echo'<td> <a href="'. base_url('index.php/profile/edit_profile_update/').$profile->user_id .'"><button class="btn btn-primary ">Edit Profile Update Information</button></a></td>
                                   </tr>';

                                }else{
                                    echo'<div class="alert alert-info">Update your profile</div>';
                                }

                                ?>
                                </tbody>
                            </table>


                            &nbsp;&nbsp;&nbsp;

                        </div>

                    </div>

                </div>
            </div>

        </div>
        <div class="panel-footer">
            <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">DiamondWeb &copy<?php echo date('Y');?></p></div>
        </div>
        <!-- /.row -->


    </div>
</div>
<!-- /.row -->



<!-- jQuery -->
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
