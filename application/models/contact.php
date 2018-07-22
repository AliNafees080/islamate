<?php

class Contact extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper( array('url', 'function_helper') );        
    }

    public function contact_detail() {
        $login_user = login_organization_detail();
        $this->db->select('*');
        $this->db->where_in('created_by',explode(',',$login_user));
        $result = $this->db->get('contact');
        $contact = $result->result_array();
        $contact_info = array();
        foreach ($contact as $key => $value) {
            //********created by user*********
            $this->db->select('email_id');
            $this->db->where('user_id', $value['created_by']);
            $user = $this->db->get('user');
            $created = $user->result_array();
            $user_name = array();
            foreach ($created as $user) {
                $user_name['name'] = implode(' ', $user); //print_r($user_name);
            }
            $contact[$key]['user'] = $user_name['name']; //print_r($contact);
            //**********organization name by id****************
            $org = json_decode($value['contact_info'], true);
            $this->db->select('name');
            $this->db->where('organization_id', $org['organization_id']);
            $con_org = $this->db->get('organization');
            $organization = $con_org->result_array();
            $org_name = array();
            foreach ($organization as $org_value) {
                $org_name['name'] = implode(' ', $org_value); //print_r($org_name);
            }
            $contact[$key]['organization'] = $org_name['name']; //print_r($contact);
            //***********final array**************
            $contact_info[] = $contact[$key];
        }//die();
        return $contact_info;
    }

//    public function contact_fields() {
//        $this->db->select('*');
//        $result = $this->db->get('contact_field');
//        $fields = $result->result_array();
//        return $fields;
//    }

    public function contact_status() {
        $login_user = login_organization_detail();
        $this->db->select('*');
        $this->db->where_in('user_id',explode(',',$login_user));
        $result = $this->db->get('contact_status');
        $status = $result->result_array();//print_r($status);die();
        return $status;
    }

//    public function set_field($data) {
//        $this->db->insert('contact_field', $data); //print_r($response);
//        $field_id = $this->db->insert_id();
//        $this->db->select('*');
//        $this->db->where('contact_field_id', $field_id);
//        $field = $this->db->get('contact_field');
//        $response = $field->row_array();
//        return $response;
//    }

//    public function update_field($data) {
//        $this->db->where('contact_field_id', $data['contact_field_id']);
//        $this->db->update('contact_field', $data);
//        $this->db->select('*');
//        $this->db->where('contact_field_id', $data['contact_field_id']);
//        $update = $this->db->get('contact_field');
//        $updated_field = $update->row_array();
//        $updated_field['action'] = 'updated';
//        return $updated_field;
//    }

    public function set_status($data) {
        $this->db->insert('contact_status', $data);
        $status_id = $this->db->insert_id();
        $this->db->select('*');
        $this->db->where('contact_status_id', $status_id);
        $status = $this->db->get('contact_status');
        $response = $status->row_array();
        return $response;
    }

    public function update_status($data) {
        $this->db->where('contact_status_id', $data['contact_status_id']);
        $this->db->update('contact_status', $data);
        $this->db->select('*');
        $this->db->where('contact_status_id', $data['contact_status_id']);
        $update = $this->db->get('contact_status');
        $updated_status = $update->row_array();
        $updated_status['action'] = 'updated';
        return $updated_status;
    }

    public function delete($data) {
        $this->db->delete('contact', array('contact_id' => $data['contact_id']));
    }

    public function delete_field($data) {
        $this->db->delete('contact_field', array('contact_field_id' => $data['contact_field_id']));
    }

    public function delete_contact_status($data) {
        $this->db->delete('contact_status', array('contact_status_id' => $data['contact_status_id']));
    }

}

?>
