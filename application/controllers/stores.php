<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
        public function __construct()
	{
		parent::__construct();
        $this->check_login();
	}
         /////logout
    public function logout()
    {

        if ($_SESSION['is_logged_store'] == TRUE) {
          //  $_SESSION['is_logged'] = FALSE;
            unset(
                $_SESSION['email'],
                $_SESSION['image_url'],
                $_SESSION['id'],
                $_SESSION['store_user_id'],
                $_SESSION['is_logged_store'],
                $_SESSION['name']
               
            );
            session_destroy();
            redirect('/home');
        }
    }
    public function check_login() {
        if ( ! isset( $_SESSION['is_logged'] ) or empty( $_SESSION['user_id'] ) ) {
            $data = array(
                'heading' => 'Login Error',
                'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
            );
            $this->load->view( 'errors/loginerror', $data );
            exit;
        }
    }

    public function index()
	{
		$this->load->view('stores/header');
                $this->load->view('stores/topnav');
                $this->load->view('stores/sidenav');
                $this->load->view('stores/stores');
                
                
	}
        
        
        
          public   function token()
    {
       $year = date('S');
        $no = rand(27819,251111);
        $nos = rand(456,234567);
        $ns = rand(5557,789066);
         $nse = rand(5557,789066);
        $token =(String)$year.$no.$nos.$nse.$ns;
        $token=  sha1($token);
        return $token;
    }
    
      public function register()	
    {
       
        $this->load->library('form_validation');
        $this->load->model('Registration_model');
     
      
        $this->form_validation->set_rules('name', 'Store Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone_no', 'Phone_no', 'trim|required|numeric');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('about', 'About', 'required');
        $this->form_validation->set_rules(
            'email', 'Email', 'required|is_unique[accredited_stores_users.email]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.' 
            )
        );
        if ($this->form_validation->run() == false) {
            //echo'i am here';
             //$data['service_centers'] =  $this->Registration_model->allService_Centres();
            $this->load->view('stores/user_registration');

        } else {
           
   $this->load->library('bcrypt');
            
            $password                   = $this->bcrypt->hash_password($this->test_input($_POST['password']));

            
            //Setting values for tabel columns
            $user_data = array(
                
                
                'password'      => $password,
                 'email'             => $this->input->post('email'),
                'allow_access'        => '0',
                'token'        => $this->token(),
                'created_at'    =>      date("Y-m-d H:i:s") ,
               
                'updated_at'    =>       date("Y-m-d H:i:s")
            );

            $profile_data = array(
                'name'         => $this->input->post('name'),
                'address'        => $this->input->post('address'),
                'about'            => $this->input->post('about'),
                'country'    => $this->input->post('country'),
                'phone_no'       => $this->input->post('phone_no'),
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s")
                
                

            );
            if (isset($_POST['agree']) ) {
             
              $message = $this->Registration_model->registerStore($user_data, $profile_data);
               
            }
                        
            if (isset($message) ) {
                $mail = $this->registrationMail($this->input->post('email'));
                $data['message'] =  '<div class="alert alert-success">'. $this->Registration_model->message.'Confirm your Registration in your Email </a></div>';  
            }
            //Loading View
             $this->load->view('stores/user_registration',$data);
        }
    }
 public function registrationMail($email)
    {
       
        $data = array();
    //die(1234);
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('Registration_model');
         $result = $this->Registration_model->oathByEmailforStore($email);
             $token = $this->Registration_model->get_tokenforStore($email);
       // $my_id = $this->Registration_model->referral_IDByEmail($email);
           
             // echo base_url('User_authentication/registerWithMy_id/').$my_id->my_id.'/'.$my_token;
             // die('bhjkjkkl,l');
               $message = '
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Souktrain Registration Confirmation.
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Confirm your Registration</h4>
                    </div>
                    <div class="panel-body">
                    <p>Thank you for being a part of Souktrain Edu-Wealth program.
                    To confirm your registration please visit the link below.
                     </p>
                     <p>'. base_url('User_authentication/confirmregistration/'. $token->token).'</p>
                      
                   <p>Thanks <br> Souktrain Team</p>
              </div>

                 </div>
            </div>
               ';         
            if ($result == 0) {
                    
                $this->email->from('souktrain@st-test.crysto.name.ng', 'Souktrain');
                $this->email->to($email);
                $this->email->subject('Store Registration Confirmation');
                $this->email->message($message);

               $sendmail= $this->email->send();
                  
                 
                if($sendmail) $data['message']    = 'check yor mail to confirm Registration';
                else $data['message'] = 'check yor mail server';
            } else {
                $data['message']    = 'email is not valid';

            }
            //$this->load->view('user_authentication/confirminfo', $data);
       
  
}
 public function signin()
    {
   
        
            $this->load->library('bcrypt');

               $this->load->library('form_validation');
        $this->load->model('Registration_model');

         $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {


            $this->load->view('stores/signin');

        } else {
           $email = $this->input->post('email');
            $password = $this->input->post('password');
          
            $result = $this->Registration_model->oauthStore($email , $password);
            if (!$result or !$this->bcrypt->check_password($password, $result->password) ) {
                $data['message'] = '&nbsp;invalid username or password!!!!';
                $this->load->view('stores/signin', $data);
            } elseif ($result) {
               $data = array(
                    'is_logged_store' => true,
                    'email' => $result->email,
                    'name' => $result->name,
                    'image_url'=> $result->image_url,
                    'store_user_id' => $result->store_user_id,
                    'id'=> $result->id
                    
                );
                    $user_id = $result->store_user_id;
                $mysession = $this->session->set_userdata($data);
                  $remeber_token = $this->Registration_model->get_remember_token_for_store($user_id);
                if($remeber_token->allow_access === '1'){
                redirect('index.php/stores');
            }else{
                $data['message'] = '&nbsp;Check your email to Confirm your registration!!!!';
                $this->load->view('stores/signin', $data);
            }          
            } else {
                $data['message'] = '&nbsp;invalid username or password!!!!';
                $this->load->view('stores/signin', $data);

            }
            

        }
    }
public function confirmregistration($token){
       
        $token = $this->uri->segment(3, 0); 
        $this->load->model('Registration_model');
        $data = array();
        $data['allow_access'] = '1';
        if(isset($token)and !empty( $token)){
         $token= $this->Registration_model->confirm_tokenforStore($token,$data);  
         if($token){
             $data['success']= 'Registration confirmed| You can now log In.';
             $data['message']='';
             $this->load->view('user_authentication/signin',$data); 
         }
        }
    }
public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
  
}
