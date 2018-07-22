<?php

class Users extends Member_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
        $this->load->model('user');
        $this->load->model('group');
        $this->load->model('announcement');
        $this->load->model('content');
        $this->load->model('queries');
    }

    public function index() { 
       
        
        }

    public function all_users() {
        $users_value = login_organization_detail();
        $data['detail'] = $this->user->user_detail(); //die();
        foreach ($data['detail'] as $key => $value) {
            $name = explode(' ', $value['name']);
            $data['detail'][$key]['last_login'] = (!is_null($value['last_login'])) ? $value['last_login'] : 'User not logged in';
            $data['detail'][$key]['briefcase[]'] = $value['briefcase'];
            $data['detail'][$key]['groups[]'] = $value['groups'];
            $data['detail'][$key]['first_name'] = current($name);
            $data['detail'][$key]['last_name'] = end($name);
        }
        $data['timezone'] = $this->queries->select_query('timezone','TimeZoneId');
        $data['briefcase'] = $this->queries->select_query("briefcase", "briefcase_id, name", "`user_id` in (" . $users_value . ")");
        $data['group'] = $this->queries->select_query("group", "group_id, name", "`user_id` in (" . $users_value . ")");
        $data['emails'] = $this->user->all_users_email();
        $user['info'] = array('detail' => $data['detail'], 'emails' => $data['emails'], 'briefcase' => $data['briefcase'], 'group' => $data['group'], 'timezone' => $data['timezone']); //print_r($user);die();
        $header['group_detail'] = $data['group'];
        $header['briefcase_detail'] = $data['briefcase'];
        $header['emails'] = $data['emails'];
        $header['timezone'] = $data['timezone'];
        $template_array = array('pages/all_user' => $user);
        $this->load->template($template_array, $header);
    }

    public function insert_user() {
        $post = $this->input->post(); //print_r($post);die();
        if (!empty($_FILES['user_img']['name']) && !empty($_FILES['user_img']['type'])) {
            $filename = explode('.', $_FILES['user_img']['name']);
            $uploaddir = dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/users/' . $_FILES['user_img']['name'];
            @move_uploaded_file($_FILES['user_img']['tmp_name'], $uploaddir);
        }
        if (empty($post['user_id'])) {

            if (!empty($_FILES['user_img']['name'])) {
                $img = $_FILES['user_img']['name'];
            } else {
                if ($post['user_type'] == 'tablet_user') {
                    $img = 'user.png';
                } else {
                    $img = 'admin.png';
                }
            }
//            $post['password'] = md5($post['password']);
            $user_data = array('name' => $post['first_name'] . ' ' . $post['last_name'],
                'organization_id' => $post['organization_id'],
                'user_type' => $post['user_type'],
//                'password' => $post['password'],
                'password' => 0,
                'email_id' => $post['email_id'],
                'last_login' => (!empty($post['last_login'])) ? $post['last_login'] : NULL,
//                'user_img' => 'users/' . $_FILES['user_img']['name'],
                'user_img' => 'users/' . $img,
                'timezone' => $post['timezone']);
            $this->db->set('creation_time', 'NOW()', FALSE);
            $new_user = $this->queries->insert_query('user', $user_data); //print_r($add_user);die();
            if (!empty($_FILES['user_img']['name']) && !empty($_FILES['user_img']['type'])) {
                rename(dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/users/' . $_FILES['user_img']['name'], dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/users/' . $new_user . '.' . end($filename));
                $this->queries->update_query('user', array('user_img' => 'users/' . $new_user . '.' . end($filename)), 'user_id = ' . $new_user);
            }
            //**********Below code is used to send invitation mail to created user******
            $mail_data['name'] = $post['first_name'];
            $mail_data['user_id'] = $new_user;
            $mail_data['email_id'] = $post['email_id'];
            $this->send_invitation_mail($mail_data);
            //**********End code********************
            //***************insert briefcase user relation data****************
            if (!empty($post['briefcase'])) {
                foreach ($post['briefcase'] as $briefcase) {
                    $briefcase_user = array('user_id' => $new_user, 'briefcase_id' => $briefcase);
                    $this->queries->insert_query('briefcase_user', $briefcase_user);
                    $this->add_announcement($new_user, $post['timezone'], $briefcase);
                }
            }
            //***********insert group user relation data******************
            if (!empty($post['groups'])) {
                foreach ($post['groups'] as $group) {
                    $group_user = array('user_id' => $new_user, 'group_id' => $group);
                    $this->queries->insert_query('user_group', $group_user);
                    //$this->add_group($new_user, array($group));
                }
            }
            //************user detail***************
            $new_user_detail = $this->user->user_detail($new_user); //print_r($new_user_detail);//die();
            foreach ($new_user_detail as $key => $value) {//print_r($value['device_model']);
                $new_user_detail[$key]['last_login'] = (!is_null($value['last_login'])) ? $value['last_login'] : 'User not logged in';
                $new_user_detail[$key]['briefcase[]'] = $value['briefcase'];
                $new_user_detail[$key]['groups[]'] = $value['groups'];
                $new_user_detail[$key]['first_name'] = current(explode(' ', $value['name']));
                $new_user_detail[$key]['last_name'] = end(explode(' ', $value['name']));
            }//print_r($new_user_detail);die();
            $add_user['response'] = json_encode($new_user_detail[0], JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $add_user);
        } else {//print_r($post);
            //******user change**********
            if (!empty($_FILES['user_img']['name']) && !empty($_FILES['user_img']['type'])) {//echo 'update case';die();
                $user_image = $this->queries->select_query('user', 'user_img', 'user_id =' . $post['user_id']); // print_r($user_image);//die();
//                unlink(dirname($_SERVER['SCRIPT_FILENAME']) . "/assets/upload/users/" . $post['user_id'] . '.*');
                if(!file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . "/assets/upload/" . $user_image[0]['user_img']))
                unlink(dirname($_SERVER['SCRIPT_FILENAME']) . "/assets/upload/" . $user_image[0]['user_img']);
                rename(dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/users/' . $_FILES['user_img']['name'], dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/users/' . $post['user_id'] . '.' . end($filename));
                $post['user_img'] = 'users/' . $post['user_id'] . '.' . end($filename);
            }
            //*********user image****************
            $new_briefcase = (!empty($post['briefcase'])) ? $post['briefcase'] : array();//print_R($new_briefcase);
            $new_group = (!empty($post['groups'])) ? $post['groups'] : array();//print_R($new_group);
            $old_briefcase = array();
            //**********fetch old briefcase of an user**************
            $old_briefcase_user = $this->queries->select_query('briefcase_user', 'briefcase_id', 'user_id =' . $post['user_id']); //print_R($old_briefcase_user);
            foreach ($old_briefcase_user as $vals) {
                $old_briefcase[] = $vals['briefcase_id'];
            }// print_r($old_briefcase); //die();   
            //********fetch old group of an user************
            $old_group = array();
            $old_user_group = $this->queries->select_query('user_group', 'group_id', 'user_id =' . $post['user_id']); //print_r($old_user_group);
            foreach ($old_user_group as $val) {
                $old_group[] = $val['group_id'];
            }// print_r($old_group);//die();
            //******assign new briefcase to user *********
            $common_briefcase = array_intersect($old_briefcase, $new_briefcase);//print_R($common_briefcase);
            $add_briefcase_update = array_diff($new_briefcase, $common_briefcase);//print_R($add_briefcase_update);
            $del_briefcase = array_diff($old_briefcase, $common_briefcase);//print_R($del_briefcase);//die();
             //********group calculation*********************
            $old_group = (!empty($old_group)) ? $old_group : array();
            $group_intersect = array_intersect($new_group, $old_group);//print_r($group_intersect);
            $add_group = array_diff($new_group, $group_intersect);//print_r($add_group);
            $del_group = array_diff($old_group, $group_intersect);//print_R($del_group);//die();
            if (!empty($add_group)) {
                $this->add_group($post['user_id'], $add_group);
            }
            if (!empty($del_group)) {
                $this->delete_group($post['user_id'], $post['timezone'], $del_group);
            }
            //**********new user list of groups****************
            $new_user_group_briefcase = array();
            if(!empty($add_group)){
            foreach ($add_group as $new_val) {
//            foreach ($new_group as $new_val) {
                $new_user_group_briefcase[] = $this->queries->select_query('briefcase_group', 'briefcase_id', 'group_id =' . $new_val); //print_r($new_user_group_briefcase);
            }    // print_r($new_user_group_briefcase);//die();  
            }
            $old_briefcase = (!empty($old_briefcase)) ? $old_briefcase : array();       //     print_r($old_briefcase);
            //******assign new briefcase to user via group*********
            if (!empty($new_user_group_briefcase)) {
                $multibriefcase = array();
                foreach ($new_user_group_briefcase as $values) {
                    foreach ($values as $bval) {
                        $multibriefcase[] = $bval['briefcase_id'];
                    }
                } //print_r($multibriefcase); //die();
            }
            $multibriefcase = (!empty($multibriefcase)) ? $multibriefcase : array();  
                //*********add delete case****************
                if (!empty($add_briefcase_update)) {
                    foreach ($add_briefcase_update as $addbriefcase) {
                        if (!in_array($addbriefcase, $multibriefcase)) {
                            //add announcement and briefcase to briefcase_user table
                            $briefcase_user_update = array('user_id' => $post['user_id'], 'briefcase_id' => $addbriefcase);//print_r($briefcase_user_update);//die();
                            $this->queries->insert_query('briefcase_user', $briefcase_user_update);
                            $this->add_announcement($post['user_id'], $post['timezone'], $addbriefcase);
                            //********last update************
                            $this->db->set('last_update', 'NOW()', FALSE);
                            $this->db->where('user_id',$post['user_id']);
                            $this->db->update('user');
                        }
                    }//die();
                }
                if (!empty($del_briefcase)) {
                    foreach ($del_briefcase as $del) {
                        if (!in_array($del, $multibriefcase)) {
                            //delete announcement  and delete from breifcase_user
                            $this->delete_announcement($post['user_id'], $post['timezone'], $del_briefcase);
                        }
                    }
                }//die();
                //*************merge new briefcase via new group****************
                $intersect = array_intersect($old_briefcase, $multibriefcase);//print_r($intersect);
                $add_briefcase_via_group = array_diff($multibriefcase, $intersect);//print_R($add_briefcase_via_group);
                //***********************************************************
                if (!empty($add_briefcase_via_group)) {
                    foreach ($add_briefcase_via_group as $addbriefcase) {
                        $briefcase_user_update = array('user_id' => $post['user_id'], 'briefcase_id' => $addbriefcase);//print_R($briefcase_user_update);die();
                       // $this->queries->insert_query('briefcase_user', $briefcase_user_update);
                        $this->add_announcement($post['user_id'], $post['timezone'], $addbriefcase);
                    }
                }//die();
             $type = $this->queries->select_query('user','user_type','user_id = '.$post['user_id']);///print_r($type);
            if($type[0]['user_type'] == 'owner'){
                unset($post['user_type']);
            }//die();
//            *****************set password****************
           $pswd = $this->queries->select_query('user','password','user_id = '.$post['user_id']);
            if ($post['password'] != $pswd[0]['password']) {//print_r($post['password']);die();
                
                $post['password'] = md5($post['password']);
            } else {//print_r($post['password']);die();
                unset($post['password']);
            }
            $post['name'] = $post['first_name'] . ' ' . $post['last_name'];
            unset($post['creation_time'], $post['last_login'], $post['groups'], $post['briefcase'], $post['first_name'], $post['last_name'], $post['txt']); //unset($post['last_login']);unset($post['groups[]']);unset($post['briefcase[]']);
            $new_user = $this->queries->update_query('user', $post, 'user_id =' . $post['user_id']); //print_r($new_user);die();
            $update_user_detail = $this->user->user_detail($post['user_id']);
            foreach ($update_user_detail as $key => $value) {//print_r($value['device_model']);
                $update_user_detail[$key]['last_login'] = (!is_null($value['last_login'])) ? $value['last_login'] : 'User not logged in';
                $update_user_detail[$key]['briefcase[]'] = $value['briefcase'];
                $update_user_detail[$key]['groups[]'] = $value['groups'];
                $update_user_detail[$key]['first_name'] = current(explode(' ', $value['name']));
                $update_user_detail[$key]['last_name'] = end(explode(' ', $value['name']));
                $update_user_detail[$key]['action'] = 'updated';//print_R($update_user_detail);die();
            }
            //****************************  
            if($post['user_id'] == $this->session->userdata('userid')){ //echo 'login_user';
            $this->session->set_userdata(array('first_name' => $update_user_detail[0]['first_name'],
                                          'last_name' =>  $update_user_detail[0]['last_name'],
                                           'email_id' => $update_user_detail[0]['email_id'],
                                           'timezone' => $update_user_detail[0]['timezone'],
                                           'briefcase[]' => $update_user_detail[0]['briefcase'],
                                           'groups[]' => $update_user_detail[0]['groups'],
                                           'password' => $update_user_detail[0]['password'],
                                           'user_img' => $update_user_detail[0]['user_img']));
            }
          
            $update_user['response'] = json_encode($update_user_detail[0], JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $update_user);
        }
    }

    private function add_group($userid, $group = array()) {//print_r($group);die();
        foreach ($group as $val) {
            $new_group_user = array('user_id' => $userid, 'group_id' => $val);
            $this->queries->insert_query('user_group', $new_group_user);
            //**********last update****************
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id',$userid);
            $this->db->update('user');
        }
    }

    private function delete_group($userid, $timezone, $group = array()) {
        foreach ($group as $val) {//print_R($val);//die();
            $del_group_user = array('user_id' => $userid, 'group_id' => $val);
            $this->queries->delete_query('user_group', $del_group_user);
            //**********last update****************
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id',$userid);
            $this->db->update('user');
            //***********fetch group related briefcases*************
            
            $user_briefcases[] = $this->queries->run_query('SELECT DISTINCT `briefcase_id` FROM ' . $this->db->dbprefix('briefcase_user') . ' WHERE `briefcase_id` NOT IN (SELECT `briefcase_id` FROM ' . $this->db->dbprefix('briefcase_group') . ' WHERE group_id = ' . $val . ' ) AND `user_id` = '.$userid); //print_r($old_user_group);
            //print_R($this->db->last_query());
            //print_R($user_briefcases);//die();
            $group_briefcases[] = $this->queries->select_query('briefcase_group', 'briefcase_id', 'group_id =' . $val); //print_r($old_user_group);
            $briefcases_user[] = $this->queries->select_query('briefcase_user', 'briefcase_id', 'user_id =' . $userid); //print_r($old_user_group);
            // print_r($group_briefcases);//die();
            //*****************user briefcases via briefcase_group table****************
            if (!empty($user_briefcases)) {
                $userbriefcases = array();
                foreach ($user_briefcases as $values) {
                    foreach ($values as $bval) {
                        $userbriefcases[] = $bval['briefcase_id'];
                    }
                }// print_r($userbriefcases);//die();
            }
            //*****************user briefcases via briefcase_user table****************
            if (!empty($briefcases_user)) {
                $briefcases = array();
                foreach ($briefcases_user as $valuesb) {
                    foreach ($valuesb as $brval) {
                        $briefcases[] = $brval['briefcase_id'];
                    }
                }// print_r($briefcases);//die();
            }
            //************group briefcases************
            if (!empty($group_briefcases)) {
                $groupbriefcases = array();
                foreach ($group_briefcases as $values) {
                    foreach ($values as $bval) {
                        $groupbriefcases[] = $bval['briefcase_id'];
                    }
                }// print_r($groupbriefcases);//die();
            }
            //************deleted group*************
            $diff_user = array();
            $diff_user = array_diff($briefcases,$userbriefcases);// print_r($diff_user);//die();
            $remaining = array_diff($groupbriefcases, $diff_user); //print_r($remaining);//die();
            //*************merge new briefcase via new group****************
            if (!empty($remaining)) {
                $this->delete_announcement($userid, $timezone, $remaining);
            }
        }
    }

    private function add_announcement($user_id, $timezone, $briefcase) {
        $briefcasevalue = $this->queries->select_query('briefcase', 'name', 'briefcase_id =' . $briefcase); //print_r($briefcasevalue);die();
        //************create announcement**************
       $date = gmdate("Y-m-d H:i:s", time());
        $announcement = array('message' => 'You have been assigned to ' . $briefcasevalue[0]['name'] . ' briefcase',
            'user_id' => $this->session->userdata('userid'),
            'assigned_user' => $user_id,
            'time_to_send' => $date,
            'type' => 'automated',
            'request_to_update' => 1,
            'all_briefcase' => 0
        );
        $this->db->set('creation_time', 'NOW()', FALSE);
        $this->queries->insert_query('announcement', $announcement);
    }

    private function delete_announcement($user_id, $timezone, $briefcase = array()) {
        foreach ($briefcase as $value) {
            $del_briefcase_user = array('user_id' => $user_id, 'briefcase_id' => $value);
            $this->queries->delete_query('briefcase_user', $del_briefcase_user);
            //**********last update****************
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id',$user_id);
            $this->db->update('user');
            //****************************
            $this->db->select('name');
            $this->db->where('briefcase_id', $value);
            $brfresult = $this->db->get('briefcase');
            $briefcasevalue = $brfresult->row_array();
            //************create announcement**************
            $date = gmdate("Y-m-d H:i:s", time());
            $announcement = array('message' => 'Your access to the briefcase ' . $briefcasevalue['name'] . ' has been removed. Briefcase ' . $briefcasevalue['name'] . ' needs to be removed from this device.',
                'user_id' => $this->session->userdata('userid'),
                'assigned_user' => $user_id,
                'time_to_send' => $date,
//                'creation_time' => 'NOW()',
                'type' => 'automated',
                'request_to_update' => 1
            );
            $this->db->set('creation_time', 'NOW()', FALSE);
            $this->db->insert('announcement', $announcement);
        }
    }

    public function check_email() {
        $post = $this->input->post();// print_r($post);//die();
        if (empty($post['user_id'])) {
            $emails = $this->user->all_users_email($post['user_id']); //print_r($emails);
            if (in_array($post['email_id'], $emails)) {//echo $post;
                $mail_id['response'] = 'already exist';//print_r($mail_id);//die();
                $this->load->view('pages/responseview', $mail_id);
            }
        } else {
            $emails = $this->user->all_users_email($post['user_id']); //print_r($emails);//die();
            if (in_array($post['email_id'], $emails)) {//echo $post;
                $mail_id['response'] = 'already exist';
                $this->load->view('pages/responseview', $mail_id);
            }
        }
    }

    public function delete_user() {
        $post = $this->input->post();
        $image = $this->queries->select_query('user','user_img','user_id ='.$post['user_id']);//print_r($image);die();
        
        $path = dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/'.$image[0]['user_img']; 
        if(!file_exists($path)){
        unlink($path);
        }
        $user = array('user_id' => $post['user_id']);
//        $this->queries->delete_query('user', $user);
        $this->queries->update_query('user',array('is_exist' => 0),'user_id ='.$post['user_id']);
        $this->queries->delete_query('briefcase_user', $user);
        $this->queries->delete_query('user_group', $user);

        // $this->user->delete($post);
    }

    public function group() {
        $users_value = login_organization_detail();
        $data['detail'] = $this->user->user_detail(); //die();
        foreach ($data['detail'] as $key => $value) {//print_r($value['device_model']);
            $data['detail'][$key]['last_login'] = (!is_null($value['last_login'])) ? $value['last_login'] : 'User not logged in';
            $data['detail'][$key]['briefcase[]'] = $value['briefcase'];
            $data['detail'][$key]['groups[]'] = $value['groups'];
            $data['detail'][$key]['first_name'] = current(explode(' ', $value['name']));
            $data['detail'][$key]['last_name'] = end(explode(' ', $value['name']));
        }// print_r($data['detail']);die();
        $data['timezone'] = $this->queries->select_query('timezone','TimeZoneId');
        $data['briefcase'] = $this->queries->select_query("briefcase", "*", "`user_id` in (" . $users_value . ")");
        $data['group'] = $this->queries->select_query("group", "*", "`user_id` in (" . $users_value . ")");
        //print_r($data['group']); die();
        
        $all_group = "";
        foreach($data['group'] as $group_key => $group_val){
            $all_group .= $group_val['group_id'].",";
            $all_user_in_groups = $this->queries->select_query("user_group", "user_id", "`group_id` = ".$group_val['group_id']." ");
         
            $selected_users = "";
            foreach($all_user_in_groups as $user_value){
                $selected_users .= $user_value['user_id'].","; 
                
            }   
            $selected_users = rtrim($selected_users, ",");
            $data['group'][$group_key]['selected_user'] = $selected_users ;
        }
       
        $all_group = rtrim($all_group, ",");//print_r($all_group);die('astha');
        if(!empty($all_group)){
        $all_user_in_groups = $this->queries->select_query("user_group", "user_id", "`group_id` in (" . $all_group . ")");
        foreach($all_user_in_groups as $key){
            $all_user[] =  $key['user_id'];
        }       
        }
        @$all_user = array_unique(@$all_user);
        
       
        $data['emails'] = $this->user->all_users_email();
        $data['info'] = array('detail' => $data['detail'],'all_users_in_group' =>$all_user, 'briefcase' => $data['briefcase'], 'group' => $data['group'], 'timezone' => $data['timezone']);
        $header['group_detail'] = $data['group'];
        $header['briefcase_detail'] = $data['briefcase'];
        $header['emails'] = $data['emails'];
        $header['timezone'] = $data['timezone'];
        $template_array = array('pages/group' => $data);
        $this->load->template($template_array, $header);
    }

    public function send_invitation_mail($data) {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                'Reply-To: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                'X-Mailer: PHP/' . phpversion();
        $detail['data'] = $data;
        $confirmEmailKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8) .
                $data['user_id'] . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        $time = time();
        $secreatKey = "72e2b162448aad66b2486966e9319ba3";
        $confirmEmailCompleteKey = substr_replace($time, $confirmEmailKey, strlen($time) / 2, 0);
        $cipher = md5(substr_replace($secreatKey, $confirmEmailCompleteKey, strlen($secreatKey) / 2, 0));
        $detail['code'] = substr_replace($cipher, $confirmEmailCompleteKey, strlen($cipher) / 2, 0);

//        $email = $this->load->view('pages/email/user_invitation_password', $detail, true);
        $detail['email_id'] = $data['email_id'];
        $email = $this->load->view('pages/email/user_invitation_confirm_email', $detail, true);
        mail($data['email_id'], "Welcome to iSalesMate!", $email, $headers);
        // mail("adam_gilchristwc@rediffmail.com", "Welcome to iSalesMate!", $email, $headers);
    }

}

?>
