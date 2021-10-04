<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Upload_center_model');
        $this->load->model('Profile_model');
        $this->check_login();

    }

    public function index()
    {
        $this->load->view('album_books/album_new', array('error' => ' ' ));
    }

    public function do_uploadCover()
    {        $this->load->library('form_validation');
              $new_name = time().$_FILES["userfile"]['name'];

        $album = $this->Upload_center_model->allAlbums();
        $data = array();
        $data['album']=  $album;
        $config['file_name'] = $new_name;
        $config['upload_path']          = './assets/uploads/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        $data = array();
        if (isset($_SESSION['is_logged'])) {
            $image_name =$_FILES['userfile']['name'];
            $this->form_validation->set_rules('name', 'Cover name', 'trim|required|is_unique[album.name]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('album_books/album_new', $data);
            } else {
                $name = $this->input->post('name');
                $data['name'] = $name ;
                $data['cover_url']= $this->upload->data('full_path');
                $data['image_name'] = $new_name;
                $data['modified_at'] = date("Y-m-d H:i:s");
                $data['created'] = date("Y-m-d H:i:s");

              $insert_id =  $this->Upload_center_model->insert($data);
                $new_file_name = $insert_id;
                if(isset($insert_id) and !$insert_id === false ){
                    if ( ! $this->upload->do_upload('userfile'))
                    {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('album_books/album_new', $error);
                    }
                    else
                    {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('album_books/album_new', $data);
                    }

                }else{

                    $this->Upload_center_model->deletecover( $insert_id);
                    //$error = array('error' => $this->upload->display_errors());

                    $this->load->view('album_books/album_new');
                }

            }
        }

    }
    
    


       public function book($category_id){
           $book = array();
           $book['book'] = $this->Upload_center_model->allBooks($category_id);
       //var_dump ( $book['book']);
           $book = array_filter($book);

           if(!empty($book)){
               $book['albumname'] = $this->Upload_center_model->categoryname($category_id);
               //var_dump($book);
           }else{
               $book = array();
               $book['message'] = 'No book available!';
           }
           $this->load->view('album_books/book_list',$book);
      }

    public function category()
    {
        $album = array();
        $album['album'] = $this->Upload_center_model->allAlbums();
        $album = array_filter($album);

        if(!empty($album)) {


        }else{
            $album = array();
            $album['message'] = 'No book available!';

        }
        $this->load->view('album_books/album_list', $album);
           }


    public function viewCategory($album_id){
        $data = array();
        $album_id = $this->uri->segment(3, 0);

        $album = $this->Upload_center_model->allSingleAlbums($album_id);

        if (isset($album) ){
            $data['album']= $album;
            //var_dump($data);
            $data['message']= 'View Category';
        }else{
            $data['album'] = '';
            $data['message']= 'Not Available';
        }

       $this->load->view('album_books/album_view', $data);
    }




    public function editcat($album_id)
    {

        //$this->load->helper('url');

        $data = array();

        if (isset($_SESSION['is_logged'])) {
            $album_id = $this->uri->segment(3, 0);
            $album = $this->Upload_center_model->allAlbums($album_id);
            $data['album'] = $album;
            $this->load->view('album_books/album_edit', $data);
        } else {
            $data = array(
                'heading' => 'Login Error',
                'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
            );
            $this->load->view('errors/loginerror', $data);
        }

    }


    public function editcategory($album_id)
    {
        $this->load->library('form_validation');
        $album_id = $this->uri->segment(3, 0);
        $album = $this->Upload_center_model->allSingleAlbums($album_id);
        $datas['album'] = $album;

        $old_cover_file =  $_SERVER['DOCUMENT_ROOT'] . '/souktrain_front_end/assets/uploads/images/' . $album->image_name;

        @$newname = time() . $_FILES['userfile']['name'];
        $config['file_name'] = $newname;
        $config['upload_path'] = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;


        $this->load->library('upload', $config);
        $this->form_validation->set_rules('name', 'Category Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('album_books/album_edit', $datas);

        } else {


            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('album_books/album_edit', $datas);
                //print'not done';
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'modified_at' => date("Y-m-d H:i:s"),
                    'image_name' => $this->upload->data('file_name'),
                    'cover_url' => './assets/uploads/images/'.$this->upload->data('file_name')

                );
                $updated = $this->Upload_center_model->updateAlbum($album_id, $data,  $old_cover_file);

                if($updated)$datas['message']= 'Category Editted';
                $this->load->view('album_books/album_edit', $datas);
            }

            }
        }
      public function viewBook($book_id,$category_id){
          $category_id = $this->uri->segment(4, 0);
          $book_id = $this->uri->segment(3, 0);
          $book = array();
          $book['book'] = $this->Upload_center_model->getBook($book_id);

          $book = array_filter($book);

          if(!empty($book)){
              $book['albumname'] = $this->Upload_center_model->categoryname($category_id);
             // var_dump ( $book['albumname']);
          }else{
              $book = array();
              $book['message'] = 'No book available!';
          }
          $this->load->view('album_books/book_view',$book);
      }

   public function editBook($book_id,$category_id){

       $data = array();

       if (isset($_SESSION['is_logged'])) {
           $category_id = $this->uri->segment(4, 0);
           $book_id = $this->uri->segment(3, 0);
           $albumname = $this->Upload_center_model->allSingleAlbums($category_id);
           $album = $this->Upload_center_model->allAlbums();
           $book = $this->Upload_center_model->allSingleBooks($book_id);
           $data['album'] = $album;
           $data['albumname'] = $albumname;
           $data['book'] = $book;
           $data['book_id'] = $book_id;
           $data['category_id'] = $category_id;
           //$_SESSION['book_id'] =
           $this->load->view('album_books/book_edit', $data);
       } else {
           $data = array(
               'heading' => 'Login Error',
               'message' => '<div class="alert alert-danger"><a href="' . base_url() . 'index.php/home">Click to register</a></div>'
           );
           $this->load->view('errors/loginerror', $data);
       }
   }


   public function editBookUpload($book_id,$category_id){
       $this->load->library('form_validation');
       $category_id = $this->uri->segment(4, 0);
       $book_id = $this->uri->segment(3, 0);
       $album = $this->Upload_center_model->allSingleAlbums($category_id);
       $book = $this->Upload_center_model->allSingleBooks($book_id);
       $datas['album'] = $album;
          // var_dump($album);
      $old_cover_file =  $_SERVER['DOCUMENT_ROOT'] . '/souktrain_front_end/assets/uploads/dorc_pdf/' . $book->book_name;

       @$newname = time() . $_FILES['userfile']['name'];
       $config['file_name'] = $newname;
       $config['upload_path'] = './assets/uploads/dorc_pdf/';
       $config['allowed_types'] = 'pdf|doc|docx|text';
       $config['max_size'] = 800000;
       $config['max_width'] = 1024;
       $config['max_height'] = 768;
       var_dump($config);

      $lib= $this->load->library('upload', $config);
       var_dump($lib);
       $this->form_validation->set_rules('title', 'Book Title', 'trim|required');
       $this->form_validation->set_rules('caption', 'Book Caption', 'trim|required');
       $this->form_validation->set_rules('author', 'Book Author', 'trim|required');
       $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');

       if ($this->form_validation->run() == FALSE) {
           $this->load->view('album_books/book_edit', $datas);

       } else {


           if (!$this->upload->do_upload('userfile')) {
               $error = array('error' => $this->upload->display_errors());

               $this->load->view('album_books/book_edit', $datas);
               //print'not done';
           } else {
               $data['aid'] = $category_id;
               $data['book_name'] = @$newname;
               $data['title'] = $this->input->post('title');
               $data['author'] = $this->input->post('author');
               $data['caption'] = $this->input->post('caption');
               $data['isbn'] = $this->input->post('isbn');
               $data['book_url'] = './assets/uploads/dor_pdf/'.$this->upload->data('file_name');
               $data['modified_at'] = date("Y-m-d H:i:s");
               //var_dump($data);


              echo $updated = $this->Upload_center_model->updateBook($book_id, $data,  $old_cover_file);

               if($updated){
                   $datas['message'] = 'book editted';
                   $this->load->view('album_books/book_list', $datas);
               }
           }

       }
   }
   public function books($book_category_id){
     $book_category_id = $this->uri->segment(3, 0);
     
   }
     Public function ReadBook(){
         $this->load->view('album_books/reader');
     }


    public function downloader($book_name,$title)
    {     $book_name = $this->uri->segment(3, 0);
        $title = $this->uri->segment(4, 0);
        $data['bookname'] = $book_name;
        $data['title'] = $title;
        $this->load->helper('download');
       // $path =  base_url('assets/uploads/dorc_pdf/').$book_name;



      if (isset($book_name)){
          $data['message'] = 'Downloading....'.$title;

          $this->load->view('album_books/download_book',$data);
      }
      else{
          $data['message'] = 'Book no available ';
          $this->load->view('album_books/download_book',$data);
      }
    }
    public function check_login() {
        if ( ! isset( $_SESSION['is_logged'] ) or empty( $_SESSION['user_id'] ) ) {
            redirect('User_authentication/logout');
        }
    }


}

    ?>