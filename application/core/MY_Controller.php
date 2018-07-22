<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set("display_errors", 1);

class MY_Login extends CI_Controller {

    function __construct() {

        parent::__construct();

        //Initialization code that affects all controllers
    }

}

class Member_Controller extends MY_Login {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('table');
        $this->load->helper(array('url', 'function_helper'));
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->model('queries');
        $this->load->model('user');
        $post = $this->input->post();
        $data['mailmatch'] = 0;
        if (@$post['login_username']) {
            $data['organization_details'] = $this->queries->select_query("organization", "organization_id", "`name`= '" . $post['organization'] . "' ");
            if (sizeof($data['organization_details']) != 0) {
                $password = md5($post['password']);
                $data['userdetails'] = $this->queries->select_query("user", "*", "`email_id`= '" . $post['login_username'] . "' and `password`='" . $password . "' and `organization_id`='" . $data['organization_details'][0]['organization_id'] . "' and `is_exist` = '1' ");
                //var_dump($data['userdetails'][0]['user_type']);die();
                if (sizeof($data['userdetails']) > 0 && $data['userdetails'][0]['user_type'] != "tablet_user") {
                    $this->session->set_userdata(array(
                        'username' => $data['userdetails'][0]['name'],
                        'LAST_ACTIVITY' => time(),
                        'userid' => $data['userdetails'][0]['user_id'],
                        'type' => $data['userdetails'][0]['user_type'],
                        'organization_id' => $data['userdetails'][0]['organization_id'],
                        'timezone' => $data['userdetails'][0]['timezone'],
                        'edit_login_user' => 0,
                        'user_img' => $data['userdetails'][0]['user_img']
                    ));
                    $users_value = login_organization_detail();
                    $data['login_user'] = $this->user->user_detail($this->session->userdata('userid')); //print_r($data['login_user']);die();
                    $data['emails'] = $this->user->all_users_email(); //print_r($data['emails']);die();
                    $fname = explode(' ', $data['login_user'][0]['name']);
                    $lname = explode(' ', $data['login_user'][0]['name']);
                    $this->session->set_userdata(array(
                        'user_id' => $data['login_user'][0]['user_id'],
                        'user_type' => $data['login_user'][0]['user_type'],
                        'password' => $data['login_user'][0]['password'],
                        'first_name' => current($fname),
                        'last_name' => end($lname),
                        'email_id' => $data['login_user'][0]['email_id'],
                        'briefcase[]' => $data['login_user'][0]['briefcase'],
                        'groups[]' => $data['login_user'][0]['groups']
                    ));
                    date_default_timezone_set($this->session->userdata['timezone']);
                } else {
                    $data['mailmatch'] = 1;
                    $this->load->view("pages/login", $data);
                }
            } else {
                $data['mailmatch'] = 1;
                $this->load->view("pages/login", $data);
            }
        } else if (@$this->session->userdata('username') == FALSE) {
            $this->load->view("pages/login", $data);
        } else {
            date_default_timezone_set($this->session->userdata['timezone']);
        }
    }

}
