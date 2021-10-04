<?php

/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/28/2017
 * Time: 12:46 PM
 */
class Plan_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();


    }


// register plans
    public function registerPlan($data)
    {

        $r1 = $this->db->insert('plans', $data);
        $plan_id = $this->db->insert_id();
        //var_dump($plan_id);
        if (isset($plan_id)) {
            return $plan_id;
        }

    }

    public function allPlans()
    {

        $query = $this->db->get('plans');
        $query_result = $query->result();
        $this->db->where( 'status', 1 );
        return $query_result;
    }

    public function planByPlanId($plan_id)
    {
        $this->db->select('*');
        $this->db->from('plans');
        $this->db->where('id', $plan_id);
        $this->db->limit(1);
        $r = $this->db->get();
        return $r->row();
    }

    public function planByPplanId($plan_id){
        $this -> db -> select('*');
        $this -> db -> from('plans');
        $this -> db -> where('id', $plan_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function updateplan($plan_id,$data){
        //var_dump($data);
        $this->db->cache_off();
        $this->db->where('id', $plan_id);
        $this->db->update('plans', $data);
        $affectedRows = $this->db->affected_rows();
        return $affectedRows;
    }









}