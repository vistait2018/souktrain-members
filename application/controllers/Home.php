<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
		$startday = DateTime::createFromFormat('Y-m-d','2018-02-01');
		/*if(truedate_format($startday, 'Y-m-d') == date('Y-m-d') ) {*/
		$this->load->view('site/home-landing');
		/*}else{

			$this->load->view('site/home-countdown');
		}*/

		
	}
    public function about()
	{
		$this->load->view('site/about');
	}
    public function Info()
    {
        $this->load->view('site/home');
    }
    public function contact()
	{
        
		$this->load->view('site/contact');
	}

     public function vision()
	{
        
		$this->load->view('site/vision');
	}
     public function mission()
	{
        
		$this->load->view('site/mission');
	}
     public function wwdo()
	{
        
		$this->load->view('site/do');
	}
     public function ideal()
	{
        
		$this->load->view('site/ideal');
	}
     public function products()
	{
        
		$this->load->view('site/product');
	}
         public function coral()
	{
        
		$this->load->view('site/coral');
	}
         public function cadet()
	{
        
		$this->load->view('site/cadet');
	}
         public function silver()
	{
        
		$this->load->view('site/silver');
	}
         public function psilver()
	{
        
		$this->load->view('site/psilver');
	}
         public function platinum()
	{
        
		$this->load->view('site/platinum');
	}
       

    public function culture()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('includes/admin_nav');
        $this->load->view('includes/culture');
        $this->load->view('includes/footer');
    }
    public function coach()
    {
        $this->load->view('includes/admin_header');
        $this->load->view('includes/admin_nav');
        $this->load->view('includes/coach');
        $this->load->view('includes/footer');
    }
     public function policy()
	{
        
		$this->load->view('site/policy');
	}
     public function questions()
	{
        
		$this->load->view('site/questions');
	}
    
     public function downloader()
	{
        $this->load->helper('download');
        
		$this->load->view('site/souktrain');
	}
     public function page()
	{
        
		$this->load->view('site/pageloader');
	}
    public function client(){
       $this->load->view('site/clientpage');
	} 
    public function toupper(){
       echo $code = "  st1234".date('y');
       echo $codes = trim(strtoupper($code));
    }
}
