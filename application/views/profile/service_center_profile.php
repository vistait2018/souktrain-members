<div id="page-wrapper">
    <?php  $sc = $this->Profile_model->service_centerByUserId($_SESSION['user_id']);
    //var_dump($profiles);?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Service -Center Profiles</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">


                        <?php
                        if (!isset($profiles))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            //var_dump($sc);
                            echo'<div class=" alert alert-success center">My Profile Record .</div>';
                        }
                        ?>
                        <?php 
                        if ($sc->status === '1'){?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Gender</th>
                                    <th>Phone No</th>
                                   
                                    <th>Email</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>




                                <?php
                                    if (isset($profiles)) {
                                      $i = 0;   
                                    foreach ($profiles as $profiles=>$profile) {
                                       $i++;
                                           echo'<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td>' . $profile->last_name . '</td>';
                                            echo '<td>' . $profile->first_name . '</td>';
                                            echo '<td>' . $profile->gender . '</td>';
                                            echo '<td>' . $profile->phone_no . '</td>';
                                            
                                            echo '<td>' . $profile->email . '</td>';
                                            echo '<td><a href="'. base_url().'index.php/profile/members_service_center/'.$profile->user_id . '"><button class="btn btn-primary btn-sm">View</button></a></td>';

                                            echo'</tr>';
                                            
                                    }
                                    }else{
                                        echo'<div class="alert alert-info">Nobody is registerred under this service center.</div>';
                                    }

                                }else{
                                    echo'<div class="alert alert-danger">The service center has not been approved!!</div>';
                                }
                                    ?>



                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">DiamondWeb &copy<?php echo date('Y');?></p></div>
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
