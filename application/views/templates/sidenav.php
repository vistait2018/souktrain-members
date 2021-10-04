<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php
@$sc = $this->Profile_model->service_centerByUserId($_SESSION['user_id']);
//var_dump($sc);
?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                   Profile
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url()?>index.php/profile/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>index.php/profile/profile_update"><i class="fa fa-fw fa-upload"></i> Update Profile</a>
                    </li>

                    
                </ul>
            </li>
        <li>
            <a href="<?php echo base_url()?>index.php/profile/accounts"><i class="fa fa-product-hunt" aria-hidden="true""></i> My Account </a>
        </li>

        <li>
            <a href="<?php echo base_url()?>index.php/profile/account" ><i class="fa fa-book" aria-hidden="true"></i> Bank Account </a>
        </li>
         <li>
                        
          <li>
             <a href="<?php echo base_url()?>index.php/plans"><i class="fa fa-product-hunt" aria-hidden="true""></i> Available Plans </a>
             </li>
       <li>
            <a href="<?php echo base_url()?>index.php/profile/upgrade"><i class="fa fa-fw fa-arrow-up"></i> Subcribe/Upgrade</a>
        </li>
        
        <li>
            <a href="<?php echo base_url()?>index.php/profile/wallet"><i class="fa fa-google-wallet"></i> Wallet</a>
        </li>

        <?php if(isset($sc) or !empty($sc)){    ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                Service Centers
                <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo base_url()?>index.php/profile/service_center"><i class="fa  fa-align-center "></i> Service Centre</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/profile/profiles')?> "><i class="fa fa-fw fa-upload"></i> Registered Members</a>
                </li>


            </ul>
        </li>
        <?php }?>
        <li>
            <a href="<?php echo base_url()?>index.php/profile"><i class="fa fa-fw fa-home"></i> My dashoard</a>
        </li>

    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>