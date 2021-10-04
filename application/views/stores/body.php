<style>
    .panelheight {
        height: 200px;
    }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php print base_url('assets/js/plugins/nestable/jquery.nestable.css') ?>" rel="stylesheet">


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |
                    <small> My Subscribtions</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12 col-md-12">

                    <?php if($plans){ ?>
                    <div id="plan-tabs">
                        <ul>
                            <?php foreach ($plans as $i => $plan): ?>
                            <li><a href="#tabs-<?php print $i ?>"><?php print @$plan['plan']['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php foreach ($plans as $i => $plan): ?>
                        <div id="tabs-<?php print $i ?>">
                            <?php
                            if(!empty($downlines)) {
                                print '<div class="downline-tree custom-dd-empty dd dd-nodrag" id="">';
                                print display_downline($downlines[$i]);
                                print '</div>';
                            }else{
                                print '<div class="alert alert-info">You have no down lines</div>';
                            }

                            ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php }else{
                        print '<div class="alert alert-info">You have not subscribed to any plan</div>';
                    }?>




            </div>

            <p>&nbsp;</p><br><br>
            <div class="col-md-4 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-xs-3">
                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" ></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="medium">Subscribe</div>
                                <div>Upgrade Plan</div>
                            </div>                        </div>
                    </div>
                    <a href="<?php echo base_url() ?>index.php/profile/upgrade">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


                    <div class="col-md-4 ">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-google-wallet  fa-2x " aria-hidden="true""></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="medium"> Balance: &#8358; <?php print number_format(@$wallet['balance'], 2); ?></div>
                                <div>Wallet</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() ?>index.php/profile/wallet">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
                    </div>
                        <div class="col-md-4 ">
                <div class="panel panel-yellow ">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa  fa-briefcase fa-2x" aria-hidden="true" ></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="medium"><?php print count($account)?></div>
                                <?php if(count($account)< 1)   {?>
                                <div>Transaction</div>
                                <?php }else{
                                   print'<div>Transactions</div>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() ?>index.php/profile/my_accounts">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <div class="panel-footer">
            <div class="footer" style="height: 15px"><p class="pull-right">Powered By <a href="#">NetronIT
                        &copy<?php echo date('Y'); ?></p></div>
        </div>


        <!-- /.row -->


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

<!-- jQuery -->
<script src="<?php print base_url('assets/js/jquery.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url('assets/js/bootstrap.min.js'); ?>"></script>
<!-- START PLUGINS -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js'); ?>"></script>


<!-- Morris Charts JavaScript -->
<!--<script src="<?php /*print base_url('assets/js/plugins/morris/raphael.min.js') ;*/ ?>"></script>
<script src="<?php /*print base_url('assets/js/plugins/morris/morris.min.js') ;*/ ?>"></script>
<script src="<?php /*print base_url('assets/js/plugins/morris/morris-data.js') ;*/ ?>"></script>-->

<script src="<?php print base_url('assets/js/plugins/nestable/jquery.nestable.js'); ?>"></script>
<script>
    $(function () {
        $( "#plan-tabs" ).tabs();
        $('.downline-tree').nestable();
    })
</script>
<!-- END PLUGINS -->

</body>

</html>
