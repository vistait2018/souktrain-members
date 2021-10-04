<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin extends CI_Controller {

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

        $this->load->model('Profile_model');


    }
    public function index()
    {
        $this->check_login();
        $this->load->view( 'templates/header' );
        $this->load->view( 'templates/topnav' );
        $this->load->view( 'templates/sidenav' );
        $this->load->view('pin/pin');
    }
    public function check_Pin(){
        $this->check_login();
        $this->load->model('Pin_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pin', 'Pin', 'required|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view( 'templates/header' );
            $this->load->view( 'templates/topnav' );
            $this->load->view( 'templates/sidenav' );
            $this->load->view('pin/pin');
        } else {
             $msg = $this->Pin_model->pinByPin($this->input->post('pin'));
             $data['msg'] = $msg;

            $this->load->view( 'templates/header' );
            $this->load->view( 'templates/topnav' );
            $this->load->view( 'templates/sidenav' );
            $this->load->view('pin/pin',$data);
        }
    }



    public function check_login() {

    if ( ! isset( $_SESSION['is_logged'] ) or empty( $_SESSION['user_id'] ) ) {
        redirect('User_authentication/logout');

    }
}



}
