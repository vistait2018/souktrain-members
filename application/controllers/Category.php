<?php
class category extends CI_Controller {



   public function do_upload($album_id)
 {

            $config['upload_path']          = './assets/uploads/images';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
            $error = array('error' => $this->upload->display_errors());

            //$this->load->view('upload_form', $error);
                print'not done';
            }
            else
            {
            $data = array('upload_data' => $this->upload->data());

           // $this->load->view('upload_success', $data);
                print 'done';
            }
            }



}
?>
