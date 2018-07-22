<?php

class Content extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('queries');
        $this->load->helper( array('url', 'function_helper') );
    }   
    
    public function add_album($data) { //done organization
        $this->db->insert('content', $data);
        $album_id = $this->db->insert_id();
        $this->db->select('*');
        $this->db->where('content_id', $album_id);
        $album_filter = $this->db->get('content');
        $response = $album_filter->row_array();
        return $response;
    }
}

?>
