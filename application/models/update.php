<?php

class Update extends CI_Model {

    public function user_data($user_id, $last_update) {
        $this->db->select('organization_id');
        $this->db->where('user_id', $user_id);
        $org = $this->db->get('user'); //print_R($this->db->last_query());
        $org_id = $org->row_array(); //print_r($org_id);die();
        $this->db->select('*');
        $this->db->where('organization_id', $org_id['organization_id']);
        $result = $this->db->get('user');
        $result_user = $result->result_array();
//        return $user_data;
        //*****
        $user_data = array();
        foreach ($result_user as $user) {
            $user_data['users'][] = $user['user_id'];
        }
        if (!empty($user_data['users'])) {
            $user_data['user_query'] = $this->create_queries('user', $last_update, $user_data['users']);
        } else {
//            $user_data['user_query'] = $this->delete_not_in('userdelete_not_in',array(0));
            $user_data['user_query'] = 'DELETE FROM `user`; ';
        }
        return $user_data;
    }

    public function user_group_data($user_id, $last_update) {
        $this->db->select('group_id, user_group_id');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('user_group');
        $result_user_group = $result->result_array();//print_r($result_user_group);die();
//         return $user_group_data;
        //*********
        $user_group_data = array();
       // print_r($result_user_group);
        foreach ($result_user_group as $user_group) {
            $user_group_data['groups'][] = $user_group['group_id'];
            $user_group_data['user_group'][] = $user_group['user_group_id'];
        }//print_r($user_group_data);
        if (!empty($user_group_data['user_group'])){
            $user_group_data['user_group_query'] = $this->create_queries('user_group', $last_update, $user_group_data['user_group']); // print_r($global['user_group_query']);//die();
        } else {
//            $user_group_data['user_group_query'] = $this->delete_not_in('user_group',array(0));
            $user_group_data['user_group_query'] = 'DELETE FROM `user_group`; ';
        }
        if (!empty($user_group_data['groups'])) {
            $user_group_data['group_query'] = $this->create_queries('group', $last_update, $user_group_data['groups']);
        } else {
//            $user_group_data['group_query'] = $this->delete_not_in('group',array(0));
            $user_group_data['group_query'] = 'DELETE FROM `group`; ';
        }
        return $user_group_data;
    }

//      public function user_group_briefcase_data($user_id,$group_id = array()){
    public function group_briefcase_data($last_update, $group_id = array()) {
        $briefcase = array();
        //********briefcase_group data*************
        $this->db->select('briefcase_id, briefcase_group_id');
        $this->db->where_in('group_id', $group_id);
        $result_group = $this->db->get('briefcase_group');
        $briefcase_group_data = $result_group->result_array(); //print_r($briefcase_group_data);die();
        foreach ($briefcase_group_data as $br_group) {
            $briefcase['briefcase_id'][] = $br_group['briefcase_id'];
            $briefcase['briefcase_group_id'][] = $br_group['briefcase_group_id'];
        }
        $user_group_briefcase = array();
        if (!empty($briefcase['briefcase_id']))
            $user_group_briefcase['briefcase_id'] = $briefcase['briefcase_id'];
        if (!empty($briefcase['briefcase_group_id']))
            $user_group_briefcase['briefcase_group'] = $briefcase['briefcase_group_id'];
        if (!empty($user_group_briefcase['briefcase_group'])){
            $user_group_briefcase['briefcase_group_query'] = $this->create_queries('briefcase_group', $last_update, $user_group_briefcase['briefcase_group']);
        } 
//        else {
//            $user_group_briefcase['briefcase_group_query'] = $this->delete_not_in('briefcase_group',array(0));
//        }
            return $user_group_briefcase;
    }

    public function user_briefcase_data($user_id, $last_update) {
        $briefcase = array();
        //********briefcase_user table**********
        $this->db->select('briefcase_id, briefcase_user_id');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('briefcase_user');
        $briefcase_user_data = $result->result_array(); //print_r($briefcase_user_data);die();
        foreach ($briefcase_user_data as $br_user) {
            $briefcase['briefcase_id'][] = $br_user['briefcase_id'];
            $briefcase['briefcase_user_id'][] = $br_user['briefcase_user_id'];
        }
        if (!empty($briefcase['briefcase_user_id'])) {
            $briefcase['briefcase_user_query'] = $this->create_queries('briefcase_user', $last_update, $briefcase['briefcase_user_id']);
        } else {
//             $briefcase['briefcase_user_query'] = $this->delete_not_in('briefcase_user',array(0));
             $briefcase['briefcase_user_query'] = 'DELETE FROM `briefcase_user`; ';
        }
        //print_R($briefcase);die();
        return $briefcase;
    }

