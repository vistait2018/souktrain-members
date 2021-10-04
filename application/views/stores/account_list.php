<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small>Bank Account Details</small>
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
                            echo'<div class=" alert alert-success center">My Account Record .</div>';
                        }
                        ?>

                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>Account Name</th>
                                    <th>Account No</th>
                                    <th>account type</th>
                                    <th>Phone No</th>
                                    <th>Bank</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>


                                    <?php
                                    $i = 1;
                                    if (isset($account)) {

                                        echo'<td>'. $account->account_name.'</td>';
                                        echo'<td>'. $account->account_no.'</td>';
                                        echo'<td>'. $account->acc_type.'</td>';
                                        echo'<td>'. $account->phone_no.'</td>';
                                        echo'<td>'. $account->bank.'</td>';
                                        echo'<td>'. $account->country.'</td>';
                                       

                                        echo'<td><a href="'.  base_url('index.php/profile/account_view/').$_SESSION['user_id'] .'"><button>View</button></a></td>';
                                        echo'<td><a href="'.  base_url('index.php/profile/edit_account/').$_SESSION['user_id'] .'"><button>Edit</button></a></td>';
                                    }
                                    ?>

                                </tr>

                                </tbody>
                            </table>
                         <?php if(!isset($account) or empty($account)){
                                 echo'<a  href="'. base_url('index.php/profile/account_registration').'" class="btn btn-primary">Register your Bank Account Details </a>';
                         } ?>
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
 <script src="<?php echo base_url()?>assets/js/alert.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php print base_url('assets/js/plugins/morris/raphael.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris-data.js') ;?>"></script>


<!-- END PLUGINS -->

</body>

</html>
