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
          
                    
              
            
             <div class="col-lg-4">
                <div class="panel panel-suceess">
                    <div class="panel-heading">
                    </div>


                    <div class="panel-body">
                        <?php
                        if (!isset($plan))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            //var_dump($plan);
                            echo'<div class=" alert alert-success center">'.$plan->name.' Plans.</div>';
                        }
                        ?>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>

                                <?php
                                if (isset($plan)) {
                                    echo'<tr><th> Plan ID</th>';
                                    echo'<td>'. $plan->id.'</td>
                                   </tr>';
                                    echo'<tr><th> Plan Name</th>';
                                    echo'<td>'. $plan->name.'</td>
                                   </tr>';
                                    echo'<tr><th> Plan Level</th>';
                                    echo'<td>'.  $plan->order.'</td>
                                   </tr>';
                                    echo'<tr><th>Plan Value</th>';
                                    echo'<td>'. $plan->price.'</td>
                                   </tr>';
                                   
                                }
                                ?>
                                </tbody>
                            </table>


                            <a href="<?php echo base_url('index.php/plans');?>"> <button class="btn btn-primary btn-sm" >Go to Plans</button> </a>&nbsp;&nbsp;&nbsp;
                            
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
