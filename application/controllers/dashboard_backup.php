<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('content');
    }

    public function index() {
        $sidebar['album_filter'] = $this->content->album_filter_detail(); //print_r($data['library']);//die();
        $template_array = array('pages/dashboard' => '');
        $this->load->template($template_array, $sidebar);
    }

}

?>
