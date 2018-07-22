<?php

class Contacts extends Member_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper( array('url', 'function_helper') );
        $this->load->helper('url');
        $this->load->model('contact');
        $this->load->model('content');
    }

    public function index() {
        $data['detail'] = $this->contact->contact_detail();
//        $data['field'] = $this->contact->contact_fields();
        $data['status'] = $this->contact->contact_status();
        $data['info'] = array('detail' => $data['detail'], 'status' => $data['status']); //print_r($data['info']);die();
        $sidebar['album_filter'] = $this->content->album_filter_detail();
        $template_array = array('pages/contacts' => $data);
        $this->load->template($template_array,$sidebar);
    }

//    public function add_field() {
//        $post = $this->input->post(); //print_r($post);die();
//        if (empty($post['contact_field_id'])) {
//            $mandatory = (isset($post['is_mandatory'])) ? 1 : 0; //print_r($mandatory);die();
//            $data = array('name' => $post['name'], 'is_mandatory' => $mandatory, 'type' => $post['type']);
//            $new_field = $this->contact->set_field($data);
//            $new_field['response'] = json_encode($new_field, JSON_HEX_APOS); //print_r($add_user['response']);die();
//            $this->load->view('pages/responseview', $new_field);
//        } else {
//            $mandatory = (isset($post['is_mandatory'])) ? 1 : 0; //print_r($mandatory);die();
//            $data = array('contact_field_id' => $post['contact_field_id'], 'name' => $post['name'], 'is_mandatory' => $mandatory, 'type' => $post['type']);
//            $updated_field = $this->contact->update_field($data);
//            $updated_field['response'] = json_encode($updated_field, JSON_HEX_APOS); //print_r($add_user['response']);die();
//            $this->load->view('pages/responseview', $updated_field);
//        }
//    }

    public function add_status() {
        $post = $this->input->post(); //print_r($post);die();
        if (empty($post['contact_status_id'])) {
            $new_status = $this->contact->set_status($post);
            $new_status['response'] = json_encode($new_status, JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $new_status);
        } else {
            $updated_status = $this->contact->update_status($post);
            $updated_status['response'] = json_encode($updated_status, JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $updated_status);
        }
    }

    public function delete_contact() {
        $post = $this->input->post();
        $this->contact->delete($post);
    }

    public function delete_fields() {
        $post = $this->input->post();
        $this->contact->delete_field($post);
    }

    public function delete_status() {
        $post = $this->input->post();
        $this->contact->delete_contact_status($post);
    }

}

?>