    public function briefcase_content_data($last_update, $briefcase_id = array()) {
        $this->db->select('content_id, briefcase_content_id');
        $this->db->where_in('briefcase_id', $briefcase_id);
        $result = $this->db->get('briefcase_content');
        $result_briefcase_content = $result->result_array(); //print_r($result_briefcase_content);//die();
        $briefcase_content_data = array();
        foreach ($result_briefcase_content as $briefcase_content) {
            $briefcase_content_data['briefcase_content'][] = $briefcase_content['briefcase_content_id'];
            $briefcase_content_data['content'][] = $briefcase_content['content_id'];
        }//print_r($briefcase_content_data);die();
        if (!empty($briefcase_content_data['briefcase_content'])) {
            $briefcase_content_data['briefcase_content_query'] = $this->create_queries('briefcase_content', $last_update, $briefcase_content_data['briefcase_content']);
        } 
        if (!empty($briefcase_content_data['content'])) {
            $briefcase_content_data['content'] = array_unique($briefcase_content_data['content']);
            $briefcase_content_data['content_query'] = $this->create_queries('content', $last_update, $briefcase_content_data['content']);
        } 
        return $briefcase_content_data;
    }

    public function notification_data($user_id, $last_update, $content) {
        $result_notification = array();
        //***********for share content table
//        $this->db->select('notification_id');
//        $where = array('type' => 'share', 'user_id' => $user_id);
//        $this->db->where($where);
//        $result_share = $this->db->get('notification'); //print_R($this->db->last_query());
//        $result_notification['user_share'] = $result_share->result_array(); //print_r($result_notification_share);//die();
        //**********content basis*************
        $this->db->select('notification_id');
        $this->db->where_in('content_id', $content);
        $result = $this->db->get('notification'); //print_R($this->db->last_query());
        $result_notification = $result->result_array(); //print_r($result_notification);die();
//        $result_notification['content_specific'] = $result->result_array(); //print_r($result_notification);die();
        // return $result_notification;
        //********
        $result_notification_data = array();
//        foreach ($result_notification['user_share'] as $notification) {
//            $result_notification_data['notification'][] = $notification['notification_id'];
//            $result_notification_data['shared_notification'][] = $notification['notification_id'];
//        }
        foreach ($result_notification as $notification_content) {
            $result_notification_data['notification'][] = $notification_content['notification_id'];
        }
        if (!empty($result_notification_data['notification'])) {
            $result_notification_data['notification_query'] = $this->create_queries('notification', $last_update, $result_notification_data['notification']);
        } 
//        else {
////            $result_notification_data['notification_query'] = $this->delete_not_in('notification',array(0));
//            $result_notification_data['notification_query'] = 'DELETE FROM `notification`; ';
//        }
        return $result_notification_data;
    }

//    public function shared_content_data($last_update, $user_shared_notification) {
//        $this->db->select('shared_content_id');
//        $this->db->where_in('notification_id', $user_shared_notification);
//        $result = $this->db->get('shared_content');
//        $result_shared_content = $result->result_array(); //print_R($result_shared_content);die();
////          return $result_shared_content;
//        //*******
//        $shared_content_data = array();
//        foreach ($result_shared_content as $shared_content) {
//            $shared_content_data['shared_content'][] = $shared_content['shared_content_id'];
//        }
//        if (!empty($shared_content_data['shared_content'])) {
//            $shared_content_data['shared_content_query'] = $this->create_queries('shared_content', $last_update, $shared_content_data['shared_content']);
//        }
////        else {
//////            $shared_content_data['shared_content_query'] = $this->delete_not_in('shared_content',array(0));
////            $shared_content_data['shared_content_query'] = 'DELETE FROM `shared_content`; ';
////        }
//        return $shared_content_data;
//    }
    
