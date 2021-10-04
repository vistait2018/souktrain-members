<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Upload_center_model extends CI_Model{


    function __construct() {
        $this->tableName = 'book_categories';
        $this->primaryKey = 'id';
    }

    public function insert($data = array()){

        $insert = $this->db->insert('book_categories',$data);
        if($insert){
            return $id = $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function insertPhoto($data = array()){

        $insert = $this->db->insert('books',$data);
        if($insert){
            return $id = $this->db->insert_id();
        }else{
            return false;
        }
    }
 
     public function insertProfilePhoto($data = array()){

        $insert = $this->db->insert('profile',$data);
        if($insert){
            return $id = $this->db->insert_id();
        }else{
            return false;
        }
    }

   public function deletecover($aid){
     $r =   $this->db->delete('books', array('id' => $aid));
          return $r;
}
     public function allAlbums(){
         $query = $this->db->get('book_categories');
         $query_result = $query->result();
         return $query_result;
     }
     public function getBook($book_id)
     {
         $this->db->select('*');
         $this->db->from('books');
         $this->db->where('id', $book_id);
         $r =  $this -> db -> get();
         $query_result =  $r->row();
         return $query_result;
     }

    public function allBooks($category_id){
        $this->db->select('*');
        $this->db->from('books');
        $this->db->where('book_category_id', $category_id);
        $r =  $this -> db -> get();
        $query_result =  $r->result();
        return $query_result;
    }

    public function allSingleAlbums($album_id){
        $this->db->select('*');
        $this->db->from('book_categories');
        $this->db->where('id', $album_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function allSingleBooks($book_id){
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('id', $book_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }


    public function categoryname($album_id){
        $this->db->select('*');
        $this->db->from('book_categories');
        $this->db->where('id', $album_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function getCoverurl($album_id){
        $this->db->select('cover_url');
        $this->db->from('book_categories');
        $this->db->where('id', $album_id);
        $this -> db -> limit(1);
        $r =  $this -> db -> get();
        return $r->row();
    }

    public function updateAlbum($album_id,$data,$old_url){
            $this->db->where('id', $album_id);
           $r= $this->db->update('book_categories', $data);
              if($r) {

                 $delete_old_url=$this->unlink($old_url);
                 return $id = $this->db->insert_id();
              }



    }
    public function updateBook($book_id,$data,$old_url){
        $this->db->where('id', $book_id);
        $r= $this->db->update('books', $data);
        if($r) {

            $delete_old_url=$this->unlink($old_url);
            return true;
        }



    }

        public function unlink($url){

        if( is_file($url)){
                unlink($url) ;
                echo 'true';
            }else{
                echo 'false';
            }


    }
    public function updatePhoto($aid,$data){
        //var_dump($data);
        $this->db->cache_off();
        $this->db->where('id', $aid);
        $this->db->update('books', $data);
        $affectedRows = $this->db->affected_rows();
        return $affectedRows;
    }


    public function deleteAlbumCover($cover_url){

        //delete_files($path, true);

    }

    public function insertBook($data = array()){

        $insert = $this->db->insert('books',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function deleteBook($book_id){

        $this->db->where('id', $book_id);
        $r =  $this->db->delete('books');
        return $r;
    }
 public function books(){
     $this->db->select('*');
     $this->db->from('book_categories');
     $this -> db -> limit(1);
     $r =  $this -> db -> get();
     return $r->result();
}







  }