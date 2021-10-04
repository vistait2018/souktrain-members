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
                        if (!isset($book))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            //var_dump($plan);
                            echo'<div class=" alert alert-success center">Category|'.@$albumname->name.' Category.</div>';
                        }
                        ?>
                        <div class=" table-responsive ">
                            <table class="table table-bordered table-hover ">
                                <tbody>

                                <?php

                                if (isset($book)) {
                                    echo'<tr><th></th>';
                                    echo'<td><img src="'.base_url().'/assets/uploads/images/'.$book->cover_name.' " class="img-responsive square" ></td>
                                   </tr>';
                                    echo'<tr><th>Book Title</th>';
                                    echo'<td>'. @$book->title.'</td>
                                   </tr>';
                                    echo'<tr><th> Book Caption</th>';
                                    echo'<td>'. @$book->caption.'</td>
                                   </tr>';
                                    echo'<tr><th> Book Author</th>';
                                    echo'<td>'. @$book->author.'</td>
                                   </tr>';
                                    echo'<tr><th> Book ISBN</th>';
                                    echo'<td>'. @$book->isbn.'</td>
                                   </tr>';
                                    echo'<tr><th>Date Registered</th>';
                                    echo'<td>'. @$book->created.'</td>
                                   </tr>';
                                    echo'<tr><th>Last Modified</th>';
                                    echo'<td>'.  @$book->modified_at.'</td>
                                   </tr>';

                                }
                                ?>
                                </tbody>
                            </table>


                            <a href="<?php echo base_url('index.php/upload/book/').$albumname->id;?>"> <button class="btn btn-default" >View All Books</button> </a>&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url('index.php/upload/editcat/').@$book->id ;?>"><button class="btn btn-default">Edit Category</button></a>
                            <a href="<?php echo base_url('index.php/upload/category') ;?>"><button class="btn btn-default ">Book Category</button></a>
                            <a href="<?php echo base_url('index.php/upload/category') ;?>"><button class="btn btn-default pull-right">Read Book</button></a>

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
