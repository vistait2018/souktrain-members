<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller
{

    private $mail_config = array();
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
    public function __construct()
    {
        parent::__construct();
        $user = $this->load->model('user_model');
        $this->mail_config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.souktrain.com',
            'smtp_port' => 465,
            'smtp_user' => 'support@souktrain.com',
            'smtp_pass' => 'Netronit1@',
            'smtp_timeout' => '4',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
    }

    public function index()
    {
        $this->oauth();
    }

    ///Generate my_id
    public function my_id()
    {
        $year = date('Y');
        $no = rand(10, 1000);
        $nos = rand(100, 10);
        $my_id = 'ST' . (String)$year . $no . $nos;
        $my_id = $my_id;
        return $my_id;
    }

    //generate oauth_id
    public function oauth_id()
    {
        $year = date('Y');
        $no = rand(10, 1000);
        $nos = rand(100, 10);
        $my_id = 'STOAUTH' . (String)$year . $no . $nos;
        $my_id = $my_id;
        return $my_id;
    }

    public function token()
    {
        $year = date('S');
        $no = rand(27819, 251111);
        $nos = rand(456, 234567);
        $ns = rand(5557, 789066);
        $nse = rand(5557, 789066);
        $token = (String)$year . $no . $nos . $nse . $ns;
        $token = sha1($token);
        return $token;
    }

    /////logout
    public function logout()
    {


        unset(
            $_SESSION['email'],
            $_SESSION['picture_url'],
            $_SESSION['profile_id'],
            $_SESSION['picture_url'],
            $_SESSION['is_logged'],
            $_SESSION['first_name'],
            $_SESSION['is_logged']
        );
        session_destroy();
        redirect('/home');
    }


    public function register()
    {
        $this->load->model('Registration_model');
        $data = array();
        $data['service_centers'] = $this->Registration_model->allService_Centres();

        $this->load->view('user_authentication/user_registration', $data);
        if ($_POST) $this->registerOauth();
    }


    public function registerOauth()
    {

        $data = array();
        $message = '';
        $this->load->library('form_validation');
        $this->load->model('Registration_model');


        $this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
        $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
        $this->form_validation->set_rules(
            'username', 'Username', 'required|is_unique[users.username]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('agree', 'Please Agree', 'required');
        $this->form_validation->set_rules('service_center_id', 'Service Center ID', 'trim');

        $this->form_validation->set_rules(
            'email', 'Email', 'trim|required|valid_email|is_unique[users.email]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            )
        );

        if ($this->form_validation->run() == false) {
            //echo'i am here';
            $data['service_centers'] = $this->Registration_model->allService_Centres();
            $this->load->view('user_authentication/user_registration', $data);

        } else {

            if (!isset($_POST['referral_id']) and empty($_POST['referral_id'])) {
                $_POST['referral_id'] = null;
            } else {
                @$user_id = $this->Registration_model->getUser_id_From_ReferralId(trim(strtoupper(@$this->input->post('referral_id'))));
                if (isset($user_id) or !empty($user_id)) {
                    $_POST['referral_id'] = $user_id;
                    $user_id;
                } else {
                    $_POST['referral_id'] = null;
                }

            }

            $scc = $this->Registration_model->check_scc(trim(strtoupper(@$this->input->post('service_center_id'))));
            //echo $scc;

            if ($scc == false) {
                $scc = null;
            }

            $_POST['oauth_provider'] = 'Souktrain';
            $_POST['oauth_id'] = $this->oauth_id();
            $_POST['my_id'] = $this->my_id();
            $_POST['status'] = '0';
            $_POST['locale'] = 'en-US';
            $_POST['picture_url'] = 'NIL';
            $_POST['profile_url'] = 'NIL';
            $this->load->library('bcrypt');

            $password = $this->bcrypt->hash_password($this->input->post('password'));


            //Setting values for tabel columns
            $user_data = array(

                'username' => $this->input->post('username'),
                'password' => $password,
                'email' => $this->input->post('email'),
                'remember_token' => '1',
                'token' => $this->token(),
                'created_at' => date("Y-m-d H:i:s"),

                'updated_at' => date("Y-m-d H:i:s")
            );

            $profile_data = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'gender' => $this->input->post('gender'),
                'oauth_provider' => $_POST['oauth_provider'],
                'oauth_uid' => $_POST['oauth_id'],
                'my_id' => $_POST['my_id'],
                'status' => $_POST['status'],
                'locale' => $_POST['locale'],
                'picture_url' => $_POST['picture_url'],
                'phone_no' => $_POST['phone_no'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'service_center_id' => $scc,
                'referral_id' => $_POST['referral_id']

            );
            if (isset($_POST['agree'])) {

                $message = $this->Registration_model->register($user_data, $profile_data);
                $data['message'] = $message;
                if (isset($message) and !empty($message)) {
                    $recepient = $this->input->post('first_name');
                    $referral_id = $this->input->post('my_id');
                    $phone_no = $_POST['phone_no'];
                    $smsmessage = ' Congratulaions ' . $recepient . '! Thank you for choosing souktrain. Your id is: ' . $referral_id;
                    @souktrainsms($phone_no, $smsmessage);
                }

            }

            if (isset($message)) {
                try {
                    $mail = $this->registrationMail($this->input->post('email'));
                    $data['success'] = '<div class="alert alert-success">' . $message . ' ' . '  Confirm your Registration in your Email. </div>';
                } catch (Exeption  $ex) {
                    $data['error'] = '<div class="alert alert-success"> Registration mail was not sent to your Email<br>
                    please try and log in.to resend the mail.
                </div>';
                }

            }
            //Loading View
            $this->load->view('user_authentication/confirminfo', $data);
        }
    }

    /**
     * Missing sign method<br>
     * loads oauth method
     *
     * @return void
     */

    public function signin()
    {
        $this->oauth();

    }

    //check login to return profile id
    public function confirmregistration($token)
    {

        $token = $this->uri->segment(3, 0);
        $this->load->model('Registration_model');
        $data = array();
        $data['remember_token'] = '0';
        if (isset($token) and !empty($token)) {
            $token = $this->Registration_model->confirm_token($token, $data);
            if ($token) {
                $data['success'] = 'Registration confirmed| You can now log In.';
                $data['message'] = '';
                $this->load->view('user_authentication/confirmregistration', $data);
            }
        }
    }


    public function oauth()
    {
        if (@$_SESSION['is_logged']) redirect('profile');

        $this->load->library('bcrypt');

        $this->load->library('form_validation');
        $this->load->model('Registration_model');

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {


            $this->load->view('user_authentication/signin');

        } else {


            $email = $this->input->post('email');
            $password = $this->input->post('password');


            $result = $this->Registration_model->oauth($email, $password);
            //var_dump($result);
            if (!$result or !$this->bcrypt->check_password($password, $result->password)) {
                $data['message'] = '&nbsp;invalid username or password!!!!';
                $this->load->view('user_authentication/signin', $data);
            } elseif ($result) {
                //var_dump($result);
                $data = array(
                    'is_logged' => true,
                    'email' => $result->email,
                    'first_name' => $result->first_name,
                    'picture_url' => $result->picture_url,
                    'user_id' => $result->id,
                    'oauth_provider' => $result->oauth_provider
                );
                $user_id = $result->id;

                $remeber_token = $this->Registration_model->get_remember_token($user_id);
                $remeber_token->remember_token;
                if ($remeber_token->remember_token === '0') {
                    $mysession = $this->session->set_userdata($data);
                    return redirect('profile');

                } else {
                    try {
                        @$mail = $this->registrationMail($this->input->post('email'));
                        $data['message'] = '&nbsp;Check your email to Confirm your registration!!!!';
                    } catch (Exeption  $ex) {
                        $data['message'] = ' Registration mail was not sent to your Email<br>
                    please try and log in.to resend the mail.';
                    }


                    $this->load->view('user_authentication/signin', $data);
                }


            } else {
                $data['message'] = '&nbsp;invalid username or password!!!!';
                $this->load->view('user_authentication/signin', $data);

            }
        }
    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //echo $data;
    }

    public function passwordresets()
    {
        //echo'gfgfgfgfghhghghj';
        $this->load->view('user_authentication/sendconfirmation');
    }


    public function sendMail()
    {

        $data = array();

        $this->load->library('form_validation');
        $this->load->library('email', $this->mail_config);
        $this->load->model('Registration_model');

        $this->form_validation->set_rules('email', 'email', 'valid_email|required|trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('user_authentication/sendconfirmation');

        } else {

            $email = $this->input->post('email');

            $result = $this->Registration_model->oathByEmail($email);
            $token = $this->Registration_model->get_token($email);

            $message = '<html>
            <head><title>Souktrain Mail</title></head>
              <body>
               <h1>
                    Souktrain Email Confirmation.
                </h1>
           
                        <h4>Souktrain Password Reset</h4>
                    
                    <p>Thank you for being a part of Souktrain Edu-Wealth program.
                    To reset your password please visit the link below.
                     </p>
                     <p>' . base_url('index.php/user_authentication/changePassword/' . @$token->token) . '</p>
                          <p>Thanks <br> Souktrain Team.</p>
                   
              </body>
             </html>   ';
            try {
                $data['message'] = array();

                if ($result == true) {
                    ;
                    $this->email->from('Support@souktrain.com', 'Souktrain');
                    $this->email->to($email);
                    $this->email->subject('Password Reset');
                    $this->email->message($message);

                    @$sendmail = $this->email->send();


                    if ($sendmail) {
                        $data['success'] = '<div class=/"alert alert-success/">check your mail to change your password</div>';
                    } else {
                        $data['error'] = 'check yor mail server or your network';
                    }
                } else {

                    $data['error'] = 'Email does not exist in souktrain';

                }
            } catch (Exeption $ex) {
                $data['error'] = 'An error ocurred' . ' ' . $ex->message();
            }


            $this->load->view('user_authentication/confirminfo', $data);
        }

    }

    public function registrationMail($email)
    {

        $data = array();

        $this->load->library('form_validation');

        $this->load->library('email', $this->mail_config);
        $this->load->model('Registration_model');
        $result = $this->Registration_model->oathByEmail($email);
        $token = $this->Registration_model->get_token($email);
        $my_id = $this->Registration_model->referral_IDByEmail($email);
        $my_token = $this->token();

        $message = '<html>
            <head><title>Souktrain Mail</title></head>
              <body>
                <h3>
                    Souktrain Registration Confirmation.
                </h3>
                   <h4> Confirm your Registration</h4>
                    <p>Thank you for being a part of Souktrain Edu-Wealth program. To confirm your registration please visit the link below.</p>
                     <p>https:' . base_url('index.php/user_authentication/confirmregistration/' . $token->token) . '</p>
                     <p>This is your referral link visit the link below.</p>
                     <p>https:' . base_url('index.php/user_authentication/registerWithMy_id/' . $my_id->my_id . '/' . $my_token) . '</p>
                   <p>Thanks <br> Souktrain Team.</p>
              </body>
            </html>';
        if ($result == 1) {

            $this->email->from('Support@souktrain.com', 'Souktrain');
            $this->email->to($email);
            $this->email->subject('Registration Confirmation');
            $this->email->message($message);

            $sendmail = $this->email->send();


            if ($sendmail) $data['message'] = 'check yor mail to confirm Registration';
            else $data['message'] = 'check yor mail server';
        } else {
            $data['message'] = 'email is not valid';

        }
        //$this->load->view('user_authentication/confirminfo', $data);


    }

    public function registerWithMy_id($referral_id)
    {
        $referral_id = $this->uri->segment(3, 0);
        $this->load->model('Registration_model');
        $referral_id = $this->Registration_model->confirmReferralId($referral_id);
        //var_dump($referral_id);

        if (!isset($referral_id) or empty($referral_id)) {
            $data = array();
            // echo'hghghghjhj';
            //$data['service_centers'] =  $this->Registration_model->allService_Centres();
            $data['error'] = 'Invalid Referral';
            $this->load->view('user_authentication/confirminfo', $data);
        } else {
            //echo $referral_id->user_id;
            $this->session->set_flashdata('referral_id', $referral_id);
            //$this->session->set_flashdata('user_id',$referral_id->user_id);
            $data = array();
            //var_dump( $t
            //his->session->flashdata('referral_id'));
            $data['service_centers'] = $this->Registration_model->allService_Centres();
            $data['referral_id'] = $referral_id;
            //$data['user_id'] =  $referral_id->user_id;
            $this->load->view('user_authentication/user_registration', $data);
            if ($_POST) {

                $this->registerOauth();

            }

        }
    }

    public function changePassword($token)
    {
        $this->load->model('Registration_model');
        $token = $this->uri->segment(3, 0);


        $valid_token = $this->Registration_model->check_token($token);
        $data = array();

        $data['allow_password_reset'] = '1';

        @$con_token = $this->Registration_model->confirm_token($token, $data);
        //var_dump( $con_token);
        if ($valid_token == true and $con_token == true) {
            $data['success'] = 'You can now change your password.';
            $data['token'] = $token;
            $this->load->view('user_authentication/changepassword', $data);
        } else {
            $data['error'] = 'You are not authorised for password reset!!!';

            $this->load->view('user_authentication/changepassword', $data);

        }

    }

    public function changedPassword()
    {
        $token = $this->uri->segment(3, 0);
        $data['token'] = @$token;
        $this->load->view('user_authentication/newpassword', $data);
    }

    public function newPassword($tokens)
    {
        $tokens = $this->uri->segment(3, 0);
        $data['tokens'] = $tokens;

        $this->load->model('Registration_model');

        $this->load->library('bcrypt');

        $this->load->library('form_validation');
        $this->load->model('Registration_model');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // echo $tokens;
            $this->load->view('user_authentication/newpassword', $data);

        } else {
            $password = $this->bcrypt->hash_password($this->input->post('password'));
            $valid_token = $this->Registration_model->check_token($tokens);
            $data = array();
            $data['allow_password_reset'] = '0';
            $data['token'] = $this->token();
            $data['password'] = $password;
            $con_token = $this->Registration_model->confirm_token($tokens, $data);
            if ($con_token == true) {
                $data['tokens'] = $tokens;
                $data['success'] = 'Password Changed!.You can now log in with new password..';
                $this->load->view('user_authentication/confirminfo', $data);
            } else {
                $data['error'] = 'You are not authorised for password reset!!!';
            }
        }

    }

    public function testscc($scc)
    {

        $this->load->model('Registration_model');
        print  $valid_token = $this->Registration_model->check_scc($scc);
    }

    public function testmail($email){

        $data = array();


        $this->load->library('email', $this->mail_config);



            $token = "Custom";

            $message = '<html>
            <head><title>Souktrain Mail</title></head>
              <body>
               <h1>
                    Souktrain Email Confirmation.
                </h1>
           
                        <h4>Souktrain Password Reset</h4>
                    
                    <p>Thank you for being a part of Souktrain Edu-Wealth program.
                    To reset your password please visit the link below.
                     </p>
                     <p>' . base_url('index.php/user_authentication/changePassword/' . @$token) . '</p>
                          <p>Thanks <br> Souktrain Team.</p>
                   
              </body>
             </html>   ';
            try {

                $this->email->from('Support@souktrain.com', 'Souktrain');
                $this->email->to($email);
                $this->email->subject('Password Reset');
                $this->email->message($message);

                @$sendmail = $this->email->send();


                if ($sendmail) {
                    print '<div style="color: green">check your mail to change your password</div>';
                } else {
                    print 'check yor mail server or your network'.error_get_last();
                }

            } catch (Exeption $ex) {
                print 'An error ocurred' . ' ' . $ex->message();
            }



    }


}
