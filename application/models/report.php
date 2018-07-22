<?php

class Report extends CI_Model {

    

    public function popular_assets() {
        $this->db->select('notification.content_id, COUNT(*) as views');
        $this->db->where('type','view');
        $this->db->select('filename');
        $this->db->from('content');
        $this->db->join('notification', 'content.content_id = notification.content_id');
        $this->db->group_by('notification.content_id');
        $this->db->order_by('views', 'desc');
        $this->db->limit(10);
        $result =  $this->db->get();
        return $allcontentcount = $result->result_array();//print_r($allcontentcount);die();
    }

    public function active_users() {
        $this->db->select('*');
        $result = $this->db->get('user');
        $alluser = $result->result_array();
        return $alluser;
    }

    public function used_channels($data) {
         $this->db->select('*');
        $result = $this->db->get('channel');
        $allchannel = $result->result_array();
        return $allchannel;
    }

   

}

?>
