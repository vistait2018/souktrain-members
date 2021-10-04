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
                    <code> <?php echo @$profile->first_name.' '.@$profile->last_name ;
                        echo  '  Sex: '.@$profile->gender ;
                        echo ' Phone No: '. @$profile->phone_no ;

                        ;?></code>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <a class="btn btn-primary pull-right" href="<?php  echo base_url('index.php/profile/profiles') ?>" > Back </a><br><br>
                <?php if($plans){  ?>
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
                                    print '<div class="alert alert-info">  No down lines!! </div>';
                                }

                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php }else{
                    print '<div class="alert alert-info">Not subscribed to any plan!!</div>';
                }?>




            </div>

            <p>&nbsp;</p><br><br>





            </div>
            <!-- /.row -->
        </div>
        <div class="panel-footer">
            <div class="footer" style="height: 15px"><p class="pull-right">Powered By <a href="#">DiamondWeb
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
