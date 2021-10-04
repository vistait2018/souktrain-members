<?php





if(!empty($authUrl)) {
//var_dump($_SESSION);
 
   echo'<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/fblogin-btn.png" alt="login button"/></a>';
     echo'<input type="hidden" value="$_SESSION" name="session">';
}else{
    
?>
<div class="wrapper">
    <h1>Facebook Profile Details </h1>
    <div class="welcome_txt">Welcome <b><?php echo $userData['first_name']; ?></b></div>
    <div class="fb_box">
        <p class="image"><img src="<?php echo $userData['picture_url']; ?>" alt="" /></p>
        <p><b>Facebook ID : </b><?php echo $userData['oauth_uid']; ?></p>
        <p><b>Name : </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
        <p><b>Email : </b><?php echo $userData['email']; ?></p>
        <p><b>Gender : </b><?php echo $userData['gender']; ?></p>
        <p><b>Locale : </b><?php echo $userData['locale']; ?></p>
        <p><a href="<?php echo $userData['profile_url']; ?>" target="_blank">Click to Visit Facebook Page</a></p>
        <p><b>You are login with : </b>Facebook</p>
        
        <p><b>Logout from <a href="<?php echo $logoutUrl; ?>">Facebook</a></b></p>
    </div>
</div>
<?php
}?>