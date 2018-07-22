<?php

class Groups extends Member_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
//        $this->load->model('group');
        $this->load->model('queries');
    }

    public function index() {
        
    }

    public function insert_group() {
        $post = $this->input->post(); //print_r($post);//die();
        if (empty($post['group_id'])) {

            if (isset($post['users'])) {
                $all_users = $post['users'];
                unset($post['users']);
            }
            //print_r($all_users);die();
            $this->db->set('creation_time', 'NOW()', FALSE);
            $group = $this->queries->insert_query('group', $post); //print_r($group);die();

            if (isset($all_users)) {
                foreach ($all_users as $user) {
                    $all_data['user_id'] = $user;
                    $all_data['group_id'] = $group;
                    $this->queries->insert_query('user_group', $all_data); //print_r($group);die();                
                }
            }

            $add_group = $this->queries->select_query('group', '*', 'group_id = ' . $group);

            $add_group[0]['selected_user'] = $this->users_in_group($add_group[0]['group_id']); //print_r($add_group[0]['selected_user']);
            $add_group[0]['all_users'] = $this->allusers_in_group(); //print_r($add_group[0]['all_users']);
            //print_R($add_group);die();
            $add_group['response'] = json_encode($add_group[0], JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $add_group);
        } else {
            //print_r($post);die();
            if (isset($post['users'])) {
                $all_users = $post['users'];
                unset($post['users']);
            }
            //**********announcement***********************
            $old_user = array();
            $existing_group_user = $this->queries->select_query('user_group', 'user_id', 'group_id = ' . $post['group_id']);
            // print_r($existing_group_user); //die();
            foreach ($existing_group_user as $exist) {
                $old_user[] = $exist['user_id'];
            }
            //*********check user exist in briefcase or not**********
            $briefcase_user = array();
            $group_briefcase = $this->group_briefcase($post['group_id']);
            //print_r($group_briefcase);//die();
            foreach ($group_briefcase as $bcase) {
                $all_user_for_briefcase = $all_users;
                $briefcase_exist_user = $this->queries->select_query('briefcase_user', 'user_id', 'briefcase_id =' . $bcase); // print_r($briefcase_exist_user);//die();
                if (!empty($briefcase_exist_user)) {
                    foreach ($briefcase_exist_user as $br_user) {
                        $briefcase_user[] = $br_user['user_id'];
                    }
                    foreach ($briefcase_user as $us) {
                        if (in_array($us, $all_user_for_briefcase)) {
                            unset($all_user_for_briefcase[array_search($us, $all_user_for_briefcase)]);
                        }
                    }
                }  // print_r($all_user_for_briefcase);//die();
                $common = array_intersect($all_user_for_briefcase, $old_user); // print_r($common);//die();
                $add = array_diff($all_user_for_briefcase, $common); //print_r($add);
                $remove = array_diff($old_user, $common); // print_r($remove); //die();
                //*********add user*******
                if (!empty($add)) {
//             foreach($group_briefcase as $bcase_ann){
                    foreach ($add as $add_user) {
                        $this->add_announcement($add_user, $bcase);
                    }
//             }
                }
                if (!empty($remove)) {
                    foreach ($remove as $remove_user) {
                        if (!in_array($remove_user, $briefcase_user))
                            $this->delete_announcement($remove_user, $bcase);
                    }
                }
            }//print_r($all_users);//die();
            //**********announcement***********************
            $this->queries->update_query('group', $post, 'group_id = ' . $post['group_id']); //print_r(json_encode($add_user, JSON_HEX_APOS));//die();
            $this->queries->delete_query('user_group', 'group_id = ' . $post['group_id']);
            if (isset($all_users)) {
                foreach ($all_users as $user) {
                    $all_data['user_id'] = $user;
                    $all_data['group_id'] = $post['group_id'];
                    $this->queries->insert_query('user_group', $all_data); //print_r($group);die();                
                }
            }
            $this->update_group_users($post['group_id']); //update group's user last_update time
            $update_group = $this->queries->select_query('group', '*', 'group_id =' . $post['group_id']);
            $update_group[0]['selected_user'] = $this->users_in_group($update_group[0]['group_id']);
            $update_group[0]['all_users'] = $this->allusers_in_group();
            $update_group[0]['action'] = 'updated';
            $update_group['response'] = json_encode($update_group[0], JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $update_group);
        }
    }

    public function delete_group() {
        $post = $this->input->post(); //print_r($post);die();
        $this->update_group_users($post['group_id']);
        $this->queries->delete_query('group', 'group_id = ' . $post['group_id']);
    }

    public function users_in_group($groupid) { //This funtion is used to get user id in group in comma seperated format
        $all_user_in_groups = $this->queries->select_query("user_group", "user_id", "`group_id` = " . $groupid . " "); //print_r($all_user_in_groups);die();
        $all_user = "";
        foreach ($all_user_in_groups as $key) {
            $all_user .= $key['user_id'] . ",";
        }
        return rtrim($all_user, ",");
    }

    public function allusers_in_group() {
        $users_value = login_organization_detail();
        $data['group'] = $this->queries->select_query("group", "*", "`user_id` in (" . $users_value . ")");

        $all_group = "";
        foreach ($data['group'] as $group_key => $group_val) {
            $all_group .= $group_val['group_id'] . ",";
        }
        $all_group = rtrim($all_group, ",");

        $all_user_in_groups = $this->queries->select_query("user_group", "user_id", "`group_id` in (" . $all_group . ")");
        foreach ($all_user_in_groups as $key) {
            $all_user[] = $key['user_id'];
        }
        @$all_user = array_unique(@$all_user);
        foreach ($all_user as $key => $uservalue) {
            if ($uservalue == $this->session->userdata('user_id')) {
                unset($all_user[$key]);
            }
        }
        return $all_user;
    }

    public function group_briefcase($group_id) {
        $group_briefcase = $this->queries->select_query('briefcase_group', 'briefcase_id', 'group_id = ' . $group_id);
        //print_r($group_briefcase);
        $briefcases = array();
        if (!empty($group_briefcase)) {
            foreach ($group_briefcase as $gb) {
                $briefcases[] = $gb['briefcase_id'];
            }
        }
        return $briefcases;
    }

    private function add_announcement($user_id, $briefcase) {
        $timezone = $this->queries->select_query('user', 'timezone', 'user_id = ' . $user_id);
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

    private function delete_announcement($user_id, $briefcase) {
        $timezone = $this->queries->select_query('user', 'timezone', 'user_id = ' . $user_id);
        $briefcasevalue = $this->queries->select_query('briefcase', 'name', 'briefcase_id =' . $briefcase); // print_r($briefcasevalue);die();
        //************create announcement**************
        $date = gmdate("Y-m-d H:i:s", time());
        $announcement = array('message' => 'Your access to the briefcase ' . $briefcasevalue[0]['name'] . ' has been removed. Briefcase ' . $briefcasevalue[0]['name'] . ' needs to be removed from this device.',
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

    public function update_group_users($group_id) {
        $user_group = $this->queries->select_query('user_group', 'user_id', 'group_id = ' . $group_id); //print_r($user_group);
        $group_briefcase = $this->queries->select_query('briefcase_group', 'briefcase_id', 'group_id = ' . $group_id); //print_r($group_briefcase);die();
        $users_gr = array();
        $users_br = array();
        $users = array();
        if (!empty($user_group)) {
            foreach ($user_group as $ug) {
                $users_gr[] = $ug['user_id'];
            }
        }
        if (!empty($group_briefcase)) {
            $briefcases = array();
            foreach ($group_briefcase as $gb) {
                $briefcases[] = $gb['briefcase_id'];
            }//print_R($briefcases);//die();
            $briefcase = implode(',', $briefcases);
            $user_briefcase = $this->queries->select_query('briefcase_user', 'user_id', 'briefcase_id IN (' . $briefcase . ')');
            if (!empty($user_briefcase)) {
                foreach ($user_briefcase as $ub) {
                    $users_br[] = $ub['user_id'];
                }
            }//print_r($users_br);//die();
        }//print_R($users_gr);print_r($users_br);die();
        $users = array_merge($users_gr, $users_br); //print_R($users);
        $users = array_unique($users); //print_R($users);die();
        if (!empty($users)) {
            $update_user = implode(',', $users); //print_R($update_user);die();
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id IN (' . $update_user . ')');
            $this->db->update('user');
        }
    }

}

?>
