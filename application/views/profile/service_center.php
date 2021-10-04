<div id="page-wrapper">
<?php  $sc = $this->Profile_model->service_centerByUserId($_SESSION['user_id']);

$sc_income = $this->Profile_model->getServiceCenterIncome($sc->id);

$sc_history = $this->Profile_model->getServiceCenterIncomeHistory($sc->id);

?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain|<small>Service Center Details</small>
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
                             //var_dump($sc);
                            echo'<div class=" alert alert-success center">My Service Center Record .</div>';
                        }
                        if (isset($sc) and $sc->status === '1') {
                        ?>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>

                                <?php

                                echo '<tr><th>Centre Name</th>';
                                echo '<td>' . $sc->name . '</td>
                                   </tr>';
                                echo '<tr><th> Address</th>';
                                echo '<td>' . $sc->address . '</td>
                                   </tr>';
                                echo '<tr><th> Country</th>';
                                echo '<td>' . @$sc->country . '</td>
                                   </tr>';
                                echo '<tr><th>Telephone</th>';
                                echo '<td>' . @$sc->telephone . '</td>
                                   </tr>';
                                echo '<tr><th>Center Code</th>';
                                echo '<td>' . @$sc->code . '</td>
                                   </tr>';
                                echo '<tr><th> Date registered</th>';
                                echo '<td>' . @$sc->created_at . '</td>
                                   </tr>';
                                echo '<tr><th> Edited Last</th>';
                                echo '<td>' . @$sc->updated_at . '</td>
                                   </tr>';
                                ?>
                                </tbody>
                            </table>
                            <?php echo ' <a class="btn btn-success btn-lg" href="' . base_url('index.php/profile/edit_service_centre/') . $_SESSION['user_id'] . '">Edit</a>'; ?>

                        </div>

                        <?php ?>


                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>Service Center Income</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Modified</th>
                                    <th>Created</th>

                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                // var_dump($sc_income);

                                if (isset($sc_income) and !empty($sc_income)) {
                                    $no = 0;

                                    foreach ($sc_income as $i => $sc_income) {
                                        $no++;
                                        echo '<tr>';
                                        echo '<td>' . $no . '</td>';
                                        echo '<td>' . $sc_income ['amount'] . '</td>';
                                        echo '<td>' . $sc_income['description'] . '</td>';
                                        echo '<td>' . $sc_income['updated_at'] . '</td>';
                                        echo '<td>' . $sc_income['created_at'] . '</td>';
                                        echo ' </tr>';
                                    }
                                } else {
                                    print'<div class="alert alert-info text-center">No Records Available.</div>';
                                }

                                }else{
                            echo'<div class="alert alert-danger">Your Service Center has not been approved!</div>';
                        }?>



                        </tbody>
                        </table>


                    </div>
                </div>
            </div>

        </div>


        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>Service Center Income History</h3>
                    </div>
                    <div class="panel-body">

                            <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Modified</th>
                            <th>view</th>

                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        // var_dump($sc_history);

                        if (isset($sc_history ) and !empty($sc_history)) {
                            $no = 0;

                            foreach ($sc_history  as $i => $sc_history ) {
                                $no++;
                                echo '<tr>';
                                echo '<td>' . $no . '</td>';
                                echo '<td>' . $sc_history ['amount']. '</td>';
                                echo '<td>' . $sc_history['description'] . '</td>';
                                echo '<td>' . $sc_history['updated_at'] . '</td>';
                                echo '<td>' . $sc_history['created_at']. '</td>';
                                echo ' </tr>';
                            }
                        }else{
                            print'<div class="alert alert-info text-center">No Records Available.</div>';
                        } ?>



                        </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">DiamondWeb &copy<?php echo date('Y');?></p></div>
        </div>
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


<!-- END PLUGINS -->

</body>

</html>
