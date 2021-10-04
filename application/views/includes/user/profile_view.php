<?php?>
/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/25/2017
 * Time: 9:58 AM
 */



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Admin Console
                    <small>Welcome</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>  <a href="<?php print base_url('index.php/home/') ;?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>

            <div class="content">

                <?php if(isset($ontent)) echo $content ?>
            </div>

            <!-- /.container-fluid -->

                <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
