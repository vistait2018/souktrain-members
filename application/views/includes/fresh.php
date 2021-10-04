<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Souktrain
                            <small>Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="<?php print base_url('index.php/home/') ;?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> My Profile
                            </li>
                        </ol>
                    </div>

          <div class="content">
                     <table>
                         <tr>
                             <td>S/N</td>Firstname<td>LastName</td><td>Sex</td><td>Email</td><td>My ID</td>Referred By<td></td><td>Date Registered</td>
                         </tr>
                         <?php
                         if (issset())
                         ?>

                     </table>
          
          </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


    </div>
    <!-- /#wrapper -->