      public function shared_content_data($last_update, $user_id) {
          //**********notification id*********
          $this->db->select('notification_id');
          $where = array('user_id' => $user_id, 'type' => 'share');
          $this->db->where($where);
          $notify = $this->db->get('notification');
          $notify_result = $notify->result_array();//print_R($notify_result);die();
          $share = array(0);
          foreach($notify_result as $ns){
              $share[] = $ns['notification_id'];
          }
          //print_r($share);//die();
          //*********shared content user specific data****************
        $this->db->select('shared_content_id');
        $this->db->where_in('notification_id', $share);
        $result = $this->db->get('shared_content');
        $result_shared_content = $result->result_array(); //print_R($result_shared_content);die();
        $shared_content_data = array();
        foreach ($result_shared_content as $shared_content) {
            $shared_content_data['shared_content'][] = $shared_content['shared_content_id'];
        }
        if (!empty($share)) {
            $shared_content_data['notification_query'] = $this->create_queries('notification', $last_update, $share);
        }
        if (!empty($shared_content_data['shared_content'])) {
            $shared_content_data['shared_content_query'] = $this->create_queries('shared_content', $last_update, $shared_content_data['shared_content']);
        }//print_r($shared_content_data);die();
//        else {
////            $shared_content_data['shared_content_query'] = $this->delete_not_in('shared_content',array(0));
//            $shared_content_data['shared_content_query'] = 'DELETE FROM `shared_content`; ';
//        }
        return $shared_content_data;
    }

    public function ann_briefcase_data($user_briefcase, $last_update) {
        $this->db->select('announcement_id, announcement_briefcase_id');
        $this->db->where_in('briefcase_id', $user_briefcase);
        $result = $this->db->get('announcement_briefcase');
        $result_ann_briefcase = $result->result_array();// print_r($result_ann_briefcase);die();
//          return $result_ann_briefcase;//
        //*********
        $ann_briefcase_data = array();
        foreach ($result_ann_briefcase as $ann_briefcase) {
            $schedule_announcement_briefcase = $this->scheduled_announcement_data($last_update, $ann_briefcase['announcement_id']);//print_r($schedule_announcement_briefcase);die(); //die();
            if (!empty($schedule_announcement_briefcase)) {
                foreach ($schedule_announcement_briefcase as $scheduled_br) {
                    $ann_briefcase_data['announcement'][] = $scheduled_br['announcement_id'];
                }
                $ann_briefcase_data['announcement_briefcase'][] = $ann_briefcase['announcement_briefcase_id'];
            }
        }
       // print_R($ann_briefcase_data);die();
        if (!empty($ann_briefcase_data['announcement_briefcase'])) {//print_R($ann_briefcase_data);die();
            $ann_briefcase_data['announcement_briefcase_query'] = $this->create_queries('announcement_briefcase', $last_update, $ann_briefcase_data['announcement_briefcase']);
        } 
//        else {
////            $ann_briefcase_data['announcement_briefcase_query'] = $this->delete_not_in('announcement_briefcase',array(0));
//            $ann_briefcase_data['announcement_briefcase_query'] = 'DELETE FROM `announcement_briefcase`; ';
//        }
        return $ann_briefcase_data;
    }

    public function ann_group_data($user_groups, $last_update) {//print_R($user_groups);//die();
        $this->db->select('announcement_id, announcement_group_id');
        $this->db->where_in('group_id', $user_groups);
        $result = $this->db->get('announcement_group');
        $result_ann_group = $result->result_array(); //print_r($result_ann_group);die();
//          return $result_ann_group;
        //********
        $ann_group_data = array();
        foreach ($result_ann_group as $ann_group) {
            $schedule_announcement_group = $this->update->scheduled_announcement_data($last_update, $ann_group['announcement_id']); //die();
            if (!empty($schedule_announcement_group)) {
                foreach ($schedule_announcement_group as $scheduled_gr) {
                    $ann_group_data['announcement'][] = $scheduled_gr['announcement_id'];
                }
                $ann_group_data['announcement_group'][] = $ann_group['announcement_group_id'];
            }
        }
        if (!empty($ann_group_data['announcement_group'])) {
            $ann_group_data['announcement_group_query'] = $this->create_queries('announcement_group', $last_update, $ann_group_data['announcement_group']);
        }
//        else {
////            $ann_group_data['announcement_group_query'] = $this->delete_not_in('announcement_group',array(0));
//            $ann_group_data['announcement_group_query'] = 'DELETE FROM `announcement_group`; ';
//        }
        return $ann_group_data;
    }

