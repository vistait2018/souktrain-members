<style>

    img {
        max-width: 100%;
        max-height: 100%;
    }
    .portrait {
        height: 80px;
        width: 30px;
    }

    .landscape {
        height: 30px;
        width: 80px;
    }

    .square {
        height: 75px;
        width: 75px;
    }



</style>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain |<small> Learning Resources</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-success">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <?php if (isset($message)){?>
                            <div class="alert alert-info"><?php echo $message?></div>
                        <?php }?>

                        <?php
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            // var_dump($profile);
                            echo'<div class=" alert alert-success center">Available Book Categories .</div>';
                        }
                        ?>


                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>Category Cover</th>
                                    <th>Category Name</th>
                                      <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>


                                <?php


                                if (isset($album)) {
                                    foreach ($album as $i => $album) {
                                        echo '<tr>';

                                        ?>

                                       <td> <img src="<?php   echo  base_url().$album->cover_url; ?>" class="img-responsive square"></td>
                                       <?php echo '<td>' . $album->name. '</td>';


                                        echo '<td><a href="' . base_url('index.php/upload/book/') . $album->id . '"><button>View Books</button></a></td>';
                                     

                                        echo ' </tr>';
                                    }
                                } ?>



                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
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
