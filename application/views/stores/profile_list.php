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
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <?php
                        if (!isset($profile))  {

                          echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                           // var_dump($profile);
                            echo'<div class=" alert alert-success center">My Store Profile Record .</div>';
                        }
                           ?>


                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                      <th>S/N</th>
                                      <th>Products</th>
                                    <th>Store Name</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>About Us</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                     <th>Action</th>
                                    <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       <tr>


                                            <?php
                                            $i = 1;
                                            if (isset($profile)) {
                                                echo'<td>'.  $i.'</td>';
                                                echo'<td><img src="'.$profile->image_url.'"/></td>';
                                                echo'<td>'. $profile->name.'</td>';
                                                echo'<td>'. $profile->address.'</td>';
                                                echo'<td>'. $profile->country.'</td>';
                                                echo'<td>'. $profile->about.'</td>';
                                                echo'<td>'. $profile->email.'</td>';
                                                echo'<td>'. $profile->phone_no.'</td>';
                                                
                                                echo'<td><a href="'.  base_url('index.php/Stores_profile_account/view_profile/').$profile->store_user_id .'"><button>View</button></a></td>';
                                                echo'<td><a href="'.  base_url('index.php/Stores_profile_account/edit_profile/').$profile->store_user_id .'"><button>Edit</button></a></td>';
                                            }
                                            ?>

                                        </tr>

                                        </tbody>
                                    </table>


                    </div>
                </div>
                    <div class="panel-footer">
                        <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
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
