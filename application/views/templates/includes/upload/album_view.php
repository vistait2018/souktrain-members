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
            <div class="col-lg-7">
                <div class="panel panel-suceess">
                    <div class="panel-heading">
                    </div>


                    <div class="panel-body">
                        <?php
                        if (!isset($album))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            //var_dump($plan);
                            echo'<div class=" alert alert-success center">'.$album->name.' Category.</div>';
                        }
                        ?>
                        <div class=" table-responsive ">
                            <table class="table table-bordered table-hover ">
                                <tbody>

                                <?php

                                if (isset($album)) {
                                    echo'<tr><th></th>';
                                    echo'<td><img src="'.  base_url().$album->cover_url.' " class="img-responsive square" ></td>
                                   </tr>';
                                    echo'<tr><th> Category ID</th>';
                                    echo'<td>'. $album->id.'</td>
                                   </tr>';
                                    echo'<tr><th> Category Name</th>';
                                    echo'<td>'. $album->name.'</td>
                                   </tr>';
                                     echo'<tr><th>Date Registered</th>';
                                    echo'<td>'. $album->created.'</td>
                                   </tr>';
                                    echo'<tr><th>Last Modified</th>';
                                    echo'<td>'.  $album->modified_at.'</td>
                                   </tr>';

                                }
                                ?>
                                </tbody>
                            </table>


                            <a href="<?php echo base_url('index.php/upload/category');?>"> <button class="btn btn-default" >Go to Category</button> </a>&nbsp;&nbsp;&nbsp;
                        
                            <a href="<?php echo base_url('index.php/upload/book/').$album->id ;?>"><button class="btn btn-default pull-right">View Books
                                in <?php echo $album->name.' category'?></button></a>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
                    </div>
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
