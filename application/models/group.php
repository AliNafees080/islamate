<?php

class Group extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
    }

    public function group_detail() {
        $login_user = login_organization_detail();
        $this->db->select('*');
        $this->db->where_in('user_id', explode(',', $login_user));
        $result = $this->db->get('group');
        $user = $result->result_array(); //print_r($user);die();
        return $user;
    }

    public function briefcase_detail() {
        $this->db->select('*');
        $result = $this->db->get('briefcase');
        $user = $result->result_array();
        return $user;
    }

    public function add_group($data) {
        $this->db->set('creation_time', 'NOW()', FALSE);
        $response = $this->db->insert('group', $data);
        $group_id = $this->db->insert_id();
        if ($response) {
            $this->db->select('*');
            $this->db->where('group_id', $group_id);
            $new_group = $this->db->get('group');
            $group = $new_group->row_array();
            return $group;
        }
    }

    public function update_group($data) {
        $this->db->where('group_id', $data['group_id']);
        $this->db->update('group', $data);
        $this->db->select('*');
        $this->db->where('group_id', $data['group_id']);
        $updated_group = $this->db->get('group');
        $update = $updated_group->row_array();
        $update['action'] = 'updated'; //print_r($update);die();
        return $update;
    }

    public function delete($data) {
        $group = $data['group_id'];
        $this->delete_group_from_user_channel($group, 'channel');
        $this->delete_group_from_user_channel($group, 'user');
        //die();
        $this->db->delete('group', array('group_id' => $data['group_id']));
    }

    private function delete_group_from_user_channel($group, $table) {//print_r($group);
        $primary = $table . '_id';
        if ($table == 'channel') {
            $this->db->select($primary . ',groups');
            $this->db->like('groups', ',' . $group);
            $this->db->or_like('groups', $group, 'none');
            $this->db->or_like('groups', ',' . $group . ',');
            $this->db->or_like('groups', $group . ',');
        } else {
            $this->db->select($primary . ',group');
            $this->db->like('group', ',' . $group);
            $this->db->or_like('group', $group, 'none');
            $this->db->or_like('group', ',' . $group . ',');
            $this->db->or_like('group', $group . ',');
        }
        $result = $this->db->get($table); //print_r($this->db->last_query());
        $channel_user = $result->result_array();// print_r($channel_user);//die();
        if (!empty($channel_user)) {
            foreach ($channel_user as $value) {//print_r($value);die();
                $table_group = array();
                if ($table == 'channel') {
                    $table_group = explode(',', $value['groups']);// print_R($table_group);                    
                } else {
                    $table_group = explode(',', $value['group']);
                }//die();
                $delete = array_search($group, $table_group);//echo '*************************'; var_dump($delete);//die();
                if ($delete !== FALSE) { //die('shdfkhfk');
                    unset($table_group[$delete]); // print_r($table_group);
                    $new_groups = implode(',', $table_group);//print_r($new_groups);die();
                    $this->db->where($primary, $value[$primary]);
                    if ($table == 'channel') {
                        $this->db->update($table, array('groups' => $new_groups));
                    } else {
                        $this->db->update($table, array('group' => $new_groups));
                    }
                }
            }
        }
    }

}

?>
