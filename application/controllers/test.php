<?php

class Test extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index(){
         $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/chatform');
        $this->load->view('test');
//        $this->load->view('template/footer');
        
     
    }
    
  
}
?>
