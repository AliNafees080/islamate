<?php
//ini_set("display_errors",1);
class Thankyou extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
    }

    public function index() { //Organization specific and with new database done
      $this->load->view('pages/thankyou');
    }    

    }
?>
