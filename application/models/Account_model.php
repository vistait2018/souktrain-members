<?php

class Account_model extends CI_Model {
	static $API_URL = "http://st-test.crysto.name.ng/_admin/public/api/";

	public function __construct() {
		parent::__construct();
		$this->load->config('souktrain');
		self::$API_URL = $this->config->item('api_url');


		$this->load
			->add_package_path( FCPATH . 'vendor/restclient' )
			->library( 'restclient' )
			->remove_package_path( FCPATH . 'vendor/restclient' );
	}

	public function getAccounts( $user_id = 0 ) {
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/accounts" ) );
	}
	public  function getAccountHistory($user_id, $account_type_id){
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/account/history/{$account_type_id}" ) );

	}

	public static function handle_response( $response ) {

		if ( $response and @$response['status'] === true ) {
			return $response['data'];
		}

		return false;
	}

	public function getAccount( $user_id = 0, $account_id = 0 ) {
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/account/view/{$account_id}" ) );
	}

	public function getAccountHistories( $user_id = 0, $account_id = 0 ) {
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/account/history/{$account_id}" ) );
	}

	public function getWallet( $user_id = 0 ) {
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/wallet" ) );
	}

	public function getWalletHistories( $user_id = 0 ) {

		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/wallet/history" ) );
	}

	public function getFundWallet( $user_id, $pin ) {
		return $this->restclient->post( self::$API_URL . "users/{$user_id}/wallet/fund", [ 'pin' => $pin ] );

	}

	public function getDownlines( $user_id = 0, $plan ) {
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/plan/{$plan}/down-line" ) );
	}

	public function getUserPlans( $user_id = 0 ) {
		return self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/plan" ) );
	}

	public function getCurrentAndNewPlan( $user_id = 0 ) {
		$subscription = self::handle_response( $this->restclient->get( self::$API_URL . "users/{$user_id}/plan" ) );


		$no_of_plans  = ( $subscription ) ? count( $subscription ) : 0;
		$current_plan = null;
		$newPlan      = null;
		$currentPlan_order = 0;


		if ( ! empty( $subscription ) and ! empty( $subscription[ $no_of_plans - 1 ]['plan'] ) ) {
			$current_plan      = $subscription[ $no_of_plans - 1 ]['plan'];
			$currentPlan_order = $current_plan['order'];
			
		}
		
		$newPlan           = $this->getNewPlan( $currentPlan_order + 1 );
		$data = [ 'current_plan' => $current_plan, 'new_plan' => $newPlan ];

		return $data;
	}

	public function getNewPlan( $currentPlanOder ) {
		$this->db->select( '*' );
		$this->db->from( 'plans' );
		$this->db->where( 'order', $currentPlanOder );
        $this->db->where( 'order', $currentPlanOder );
		$this->db->limit( 1 );
		$r = $this->db->get();

		return $r->row();
	}

	public function subscribeNewPlan( $user_id, $account_type_id, $next_plan_id ) {
		return $this->restclient->post( self::$API_URL . "users/{$user_id}/plan/subscribe",
			array(
				'account_type' => $account_type_id,
				'plan_id'      => $next_plan_id,
			)
		);
	}

        
        public function withdraw($user_data,$history_data){
          
        $this->db->trans_start();
        $r1=  $this->db->insert('user_account_withdraw', $user_data);
        $r1 =$this->db->insert_id();
        
         if ($r1) {
                  $r2 =  $this->db->insert('user_account_histories', $history_data);
        }
        if ($this->db->trans_status() === false) {
            print_r($this->db->error());
            $this->db->trans_rollback();
            return $this-> message = 'Transaction not successful.Try again later';
        } else {
            $this->db->trans_commit();
            return $this-> message = 'Transaction Successful.Your account will be funded within 72 hours.';
        }

      
        }
}

