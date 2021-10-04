<?php

/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/24/2017
 * Time: 12:22 PM
 */
class Registration_model extends CI_Model
{
   public  $message = '';

    function __construct() {
        parent::__construct();
    }


    function register($user_data, $profile_data)
    {
        $this->db->trans_start();
        $r1=  $this->db->insert('users', $user_data);
        $user_id =$this->db->insert_id();

        if ($r1) {
            $profile_data['user_id'] = $user_id;
            $r2 =  $this->db->insert('profiles', $profile_data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            return $this-> message = 'Registration sussessful!';
        }

    }
     function registerStore($user_data, $profile_data)
    {
        $this->db->trans_start();
        $r1=  $this->db->insert('accredited_stores_users', $user_data);
        $user_id =$this->db->insert_id();

        if ($r1) {
            $profile_data['store_user_id'] = $user_id;
            $r2 =  $this->db->insert('accredited_stores', $profile_data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return $this-> message = 'You were not register';
        } else {
            $this->db->trans_commit();
            return $this-> message = 'You have been registered|';
        }

    }

    public function oauth($email, $password){
              //echo $password;
        //$password =sha1($password);
        $q= $this->db->select('users.id ,users.password,users.email, profiles.first_name, profiles.picture_url ,profiles.oauth_provider')
            ->from('users')
            ->join('profiles', 'users.id = profiles.user_id', 'left')
            ->where(array('email'=>$email /*'password'=>  $password*/ ))
            -> limit(1)
            ->get();

        $row = $q->row();

        return $q->row();

    }

 public function oauthStore($email, $password){
              //echo $password;
        //$password =sha1($password);
        $q= $this->db->select('accredited_stores_users.password,'
                . 'accredited_stores_users.email, accredited_stores.name, accredited_stores.image_url ,'
                . 'accredited_stores.address,accredited_stores.phone_no,accredited_stores.id,accredited_stores.store_user_id')
            ->from('accredited_stores_users')
            ->join('accredited_stores', 'accredited_stores_users.id = accredited_stores.store_user_id', 'left')
            ->where(array('email'=>$email /*'password'=>  $password*/ ))
            -> limit(1)
            ->get();

        $row = $q->row();

        return $q->row();

    }
     public function get_remember_token_for_store($user_id){
        $this->db->select('allow_access');
        $this->db->from('accredited_stores_users');
        $this->db->where('id', $user_id);
        $r =  $this->db->get();
        $r =  $r->row();
        return $r;
    }
    public function profileByProfileId($profile_id)
    {
        $this -> db -> select('*');
        $this -> db -> from('profiles');
        $this -> db -> where('id', $profile_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->result();
    }

    
     public function oathByEmail($email)
     {
        $this -> db -> select('id');
        $this -> db -> from('users');
        $this -> db -> where('email', $email);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
     if($r->result())return true;
     else return false;
    }
    public function oathByEmailforStore($email)
     {
        $this -> db -> select('id');
        $this -> db -> from('accredited_stores_users');
        $this -> db -> where('email', $email);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
     if($r->result())return true;
     else return false;
    }
    
    
    
    public function loginInByProfileId($profile_id)
    {
        $this -> db -> select('status');
        $this -> db -> from('profiles');
        $this -> db -> where('id', $profile_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->result();
    }

    public function profileAndLoginDetail($profile_id){
        //$query = $this->db->query("SELECT oauth_id FROM users;");

        $q= $this->db->select('profiles.*,users.username')
            ->from('profiles')
            ->join('users', 'profiles.id = users.user_id', 'left join')
            ->where('profile_id',$profile_id)
            ->get();
        $rows =  $q->result_array();
        return $rows;

    }

    public function allProfiles()
    {
        $this->db->select('*');
        $this->db->from('profiles');
        $r      =  $this->db->get();
        $rows   =  $r->result_array();
        return $rows;
    }
    public function allService_Centres()
    {
        $this->db->select('*');
        $this->db->from('servic_centers');
        $r      =  $this->db->get();
        return $r? $r->result_array(): array();
    }
    
    public function get_remember_token($user_id){
        $this->db->select('remember_token');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $r =  $this->db->get();
        $r =  $r->row();
        return $r;
    }
       
     public function get_token($email){
        $this->db->select('token');
        $this->db->from('users');
         $this->db->where('email', $email);
        $r =  $this->db->get();
        $r =  $r->row();
         return $r;
    }
     public function get_tokenforStore($email){
        $this->db->select('token');
        $this->db->from('accredited_stores_users');
         $this->db->where('email', $email);
        $r =  $this->db->get();
        $r =  $r->row();
         return $r;
    }
    public function check_token($token){
        $this->db->select('token');
        $this->db->from('users');
         $this->db->where('token', $token);
        $r =  $this->db->get();
        $r =  $r->row();
         if($r){ return true;}
         else {return false;}
    }

    public function check_scc($scc){
      //var_dump($scc);

        $this->db->select('*');
        $this->db->from('servic_centers');
        $this->db->where('code', $scc);
        $r =  $this->db->get();


        if($r and $data = $r->row() ){
            //var_dump($r);
            return   $data->id; 

        }
        else {
           //print 'false';
            return false;
            
        }
    }
    public function confirm_token($token,$data){
        $this->db->trans_start();
        $this->db->select('id');
        $this->db->from('users');
         $this->db->where('token', $token);
        $r =  $this->db->get();
        $id =  $r->row()->id;
         $r->row();
         if($id){
             
             $this->db->where('id', $id);
        $this->db->update('users', $data);
        
          if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            return true;
        }
    }   
}

 public function confirm_tokenforStore($token,$data){
           $this->db->trans_start();
        $this->db->select('id');
        $this->db->from('accredited_stores_users');
         $this->db->where('token', $token);
        $r =  $this->db->get();
        $id =  $r->row()->id;
         $r->row();
         if($id){
             
             $this->db->where('id', $id);
        $this->db->update('accredited_stores_users', $data);
        
          if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            return true;
        }
    }   
}

 public function referral_IDByEmail($email)
 { 
     $this->db->select('id');
        $this->db->from('users');
         $this->db->where('email', $email);
        $r =  $this->db->get();
        $id =  $r->row()->id;
        if($id){
            $this->db->select('my_id');
        $this->db->from('profiles');
        $this->db->where('user_id', $id);
        $r =  $this->db->get();
        $my_id =  $r->row();
        return $my_id;
        }
     
 }
 public function confirmReferralId($my_id)
 { 
     $this->db->select('*');
        $this->db->from('profiles');
         $this->db->where('my_id', $my_id);
        $r =  $this->db->get();
       return $r->row()->my_id;
      
        }
     
 public function getUser_id_From_ReferralId($refferral_id)
 {    //var_dump($refferral_id);
     $this->db->select('*');
        $this->db->from('profiles');
         $this->db->where('my_id', $refferral_id);
        $r =  $this->db->get();
       return $r->row()->user_id;
      
        }
        
        
    
     
 
 
 
 
 
 
 }