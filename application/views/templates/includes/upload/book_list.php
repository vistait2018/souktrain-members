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
                    Souktrain |<small>Learning Resources</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-11">
                <div ><a href="<?php echo base_url('index.php/upload/category')?>" ><button class="btn btn-success">Categories</button></a><br><br></div>
                <div class="panel panel-success">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">

                        <?php
                        if (!isset($_SESSION['user_id']))  {

                            echo' <div class=" alert alert-danger"> This is not supposed to happen.</div>';

                        }else{
                            // var_dump($profile);
                            echo'<div class=" alert alert-success center">Available Books in '.@$albumname->name.' category</div>';
                        }
                        ?>


                        <div class="table-responsive">
                            <?php if (isset($message)){?>
                            <div class="alert alert-info"><?php echo $message?></div>
                            <?php }?>

                            <table class="table table-bordered table-hover" >
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Cover Image</th>
                                    <th>Book Title</th>
                                    <th>Book Author</th>
                                    <th>Book Caption</th>
                                    <th>ISBN</th>
                                    <th>Action</th>
                                    <th>download</th>

                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                ;// var_dump($book);
                                if (isset($book)) {

                                    foreach ($book as $i => $book) {
                                        $i =1;
                                        echo '<tr>';?>

                                       <td> <?php echo $i;?></td>
                                        <td><img  class ="square" src="<?php echo base_url(). $book->cover;?>"> </td>
                                        <td> <?php echo $book->title;?></td>
                                        <td> <?php echo $book->author;?></td>
                                        <td> <?php echo $book->caption;?></td>
                                        <?php echo '<td>' . $book->isbn. '</td>';
                                  
                                        echo '<td><a href="'. base_url('index.php/upload/viewBook/') . @$book->id .'/'.@$albumname->id. '"><button>View Book</button></a></td>';
                                         
                                        echo '<td><a href="'. base_url('index.php/upload/downloader/').$book->id.'/'.$book->title.'" target="_blank"><i class="fa fa-download fa-fw"></i></a></td>';

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
