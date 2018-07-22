<?php

class Announcement extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
    }

    public function announcement_detail($id = 0) {
        $login_user = login_organization_detail();
        $this->db->select('announcement.*, user.name AS user_name', false);
        $this->db->select('GROUP_CONCAT(DISTINCT ' . $this->db->dbprefix('announcement_briefcase') . '.briefcase_id) AS ann_briefcase', false);
        $this->db->select('GROUP_CONCAT(DISTINCT ' . $this->db->dbprefix('announcement_group') . '.group_id) AS ann_group', false);
        $this->db->select('GROUP_CONCAT(DISTINCT ' . $this->db->dbprefix('briefcase') . '.name) AS briefcase_name', false);
        $this->db->select('GROUP_CONCAT(DISTINCT ' . $this->db->dbprefix('group') . '.name) AS group_name', false);
        $this->db->group_by('announcement.announcement_id');
        $this->db->from('announcement');
        $this->db->join('user', 'announcement.user_id = user.user_id', 'LEFT');
        $this->db->join('announcement_briefcase', 'announcement.announcement_id = announcement_briefcase.announcement_id', 'LEFT');
        $this->db->join('announcement_group', 'announcement.announcement_id = announcement_group.announcement_id', 'LEFT');
        $this->db->join('group', 'group.group_id = announcement_group.group_id', 'LEFT');
        $this->db->join('briefcase', 'briefcase.briefcase_id = announcement_briefcase.briefcase_id', 'LEFT');
        if ($id != 0) {
            $this->db->where('announcement.announcement_id', $id);
            $this->db->where_in('announcement.user_id', explode(",", $login_user));
        } else {
            $this->db->where('assigned_user', NULL);
            $this->db->where_in('type', array('manual', 'sent'));
        }
        $results = $this->db->get();
        $ann = $results->result_array();
        foreach ($ann as $key => &$value) {

            $timezone_result = $this->timezone_diff($value['timezone']);
            $time_from_server = strtotime($value['time_to_send']);
            $time_from_server = $time_from_server + ($timezone_result);

            $time_from_server = $time_from_server - ($value['DST'] * 60 * 60); //$time_from_server = $time_from_server - ($post['DST']*60*60); 

            $value['time_to_send'] = date('Y-m-d H:i:s', $time_from_server);
        }
        return $ann;
    }

    public function add_announcement($data) {//print_r($data);//die();     
        $briefcase_group = json_decode($data['address_to'], true); //print_r($briefcase_group['type']);//die();
        if ($briefcase_group['type'] == 'briefcase' || $briefcase_group['type'] == 'all_briefcase') {//print_r($briefcase_group['type']);die();
            $this->db->select('users');
            $this->db->where_in('briefcase_id', $briefcase_group['id']);
            $briefcases = $this->db->get('briefcase');
            $announcement_result = $briefcases->result_array(); //print_r($announcement_result);//die();
            $user = array();
            foreach ($announcement_result as $val) {//print_r($val);
                $user = array_merge($user, explode(',', $val['users'])); //print_r($user);die();
            }//print_r($user);
            $unique = array();
            $unique = array_values(array_unique($user)); //print_r($unique);die();
            $briefcase_group['users'] = $unique; //print_r($briefcase_group);//die();
            $data['address_to'] = json_encode($briefcase_group); //print_r($data);die();
            $response = $this->db->insert('announcement', $data);
            $annouoncement_id = $this->db->insert_id();
            if ($response) {
                $new_announcement = $this->announcement_detail($annouoncement_id); //print_r($new_announcement['newly']);die();
                return $new_announcement;
            }
        } else { //print_r($briefcase_group['type']);
            $this->db->select('users');
            $this->db->where_in('group_id', $briefcase_group['id']);
            $briefcases = $this->db->get('group');
            $announcement_result = $briefcases->result_array(); //print_r($announcement_result);//die();
            $user = array();
            foreach ($announcement_result as $val) {//print_r($val);
                $user = array_merge($user, explode(',', $val['users'])); //print_r($user);die();
            }//print_r($user);
            $unique = array();
            $unique = array_values(array_unique($user)); //print_r($unique);die();
            $briefcase_group['users'] = $unique; //print_r($briefcase_group);//die();
            $data['address_to'] = json_encode($briefcase_group); //print_r($data);die();
            $this->db->set('creation_time', 'NOW()', FALSE);
            $response = $this->db->insert('announcement', $data);
            $annouoncement_id = $this->db->insert_id();
            if ($response) {
                $new_announcement = $this->announcement_detail($annouoncement_id); //print_r($new_announcement['newly']);die();
                return $new_announcement;
            }
        }
    }

    public function update_announcement($data) {
        $this->db->where('announcement_id', $data['announcement_id']);
        $response = $this->db->update('announcement', $data);
        if ($response) {
            $update = $this->announcement_detail($data['announcement_id']); //print_r($update[0]);die();
            $update[0]['action'] = 'updated'; //print_r($update);die();
            return $update;
        }
    }

    public function delete($data) {
        $this->db->delete('announcement', array('announcement_id' => $data['announcement_id']));
    }

    public function timezone_diff($zone) {
        $this->db->select('*');
        $this->db->like('TimeZoneId', $zone);
        $announcement_result = $this->db->get('timezone')->result_array();
        return (empty($announcement_result)) ? "19800" : $announcement_result[0]['offset'] * 3600;
    }

    public function scheduled() {
        $this->db->select('announcement.announcement_id, announcement.type, announcement.time_to_send, announcement.timezone, announcement.DST, announcement.message');
        $this->db->select("IF(`{$this->db->dbprefix('announcement')}`.`type` = 'manual', GROUP_CONCAT(DISTINCT `{$this->db->dbprefix('user_group')}`.`user_id`), announcement.`user_id`) as user_id", false);
        $this->db->join('announcement_briefcase', 'announcement.announcement_id = announcement_briefcase.announcement_id', 'LEFT');
        $this->db->join('announcement_group', 'announcement.announcement_id = announcement_group.announcement_id', 'LEFT');
        $this->db->join('briefcase', 'briefcase.briefcase_id = announcement_briefcase.briefcase_id', 'LEFT');
        $this->db->join('briefcase_user', 'briefcase.briefcase_id = briefcase_user.briefcase_id', 'LEFT');
        $this->db->join('briefcase_group', 'briefcase.briefcase_id = briefcase_group.briefcase_id', 'LEFT');
        $this->db->join('group', 'group.group_id = announcement_group.group_id', 'LEFT');
        $this->db->join('user_group', "group.group_id = announcement_group.group_id OR {$this->db->dbprefix('briefcase_group')}.group_id = {$this->db->dbprefix('user_group')}.group_id", 'LEFT');
        $this->db->group_by('announcement.announcement_id');
        $this->db->where('type !=', "sent");
        $this->db->from('announcement');
//        $this->db->get();
//        echo $this->db->last_query();
//        return array();
        return $this->db->get()->result_array();
    }

    public function user_device($ids) {
        $this->db->select('device.device_token');
        $this->db->where_in('user_id', $ids);
        $this->db->where('device_token !=', 'null');
        $this->db->from('device');
//        $this->db->get();
//        echo $this->db->last_query();
//        return array();
        return $this->db->get()->result_array();
    }
    
    public function sent($id) {
        $this->db->where('announcement_id', $id)->update('announcement', array("type"=>"sent"));
    }

}
