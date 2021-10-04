<?php

/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 4/27/2017
 * Time: 1:59 PM
 */


class API_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
         $this->load
                ->add_package_path(FCPATH.'vendor/restclient')
                ->library('restclient')
                ->remove_package_path(FCPATH.'vendor/restclient');
    }
    
    public function getUser($user_id = 1) {
        return $this->restclient->get("http://st-test.crysto.name.ng/_admin/public/api/users/{$user_id}/");
    }
    
    
            
    
    
}