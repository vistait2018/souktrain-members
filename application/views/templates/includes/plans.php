<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Plan</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-6">
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Plan ID</th>
                                    <th>Plan Name</th>
                                    <th>Plan Level</th>
                                    <th>Plan Value</th>
                                    <th>Action</th>
                                   
                                </tr>
                                </thead>
                                <tbody>


                                    <?php
                                   // var_dump($plan);

                                    if (isset($plan)) {
                                        foreach ($plan as $i => $plans) {
                                            echo '<tr>';

                                            echo '<td>' . $plans->id . '</td>';
                                            echo '<td>' . $plans->name . '</td>';
                                            echo '<td>' . $plans->order . '</td>';
                                          
                                         echo '<td>' .$plans->price . '</td>';
                                        
                                          
                                            echo '<td><a href="'. base_url('index.php/plans/viewplans/').$plans->id.'"><button class="btn btn-primary btn-sm">View Plan</button></a></td>';
                                           

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
