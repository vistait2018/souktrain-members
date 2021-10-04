<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sendmails extends CI_Controller {

    public function htmlmail($email){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.souktrain.com',
            'smtp_port' => 465,
            'smtp_user' => 'support@souktrain.com',
            'smtp_pass' => 'Netronit1@',
            'smtp_timeout' => '4',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('Support@souktrain.com', 'Souktrain');
        $data = array(
            'userName'=> 'support@souktrain.com'
        );
        $this->email->to($email);  // replace it with receiver mail id
        $this->email->subject(' Souktrain Registration'); // replace it with relevant subject

        $body = $this->load->view('emails/anillabs.php',$data,TRUE);
        $this->email->message($body);
        $this->email->send();
    }

}