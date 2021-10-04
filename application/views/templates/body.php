<style>
    .panelheight {
        height: 200px;
    }
    .my-title {
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        height: 20px;
        line-height: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        background-color: rgba(217, 83, 79, 0.8);
        color: #fff;
        border-radius: 4px 4px 0 0;
    }
    .my-content {
        box-sizing: border-box;
        width: 100%;
        height: 40px;
        font-size: 11px;
        line-height: 18px;
        border: 1px solid rgba(217, 83, 79, 0.8);
        border-radius: 0 0 4px 4px;
        text-align: center;
        background-color: #fff;
        color: #333;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php print base_url('assets/js/plugins/nestable/jquery.nestable.css') ?>" rel="stylesheet">
<link href="<?php print base_url('assets/jquery.orgchart/jquery.orgchart.css') ?>" rel="stylesheet">


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

                       <!-- $colors = array( 'green', 'coral', 'silver', 'brown', 'gold')-->

                <h4>Downlines</h4>
                <div id="main-tab">
                    <ul>
                        <li><a href="#plan-tabs-list">List View</a> </li>
                        <li><a href="#plan-tabs">Tree View</a> </li>
                    </ul>
                    <div id="plan-tabs-list" >
                        <ul>
                        <?php
                            foreach ($plans as $i => $plan){
                                print '<li><a href="#view'.$i.'">'.$plan['plan']['name'].'</a> </li>';
                            }
                        ?>
                        </ul>

	                    <?php
                        $color = array('green', 'coral', 'silver', 'lightbrown', 'gold');
	                    foreach ($plans as $i => $plan){
		                    print '<div id="view'.$i.'" class="downline-tree">'.display_downline($downlines[$i],$color[$i]).'</div>';
	                    }
	                    ?>

                    </div>
                    <div id="plan-tabs" >
                    </div>
                </div>


            </div>
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
                        &copy <?php echo date('Y'); ?> </p></div>
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
<script src="<?php print base_url('assets/jquery.orgchart/jquery.orgchart.js'); ?>"></script>


<script>
    var nodeTemplate = function(data) {
        return `
        <span class="office">${data.username} ID: ${data.id}</span>
        <div class="my-title">${data.profile.first_name} ${data.profile.last_name}</div>
        <div class="my-content">${data.email}</div>
      `;
    };


    var bd_colors = ['green', 'coral', 'silver', 'lightbrown', 'gold'];
    function do_downlines(data) {
        tab_plan = $( "#plan-tabs");

        for(var i in data){
            var plan  = data[i].plan;
            var tab_content = $('<div id="tabs-'+ i +'" style="overflow-x: scroll;"></div>');
            tab_plan.append(tab_content);

            var oc = tab_content.orgchart({
                'data' : '<?php print $this->config->item('api_url') ?>users/<?php print $user_id ?>/plan/'+plan.id+'/down-line2',
                'nodeTemplate': nodeTemplate
            });


        }

    }

    function do_tab_links(data) {
        tab_plan = $( "#plan-tabs" );

        var tab_links = $('<ul></ul>');

        for(var i in data){
            var plan  = data[i].plan;
            var tab_link = $('<li style="background: '+bd_colors[i]+'"><a href="#tabs-'+ i +'">'+ plan.name+'</a></li>')
            tab_links.append(tab_link);
        }
        tab_plan.append(tab_links);
    }

    $(function () {
        $( "#main-tab" ).tabs();
        $( "#plan-tabs-list" ).tabs();
        $('.downline-tree').nestable();
        $.ajax({
            //http://st-test.crysto.name.ng/_admin/public/index.php/api/
            url: '<?php print $this->config->item('api_url') ?>users/<?php print $user_id ?>/plan',
            method: 'get',

            success: function (response) {
                if(!response ){
                    $( "#plan-tabs" ).html('<span>You have not subscribed to any plan</span>')
                }
                else if(!response.data) {
                    $( "#plan-tabs" ).html('<span>You have not subscribed to any plan yet</span>')
                }
                else {
                    do_tab_links(response.data);
                    do_downlines(response.data)
                    $( "#plan-tabs" ).tabs();
                }
            },
            error: function (err) {

            }
        })
    })
</script>
<!-- END PLUGINS -->

</body>

</html>
