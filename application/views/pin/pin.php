<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Check Pin Status</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                     Pin Details
                    </div>
                    <div class="panel-body">
                        <div class="text text-danger">
                            <?php echo validation_errors(); ?>
                            <?php if(isset($msg['error'])) echo $msg['error'];?>
                        </div>

                        Enter Pin:<br>
                        <?php

                      echo form_open('pin/check_Pin');
                      echo'<div><input class="form-control" type="text" required="true" name="pin"></input></div><br>';
                        echo'<button type="submit" class="btn btn-primary" >Check</button>';
                      echo  form_close();
                        //var_dump($msg);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>

                                <?php
                                if (!isset($msg['error'])) {
                                    echo '<tr><th> Pin Request for by</th>';
                                    echo '<td>' . $msg['name'] . '</td>
                                   </tr>';
                                    echo '<tr><th> Sex</th>';
                                    echo '<td>' . @$msg['Sex'] . '</td>
                                   </tr>';
                                    echo '<tr><th> Pin type</th>';
                                    echo '<td>' . @$msg['pin_name'] . '</td>
                                   </tr>';
                                    echo '<tr><th>Pin requested on</th>';
                                    echo '<td>' . @$msg['created_at'] . '</td>
                                   </tr>';
                                    echo '<tr><th> Pin approved on</th>';
                                    echo '<td>' . @$msg['updated_at'] . '</td>
                                   </tr>';

                                     echo '<tr><th> Pin info</th>';
                                    echo '<td>' . @$msg['info'] . '</td>
                                </tr>';
                                }
                                ?>

                                </tbody>
                            </table>


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
