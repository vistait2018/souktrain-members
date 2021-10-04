<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-lg-6">
                <h1 class="page-header">
                   Customer Verification
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

                        <p ></p>
                        <div class="pull-left box" >
                              <?php
                              echo form_open();?>
                            <?php if(isset($message) and !empty($message)){
                                echo $message ;
                            }?>
                            
                            <label>Enter Your Souktrain ID </label>
                            <?php echo'<div class="text text-danger">'. form_error('my_id').'</div>'; ?>
                            <input type="text" name="my_id" />
                            <button class="btn btn-sm btn-info" type="submit" >Search</button>
                            <?php
                            echo form_close();
                            ?>
                            <hr class="well-sm">
                        </div>
                  <?php if(@$_POST['my_id']) {                      
                   var_dump($profile);
                   var_dump($product);
                   echo $product['user_account_type_id'].' jhkukiloop';
                            echo'  <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>';

                                  if (isset($profile) and !empty($profile) ) {
                                      
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
                                    
                                    echo'<tr><th> Address</th>';
                                    echo'<td>'. $profile->address.'</td>
                                   </tr>';
                                   
                                    echo'<tr><th> Mother\'s maiden name</th>';
                                    echo'<td>'. $profile->maiden.'</td>
                                   </tr>';
                                    echo'<tr><th> Secret</th>';
                                    echo'<td>'. $profile->secret.'</td>
                                   </tr>';

                                }
                               ?>
                                </tbody>
                            </table>
       
                        </div>

                  <?php }
                  else echo'<br><br><br><br><div class="alert alert-info">No records availabe</div>';?>

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


<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php print base_url('assets/js/jquery.js') ;?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url('assets/js/bootstrap.min.js') ;?>"></script>
<!-- START PLUGINS -->

<script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js') ;?>"></script>



<script src="<?php echo base_url()?>assets/js/alert.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    $(function(){
        $('.datatable').DataTable()
    });
</script>
<!-- END PLUGINS -->

</body>

</html>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

