<?php

/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/27/2017
 * Time: 1:59 PM
 */
class Mail_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
       
    }


    public function getMy_id($pofile_id){

        $this -> db -> select('my_id');
        $this -> db -> from('users');
        $this -> db -> where('id', $profile_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }
     public function fixAndGetPasswordToken($pofile_id){

        $this -> db -> select('my_id');
        $this -> db -> from('users');
        $this -> db -> where('id', $profile_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }
}