
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Personal dashboard</small>
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
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            // var_dump($profile);
                            echo'<div class=" alert alert-success center">Available Plans .</div>';
                        }
                        ?>

                           
                        <div class="table-responsive">
                            <table id="mytable" class="table  table-striped table-bordered table-hover" cellspacing="0" width="100%" table-hover">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Profile Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>My Id</th>
                                    <th>Referral id</th>
                                    <th>Provider</th>
                                    <th>created</th>
                                    <th>Modified</th>
                                    <th>view</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                    <?php
                                   // var_dump($profile);

                                    if (isset($profile)) {
                                       $no = 0;
                                       
                                        foreach ($profile as $i => $profile) {
                                             $no++;
                                            echo '<tr>';
                                               echo '<td>' . $no . '</td>';
                                            echo '<td>' . $profile['id']. '</td>';
                                            echo '<td>' . $profile['first_name'] . '</td>';
                                            echo '<td>' . $profile['last_name'] . '</td>';
                                            echo '<td>' . $profile['gender']. '</td>';
                                            echo '<td>' . $profile['email'] . '</td>';
                                            echo '<td>' . $profile['my_id'] . '</td>';
                                            echo '<td>' . $profile['referral_id'] . '</td>';
                                             echo '<td>' .$profile['oauth_provider'] . '</td>';
                                            echo '<td>' . $profile['created']. '</td>';
                                            echo '<td>' . $profile['modified'] . '</td>';
                                             echo'<td><a href="'.  base_url('index.php/profile/view_profile/').$profile['id'] .'"><button>View</button></a></td>';
                                                echo'<td><a href="'.  base_url('index.php/profile/edit_profile/').$profile['id'] .'"><button>Edit</button></a></td>';
                                            echo ' </tr>';
                                        }
                                    } ?>



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
<script type="text/javascript" src="<?php print base_url('assets/js/datatables.boostrap.min.js') ;?>"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/jquery,datatables.min.js') ;?>"></script>
<!-- Morris Charts JavaScript -->
<script src="<?php print base_url('assets/js/plugins/morris/raphael.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris-data.js') ;?>"></script>

 <script src="<?php echo base_url()?>assets/js/alert.js"></script>
<!-- END PLUGINS -->

</body>

</html>
