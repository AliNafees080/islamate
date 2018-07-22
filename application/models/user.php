<?php

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
    }

    public function user_detail($id = 0) {
        $login_user = login_organization_detail();//print_r($login_user);die();
        $this->db->select('user.*', false);
        $this->db->select("GROUP_CONCAT( DISTINCT ". $this->db->dbprefix('briefcase_user') .".`briefcase_id` )  AS briefcase", false); 
        $this->db->select("GROUP_CONCAT( DISTINCT ".$this->db->dbprefix('user_group').".group_id ) as groups", false); 
        $this->db->select("GROUP_CONCAT( DISTINCT ".$this->db->dbprefix('briefcase').".name ) as briefcase_name", false); 
        $this->db->select("GROUP_CONCAT( DISTINCT ".$this->db->dbprefix('group').".name ) as group_name", false); 
        $this->db->group_by("user.user_id"); 
        $this->db->from('user');       
        $this->db->join('briefcase_user','briefcase_user.user_id = user.user_id', 'LEFT');
        $this->db->join('user_group','user_group.user_id = user.user_id', 'LEFT');
        $this->db->join('briefcase','briefcase_user.briefcase_id = briefcase.briefcase_id', 'LEFT');
        $this->db->join('group','user_group.group_id = group.group_id', 'LEFT');
        //die();
        if ($id != 0) {
            $this->db->where('is_exist',1);
            $this->db->where('user.user_id', $id);
        } else {
            $this->db->where('is_exist',1);
            $this->db->where_in('user.user_id', explode(",", $login_user));
        }
        $result = $this->db->get();
        $user = $result->result_array();// print_r($this->db->last_query()); 
        return $user;
    }

    public function all_users_email($id = 0) {
        $this->db->select('email_id');
        if ($id != 0) {
            $this->db->where('user_id != ', $id);
        }
        $where = array('is_exist' => 1 , 'organization_id' => $this->session->userdata('organization_id'));
        $this->db->where($where);
        $result = $this->db->get('user');//print_r($this->db->last_query());
        $emails = $result->result_array(); //print_R($emails);die('astha');
        $email_id = array();
        foreach ($emails as $value) {
            $email_id[] = $value['email_id'];
        }
        return $email_id;
    }

}
?>
