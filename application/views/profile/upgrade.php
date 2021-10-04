<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Subscriptions - Upgrade
                </h1>

            </div>
        </div>
        <!-- /.row -->

	    <?php if ( isset( $message ) and ! empty( $message ) ) {
		    echo '<div class="alert alert-success">' . $message . '</div>';
	    } ?>
	    <?php if ( isset( $error ) and ! empty( $error ) ) {
		    echo '<div class="alert alert-danger">' . $error . '</div>';
	    } ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-success">
                    <!--<div class="panel-heading">
                        Current Plan
                    </div>-->
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Current Plan</div>
                                    <div class="panel-body">
                                        <?php print ( ! empty( $plan['current_plan'] ) ) ? '<h3>'.$plan['current_plan']['name'].'</h3>' : '<h5 class="text text-danger"> Oops !! You have no Subscription. Pls Subscribe</h5>' ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">Next Plan</div>
                                    <div class="panel-body">
                                        <?php print ( ! empty( $plan['new_plan'] ) ) ? '<h3>'.$plan['new_plan']->name.'</h3>' : '<h5 class="text text-danger">Great!. There are no new plans</h5>' ?>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php
						if ( !empty( $plan['new_plan'] ) ) {
							echo form_open(); ?>

                            Choose Account Type
							<?php echo '<div class="text text-danger">' . form_error( 'user_account_type_id' ) . '</div>';
							
							//var_dump($accounts);
							?>
                            <input type="hidden" name="plan_id" value="<?php print $plan['new_plan']->id ?>">

                            
                            
                            <div><select class="form-control" name="account_type_id">

                                    <option value="wallet">wallet</option>
									<?php foreach ( $accounts as $value ) {
										if ( $value['can_sub']=== 1  and $value['visibility'] === 1) {
											echo '<option value="' . $value['user_account_type_id'] . '">' . $value['name'] . ' Balance: &#8358;' . number_format($value['balance']) . '</option>';
										}
									} ?>
                                </select></div><br>
                            <button class="btn btn-sm btn-info" type="submit">Upgrade</button>
							<?php
							echo form_close();
						}
						?>
                        <hr class="well-sm">
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
<script src="<?php print base_url( 'assets/js/jquery.js' ); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url( 'assets/js/bootstrap.min.js' ); ?>"></script>
<!-- START PLUGINS -->

<script type="text/javascript" src="<?php print base_url( 'assets/js/plugins/jquery/jquery-ui.min.js' ); ?>"></script>


<script src="<?php echo base_url() ?>assets/js/alert.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
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

