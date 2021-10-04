<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an u
	 * nderscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();

		$this->load->model( 'Profile_model' );
		$this->check_login();
		$this->config->load('souktrain');
	}

	public function check_login() {
		if ( ! isset( $_SESSION['is_logged'] ) or empty( $_SESSION['user_id'] ) ) {
			redirect('User_authentication/logout');
		}
	}

	public function index() {
		$this->load->model( 'Account_model' );

		$this->check_login();


		@$user_id = $_SESSION['user_id'];
		$wallet   = $this->Account_model->getWallet( $user_id ) ?: [];
		$accounts = $this->Account_model->getAccounts( $user_id ) ?: [];
		$plans    = $this->Account_model->getUserPlans( $user_id ) ?: [];

		//print json_encode($plans); die();
		$downlines = array();
		foreach ( $plans as $plan ) {
			$downlines[] = $this->Account_model->getDownlines( $user_id, $plan['plan']['id'] ) ?: [];
		}
		//print json_encode($downlines); die();
		$this->load->view( 'profile/home', [
			'plans'     => $plans,
			'downlines' => $downlines,
			'wallet'    => $wallet,
			'account'   => $accounts,
			'user_id'   => $user_id
		] );
	}

	public function members_service_center(){
		$this->load->model( 'Account_model' );

		$this->check_login();


		@$user_id =  $this->uri->segment( 3, 0 );
		@$profile = $profile = $this->Profile_model->profileByProfileId($user_id );
		@$plans    = $this->Account_model->getUserPlans( $user_id ) ?: [];
		//var_dump($profile);
		// print json_encode($plans); die();
		$downlines = array();
		foreach ( $plans as $plan ) {
			@$downlines[] = $this->Account_model->getDownlines( $user_id, $plan['plan']['id'] ) ?: [];
		}
		//print json_encode($downlines); die();
		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$this->load->view( 'profile/member_service_centre_home', [
			'plans'     => @$plans,
			'downlines' => @$downlines,
			'profile'  => @$profile,
		] );
	}
	//get profile for registration

	public function profile() {
		$this->check_login();
		$data = array();
		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id = $_SESSION['user_id'];
			$profile = $this->Profile_model->profileAndLoginDetail( $user_id );
			$profile_update = $this->Profile_model->profile_update_details($user_id);
			//var_dump($profile_update);
			$data['profile'] = $profile;
			$data['profile_update'] =  $profile_update;
			$this->load->view( 'profile/profile_list', $data );
		} else {

		}

	}

	public function view_profile( $profile_id ) {

		$this->load->helper( 'url' );
		$this->check_login();
		$data = array();
		if ( isset( $_SESSION['is_logged'] ) ) {
			$profile_id = $this->uri->segment( 3, 0 );
			//$profile_id = $_SESSION['profile_id'];
			$profile         = $this->Profile_model->profileByProfileId( $profile_id );
			$data['profile'] = $profile;
			$this->load->view( 'profile/profile_view', $data );
		} else {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
		}
	}

	public function edit_profile( $profile_id ) {

		$this->load->helper( 'url' );
		$this->check_login();
		$data = array();

		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id         = $this->uri->segment( 3, 0 );
			$profile         = $this->Profile_model->profileByProfileId( $user_id );
			$data['profile'] = $profile;

			if($_POST){


				$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
				$this->form_validation->set_rules( 'dob', 'Date of Birth', 'trim' );
				$this->form_validation->set_rules( 'acc_type', 'Account_type', 'trim|required' );
				$this->form_validation->set_rules( 'phone_no', 'Phone No', 'trim|required' );
				$this->form_validation->set_rules( 'bank', 'Bank Nmae', 'trim|required' );
				$this->form_validation->set_rules( 'bank_branch', 'Branch', 'trim|required' );
				$this->form_validation->set_rules( 'country', 'Country', 'trim|required' );
			}

			if ( $_POST and $this->form_validation->run() == false ) {
				$this->load->view( 'profile/account_edit' );
			} else {
				$data    = array(
					'account_name' => $this->input->post( 'account_name' ),
					'account_no'   => $this->input->post( 'account_no' ),
					'acc_type'     => $this->input->post( 'acc_type' ),
					'phone_no'     => $this->input->post( 'phone_no' ),
					'bank'         => $this->input->post( 'bank' ),
					'account_no'   => $this->input->post( 'account_no' ),
					'bank_branch'  => $this->input->post( 'bank_branch' ),
					'country'      => $this->input->post( 'country' ),
					'updated_at'   => date( "Y-m-d H:i:s" )
				);}
			// var_dump($profile);
			$this->load->view( 'profile/profile_edit', $data );
		} else {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
		}

	}
	public function edit_profile_update( $user_id ) {
		$this->check_login();
		$this->load->helper('url');

		$data = array();
		$this->load->library( 'form_validation' );

		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id         = $_SESSION['user_id'];
			$profile         = $this->Profile_model->profile_update_details($user_id);
			$data['profile'] = $profile;
			// var_dump($profile);
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidenav');
			$this->load->view( 'templates/includes/profile_update_edit', $data);
		} else {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
		}

	}

	public function edit_account( $profile_id ) {
		$this->check_login();
		$this->load->helper( 'url' );

		$data = array();

		if ( isset( $_SESSION['is_logged'] ) ) {
			$profile_id      = $this->uri->segment( 3, 0 );
			$account         = $this->Profile_model->accountByProfileId( $profile_id );
			$data['account'] = $account;
			$this->load->view( 'profile/account_edit', $data );
		} else {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
		}

	}

	public function go_Edit_Account( $user_id ) {
		$this->check_login();
		$this->load->library( 'form_validation' );
		$this->load->helper( 'url' );

		$data = array();
		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id = $this->uri->segment( 3, 0 );
			$account = $this->Profile_model->accountByProfileId( $user_id );


			$this->form_validation->set_rules( 'account_name', 'Account Name', 'trim|required' );
			$this->form_validation->set_rules( 'account_no', 'Account No', 'trim|required|numeric' );
			$this->form_validation->set_rules( 'acc_type', 'Account_type', 'trim|required' );
			$this->form_validation->set_rules( 'phone_no', 'Phone No', 'trim|required' );
			$this->form_validation->set_rules( 'bank', 'Bank Nmae', 'trim|required' );
			$this->form_validation->set_rules( 'bank_branch', 'Branch', 'trim|required' );
			$this->form_validation->set_rules( 'country', 'Country', 'trim|required' );


			if ( $this->form_validation->run() == false ) {
				$this->load->view( 'profile/account_edit' );
			} else {
				$data    = array(
					'account_name' => $this->input->post( 'account_name' ),
					'account_no'   => $this->input->post( 'account_no' ),
					'acc_type'     => $this->input->post( 'acc_type' ),
					'phone_no'     => $this->input->post( 'phone_no' ),
					'bank'         => $this->input->post( 'bank' ),
					'account_no'   => $this->input->post( 'account_no' ),
					'bank_branch'  => $this->input->post( 'bank_branch' ),
					'country'      => $this->input->post( 'country' ),
					'updated_at'   => date( "Y-m-d H:i:s" )
				);
				$updated = $this->Profile_model->updateAccount( $user_id, $data );
				if ( $updated != 1 ) {
					$datas['message'] = '<div class="/ alert alert-success/">No changes made</div>';
					$this->load->view( 'profile/account_edit', $datas );

				} else {
					$datas['message'] = '<div class="/alert alert-success/">Your record has been updated.</div>';
					$this->load->view( 'profile/account_edit', $datas );
				}


			}


		}
	}

	public function go_Edit_Profile( $user_id ) {
		$this->check_login();
		$this->load->library( 'form_validation' );
		$this->load->helper( 'url' );

		$data = array();
		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id   = $this->uri->segment( 3, 0 );
			$profile   = $this->Profile_model->profileByProfileId( $user_id );
			$oauth_pro = $this->Profile_model->check_Oauth_Provider( $user_id );
			//var_dump( $profile );

			$this->form_validation->set_rules( 'last_name', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'first_name', 'Firstname', 'trim|required' );


			if ( $this->form_validation->run() == false ) {
				$this->load->view( 'profile/profile_edit' );

			} else {
				$data    = array(
					'last_name'  => $this->input->post( 'first_name' ),
					'first_name' => $this->input->post( 'last_name' ),
					'gender'     => $this->input->post( 'gender' ),

					' updated_at' => date( "Y-m-d H:i:s" )
				);
				$updated = $this->Profile_model->updateProfile( $user_id, $data );
				if ( $updated != 1 ) {
					$datas['message'] = 'Your record has been updated.No changes made';
					$this->load->view( 'profile/profile_edit', $datas );

				} else {
					$data['profile'] = $profile;
					$data['success'] = '<div class="alert alert-success">Your record has been updated.</div>';
					$this->load->view( 'profile/profile_edit', $data );
				}
			}


		}
	}

	public function account() {
		$this->check_login();
		$data = array();
		if ( isset( $_SESSION['is_logged'] ) ) {
			$profile_id      = $_SESSION['user_id'];
			$account         = $this->Profile_model->accountByProfileId( $profile_id );
			$data['account'] = $account;
			$this->load->view( 'profile/account_list', $data );
		} else {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
		}
	}

	public function account_view() {
		$this->check_login();
		$this->load->helper( 'url' );

		$data = array();
		if ( isset( $_SESSION['is_logged'] ) ) {
			$profile_id = $this->uri->segment( 3, 0 );
			//$profile_id = $_SESSION['profile_id'];
			$account         = $this->Profile_model->accountByProfileId( $profile_id );
			$data['account'] = $account;
			//var_dump($account);
			$this->load->view( 'profile/account_view', $data );
		} else {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
		}
	}

	public function account_registration() {
		$this->check_login();
		$this->load->model( 'Profile_model' );

		$this->load->library( 'form_validation' );
		$user_id       = $_SESSION['user_id'];
		$user          = $this->Profile_model->profileByProfileId( $user_id );
		$datas['user'] = $user;
		//echo'profile';
		//var_dump($user);
		$this->form_validation->set_rules( 'account_name', 'account_name', 'trim|required' );
		$this->form_validation->set_rules( 'account_no', 'account_no', 'trim|required|numeric' );
		$this->form_validation->set_rules( 'acc_type', 'Account Type', 'trim|required' );
		$this->form_validation->set_rules( 'phone_no', 'Phone Number', 'trim|required|numeric' );
		$this->form_validation->set_rules( 'bank', 'Bank name', 'trim|required' );
		//$this->form_validation->set_rules('profile_id', 'Existing Account.Try editting accounts.',
		//'required|is_unique[account_info.profile_id]');

		$this->form_validation->set_rules( 'bank_branch', 'Bank Branch', 'required' );
		$this->form_validation->set_rules( 'country', 'country', 'required' );


		if ( $this->form_validation->run() == false ) {
			$this->load->view( 'profile/account_reg', $datas );
		} else {
			$data = array(
				'account_name' => $this->input->post( 'account_name' ),
				'account_no'   => $this->input->post( 'account_no' ),
				'acc_type'     => $this->input->post( 'acc_type' ),
				'phone_no'     => $this->input->post( 'phone_no' ),
				'bank'         => $this->input->post( 'bank' ),
				'bank_branch'  => $this->input->post( 'bank_branch' ),
				'created_at'   => date( "Y-m-d H:i:s" ),
				'updated_at'   => date( "Y-m-d H:i:s" ),
				'country'      => $this->input->post( 'country' ),
				'user_id'      => $user_id

			);
			// var_dump($data);

			$acc_affected_rows = $this->Profile_model->registerAccount( $_SESSION['user_id'], $data );

			$datas['message'] = 'record created';
			$this->load->view( 'profile/account_list', $datas );


		}


	}

	public function my_accounts() {
		$this->load->model( 'Account_model' );
		// $this->config->load('paymentconfig');
		$this->check_login();


		$user_id  = $_SESSION['user_id'];
		$accounts = $this->Account_model->getAccounts( $user_id ) ?: [];

		$this->load->view( 'profile/transactions', [ 'accounts' => $accounts ] );

	}

	public function account_history( $account_type_id ) {
		$this->load->model( 'Account_model' );

		$this->check_login();

		$user_id   = $_SESSION['user_id'];
		$account   = $this->Account_model->getAccount( $user_id, $account_type_id ) ?: [];
		$histories = $this->Account_model->getAccountHistories( $user_id, $account_type_id ) ?: [];

		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$this->load->view( 'profile/account-history', [ 'account' => $account, 'histories' => $histories ] );

	}

	public function wallet() {
		$this->load->model( 'Account_model' );

		$this->check_login();

		$user_id = $_SESSION['user_id'];
		$wallet  = $this->Account_model->getWallet( $user_id ) ?: [];

		$histories = $this->Account_model->getWalletHistories( $user_id ) ?: [];
		//var_dump($histories);
		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$this->load->view( 'profile/wallet', [ 'wallet' => $wallet, 'histories' => $histories ] );

	}

	public function Fundwallet() {
		$this->load->model( 'Account_model' );

		$this->check_login();

		$user_id = $_SESSION['user_id'];
		$wallet  = $this->Account_model->getWallet( $user_id ) ?: [];

		$histories = $this->Account_model->getWalletHistories( $user_id ) ?: [];
		//fund Wallet

		$this->load->library( 'form_validation' );


		$this->form_validation->set_rules( 'pin', 'pin', 'trim|required|numeric' );


		if ( $this->form_validation->run() == false ) {
			$this->load->view( 'templates/header' );
			$this->load->view( 'templates/topnav' );
			$this->load->view( 'templates/sidenav' );
			$this->load->view( 'profile/wallet', [ 'wallet' => $wallet, 'histories' => $histories ] );

			return;
		} else {
			//if($_POST) var_dump($_POST);
			$pin = $this->input->post( 'pin' );

			$response = $this->Account_model->getFundWallet( $user_id, $pin );
			// var_dump($response);
			if ( @$response['status'] !== false ) {
				$message = '<div>' . $response['data'] . '</div>';
			} else {
				$message = '<div>' . $response['message'] . '</div>';
				if ( ! empty( $response['data'] ) ) {
					$error = $this->processError( $response['data'] );
				}
			}
			$data = array(
				'message'   => @$message,
				'error'     => @$error,
				'wallet'    => $wallet,
				'histories' => $histories

			);


		}
		$wallet = $this->Account_model->getWallet( $user_id ) ?: [];

		$histories = $this->Account_model->getWalletHistories( $user_id ) ?: [];
		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$this->load->view( 'profile/wallet', $data );

	}

	public function processError( $error ) {
		$str = '';
		if ( is_array( $error ) ) {
			foreach ( $error as $err ) {
				$str .= '<li>' . $err . '</li>';
			}
		} else {
			$str = $error;
		}

		return $str;
	}

	public function upgrade() {

		$this->load->model( 'Account_model' );
		$this->check_login();

		$user_id  = $_SESSION['user_id'];
		$plan     = $this->Account_model->getCurrentAndNewPlan( $user_id ) ?: [];
		$accounts = $this->Account_model->getAccounts( $user_id ) ?: [];

		//print json_encode($accounts); die();
		if ( ! empty( $plan['new_plan'] ) and !empty( $_POST['account_type_id']) ) {
			$account_type_id = $this->input->post( 'account_type_id' );
			$next_plan_id    = $plan['new_plan']->id;
			$response        = $this->Account_model->subscribeNewPlan( $user_id, $account_type_id, $next_plan_id );
			//var_dump( $response );
			if ( @$response['status'] !== false ) {
				@$message = '<div>' . $response['data'] . '</div>';
				$plan     = $this->Account_model->getCurrentAndNewPlan( $user_id ) ?: [];
			} else {
				$message = '<div>' . $response['message'] . '</div>';
				if ( ! empty( $response['data'] ) ) {
					$error = $this->processError( $response['data'] );
				}
			}
			$data = array(
				'message' => @$message,
				'error'   => @$error,/* 'wallet' => $wallet, 'histories' => $histories*/

			);

		}
		$data['plan'] = $plan;
		$data['accounts']= $accounts;
		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );

		$this->load->view( 'profile/upgrade', $data);


	}

	public function test(  ) {
		echo FCPATH.'assets\uploads\passport\.133.jpg';
		$delete = unlink(FCPATH.'assets\uploads\passport\133.jpg');

		var_dump($delete);
	}

	public function service_center(){
		$this->check_login();
		$this->load->model( 'Profile_model' );
		$user_id = $_SESSION['user_id'];
		$sc          = $this->Profile_model->service_centerByUserId($user_id);

		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$data= array();
		$data = array(
			'sc' => $sc
		);
		$this->load->view( 'profile/service_center', $data);
	}


	public function profiles( )
	{  $this->check_login();
		$this->load->model( 'Profile_model' );
		$user_id = $_SESSION['user_id'];

		$sc  = $this->Profile_model->service_centerByUserId($user_id);
		$sc_id = $sc->id +  0;
		// var_dump($sc_id);
		$profiles=  $this->Profile_model-> profileAndLoginDetailBySc( $sc_id);
		//var_dump( $profiles);
		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$data= array();
		$data = array(
			'profiles' => $profiles
		);
		$this->load->view( 'profile/service_center_profile', $data);
	}




	public function service_center_registration() {
		$this->check_login();
		$this->load->model( 'Profile_model' );

		$this->load->library( 'form_validation' );
		$user_id       = $_SESSION['user_id'];
		$user          = $this->Profile_model->profileByProfileId( $user_id );
		$datas['user'] = $user;
		//echo'profile';
		//var_dump($user);
		$this->form_validation->set_rules( 'name', 'Service Center Name', 'trim|required' );
		$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
		$this->form_validation->set_rules( 'telephone', 'Phone Number', 'trim|required|numeric' );

		$this->form_validation->set_rules( 'country', 'country', 'required' );


		if ( $this->form_validation->run() == false ) {

			$this->load->view( 'templates/header' );
			$this->load->view( 'templates/topnav' );
			$this->load->view( 'templates/sidenav' );

			$this->load->view( 'templates/includes/service_center_reg', $datas );
		} else {
			$data = array(
				'name' => $this->input->post( 'name' ),
				'address'   => $this->input->post( 'address' ),
				'country'      => $this->input->post( 'country' ),
				'telephone'     => $this->input->post( 'telephone' ),
				'code'         => $this->service_center_code(),
				'created_at'   => date( "Y-m-d H:i:s" ),
				'updated_at'   => date( "Y-m-d H:i:s" ),
				'status'       => '0',
				'user_id'      => $user_id

			);
			// var_dump($data);

			$acc_affected_rows = $this->Profile_model->registerService_Center( $data );
			if(isset( $acc_affected_row) and !empty( $acc_affected_row)){
				$datas['message'] = '<div alert alert-success> Service center record created</div>';
			}else{
				$datas['message'] = '<div alert alert-danger> Service center record not created</div>';
			}

			$this->load->view( 'templates/header' );
			$this->load->view( 'templates/topnav' );
			$this->load->view( 'templates/sidenav' );
			$this->load->view( 'profile/service_center', $datas );
		}


	}
	public function edit_service_centre( $user_id ) {
		$this->load->library( 'form_validation' );
		$this->load->helper( 'url' );
		$this->check_login();
		$data = array();

		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id = $this->uri->segment( 3, 0 );
			$sc = $this->Profile_model->service_centerByUserId($user_id);
			// var_dump($sc);
			$data = array(
				'sc' => $sc
			);

			$this->form_validation->set_rules( 'name', 'Service Center Name', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			$this->form_validation->set_rules( 'telephone', 'Phone Number', 'trim|required|numeric' );

			$this->form_validation->set_rules( 'country', 'country', 'required' );


			if ( $this->form_validation->run() == false ) {
				$this->load->view( 'templates/header' );
				$this->load->view( 'templates/topnav' );
				$this->load->view( 'templates/sidenav' );
				$this->load->view( 'templates/includes/service_center_edit',$data );
			} else {
				$data = array(
					'name' => $this->input->post( 'name' ),
					'address'   => $this->input->post( 'address' ),
					'country'      => $this->input->post( 'country' ),
					'telephone'     => $this->input->post( 'telephone' ),
					'updated_at'   => date( "Y-m-d H:i:s" )


				);
				$updated = $this->Profile_model->updateService_center($user_id,$data);
				if ( $updated != 1 ) {
					$datas['message'] = '<div class=" alert alert-success">No changes made</div>';
					$this->load->view( 'templates/header' );
					$this->load->view( 'templates/topnav' );
					$this->load->view( 'templates/sidenav' );
					$this->load->view( 'profile/service_center', $data );

				} else {
					$datas['message'] = '<div class="alert alert-success">Your record has been updated.</div>';
					$this->load->view( 'templates/header' );
					$this->load->view( 'templates/topnav' );
					$this->load->view( 'templates/sidenav' );
					$this->load->view( 'profile/service_center', $data);
				}


			}


		}
	}
	public   function service_center_code()
	{
		$year = date('Y');
		$no = rand(10,1000);
		$nos = rand(100,10);
		$cdde ='SSC'.(String)$year.$no.$nos;
		return  $cdde;
	}
	public function profile_update() {

		$this->load->model( 'Profile_model' );
		$this->check_login();
		$this->load->library( 'form_validation' );
		$user_id       = $_SESSION['user_id'];
		//$user          = $this->Profile_model->profileByProfileId( $user_id );
		$data = array();
		@$new_name = $user_id;
		$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
		$this->form_validation->set_rules( 'dob', 'Date of Birth', 'trim|required' );
		//$this->form_validation->set_rules( 'picture_url', 'picture_url', 'trim|required' );
		$this->form_validation->set_rules( 'maiden', 'maiden', 'trim|required' );
		$this->form_validation->set_rules( 'secret', 'secret', 'trim|required' );
		$config['upload_path']          = './assets/uploads/passport/';
		$config['allowed_types']        = 'jpg';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name'] = $new_name;
		//$picture_url  = './assets/uploads/passport/'.$new_name;
		if ( $this->form_validation->run() == false ) {

			$this->load->view( 'profile/profile_update', $data );
		} else {
			// $this->input->post('dob');
			$data = array(
				'user_id' => $user_id,
				'address' => $this->input->post('address'),
				'dob'   => $this->input->post('dob'),
				'picture_url'     => $new_name.'.jpg',
				'maiden'     => $this->input->post('maiden'),
				'secret'         => $this->input->post('secret'),
				'created_at'   => date( "Y-m-d H:i:s" ),
				'updated_at'   => date( "Y-m-d H:i:s" )
			);
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('picture_url'))
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view( 'profile/profile_update', $error );
			}
			else
			{
				//$data = array('upload_data' => $this->upload->data());

				$acc_affected_rows = $this->Profile_model->registerProfile_update( $_SESSION['user_id'], $data );

				if($acc_affected_rows){
					$data['message'] = '<div class="alert alert-success"> Profile update record  created.</div>';
				}else{
					$data['message'] = '<div class="alert alert-info">Profile update record not created.Record may  <a href="'.  base_url('index.php/profile/profile') .'">exist</a> .</div>';
				}
				$this->load->view( 'profile/profile_update', $data );
			}
		}


	}


	public function profile_update_edit($user_id) {

		$this->load->model( 'Profile_model' );
		$this->check_login();
		$this->load->library( 'form_validation' );
		$user_id       = $_SESSION['user_id'];
		//$user          = $this->Profile_model->profileByProfileId( $user_id );
		$data = array();
		@$new_name = $user_id;
		$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
		$this->form_validation->set_rules( 'dob', 'Date of Birth', 'trim|required' );
		//$this->form_validation->set_rules( 'picture_url', 'picture_url', 'trim|required' );
		$this->form_validation->set_rules( 'maiden', 'maiden', 'trim|required' );
		$this->form_validation->set_rules( 'secret', 'secret', 'trim|required' );
		$config['upload_path']          = './assets/uploads/passport/';
		$config['allowed_types']        = 'jpg';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name'] = $new_name;
		//$picture_url  = './assets/uploads/passport/'.$new_name;
		if ( $this->form_validation->run() == false ) {
			$this->load->view( 'templates/header' );
			$this->load->view( 'templates/topnav' );
			$this->load->view( 'templates/sidenav' );
			$this->load->view( 'templates/includes/profile_update_edit', $data );
		} else {
			$delete = unlink(FCPATH.'assets\uploads\passport\133.jpg');
			$data = array(

				'address' => $this->input->post('address'),
				'dob'   => $this->input->post('dob'),
				'picture_url'     => $new_name.'.jpg',
				'maiden'     => $this->input->post('maiden'),
				'secret'         => $this->input->post('secret'),
				'updated_at'   => date( "Y-m-d H:i:s" )
			);
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('picture_url'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view( 'templates/header' );
				$this->load->view( 'templates/topnav' );
				$this->load->view( 'templates/sidenav' );
				$this->load->view( 'templates/includes/profile_update_edit', $error );
			}
			else
			{
				//$data = array('upload_data' => $this->upload->data());

				$acc_affected_rows = $this->Profile_model-> updateProfileUpdate($_SESSION['user_id'], $data );

				if($acc_affected_rows){
					$data['message'] = '<div class="alert alert-info">Profile update record  editted.check  <a href="'.  base_url('index.php/profile/profile') .'">profile</a> .</div>';
				}else{
					$data['message'] = '<div class="alert alert-info">Profile update record not editted.check </div>';
				}
				$this->load->view( 'templates/header' );
				$this->load->view( 'templates/topnav' );
				$this->load->view( 'templates/sidenav' );
				$this->load->view( 'templates/includes/profile_update_edit', $data );
			}
		}


	}




	public function accounts() {
		$user_id =  $_SESSION['user_id'];
		$this->check_login();
		$this->load->model( 'Account_model' );
		$accounts = $this->Account_model->getAccounts($user_id);
		if($accounts){
			foreach ($accounts as $i =>$account){
				$accounts[$i]['history'] = $this->Account_model->getAccountHistory($user_id, $account['user_account_type_id']);
			}
		}

		$this->load->view( 'templates/header' );
		$this->load->view( 'templates/topnav' );
		$this->load->view( 'templates/sidenav' );
		$this->load->view('profile/account', array('accounts' =>$accounts));

	}

 public function testsms(){
	 souktrainsms('08068715141', 'hello buddy is testing souktrain sms');

 }




}