    public function automated_announcement_data($user_id) {
        $this->db->select('announcement_id');
        $this->db->where('assigned_user', $user_id);
        $result = $this->db->get('announcement'); //print_r($this->db->last_query());
        $result_announcement = $result->result_array(); //print_r($result_announcement);die();
        //return $result_announcement;
        //*********
        $announcement_data = array();
        if (!empty($result_announcement)) {
            foreach ($result_announcement as $announcement) {
                $announcement_data['announcement'][] = $announcement['announcement_id'];
            }
        }
        return $announcement_data;
    }

    public function scheduled_announcement_data($last_update, $announcement = array()) {//print_R($announcement);
        $dateFormat = "Y-m-d H:i:s";
        $timeNdate = gmdate($dateFormat, time());
        $this->db->select('announcement_id');
        $this->db->where_in('announcement_id', $announcement);
//        $this->db->where('last_update >', $last_update);
        $this->db->where('`time_to_send` <', $timeNdate);
        $result = $this->db->get('announcement'); //print_r($this->db->last_query());//die();
        $result_scheduled_announcement = $result->result_array(); // print_r($result_scheduled_announcement);die();
        return $result_scheduled_announcement;
    }

    public function create_queries($table_name, $last_update, $id = array()) {
//        $delete_not_in = $this->delete_not_in($table_name, $id);
//        $delete_in = $this->delete_in($table_name, $last_update, $id);
        $insert = $this->insert($table_name, $last_update, $id); //print_r($insert);
//        $query = $delete_not_in;
//        $query .= $delete_in;
        $query = $insert; //print_r($query);die();
        return $query;
    }

    public function delete_in($table_name, $last_update, $id = array()) {
        $this->db->select($table_name . '_id');
        $this->db->where('last_update >', $last_update);
        $this->db->where_in($table_name . '_id',$id);
        $result = $this->db->get($table_name);
        $query_result = $result->result_array();
        $updated_id = array();
        foreach($query_result as $ids){
        $updated_id[] = $ids[$table_name . '_id'];     
        }//print_r($updated_id);die();
        //*******************************
        if(!empty($updated_id)){
        $delete_query = '';
        $delete_query = 'DELETE FROM `' . $table_name . '` WHERE ' . $table_name . '_id in (';
//        $delete_query .=implode(',', $id) . ');'; //print_r($delete_query);//die();
        $delete_query .=implode(',', $updated_id) . ');'; //print_r($delete_query);die();
        return $delete_query;
        }
    }

    public function delete_not_in($table_name, $id = array()) {//print_r($id);die();
        $delete_not_in_query = 'DELETE FROM `' . $table_name . '` WHERE ' . $table_name . '_id NOT IN ('; // . $delete[$table_name . '_id'] . ')';
        $delete_not_in_query .=implode(',', $id) . ');'; //print_r($delete_not_in_query);//die();
        return $delete_not_in_query;
//        return 'DELETE FROM `' . $table_name . '` WHERE ' . $table_name . '_id NOT IN (' . $delete[$table_name . '_id'] . ')';
    }

    public function insert($table_name,$last_update, $id = array()) {//die('astha');
        //***************fetch announcement fields*****************************
        
        $table_filelds = $this->db->list_fields($table_name); //print_r($table_filelds);
        $fields = '';
        $field_value = array();
        foreach ($table_filelds as $field) {
            $field_value[] = '`' . $field . '`';
        }//print_r($field_value);
        $fields .=implode(',', $field_value); //echo $fields;die();
        //**************insert query****************************************** 
        $this->db->select('*');
//        $this->db->where('last_update >', $last_update);
        $this->db->where_in($table_name . '_id', $id);
        $result = $this->db->get($table_name); //print_R($this->db->last_query());
        $query_result = $result->result_array(); //print_R($query_result);die();
        
        $insert_value = array();
        foreach ($query_result as $value) {
            $value = str_replace("'", "''", $value);
            $insert = 'INSERT INTO `' . $table_name . '` (' . $fields . ') VALUES ';
            $values = "('" . implode("','", $value) . "');";
            $insert_value[] = $insert .= $values;
        }
        //*************implode all insert queries*******************************
        if(!empty($insert_value)){
        $truncate_insert_query_value = '';
        $truncate_insert_query_value = 'DELETE FROM `'.$table_name.'`;'; //print_R($insert_query_value);die();
        $truncate_insert_query_value .=implode($insert_value); //print_R($insert_query_value);die();
        return $truncate_insert_query_value;
        }
    }

}