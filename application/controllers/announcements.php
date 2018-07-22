<?php

class Announcements extends Member_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
        $this->load->model('content');
        $this->load->model('announcement');
        $this->load->model('queries');
        $this->load->model('user');
        $this->load->library('apn');
    }

    public function index() {
        //die();
        $users_value = login_organization_detail();
        $data['info'] = $this->announcement->announcement_detail($id = 0, $users_value); //print_r($data['detail']);die();
        $data['briefcase'] = $this->queries->select_query('briefcase', '*', "`user_id` in (" . $users_value . ")"); //print_r($data['briefcase']);die();
        $data['group'] = $this->queries->select_query('group', '*', "`user_id` in (" . $users_value . ")"); //print_r($data['group']);die();
        //To get all list from time zone
        $data['timezone'] = $this->queries->select_query('timezone', 'TimeZoneId');
        //print_r($data['timezone']);die();

        $data['detail'] = array('information' => $data['info'], 'briefcases' => $data['briefcase'], 'groups' => $data['group'], 'timezone' => $data['timezone']); //print_r($data['detail']);die();
//        $sidebar['album_filter'] = $this->content->album_filter_detail();
        $template_array = array('pages/announcement' => $data);
        $header['group_detail'] = $data['group'];
        $header['briefcase_detail'] = $data['briefcase'];
        $header['emails'] = $this->user->all_users_email();
        ;
        $header['timezone'] = $data['timezone'];
        $this->load->template($template_array, $header);
    }

    public function insert_announcement() {
        $post = $this->input->post();
        $address_to = json_decode($post['address_to'], true);
        $timezone_result = $this->announcement->timezone_diff($post['timezone']);
        $time_from_server = strtotime($post['time_to_send']) - $timezone_result + $post['DST'] * 60 * 60;
        $post['time_to_send'] = date('Y-m-d H:i:s', $time_from_server);
        //***************
        if (empty($post['announcement_id'])) {
            //**********announcement data******
            $announcement = array('user_id' => $this->session->userdata('userid'),
                'message' => $post['message'],
                'timezone' => $post['timezone'],
                'DST' => $post['DST'],
                'assigned_user' => NULL,
                'time_to_send' => $post['time_to_send'],
                'all_briefcase' => ($address_to['type'] == 'all_briefcase') ? 1 : 0,
                'type' => 'manual',
                'request_to_update' => $post['request_to_update'] = (isset($post['request_to_update'])) ? 1 : 0);
            $this->db->set('creation_time', 'NOW()', FALSE);
            $announcememt_id = $this->queries->insert_query('announcement', $announcement); //print_R($announcememt_id);
            //********announcement data*************
            if ($address_to['type'] == 'briefcase' || $address_to['type'] == 'all_briefcase') {
                foreach ($address_to['id'] as $briefcase) {
                    $announcement_briefcase = array('announcement_id' => $announcememt_id, 'briefcase_id' => $briefcase);
                    $this->queries->insert_query('announcement_briefcase', $announcement_briefcase);
                }
            } else {
                foreach ($address_to['id'] as $group) {//print_r($briefcase);
                    $announcement_group = array('announcement_id' => $announcememt_id, 'group_id' => $group);
                    $this->queries->insert_query('announcement_group', $announcement_group);
                }
            }//die();
            $this->announcement_user_update($announcememt_id); //die('astha');
            $add_announcement = $this->announcement->announcement_detail($announcememt_id); //print_r(json_encode($add_user, JSON_HEX_APOS));//die();
            $add_announcement['response'] = json_encode($add_announcement[0], JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $add_announcement);
        } else {
            //**********announcement data******
            $update_announcement = array('message' => $post['message'],
                'assigned_user' => NULL,
                'timezone' => $post['timezone'],
                'DST' => $post['DST'],
                'time_to_send' => $post['time_to_send'],
                'all_briefcase' => ($address_to['type'] == 'all_briefcase') ? 1 : 0,
                'type' => 'manual',
                'request_to_update' => $post['request_to_update'] = (isset($post['request_to_update'])) ? 1 : 0);
            $this->queries->update_query('announcement', $update_announcement, 'announcement_id =' . $post['announcement_id']);

            if ($address_to['type'] == 'briefcase' || $address_to['type'] == 'all_briefcase') {
                if ($address_to['type'] == 'all_briefcase') {
                    $this->queries->delete_query('announcement_group', 'announcement_id = ' . $post['announcement_id']);
                }
                $old_ann_briefcase = array();
                $old_briefcase_announcement = $this->queries->select_query('announcement_briefcase', '*', 'announcement_id =' . $post['announcement_id']);
                foreach ($old_briefcase_announcement as $vals) {
                    $old_ann_briefcase[] = $vals['briefcase_id'];
                }
                if (!empty($address_to['id'])) {
                    $remaining = array_intersect($address_to['id'], $old_ann_briefcase);
                    $add_briefcase = array_diff($address_to['id'], $remaining);
                    $del_briefcase = array_diff($old_ann_briefcase, $remaining);
                    if (!empty($add_briefcase)) {
                        foreach ($add_briefcase as $briefcase) {//print_r($briefcase);
                            $add_announcement_briefcase = array('announcement_id' => $post['announcement_id'], 'briefcase_id' => $briefcase);
                            $this->queries->insert_query('announcement_briefcase', $add_announcement_briefcase);
                        }
                    }
                    if (!empty($del_briefcase)) {
                        foreach ($del_briefcase as $briefcase) {//print_r($briefcase);
                            $del_announcement_briefcase = array('announcement_id' => $post['announcement_id'], 'briefcase_id' => $briefcase);
                            $this->queries->delete_query('announcement_briefcase', $del_announcement_briefcase);
                        }
                    }
                }
            } else {
                $old_ann_group = array();
                $old_group_announcement = $this->queries->select_query('announcement_group', '*', 'announcement_id =' . $post['announcement_id']);
                foreach ($old_group_announcement as $vals) {
                    $old_ann_group[] = $vals['group_id'];
                }
                if (!empty($address_to['id'])) {
                    $remaining_group = array_intersect($address_to['id'], $old_ann_group);
                    $add_group = array_diff($address_to['id'], $remaining_group);
                    $del_group = array_diff($old_ann_group, $remaining_group);
                    if (!empty($add_group)) {
                        foreach ($add_group as $adgroup) {//print_r($briefcase);
                            $announcement_group = array('announcement_id' => $post['announcement_id'], 'group_id' => $adgroup);
                            $this->queries->insert_query('announcement_group', $announcement_group);
                        }
                    }
                    if (!empty($del_group)) {
                        foreach ($del_group as $delgroup) {//print_r($briefcase);
                            $del_announcement_group = array('announcement_id' => $post['announcement_id'], 'group_id' => $delgroup);
                            $this->queries->delete_query('announcement_group', $del_announcement_group);
                        }
                    }
                }
            }
            $this->announcement_user_update($post['announcement_id']);
            $update_announcement_info = $this->announcement->announcement_detail($post['announcement_id']);
            $update_announcement_info[0]['action'] = 'updated';
            $update_announcement_info['response'] = json_encode($update_announcement_info[0], JSON_HEX_APOS);
            $this->load->view('pages/responseview', $update_announcement_info);
        }
    }

    public function delete_announcement() {
        $post = $this->input->post(); //print_r($post);die();
        $this->announcement_user_update($post['announcement_id']);
        $this->announcement->delete($post);
    }

    public function announcement_user_update($ann_id) {

        $ann_br = $this->queries->select_query('announcement_briefcase', 'briefcase_id', 'announcement_id = ' . $ann_id); //print_r($ann_br);
        $ann_gr = $this->queries->select_query('announcement_group', 'group_id', 'announcement_id = ' . $ann_id); //print_r($ann_gr);die();
        if (!empty($ann_br)) {
            $briefcase_id = array();
            foreach ($ann_br as $brief) {
                $briefcase_id[] = $brief['briefcase_id'];
//        $this->db->insert('test',array('name' => $brief['briefcase_id']));
            }//print_r($briefcase_id);die();
            $briefcases_id = implode(',', $briefcase_id); //print_R($briefcases_id);
            $briefcase_user_id = $this->queries->select_query('briefcase_user', 'user_id', 'briefcase_id IN (' . $briefcases_id . ')'); //print_R($briefcase_user_id);die();
            $user_briefcase = array();
            foreach ($briefcase_user_id as $user_id) {
                $user_briefcase[] = $user_id['user_id'];
            }
            $users = array_unique($user_briefcase);
            $update_user = implode(',', $users); //print_r($update_user);die();
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id IN (' . $update_user . ')');
            $this->db->update('user');
        }
        if (!empty($ann_gr)) {
            $group_id = array();
            foreach ($ann_gr as $gr) {
                $group_id[] = $gr['group_id'];
            }//print_R($group_id);die();
            $groups = implode(',', $group_id);
            //***********select briefcase from groups**********

            $br_group = $this->queries->select_query('briefcase_group', 'briefcase_id', 'group_id IN(' . $groups . ')'); //print_r($br_group);die();
            $ur_group = $this->queries->select_query('user_group', 'user_id', 'group_id IN(' . $groups . ')'); //print_r($br_group);die();
            $usr_grp = array();
            $br_user = array();
            if (!empty($ur_group)) {
                foreach ($ur_group as $ur) {
                    $usr_grp[] = $ur['user_id'];
                }
            }
            //print_R($usr_grp);die();
            if (!empty($br_group)) {
                $br_group_id = array();
                foreach ($br_group as $br) {
                    $br_group_id[] = $br['briefcase_id'];
                }
                $briefcase_group = array_unique($br_group_id);
                $briefcases = implode(',', $briefcase_group);
                //**********select user from briefcases****************
                $briefcase_group_id = $this->queries->select_query('briefcase_user', 'user_id', 'briefcase_id IN (' . $briefcases . ')'); //print_R($briefcase_id);die();

                foreach ($briefcase_group_id as $br_u) {
                    $br_user[] = $br_u['user_id'];
                }
            }

            $total_user = array_merge($br_user, $usr_grp); //print_r($total_user);die();
            $briefcase_user = array_unique($total_user); //print_r($briefcase_user);die();
            $user_br = implode(',', $briefcase_user);
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id IN (' . $user_br . ')');
            $this->db->update('user');
        }
    }

}
