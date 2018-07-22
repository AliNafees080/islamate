<?php

class Library extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('queries');
        $this->load->helper(array('url', 'function_helper'));
    }

    //*******************tag add update delete*************
    public function content_detail($id = 0) {
        $users_id = login_organization_detail();
        $this->db->select('*');
        if ($id != 0) {
            $this->db->where('content_id', $id);
        } else {
            $this->db->where_in('user_id', explode(",", $users_id));
            $type = array('image', 'audio', 'video', 'application');
            $this->db->where_in('type', $type);
        }
        $this->db->where('trash', 1);
        $this->db->order_by("creation_time", "desc");

        $result = $this->db->get('content');
        $content = $result->result_array(); //print_r($content);die();
        $content_detail = array();

        foreach ($content as $val) {
            $content_detail[$val['content_id']] = $val;
            if ($val['expiration_date'] != NULL) {
                $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']);
                $time_from_db = strtotime($val['expiration_date']);
                $time_from_db = $time_from_db + ($timezone_result);
                $content_detail[$val['content_id']]['expiration_date'] = date('Y-m-d H:i:s', $time_from_db);
            }
        }

        //********* select comments and view names******
        foreach ($content_detail as $key => $value) {
            //*********select views of content************
            $this->db->select('count(*) as view');
            $this->db->where('content_id', $value['content_id']);
            $this->db->where('type', 'view');
            $view_result = $this->db->get('notification');
            $view = $view_result->row_array();
            $content_detail[$key]['views'] = $view['view'];

            //*********select comments of content************
            $this->db->select('*');
            $this->db->where('content_id', $value['content_id']);
            $this->db->where('type', 'comment');
            $comment_result = $this->db->get('notification'); //echo $this->db->last_query();

            $commment_count = $comment_result->num_rows();
            $comment = $comment_result->result_array(); // print_r($comment);
            $comment_array = array(); //print_r($comment_array);
            foreach ($comment as $comment_data) {//print_r($comment_data);
                $this->db->select('name,user_img,user_type');
                $this->db->where('user_id', $comment_data['user_id']);
                $user = $this->db->get('user');
                $user_name = $user->row_array(); //print_r($user_name);
                //$user_name['user_img'] = $user_name['user_img'];
                if (!file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . "/" . 'assets/upload/' . $user_name['user_img'])) {
                    if ($user_name['user_type'] == "owner")
                        $user_name['user_img'] = "users/owner.png";
                    else if ($user_name['user_type'] == "administrator")
                        $user_name['user_img'] = "users/admin.png";
                    else
                        $user_name['user_img'] = "users/user.png";
                }

                $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']);
                $time_from_db = strtotime($comment_data['activity_time']);
                $time_from_db = $time_from_db + ($timezone_result);
                $comment_data['activity_time'] = date('Y-m-d H:i:s', $time_from_db);

                $user_name['user_name'] = $user_name['name'];
                $comment_array[] = array_merge($comment_data, $user_name);
            }
            //***************select brefcase name where content is used***********
            $this->db->select('DISTINCT(name)');
            $this->db->from('briefcase');
            $this->db->join('briefcase_content', 'briefcase_content.briefcase_id = briefcase.briefcase_id');
            $this->db->where('content_id', $value['content_id']);
            $results = $this->db->get(); //print_R($this->db->last_query());
            $brief = $results->result_array();
            $briefcase = array();
            foreach ($brief as $b => $v) {
                $briefcase[] = $v['name'];
            }
            //***************************************************
            $content_detail[$key]['used_in_briefcase'] = implode(', ', $briefcase);
            $content_detail[$key]['comments'] = $comment_array;
            $content_detail[$key]['comments_count'] = $commment_count;
        }//die();
        //print_r($content_detail); die();
        return $content_detail;
    }

    public function trash_detail() {
        $users_id = login_organization_detail();
        $this->db->select('*');
        $this->db->where_in('user_id', explode(",", $users_id));
        $this->db->where('trash', 0);
        $result = $this->db->get('content');
        $content = $result->result_array();
        $content_detail = array();
        foreach ($content as $val) {
            $content_detail[$val['content_id']] = $val;
        }
        //echo "<pre>"; print_r($content_detail); die();
        //********* select tag names******
        foreach ($content_detail as $key => $value) {

            //*********select views of content************
            $this->db->select('count(*) as view');
            $this->db->where('content_id', $value['content_id']);
            $this->db->where('type', 'view');
            $view_result = $this->db->get('notification');
            $view = $view_result->row_array();
            $content_detail[$key]['views'] = $view['view'];

            //*********select comments of content************
            $this->db->select('type_value, notification_id, creation_time, user_id');
            $this->db->where('content_id', $value['content_id']);
            $this->db->where('type', 'comment');
            $comment_result = $this->db->get('notification'); //echo $this->db->last_query();

            $commment_count = $comment_result->num_rows();
            $comment = $comment_result->result_array(); // print_r($comment);
            $comment_array = array(); //print_r($comment_array);
            foreach ($comment as $comment_data) {//print_r($comment_data);
                $this->db->select('name');
                $this->db->where('user_id', $comment_data['user_id']);
                $user = $this->db->get('user');
                $user_name = $user->row_array(); //print_r($user_name);
                $comment_array[] = array_merge($comment_data, $user_name);
            }
            $content_detail[$key]['comments'] = $comment_array;
            $content_detail[$key]['comments_count'] = $commment_count;
        }//die();
        return $content_detail;
    }

    public function add_content($data) { //done organization
        $this->db->set('creation_time', 'NOW()', FALSE);
        $response = $this->db->insert('content', $data);
        $content_id = $this->db->insert_id();
        if ($response) {
            $new_content = $this->content_detail($content_id);
            return $new_content;
        }
    }

    public function update_content($data) {

        if ($data['expiration_date'] != "") {
            $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']);
            $time_from_server = strtotime($data['expiration_date']);
            $time_from_server = $time_from_server - ($timezone_result);
            $data['expiration_date'] = date('Y-m-d H:i:s', $time_from_server);
        } else {
            $data['expiration_date'] = NULL;
        }

        $this->db->where('content_id', $data['content_id']);
        $this->db->update('content', $data);

        $this->db->select('*');
        $this->db->where('content_id', $data['content_id']);
        $result = $this->db->get('content');
        $content = $result->result_array(); // print_r($content);die();       
        if ($content[0]['expiration_date'] != NULL) {
            $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']);
            $time_from_db = strtotime($content[0]['expiration_date']);
            $time_from_db = $time_from_db + ($timezone_result);
            $content[0]['expiration_date'] = date('Y-m-d H:i:s', $time_from_db);
        }


        //*********select views of content************
        $this->db->select('count(*) as view');
        $this->db->where('content_id', $content[0]['content_id']);
        $this->db->where('type', 'view');
        $view_result = $this->db->get('notification');
        $view = $view_result->row_array();
        $content[0]['views'] = $view['view'];

        //*********select comments of content************
        $this->db->select('type_value, notification_id, creation_time, user_id');
        $this->db->where('content_id', $content[0]['content_id']);
        $this->db->where('type', 'comment');
        $comment_result = $this->db->get('notification'); //echo $this->db->last_query();

        $commment_count = $comment_result->num_rows();
        $comment = $comment_result->result_array(); // print_r($comment);
        $comment_array = array(); //print_r($comment_array);
        foreach ($comment as $comment_data) {//print_r($comment_data);
            $this->db->select('name');
            $this->db->where('user_id', $comment_data['user_id']);
            $user = $this->db->get('user');
            $user_name = $user->row_array(); //print_r($user_name);
            $comment_array[] = array_merge($comment_data, $user_name);
        }
        $content[0]['comments'] = $comment_array;
        $content[0]['comments_count'] = $commment_count;

        return $content;
    }

    public function update_status($data) { //done organization
        $this->db->where('content_id', $data['content_id']);
        $this->db->update('content', $data);
        //*******remove content from briefcase content***********
        $this->user_update($notification = null, $data['content_id']);
        $this->db->delete('briefcase_content', array('content_id' => $data['content_id']));
    }

    public function delete_filecontent($data) {
        $this->db->delete('content', array('content_id' => $data['content_id']));
    }

    public function add_comment($data) {
        $this->db->set('creation_time', 'NOW()', FALSE);
        $this->db->insert('notification', $data);
        $insert_id = $this->db->insert_id();
        $this->user_update($insert_id, $content_id = null);
        return $insert_id;
    }

    public function delete_comment($data) {
        $this->user_update($data['notification_id'], $content_id = null);
        $this->db->delete('notification', array('notification_id' => $data['notification_id']));
    }

    public function user_update($notification_id = null, $content_id = null) {//print_r($content_id);print_R($notification_id);die();
        if (!empty($notification_id)) {
            $content = $this->queries->select_query('notification', 'content_id', 'notification_id = ' . $notification_id); //print_r($content);die();
            if (empty($content[0]['content_id'])) {
                $shared_content = $this->queries->select_query('shared_content', 'content_id', 'notification_id = ' . $notification_id);//print_R($shared_content);die();
                $contents = array();
                if (!empty($shared_content)) {
                    foreach ($shared_content as $sc) {
                        $contents[] = $sc['content_id'];
                    }
                    $contents = array_unique($contents);
                    $content = implode(',', $contents);
                }
            } else {
                $content = $content[0]['content_id'];
            }
        } else {
            $content = $content_id;
        }
        $briefcase = $this->queries->select_query('briefcase_content', 'briefcase_id', 'content_id IN (' . $content.')'); //print_r($briefcase);//die();
        $users = array();
        $group_user = array();
        if (!empty($briefcase)) {
            $briefcase_id = array();
            foreach ($briefcase as $br_id) {
                $briefcase_id[] = $br_id['briefcase_id'];
            }
            $briefcases = array_unique($briefcase_id);
            $briefcase_ids = implode(',', $briefcases); //print_R($briefcase_ids);die();
            $user = $this->queries->select_query('briefcase_user', 'user_id', 'briefcase_id IN (' . $briefcase_ids . ')'); //print_r($user);//die();
            $group = $this->queries->select_query('briefcase_group', 'group_id', 'briefcase_id IN (' . $briefcase_ids . ')'); //print_r($group);die();
            $group_id = array();
            foreach ($group as $g_id) {
                $group_id[] = $g_id['group_id'];
            }
            $groups = array_unique($group_id);
            $groups = implode(',', $groups);
            if(!empty($groups)){
            $group_user = $this->queries->select_query('user_group', 'user_id', 'group_id IN (' . $groups . ')'); //print_r($group_user);die();
            }
            $app_users = array_merge($user, $group_user);
            foreach ($app_users as $u_id) {
                $users[] = $u_id['user_id'];
            }
            $users = array_unique($users);
            
        }//print_r($users);die();
        if (!empty($users)) {
            $update_user = implode(',', $users); //print_r($update_user);die();
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id IN (' . $update_user . ')');
            $this->db->update('user');
        }
    }

}

?>
