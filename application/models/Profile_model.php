<?php

/**
 * Created by PhpStorm.
 * User: Joshua Ndukwe
 * Date: 09/10/2015
 * Time: 16:30
 */
class Profile_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();


    }
    public function profileByProfileId($user_id){
        $this -> db -> select('*');
        $this -> db -> from('profiles');
        $this -> db -> where('user_id', $user_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function loginStatusInByProfileId($profileid){
        $this -> db -> select('status');
        $this -> db -> from('profiles');
        $this -> db -> where('id', $profileid);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function updateProfile($user_id,$data){
        // var_dump($data);
        $this->db->cache_off();
        $this->db->where('user_id', $user_id);
        $this->db->update('profiles', $data);
        $affectedRows = $this->db->affected_rows();
        return $affectedRows;
    }


    public function check_Oauth_Provider($user_id){
        $this -> db -> select('oauth_provider');
        $this -> db -> from('profiles');
        $this -> db -> where('user_id', $user_id);
                $this -> db -> limit(1);
        $r =  $this -> db -> get();

        return $r->row();
    }

    public function profileAndLoginDetail($user_id){

    $q= $this->db->select('profiles.*,users.email')
        ->from('profiles','users','profile_update')
        ->join('users', 'users.id = profiles.user_id', 'left join')
        ->where('users.id', $user_id)
        ->get();
    $rows =  $q->row() ;
    //var_dump($rows);
    return $rows;


}
    public function profile_update_details($user_id){

        $q= $this->db->select('*')
            ->from('profile_update')

            ->where('profile_update.user_id', $user_id)
            ->get();
        $rows =  $q->row() ;
        //var_dump($rows);
        return $rows;


    }
    public function profile_update_picture($user_id){

        $q= $this->db->select('picture_url')
            ->from('profile_update')

            ->where('profile_update.user_id', $user_id)
            ->get();
        $rows =  $q->row() ;
        //var_dump($rows);
        return $rows;


    }

    public function getReferral_ID($user_id){
        $q= $this->db->select('my_id')
            ->from('profiles')
              ->where('user_id', $user_id)
            ->get();
        $rows =  $q->row() ;
        return $rows;

    }

    public function profileAndLoginDetailBySc($sc_id){
        //echo $sc_id;
        $q= $this->db->select('profiles.*,users.email')
            ->from('profiles')
            ->join('users', 'users.id = profiles.user_id', 'left join')
            ->where('service_center_id', $sc_id)
            ->get();
        
        $query_result =  $q->result();
        return $query_result;

    }
    
    public function allProfiles(){

        $this -> db -> select('*');
        $this -> db -> from('users');
        $r =  $this -> db -> get();
         $query_result =  $r->result();
        return $query_result;

    }

    function registerAccount($user_id,$data){


            $r1 = $this->db->insert('account_info', $data);
             //$this -> db -> where('profile_id', $profileid);
            return $this->db->insert_id();

    }
     function registerProfile_update($user_id,$data){

             $r1 = $this->db->insert('profile_update', $data);
             //$this -> db -> where('profile_id', $profileid);
             if($r1)  return true ;
             else return  false;




    }
      function registerStoreAccount($data){


            $r1 = $this->db->insert('accredited_stores_account_details', $data);
             //$this -> db -> where('profile_id', $profileid);
            return $this->db->insert_id();

    }
    function registerService_Center($data){

        $r1 = $this->db->insert('servic_centers', $data);

        return $this->db->insert_id();

    }
    public function accountByProfileId($profileid){
        $this -> db -> select('*');
        $this -> db -> from('account_info');
        $this -> db -> where('user_id', $profileid);
        $this -> db -> limit(1);
       
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function updateAccount($profile_id,$data){
        //var_dump($data);
        $this->db->cache_off();
        $this->db->where('user_id', $profile_id);
        $this->db->update('account_info', $data);
        $affectedRows = $this->db->affected_rows();
        return $affectedRows;
    }
    public function updateProfileUpdate($user_id,$data){
        //var_dump($data);
        $this->db->cache_off();
        $this->db->where('user_id', $user_id);
        $this->db->update('profile_update', $data);
        $affectedRows = $this->db->affected_rows();
        return $affectedRows;
    }
    public function service_centerByUserId($user_id){
        $this -> db -> select('*');
        $this -> db -> from('servic_centers');
        $this -> db -> where('user_id', $user_id);
        $this -> db -> limit(1);

        $r =  $this -> db -> get();
        return $r->row();
    }

    public function updateService_center($user_id,$data){
        //var_dump($data);
        $this->db->cache_off();
        $this->db->where('user_id', $user_id);
        $this->db->update('servic_centers', $data);
        $affectedRows = $this->db->affected_rows();
        return $affectedRows;
    }
///// for stores
    
     public function StoreprofileAndLoginDetail($store_user_id){
              $q= $this->db->select('accredited_stores.*,accredited_stores_users.email')
            ->from('accredited_stores')
            ->join('accredited_stores_users', 'accredited_stores_users.id = accredited_stores.store_user_id', 'left join')
            ->where('accredited_stores.store_user_id', $store_user_id)
            ->get();
        $rows =  $q->row() ;
        return $rows;

    }


    public function getCustomerprofile($my_id){
        $q= $this->db->select('*')
            ->from('profiles')
            ->where('profiles.my_id', $my_id)
            ->get();
        $rows =  $q->row() ;
        return $rows;

    }

    public function getServiceCenterIncome($sc_id){
        $sql     = "select * from servic_center_incomes where servic_center_incomes.servic_center_id= $sc_id and servic_center_incomes.id NOT IN(select servic_center_settlement_incomes.income_id from servic_center_settlement_incomes)";
         //echo $sql;

        if ($query = $this->db->query($sql))
        {
            $rows   = $query->result_array();
            return $rows;
        }
        else
        {
            echo "Query failed!";
        }
    }
    public function getServiceCenterIncomeHistory($sc_id){
        $sql     = "select * from servic_center_incomes where servic_center_incomes.servic_center_id= $sc_id and servic_center_incomes.id  IN(select servic_center_settlement_incomes.income_id from servic_center_settlement_incomes)";
        //echo $sql;

        if ($query = $this->db->query($sql))
        {
            $rows   = $query->result_array();
            return $rows;
        }
        else
        {
            echo "Query failed!";
        }
    }



}