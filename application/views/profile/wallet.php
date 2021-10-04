<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-lg-6">
                <h1 class="page-header">
                    My Wallet
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
                    <span class="pull-right">Balance: &#8358; <?php print number_format(@$wallet['balance'], 2); ?></span>
                        <p ></p>
                            <div class="pull-left box" >
                              <?php
                              echo form_open('profile/Fundwallet');?>
                               <?php if(isset($message) and !empty($message)){
                                   echo'<div class="alertt alert-success">'.$message.'</div>';
                               }?>
                                <?php if(isset($error) and !empty($error)){
                                    echo'<div class="alert alert-danger">'.$error.'</div>';
                                }?>
                               <label>Enter Pin </label>
                                <?php echo'<div class="text text-danger">'. form_error('pin').'</div>'; ?>
                             <input type="text" name="pin" />
                               <button class="btn btn-sm btn-info" type="submit" >Fund Wallet</button>
                        <?php
                              echo form_close();
                              ?>
                                 <hr class="well-sm">
                            </div>

                        <table class="table table-striped table-hover datatable">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>&#8358; Amount</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (@$histories as $i => $history) {?>
                                <tr>
                                    <th><?php print $i+1 ?></th>
                                    <td><?php print $history['created_at'] ?></td>
                                    <td>&#8358; <?php print number_format($history['amount'], 2) ?></td>
                                    <td><?php print $history['description'] ?></td>
                                </tr>
                            <?php }?>
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

