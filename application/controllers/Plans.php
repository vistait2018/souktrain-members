<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller
{

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
        $this->check_login();
        $this->load->model('Plan_model');

        $this->load->model('Profile_model');


    }


    public function index()
    {
        $this->load->helper('url');
        $this->check_login();
        $data = array();
        if (isset($_SESSION['is_logged'])) {

            $plan = $this->Plan_model->allPlans();
            $data['plan'] = $plan;
            //var_dump($account);
            $this->load->view('plans/plans', $data);
        } else {
            $data = array(
                'heading' => 'Login Error',
                'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
            );
            $this->load->view('errors/loginerror', $data);
        }

    }


    public function check_login() {
        if ( ! isset( $_SESSION['is_logged'] ) or empty( $_SESSION['user_id'] ) ) {
           redirect('User_authentication/logout');
        }
    }


    public function viewplans($plan_id)
    {
        $this->check_login();
        $this->load->helper('url');

        $data = array();
        if (isset($_SESSION['is_logged'])) {
            $plan_id = $this->uri->segment(3, 0);
            //$profile_id = $_SESSION['profile_id'];
            $plan = $this->Plan_model->planByPlanId($plan_id);
            $data['plan'] = $plan;
            //var_dump($account);
            $this->load->view('plans/viewPlan', $data);
        } else {
            $data = array(
                'heading' => 'Login Error',
                'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
            );
            $this->load->view('errors/loginerror', $data);
        }


    }


    public function createplans()
    {
        $this->check_login();
        $this->load->model('Profile_model');
        $this->load->library('form_validation');
        $profile_id = $_SESSION['profile_id'];
        $profile_id = $_SESSION['profile_id'];
        $profile = $this->Profile_model->profileByProfileId($profile_id);
        $datas['profile'] = $profile;
        $this->form_validation->set_rules('name', 'Plan name', 'trim|required|is_unique[plans.name]');
        $this->form_validation->set_rules('order', 'Level', 'trim|required|numeric');
        $this->form_validation->set_rules('price', 'Value', 'trim|required');
        $this->form_validation->set_rules('gen1', 'First Generation', 'trim|required|numeric');
        $this->form_validation->set_rules('gen2', 'Second Generation', 'trim|required');
        $this->form_validation->set_rules('gen3', 'Third Generation', 'required');
        $this->form_validation->set_rules('gen4', 'Fourth Generation', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Plans/createPlan', $datas);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'order' => $this->input->post('order'),
                'price' => $this->input->post('price'),
                'gen1' => $this->input->post('gen1'),
                'gen2' => $this->input->post('gen2'),
                'gen3' => $this->input->post('gen3'),
                'gen4' => $this->input->post('gen4'),
                'modified' => date("Y-m-d H:i:s"),
                'created' => date("Y-m-d H:i:s")
            );
            $Plan_id = $this->Plan_model->registerPlan($data);
            if (isset($Plan_id)) {
                $datas['message'] = 'Plan created';
                $datas['$Plan_id'] = $Plan_id;
                $this->load->view('Plans/createPlan', $datas);

            }

        }

    }


    public function editplan()
    {
        check_login();
        $this->load->helper('url');

        $data = array();

        if (isset($_SESSION['is_logged'])) {
            $plan_id = $this->uri->segment(3, 0);
            $plan = $this->Plan_model->planByPlanId($plan_id);
            $data['plan'] = $plan;
            $this->load->view('plans/editPlan', $data);
        } else {
            $data = array(
                'heading' => 'Login Error',
                'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
            );
            $this->load->view('errors/loginerror', $data);
        }

    }

    public function editplans()
    {
        check_login();
        $this->load->library('form_validation');
        // $this->load->helper('url');

        $data = array();
        if (isset($_SESSION['is_logged'])) {
            $plan_id = $this->uri->segment(3, 0);
            $plan = $this->Plan_model->planByPlanId($plan_id);
            $datas['plan'] =$plan;
            $this->form_validation->set_rules('name', 'Plan name', 'trim|required');
            $this->form_validation->set_rules('order', 'Level', 'trim|required|numeric');
            $this->form_validation->set_rules('price', 'Value', 'trim|required');
            $this->form_validation->set_rules('gen1', 'First Generation', 'trim|required|numeric');
            $this->form_validation->set_rules('gen2', 'Second Generation', 'trim|required');
            $this->form_validation->set_rules('gen3', 'Third Generation', 'required');
            $this->form_validation->set_rules('gen4', 'Fourth Generation', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('plans/editPlan',$datas);
                //var_dump($plan);
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'order' => $this->input->post('order'),
                    'price' => $this->input->post('price'),
                    'gen1' => $this->input->post('gen1'),
                    'gen2' => $this->input->post('gen2'),
                    'gen3' => $this->input->post('gen3'),
                    'gen4' => $this->input->post('gen4'),
                    'modified' => date("Y-m-d H:i:s")

                );
                //var_dump($plan);

                $updated = $this->Plan_model->updateplan($plan_id, $data);
                if ($updated != 1) {
                    $datas['message'] = 'Your record has been updated.No changes made';
                    $this->load->view('plans/editPlan', $datas);

                } else {
                    $datas['message'] = 'Your record has been updated.';
                    $this->load->view('plans/editPlan', $datas);
                }


            }


        }
 
}

 }

