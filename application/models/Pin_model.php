<?php

/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 11/1/2017
 * Time: 3:38 PM
 */
class Pin_model  extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }
    public function pinByPin($pin)
    {

        $msg = array();
        $this->db->select('*');
        $this->db->from('pins');
        $this->db->where('code', $pin);
        $this->db->limit(1);
        $r = $this->db->get();
        if( @$r->row()->code !== $pin){
            $msg['error'] = '<div class="alert alert-danger">invalid Pin</div>';
            return $msg;
        }

       if($r) {
           $this->db->select('*');
           $this->db->from('pin_collections');
           $this->db->where('id', $r->row()->pin_collection_id);
           $this->db->limit(1);
           $res = $this->db->get();
       }
        $msg = array(
            'user_id' => $r->row()->user_id ,
            'pin_name' => $res->row()->name ,
            'created_at' => $r->row()->created_at ,
            'updated_at' => $r->row()->updated_at ,
            'status' => $r->row()->status ,
           // 'name' => $result->row()->first_name .' '.$result->row()->last_name,
            //'Sex' => $result->row()->gender,
            'info' => 'Success- Valid Pin',
            'error' => ''
        );
        return $msg;

    }
}