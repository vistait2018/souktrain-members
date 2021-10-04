<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Stores_profile_account extends CI_Controller {

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
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();

		$this->load->model( 'Profile_model' );
                $this->load->model( 'Account_model' );
		$this->check_login();
	}

	public function check_login() {
		if ( ! isset( $_SESSION['is_logged_store'] ) or empty( $_SESSION['is_logged_store'] ) ) {
			$data = array(
				'heading' => 'Login Error',
				'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/stores/signin">Click to register</a></div>'
			);
			$this->load->view( 'errors/loginerror', $data );
			exit;
		}
	}

	public function index() {
		
	}


	//get profile for registration

	public function profile() {
               $this->check_login();
		$data = array();
		//var_dump($_SESSION);
			 $store_user_id = $_SESSION['store_user_id'];
			$profile = $this->Profile_model->StoreprofileAndLoginDetail( $store_user_id );
			//var_dump($profile);
			$data['profile'] = $profile;
                        $this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
			$this->load->view( 'stores/profile_list', $data );
		

	}
    public function customerprofile() {
        $this->check_login();
        $data = array();
        $this->load->library( 'form_validation' );
        $this->load->helper( 'url' );

        $my_id = '';



            $this->form_validation->set_rules( 'my_id', 'Your Id', 'trim|required' );


            if ( $this->form_validation->run() == false ) {
                $this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
                $this->load->view('stores/customer', $data);
            } else {
                 $my_id = $this->input->post('my_id') ;
                $data    = array( 'my_id' => $my_id  );
                $profile = $this->Profile_model->getCustomerprofile(@$my_id);
             
                    if(isset($profile) and !empty($profile)){
                      $data['profile'] = $profile;
                      $product         = $this->Account_model->getAccounts(1);
			$data['product'] = $product;
                       $this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
                $this->load->view('stores/customer', $data);
                return;
                       
                        
                         
                    }else{
                        $datas['message'] = '<div class="alert alert-info">No record found! Check customer\'s ID</div>';
                        $data['profile'] = array();
                        $this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
                $this->load->view('stores/customer', $data);
                    }

                
                
            }

    }


    public function view_profile( $store_user_id ) {
               $this->check_login();
		$this->load->helper( 'url' );

		$data = array();
		
			$store_user_id = $this->uri->segment( 3, 0 );
			//$profile_id = $_SESSION['profile_id'];
			$profile         = $this->Profile_model->profileByProfileId( $store_user_id );
			$data['profile'] = $profile;
			$this->load->view( 'profile/profile_view', $data );
		
	}

	public function edit_profile( $profile_id ) {

		$this->load->helper( 'url' );

		$data = array();

		if ( isset( $_SESSION['is_logged'] ) ) {
			$user_id         = $this->uri->segment( 3, 0 );
			$profile         = $this->Profile_model->profileByProfileId( $user_id );
			$data['profile'] = $profile;
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

	public function edit_account( $profile_id ) {

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

		$this->load->model( 'Profile_model' );

		$this->load->library( 'form_validation' );
		echo $id       = $_SESSION['id'];
		$user          = $this->Profile_model->profileByProfileId($id);
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
		


		if ( $this->form_validation->run() == false ) {
                    $this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
			$this->load->view( 'stores/account_reg', $datas );
		} else {
			$data = array(
				'account_name' => $this->input->post( 'account_name' ),
				'account_no'   => $this->input->post( 'account_no' ),
				'account_type'     => $this->input->post( 'acc_type' ),
				'account_phone_no'     => $this->input->post( 'phone_no' ),
				'bank_name'         => $this->input->post( 'bank' ),
				'bank_branch'  => $this->input->post( 'bank_branch' ),
                            'country'  => $this->input->post( 'country' ),
				'created_at'   => date( "Y-m-d H:i:s" ),
				'updated_at'   => date( "Y-m-d H:i:s" ),
				'store_id'      => $id

			);
			// var_dump($data);

			$acc_affected_rows = $this->Profile_model->registerStoreAccount(  $data );

			$datas['message'] = 'record created';
                       $this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
			$this->load->view( 'profile/account_list', $datas );


		}


	}

public function test(){
    $this->load->model( 'Profile_model' );
    $profile = $this->Profile_model->getCustomerprofile('ST201729133');
    var_dump($profile);
}


}