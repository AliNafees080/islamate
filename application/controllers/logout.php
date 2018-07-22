<?php
ini_set("display_errors",1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();        
        $this->load->library('session'); 
        $this->load->helper('url'); 
    }    

    public function index()
    {           
        $this->session->sess_destroy();
        redirect('');        
    } 
}
?>