<?php

class Api extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('queries');
        $this->load->model('library');
    }

    public function check_organization($data) {
        $this->db->select('organization_id');
        $this->db->where('name', $data);
        $org_query = $this->db->get('organization');
        return $org_query->row_array();
    }

    public function check_user_info($email_id, $password, $organization) {
        $this->db->select('user_id , name');
        $credentials = array('email_id' => $email_id, 'password' => $password, 'organization_id' => $organization, 'is_exist' => 1);
        $this->db->where($credentials);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function insert_user_login_info($data) {
        $this->db->insert('login_view', $data);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('user', array('last_login' => $data['login_time']));
    }

    public function device_info($data) {
        $where = array('user_id' => $data['user_id'], 'device_uuid' => $data['device_uuid']);
        $this->db->where($where);
        $query = $this->db->get('device');
        $result = $query->num_rows();
        if ($result > 0) {
            $this->db->where('device_uuid', $data['device_uuid']);
            $this->db->update('device', array('active_device' => 0));

            $data['device_token'] = (!empty($data['device_token'])) ? $data['device_token'] : NULL;
            //*************update user remaining devices to zero****************
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('device', array('active_device' => 0));
            //******************update device active_device to one******************
            $this->db->where($where);
            $this->db->update('device', array('device_token' => $data['device_token'], 'active_device' => 1));
            return $result;
        } else {
            //*************update user remaining devices to zero****************
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('device', array('active_device' => 0));
            $data['device_token'] = (!empty($data['device_token'])) ? $data['device_token'] : NULL;
            $this->db->set('creation_time', 'NOW()', FALSE);
            $query_device = $this->db->insert('device', $data);
            return $query_device;
        }
    }

    public function change_device_info($data) {
        $this->queries->delete_query('device', 'device_token = ' . "'" . $data['device_token'] . "'");
    }

    public function notification($data) {
        $this->db->set('creation_time', 'NOW()', FALSE);
        $this->db->insert('notification', $data);
        $notification_id = $this->db->insert_id();
        return $notification_id;
    }

    public function update_data($last_update, $server_time) {
        $tables = array('content', 'briefcase', 'briefcase_content', 'group', 'briefcase_group', 'briefcase_user', 'announcement_briefcase', 'announcement_group', 'user_group', 'user');
        foreach ($tables as $table_name) {
            $this->db->select('*');
            $this->db->where('last_update >', $last_update);
            $result = $this->db->get($table_name);
            $query_result = $result->result_array();
            if (!empty($query_result)) {
                //***********invoke delete_records method -***********************           
                $delete_record = $this->delete_records($table_name);
                //**********delete updated records******
                $id = array();
                foreach ($query_result as $table) {
                    $id[] = $table[$table_name . '_id'];
                }
                $delete_query = '';
                $delete_query = 'DELETE FROM `' . $table_name . '` WHERE ' . $table_name . '_id in (';
                $delete_query .= implode(',', $id) . ')';
                //***********insert updated records****************
                $table_fields = $this->db->list_fields($table_name); //print_r($table_fields);
                $field_value = array();
                foreach ($table_fields as $field) {
                    $field_value[] = '`' . $field . '`';
                }//print_r($field_value);
                $fields = implode(',', $field_value);
                //***********************************************
                $values = array();
                $insert_value = array();
                foreach ($query_result as $value) {
                    $value = str_replace("'", "''", $value);
                    $insert_query = 'INSERT INTO `' . $table_name . '` (' . $fields . ') VALUES ';
                    $values = "('" . implode("','", $value) . "')";
                    $insert_value[] = $insert_query .= $values;
                }
                $insert_query_value = '';
                $insert_query_value .= implode('; ', $insert_value);
                $final_result[$table_name] = array($delete_record, $delete_query, $insert_query_value);
            }
            $update = $this->update_notification($last_update, $server_time); //print_R($update);die();
        }
        return $update_data[] = array('update' => @$final_result, 'notification_announcement' => $update);
    }

    private function delete_records($table_name) {
        $this->db->select('GROUP_CONCAT(' . $table_name . '_id) as ' . $table_name . '_id');
        $result = $this->db->get($table_name);
        $delete = $result->row_array();
        return 'DELETE FROM `' . $table_name . '` WHERE ' . $table_name . '_id NOT IN (' . $delete[$table_name . '_id'] . ')';
    }

    public function update_notification($last_update, $server_time) {
        //***********notification****************
        $this->db->select('*');
        $this->db->where('last_update >', $last_update);
        $result = $this->db->get('notification');
        $notification = $result->result_array();
        //***************fetch notification id's to be inserted****************
        $notification_id = array();
        foreach ($notification as $table) {
            $notification_id[] = $table['notification_id'];
        } if (!empty($notification_id)) {//echo 'delete notification';
            $del_query = 'DELETE FROM `notification` WHERE notification_id in (';
            $del_query .= implode(',', $notification_id) . ')';
        }

        //***************fetch notification fields*****************************
        $notification_fields = $this->db->list_fields('notification'); //print_R($notification_fields);
        $fields = '';
        $field_value = array();
        foreach ($notification_fields as $field) {
            $field_value[] = '`' . $field . '`';
        } $fields .= implode(',', $field_value);
        //**************insert query****************************************** 
        $insert_value = array();
        foreach ($notification as $value) {
            $value = str_replace("'", "''", $value);
            $insert_query = 'INSERT INTO `notification` (' . $fields . ') VALUES ';
            $values = "('" . implode("','", $value) . "')";
            $insert_value[] = $insert_query .= $values;
        }
        //*************implode all insert queries*******************************
        $insert_query_value = '';
        $insert_query_value .= implode('; ', $insert_value);
        //*********************merge delete and insert query*******************
        if (!empty($del_query)) {
            $notify[] = array($del_query, $insert_query_value);
        }
        //***************implode delete and insert queries************
        $notification_query = '';
        if (!empty($notify)) {
            foreach ($notify as $mergequery) { //echo 'notify';
                $notification_query .= implode(';', $mergequery);
            }
        }

        //**********announcement****************
        $announcement = $this->announcement($last_update, $server_time); //die();
        $shared_content = $this->shared_content($last_update);
        $announcement_briefcase = $this->get_table("announcement_briefcase", $last_update);
        $announcement_group = $this->get_table("announcement_group", $last_update);

        return $update_notification[] = array('notification' => $notification_query, 'shared_content' => $shared_content, 'announcement' => $announcement, 'announcement_briefcase' => $announcement_briefcase, 'announcement_group' => $announcement_group);
    }

    private function announcement($last_update, $server_time) {
        //***********fetch announcement data****************
        $dateFormat = "Y-m-d H:i:s";
        $timeNdate = gmdate($dateFormat, time());

        $this->db->select('*');
        $this->db->where('last_update >', $last_update);
        $this->db->where('`time_to_send` <', $timeNdate);
        $announcement = $this->db->get('announcement');
        $query_result = $announcement->result_array();
        //***************fetch notification id's to be inserted****************
        $announcement_id = array();
        foreach ($query_result as $table) {
            $announcement_id[] = $table['announcement_id'];
        } if (!empty($announcement_id)) {//echo 'delete announcement';
            $delete_id = 'DELETE FROM `announcement` WHERE announcement_id in (';
            $delete_id .= implode(',', $announcement_id) . ')';
        }

        //***************fetch announcement fields*****************************
        $announcement_fields = $this->db->list_fields('announcement');
        $fields = '';
        $field_value = array();
        foreach ($announcement_fields as $field) {
            $field_value[] = '`' . $field . '`';
        } $fields .= implode(',', $field_value);
        //**************insert query****************************************** 
        $insert_value = array();
        foreach ($query_result as $value) {
            $value = str_replace("'", "''", $value);
            $insert = 'INSERT INTO `announcement` (' . $fields . ') VALUES ';
            $values = "('" . implode("','", $value) . "')";
            $insert_value[] = $insert .= $values;
        }
        //*************implode all insert queries*******************************
        $insert_query_value = '';
        $insert_query_value .= implode('; ', $insert_value);
        //*********************merge delete and insert query*******************
        if (!empty($delete_id)) {
            $announce[] = array($delete_id, $insert_query_value);
        }
        //***************implode delete and insert queries************
        $announcement_query = '';
        if (!empty($announce)) {
            foreach ($announce as $mergequery) {
                $announcement_query .= implode(';', $mergequery);
            }
        } return $announcement_query;
    }

    private function shared_content($last_update) {
        //***********fetch announcement data****************
        $this->db->select('*');
        $this->db->where('last_update >', $last_update);
        $result = $this->db->get('shared_content');
        $shared_notification = $result->result_array(); //print_R($shared_notification);die();
        //***************fetch notification id's to be inserted****************
        $shared_notification_id = array();
        foreach ($shared_notification as $table) {
            $shared_notification_id[] = $table['shared_content_id'];
        } if (!empty($shared_notification_id)) {
            $delete_id = 'DELETE FROM `shared_content` WHERE shared_content_id in (';
            $delete_id .= implode(',', $shared_notification_id) . ')';
        }

        //***************fetch announcement fields*****************************
        $shared_notification_fields = $this->db->list_fields('shared_content'); //print_r($announcement_fields);
        $fields = '';
        $field_value = array();
        foreach ($shared_notification_fields as $field) {
            $field_value[] = '`' . $field . '`';
        } $fields .= implode(',', $field_value);
        //**************insert query****************************************** 
        $insert_value = array();
        foreach ($shared_notification as $value) {
            $value = str_replace("'", "''", $value);
            $insert = 'INSERT INTO `shared_content` (' . $fields . ') VALUES ';
            $values = "('" . implode("','", $value) . "')";
            $insert_value[] = $insert .= $values;
        }
        //*************implode all insert queries*******************************
        $insert_query_value = '';
        $insert_query_value .= implode('; ', $insert_value);
        //*********************merge delete and insert query*******************
        if (!empty($delete_id)) {//echo 'shared_content'; die();
            $shared[] = array($delete_id, $insert_query_value);
        }
        //***************implode delete and insert queries************
        $share_content_query = '';
        if (!empty($shared)) {//echo 'shared_content_data'; die();
            foreach ($shared as $mergequery) { //echo 'anounce';
                $share_content_query .= implode(';', $mergequery);
            }
        } return $share_content_query;
    }

    public function get_last_update_time() {
        $query = $this->db->query('select now()')->result_array();
        return $query[0]['now()'];
    }

    private function get_table($table_name, $last_update) {
        $this->db->select('*');
        $this->db->where('last_update >', $last_update);
        $result = $this->db->get($table_name);
        $query_result = $result->result_array();
        if (!empty($query_result)) {
            //***********invoke delete_records method -***********************           
            $delete_record = $this->delete_records($table_name);
            //**********delete updated records******
            $id = array();
            foreach ($query_result as $table) {
                $id[] = $table[$table_name . '_id'];
            } $delete_query = '';
            $delete_query = 'DELETE FROM `' . $table_name . '` WHERE ' . $table_name . '_id in (';
            $delete_query .= implode(',', $id) . ')';
            //***********insert updated records****************
            $table_fields = $this->db->list_fields($table_name);
            $field_value = array();
            foreach ($table_fields as $field) {
                $field_value[] = '`' . $field . '`';
            } $fields = implode(',', $field_value);
            //***********************************************
            $values = array();
            $insert_value = array();
            foreach ($query_result as $value) {
                $value = str_replace("'", "''", $value);
                $insert_query = 'INSERT INTO `' . $table_name . '` (' . $fields . ') VALUES ';
                $values = "('" . implode("','", $value) . "')";
                $insert_value[] = $insert_query .= $values;
            } $insert_query_value = '';
            $insert_query_value .= implode('; ', $insert_value);
            return $update_notification[$table_name] = $delete_record . ";" . $delete_query . ";" . $insert_query_value;
        }
    }

}