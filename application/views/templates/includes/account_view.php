<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Account Details</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-7">
                <div class="panel panel-suceess">
                    <div class="panel-heading">
                    </div>


                    <div class="panel-body">
                        <?php
                        if (!isset($account))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            //var_dump($profile);
                            echo'<div class=" alert alert-success center">My Acount Record .</div>';
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>

                                <?php
                                if (isset($account)) {
                                    echo'<tr><th> Account Name</th>';
                                    echo'<td>'. $account->account_name.'</td>
                                   </tr>';
                                    echo'<tr><th> Account Number</th>';
                                    echo'<td>'. $account->account_no.'</td>
                                   </tr>';
                                    echo'<tr><th> Type</th>';
                                    echo'<td>'. $account->acc_type.'</td>
                                   </tr>';
                                    echo'<tr><th>Phone No</th>';
                                    echo'<td>'. $account->phone_no.'</td>
                                   </tr>';
                                    echo'<tr><th> Bank</th>';
                                    echo'<td>'. $account->bank.'</td>
                                   </tr>';
                                    echo'<tr><th> Branch</th>';
                                    echo'<td>'. $account->bank_branch.'</td>
                                   </tr>';
                                    
                                }
                                ?>
                                </tbody>
                            </table>


                            <a href="<?php echo base_url('index.php/profile/account');?>"> <button btn btn-default>Go to Account</button> </a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url('index.php/profile/edit_account/').$_SESSION['user_id'] ;?>"><button btn btn-default>Edit Account</button></a>
                        </div>

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
