<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php print $account['name']; ?> | Histories
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
                        <a class="btn btn-sm btn-info" href="<?php print site_url("profile/my_accounts")?>">
                            <i class="fa fa-backward"></i> My Account</a>
                            <span class="pull-right">Balance: &#8358; <?php print number_format($account['balance'], 2); ?></span>
                            <p ></p>
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
                                <?php foreach ($histories as $i => $history) {?>
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

</div>
<!-- /#wrapper -->
!-- jQuery -->
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

