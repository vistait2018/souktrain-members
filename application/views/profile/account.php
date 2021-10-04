
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-lg-6">
                <h1 class="page-header">
                    My Accounts
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
                        
                        if(is_numeric($this->input->post('amount')) && $this->input->post('amount')> 0 && 
                              $this->input->post('amount') == round($this->input->post('amount'),0)  ){
                             if($this->input->post('balance') < $this->config->item('minimum')){
                          echo'<div class="alert alert-danger">Sorry you do not have sufficient funds in your account.'
                       . 'your minimum balance should be <b> &#8358;1000</b>.You balance is &#8358;<b>'.$this->input->post('balance').'</b></div>'; 
                       return;
                          }
                  else if($this->input->post('balance') >$this->config->item('withdrawable')){
                
                        
                             if( $this->input->post('amount') <= ($this->input->post('balance') - $this->config->item('minimum')))
                            {
                               
                               echo'<div class="alert alert-info">Minium balance of &#8358;1000 will be deducted from your account.Your '
                              . 'balance is &#8358;<b>'.$this->input->post('balance').'</b></div>'; 
                                 $user_data= array('user_account_type_id' =>$this->input->post('user_account_type_id'),'user_id' =>$_SESSION['user_id'],
                            'amount' =>$this->input->post('amount'),'status' =>'pending','updated_at' => date("Y-m-d H:i:s"),'created_at' => date("Y-m-d H:i:s"));
                        $history_data= array('user_account_type_id' =>$this->input->post('user_account_type_id'),'user_id' =>$_SESSION['user_id'],
                            'amount' =>-($this->input->post('amount')),'description' =>'withdrawl request','updated_at' => date("Y-m-d H:i:s"),'created_at' => date("Y-m-d H:i:s"));
                        $this->load->model( 'Account_model' );
                        //$this->session->set_flashdata(array('user_data'  => $user_data,'history_data' => $history_data));
                        
                         $withdraw = $this->Account_model->withdraw($user_data,$history_data);
                        echo'<div class=" alert alert-info">'.$withdraw.'</div>';
                         //var_dump($user_data);
                                }else{
                                     echo'<div class="alert alert-danger">Insufficient funds!.Your minimum '
                                    . 'balance should be <b> &#8358;'.$this->config->item('minimum').'</b>.'
                                    . 'You balance is &#8358;<b> Your '
                              . 'balance is &#8358;<b>'.$this->input->post('balance').'.</b></div>'; 
                                     
                                }
                      
                          }
                        }else{
                            
                                     
                        }
    
                        ?>
                        <?php
                           //var_dump($accounts);
                        if($accounts){
                        ?>
                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Account Type</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($accounts as $sn => $account){
                            ?>
                                <tr>
                                    <td><?php print $sn+1 ?></td>
                                    <td><?php print $account['name'] ?></td>
                                    <td>&#8358; <?php print number_format($account['balance'] , 2)?></td>
                                    <td>
                                        <?php if(@$account['can_withdraw']){ ?>
                                        <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#account-withdraw<?php print $account['user_account_type_id'] ?>" >Withdraw</a>
	                                    <?php } ?>
                                        
                                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#account-hist_<?php print $account['user_account_type_id'] ?>">

                                            <i class="fa fa-folder"></i> View
                                        </a>
                                        <div class="modal fade" id="account-hist_<?php print $account['user_account_type_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-header" style="background: white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title"><?php print $account['name'] ?> Account</h4>
                                                </div>
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <?php if(@$account['history']){
                                                            @$histories = $account['history'];
                                                            ?>
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Amount</th>
                                                                        <th>Description</th>
                                                                        <th>Date</th>
                                                                    </tr>
                                                                </thead>
                                                            <?php
                                                            foreach ($histories as $x => $history) {
                                                            ?>
                                                                <thead>
                                                                <tr>
                                                                    <td><?php print $x+1  ?></td>
                                                                    <td>&#8358; <?php print number_format($history['amount'], 2)  ?></td>
                                                                    <td><?php print $history['description']  ?></td>
                                                                    <td><?php print $history['created_at']  ?></td>
                                                                </tr>
                                                            <?php
                                                            }

                                                            ?>

                                                            </table>
	                                                        <?php
                                                        } ?>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="account-withdraw<?php print $account['user_account_type_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-header" style="background: white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title"><?php print'Withdraw from '. $account['name'] ?> Account</h4>
                                                </div>
                                                <div class="modal-content">
                                                       
                                                    <div class="modal-body">
                                                       <?php 
                                                       
                                                     //  echo $this->config->item('withdrawable');
                                                       if($account['balance'] < $this->config->item('minimum')){
                                                          echo'<div class="alert alert-danger">Sorry you do not have sufficient funds in your account.'
                                                           . 'your minimum balance should be <b> &#8358;'.$this->config->item('minimum').'</b>.You balance is &#8358;<b>'.$account['balance'].'</b></div>'; 
                                                       }
                                                      else if($account['balance'] > $this->config->item('withdrawable')){
                                                          echo'<div class="alert alert-info">Minium balance of &#8358;1000 will be deducted from your account.Your '
                                                          . 'balance is &#8358;<b>'.$account['balance'].'</b> Amount must number, more than zero and whole!</div>'; 
                                                           
                                                          echo form_open();
                                                          echo'Amount<input class="form-control" type="text" name="amount" /><br>';
                                                         echo'<a href="#"><button type="submit" class="btn btn-info btn-xs"> Withdraw</button></a>';
                                                         echo'<input type="hidden" name="user_account_type_id" value="'.$account['user_account_type_id'].'"/>';
                                                          echo'<input type="hidden" name="balance" value="'.$account['balance'].'"/>';
                                                         
                                                         echo form_close();
                                                       }else if($account['balance'] < $this->config->item('withdrawable')){
                                                           echo'<div class="alert alert-danger">Sorry!!! You do not have sufficient funds in your account.'
                                                           . 'You must have above <b> &#8358;'.$this->config->item('withdrawable').'</b> to withdraw.You balance is &#8358;<b>'.$account['balance'].'</b>.</div>'; 
                                                       }
                                                        
                                                                                                            
                                                      ?>
                                                     
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php }
                        else{
                            print '<div class="div alert alert-success">Account not available</div>';
                        }
                        ?>
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
