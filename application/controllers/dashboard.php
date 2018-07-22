<?php

class Dashboard extends Member_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
        $this->load->model('content');
        $this->load->model('analytics_detail');
        $this->load->model('queries');
        $this->load->model('library');
        $this->load->model('user');
    }

    public function index() {
        $users_value = login_organization_detail(); // get all users in comma seperated form of logged in organization
        //*************Code for content list and name of user who uploaded content.***********************
        $details['content'] = $this->queries->select_query("content", "*", "`user_id` in (" . $users_value . ") and `trash`= '1' and `type` != 'folder' and `type` != 'link' ", "`creation_time`", "DESC", "10");
        foreach ($details['content'] as &$value) {
            $username = $this->queries->select_query("user", "*", "`user_id` = " . $value['user_id'] . " ");
            $value['user_name'] = ($username[0]['is_exist'] == 1) ? $username[0]['name'] : "";
        }
        //************End code*******
        //*************Code for bar chart*************        
        $details['date_string'] = array();
        $details['barchart'] = array();
        for ($i = -31; $i < 1; $i = $i + 1) {
            $date = date('Y-m-d', strtotime($i . " days"));
            array_push($details['date_string'], ($i % 5 == 0) ? $date : "");
            array_push($details['barchart'], count($this->queries->select_query("login_view", "*", "`user_id` in ($users_value) and DATE(`login_time`) = '$date'")));
        }
        //************End code*******
        //*************Code for pie chart*************
        $rawdata['piechart'] = $this->queries->select_query("content", "type, COUNT(type) as count", "`user_id` in (" . $users_value . ") and `trash`='1' and type != 'folder'", "", "", "", "type");
        $details["piechart"]["total"] = 0;
        foreach ($rawdata['piechart'] as $values) {
            $details["piechart"]["total"] += $values["count"];
            $details["piechart"][$values["type"]] = $values["count"];
        }
        //************End code*********            
        //********Code for latest comments on contents*********
        $details['contents'] = $this->analytics_detail->contents_list();
        //************Code to load view******************** 
        $header['group_detail'] = $this->queries->select_query('group', '*', "`user_id` in (" . $users_value . ")");
        $header['briefcase_detail'] = $this->queries->select_query("briefcase", "*", "`user_id` in (" . $users_value . ")");
        $header['emails'] = $this->user->all_users_email();
        $header['timezone'] = $this->queries->select_query('timezone', 'TimeZoneId');
        $template_array = array('pages/dashboard' => $details);
        $this->load->template($template_array, $header);
        //************End code**************************
    }

    public function delete_comment() {
        $post = $this->input->post();
//        $comment = $this->library->delete_comment($post);
        $data['contents'] = $this->analytics_detail->contents_list();
        $channel_updates['response'] = json_encode($data, JSON_HEX_APOS); //print_r($channel_updates['response']);die();
        $this->load->view('pages/responseview', $channel_updates);
    }

    public function insert_comment() {
        $post = $this->input->post();

        $post['user_id'] = $this->session->userdata('userid');
        $post['activity_time'] = gmdate("Y-m-d H:i:s", time());
        $comment_id = $this->library->add_comment($post);
        //$data['content'] = $this->analytics_detail->contents_list();
        $data['current_inserted_id'] = $comment_id;
        $complete_last_record = $this->queries->select_query("notification", "*", " `notification_id`= '" . $comment_id . "' ");

        $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']);
        $time_from_db = strtotime($complete_last_record[0]['activity_time']);
        $time_from_db = $time_from_db + ($timezone_result);
        //$comments[$commentkey]['activity_time'] = date('Y-m-d H:i:s', $time_from_db); 

        $data['activity_time'] = date('Y-m-d H:i:s', $time_from_db);
        $userimage = $this->queries->select_query("user", "*", " `user_id`= '" . $post['user_id'] . "' ");
        $data['user_image'] = $userimage[0]['user_img'];

        //$comments[$commentkey]['user_img'] = $userimage[0]['user_img'];
        if (!file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . "/" . 'assets/upload/' . $userimage[0]['user_img'])) {
            if ($userimage[0]['user_type'] == "owner")
                $data['user_image'] = base_url() . "/" . 'assets/upload/users/owner.png';
            else if ($userimage[0]['user_type'] == "administrat")
                $data['user_image'] = base_url() . "/" . 'assets/upload/users/admin.png';
            else
                $data['user_image'] = base_url() . "/" . 'assets/upload/users/user.png';
        }

        $data['user_image'] = base_url() . "assets/upload/" . $userimage[0]['user_img'];

        $content = $this->queries->select_query("content", "*", "`content_id` = '" . $post['content_id'] . "' "); //print_r($content);die();
        $data['content'] = $content[0];


        $comments = $this->queries->select_query("notification", "*", "`content_id` = '" . $data['content']['content_id'] . "' and `type`= 'comment' ", "`creation_time`", "DESC", '5');
        foreach ($comments as $commentkey => $commentvalue) {
            $username = $this->queries->select_query("user", "*", "`user_id` = '" . $commentvalue['user_id'] . "' ");
            $comments[$commentkey]['user_name'] = $username[0]['name'];
            $comments[$commentkey]['user_img'] = $username[0]['user_img'];
            if (!file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . "/" . 'assets/upload/' . $username[0]['user_img'])) {
                if ($username[0]['user_type'] == "owner")
                    $comments[$commentkey]['user_img'] = "users/owner.png";
                else if ($username[0]['user_type'] == "administrat")
                    $comments[$commentkey]['user_img'] = "users/admin.png";
                else
                    $comments[$commentkey]['user_img'] = "users/user.png";
            }
        }

        $data['content']['comments'] = array_reverse($comments);

        $response['response'] = json_encode($data, JSON_HEX_APOS);
        $this->load->view('pages/responseview', $response);
    }

}

?>
