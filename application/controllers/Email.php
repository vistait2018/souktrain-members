<?php
class Email extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index() {

        $this->load->helper('form');
        //$this->load->view('email_form');
    }
                  public  function sendMail()
                      {
                       $profile_id = $_SESSION['profile_id'];    
                      
                      $config = Array(
                                'User-Agent'=>'Souktrain',
                               'protocol' => 'smtp',
                               'smtp_host' => 'ssl://smtp.googlemail.com',
                               'smtp_port' => 465,
                               'smtp_user' => 'jidedorcas@gmail.com', // change it to yours
                               'smtp_pass' => 'olamide99', // change it to yours
                               'mailtype' => 'html',
                               'charset' => 'iso-8859-1',
                               'wordwrap' => TRUE
                       );
                      

                         $message = '<!--Panel-->
             <div class="card">
                <div class="card-header danger-color-dark white-text">
                    Featured
                </div>
                <div class="card-block">
                    <h4 class="card-title">Special thanks</h4>
                    <p class="card-text">You have been registered with souktrain.To register other </p>
                    <a href="'. base_url().'index.php/user_authentication/mail/'.$profile_id.'" class="btn btn-danger"> Click</a>
                </div>
            </div>
            <!--/.Panel-->';
                         $this->load->library('email', $config);
                       $this->email->set_newline("\r\n");
                       $this->email->from('jidedorcas@gmail.com'); // change it to yours
                       $this->email->to('jidedorcas@gmail.com');// change it to yours
                       $this->email->subject('Resume from JobsBuddy for your Job posting');
                       $this->email->message($message);
                       if($this->email->send())
                      {
                       echo 'Email sent.';
                      }
                      else
                     {
                          //echo gethostbyname("host.name.tld");
                      //var_export (dns_get_record ( "host.name.tld") );
                      show_error($this->email->print_debugger());
                     }

                 }
   
}
?>