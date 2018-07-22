<?php

class Briefcase extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('queries');
        $this->load->helper( array('url', 'function_helper') );
    }
    
    public function briefcase_detail($id = 0) {
        $users_id = login_organization_detail();
        
        $this->db->select('*');
        if ($id != 0) {
            $this->db->where('briefcase_id', $id);
        }
        $this->db->where_in('user_id', explode(",",$users_id ));
        $briefcase = $this->db->get('briefcase'); //print_r($result);die();
        $briefcase_result = $briefcase->result_array(); // print_r($briefcase_result);die();
        
        $briefcase_detail = array();
        foreach ($briefcase_result as $val) { //This loop is applied to set id as key of array.
            $val["data"] = array();
            $briefcase_detail[$val['briefcase_id']] = $val;
        }
        //print_r($briefcase_detail); die();
        //die();
        foreach ($briefcase_detail as $key => $value) {
            $this->db->select('*');
            $this->db->where('briefcase_id', $value['briefcase_id']);
            $this->db->order_by('parent_id','asc');
            $this->db->order_by('sequence_no','asc');
            $result = $this->db->get('briefcase_content'); //print_r($result);die();
            $data = $result->result_array(); //print_r($data);die();
            $briefcase_data = array();
            foreach ($data as $data_val) {
                $data_val['data'] = array();
                $briefcase_data[$data_val['briefcase_content_id']] = $data_val;
            }//print_r($briefcase_data);die();
            foreach ($briefcase_data as $index => $val) {//print_r($index);
                if ($briefcase_data[$index]['parent_id'] == null) {
                    $briefcase_data[$index]['parent_id'] = 0;
                }//print_r($briefcase_data);die();
                $briefcase_detail[$key]['data'] = $this->buildChannelTree($briefcase_data, 'parent_id', 'briefcase_content_id'); //print_r($briefcase_detail[$key]['data']);die();
            }//print_r($briefcase_detail);die();
            
            //****************Below code is used to set users of biriefcase***********
            $this->db->select('user_id');
            $this->db->where('briefcase_id', $value['briefcase_id']);
            $result_user = $this->db->get('briefcase_user'); //print_r($result);die();
            $data_user = $result_user->result_array(); 
            $alluser = "";
            foreach($data_user as $user_key => $user_value){
                $alluser .= $user_value['user_id'].",";
            }
            $alluser = rtrim($alluser, ",");
            $briefcase_detail[$key]['users'] = $alluser;
            //****************End Code****************************
            
            //****************Below code is used to set groups of biriefcase***********
            $this->db->select('group_id');
            $this->db->where('briefcase_id', $value['briefcase_id']);
            $result_group = $this->db->get('briefcase_group'); //print_r($result);die();
            $data_group = $result_group->result_array(); 
            $allgroup = "";
            foreach($data_group as $group_key => $group_value){
                $allgroup .= $group_value['group_id'].",";
            }
            $allgroup = rtrim($allgroup, ",");
            $briefcase_detail[$key]['groups'] = $allgroup;
            //****************End Code****************************
            
        }// print_r(($briefcase_detail));die();
         return $briefcase_detail;
    }

    public function buildChannelTree($briefcase, $pidKey, $idKey = null) { //print_R($briefcase);die();
        $grouped = array(); //print_r($pidKey);
        foreach ($briefcase as $sub) {//print_R($sub);//die();
            
            $grouped[$sub[$pidKey]]['briefcase_content_' . $sub['briefcase_content_id']] = $sub;
            $this->db->select('*');
            $this->db->where('trash', 1);
            $this->db->where('content_id', $sub['content_id']);
            
            $result = $this->db->get('content'); //print_r($result);die();
            if($result->num_rows() > 0){                
                $data = $result->result_array(); //print_r($data);die();
                $grouped[$sub[$pidKey]]['briefcase_content_' . $sub['briefcase_content_id']]['type'] = $data[0]['type'];
                $grouped[$sub[$pidKey]]['briefcase_content_' . $sub['briefcase_content_id']]['name'] = $data[0]['name'];
                $grouped[$sub[$pidKey]]['briefcase_content_' . $sub['briefcase_content_id']]['description'] = $data[0]['description'];
                $grouped[$sub[$pidKey]]['briefcase_content_' . $sub['briefcase_content_id']]['filepath'] = $data[0]['filepath'];
            }else{
                unset($grouped[$sub[$pidKey]]['briefcase_content_' . $sub['briefcase_content_id']]);
            }
            
            //$grouped[$sub[$pidKey]][] = $sub;
        }//print_r($grouped);die();
        //die();
        $fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {//print_r($siblings);die();
                    foreach ($siblings as $k => $sibling) {//print_r($sibling);//die();
                        $id = $sibling[$idKey]; //print_r($grouped[$id]);die();
                        if (isset($grouped[$id])) {
                           // $grouped[$id] = array();
                            $sibling['data'] = $fnBuilder($grouped[$id]); //print_r($sibling['folder_data']);die();
                        }//die();
                        $siblings[$k] = $sibling; //print_r( $siblings[$k]);die();
                    }

                    return $siblings;
                };

        $tree = $fnBuilder($grouped[0]);
        //$tree = $fnBuilder(key($grouped));
       // print_r($tree); die();
        return $tree;
    }

    public function add_briefcase($data) { //done organization
        //print_r($data); die();
        $this->db->set('creation_time', 'NOW()', FALSE);
        $response = $this->db->insert('briefcase', $data);
        $briefcase_id = $this->db->insert_id();
        if ($response) {
            $new_briefcase = $this->briefcase_detail($briefcase_id);
            return $new_briefcase;
        }
    }

    public function deletebriefcase($data) { //done organization
        $this->db->delete('briefcase', array('briefcase_id' => $data['briefcase_id']));
    }

    public function renamebriefcase($data) { //done organization
        $this->db->where('briefcase_id', $data['briefcase_id']);
        $this->db->update('briefcase', $data);
    } // 

    public function managebriefcase($newdata) {        
        $briefcase = $this->queries->select_query("briefcase","*"," `briefcase_id`= '".$newdata['briefcase_id']."' ");        
        $exist_user = $this->queries->select_query("briefcase_user","*"," `briefcase_id`= '".$newdata['briefcase_id']."' ");
        $exist_group = $this->queries->select_query("briefcase_group","*"," `briefcase_id`= '".$newdata['briefcase_id']."' ");
        //print_r($exist_group); die();
        $newuserarray = explode(",",$newdata['users']);
        $newgroups = explode(",",$newdata['groups']);
        
        $adduserid = array();
        $deleteuserid = array();
        $preexistuser = array();
        $preexistgroup = array();
        
        foreach($exist_user as $value){
            $preexistuser[] = $value['user_id'];
        }
        
        $user_tbl_dlt = array_diff($preexistuser, $newuserarray);//This varibale will be used to update user table (user deletion performed from table)
        $user_tbl_add = array_diff($newuserarray, $preexistuser);//This varibale will be used to update user table (user adding performed from table)
        
        //************Below loop is used to get all users from already existing groups***********
        foreach($exist_group as $value){ //This loop is used for all groups
            $preexistgroup[] = $value['group_id'];
            $exist_user_in_group = $this->queries->select_query("user_group","user_id"," `group_id`= '".$value['group_id']."' ");
            foreach($exist_user_in_group as $user_in_gorup){ //This loop is used to all users in group
                $preexistuser[] = $user_in_gorup['user_id'];                        
            }             
        }//Get all user in preexistuser variable to whom selected briefcase assigned.  
        //******************End code*******************************
        
        $group_tbl_dlt = array_diff($preexistgroup, $newgroups);//This varibale will be used to update group table (group deletion performed from table)
        $group_tbl_add = array_diff($newgroups, $preexistgroup);//This varibale will be used to update group user table (group adding performed from table)
        
        $preexistuser = array_unique($preexistuser);    
        foreach($newgroups as $value){
            $exist_user_in_group = $this->queries->select_query("user_group","user_id"," `group_id`= '".$value."' ");
            foreach($exist_user_in_group as $user_in_gorup){ //This loop is used to all users in group
                $newuserarray[] = $user_in_gorup['user_id'];                        
            } 
        }
        $newuserarray = array_unique($newuserarray); 
        $deleteuserid = array_diff($preexistuser, $newuserarray); // Get list of users to send announcement of removing briefcase
        $adduserid = array_diff($newuserarray,$preexistuser);// Get list of users to send announcement of accessing briefcase
        
        //***********This code used to update user table*****************
        foreach($user_tbl_dlt as $value){
            $this->queries->delete_query("briefcase_user"," `user_id`= '".$value."' and `briefcase_id`= '".$newdata['briefcase_id']."' ");
        }
        
        foreach($user_tbl_add as $value){
            $inserting_data_useradd['user_id'] = $value; 
            $inserting_data_useradd['briefcase_id'] = $newdata['briefcase_id']; 
            $this->queries->insert_query("briefcase_user",$inserting_data_useradd);
            unset($inserting_data_useradd['briefcase_id']);
        }
        //**************End Code********************
       
        //***********This code is used to update announcment table***********
        foreach($deleteuserid as $value){
            $inserting_data_userdlt['user_id'] = $this->session->userdata('userid');
            $inserting_data_userdlt['assigned_user'] = $value;
            $inserting_data_userdlt['type'] = "automated"; //date("Y-m-d h:m:s");
            $inserting_data_userdlt['time_to_send'] = gmdate("Y-m-d H:i:s", time());
            //$inserting_data_userdlt['creation_time'] =gmdate("Y-m-d H:i:s", time());
            $inserting_data_userdlt['message'] = "Your access to the briefcase ".$briefcase[0]['name']." has been removed. briefcase ".$briefcase[0]['name']." needs to be removed from this device.";
            $this->db->set('creation_time', 'NOW()', FALSE);
            $this->queries->insert_query("announcement",$inserting_data_userdlt);
            //********update deleted user's last_update****************
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id',$value);
            $this->db->update('user');
        }
        
        foreach($adduserid as $value){
            $inserting_data['user_id'] = $this->session->userdata('userid');
            $inserting_data['assigned_user'] = $value;
            $inserting_data['type'] = "automated"; //date("Y-m-d h:m:s");
            $inserting_data['time_to_send'] = gmdate("Y-m-d H:i:s", time());
           // $inserting_data['creation_time'] = gmdate("Y-m-d H:i:s", time());
            $inserting_data['message'] = "You have been assigned to ".$briefcase[0]['name']." briefcase";
            $this->db->set('creation_time', 'NOW()', FALSE);
            $this->queries->insert_query("announcement",$inserting_data);
            //********update new user's last_update****************
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id',$value);
            $this->db->update('user');
        }
        //**************End Code********************
        
        //***********This code used to update group table*****************
        foreach($group_tbl_dlt as $value){  //Removing deleted groups
            $this->queries->delete_query("briefcase_group"," `group_id`= '".$value."' and `briefcase_id`= '".$newdata['briefcase_id']."' ");
        }
        
        foreach($group_tbl_add as $value){//inserting Added group
            $inserting_data_grpadd['group_id'] = $value; 
            $inserting_data_grpadd['briefcase_id'] = $newdata['briefcase_id']; 
            $this->queries->insert_query("briefcase_group",$inserting_data_grpadd);
            unset($inserting_data_grpadd['briefcase_id']);
        }
        //**************End Code********************
    }
    
    public function insert_duplicate_briefcase($data) {//print_R($data);//die();
        $this->db->set('creation_time', 'NOW()', FALSE);
        $this->db->insert('briefcase', $data);
        return $briefcase_id = $this->db->insert_id();
    }

    public function insert_briefcase_content_data($table_name, $data) {
        $str = $this->db->insert($table_name, $data);
        if ($str) {
            $briefcase_content_id = $this->db->insert_id(); //print_r($briefcase_content_id);
           // $updated_briefcase['current_inserted_id'] = $briefcase_content_id; //print_r(json_encode($updated_briefcase));die();
            return $briefcase_content_id;
        } else {
            return 0;
        }
    }

    public function delete_briefcase_content_data($data) {
       // print_r($data); die();  
        //************Below code used to get details of deleting id from briefcase_content table********
        $this->db->select('*');
        $this->db->where('briefcase_content_id', $data['briefcase_content_id']);
        $res = $this->db->get('briefcase_content');
        $briefcase = $res->row_array();//print_r($briefcase);die();
        //*************End Code*************
        
        $this->db->delete('briefcase_content', array('briefcase_content_id' => $data['briefcase_content_id']));
        $sequence = array('briefcase_id' => $briefcase['briefcase_id'], 'parent_id' => $briefcase['parent_id'], 'sequence_no >' => $briefcase['sequence_no']);
        $this->db->where($sequence);
        $counter = 1;
        $this->db->set('sequence_no', 'sequence_no - ' . $counter, FALSE);
        $this->db->update('briefcase_content');//print_r($this->db->last_query());//die();
        
        //*************Below code is used to get details of content table of deleting id**************
        $this->db->select('*');
        $this->db->where('content_id', $briefcase['content_id']);
        $content = $this->db->get('content');
        $content_detail = $content->row_array();//print_r($briefcase);die();
        if($content_detail['type'] == "folder" || $content_detail['type'] == "link") //Delete only folder and link because image may be multiply used.
            $this->db->delete('content', array('content_id' => $briefcase['content_id']));
        //*************End code*************************************
        
        return $briefcase_data = $this->briefcase_detail($briefcase['briefcase_id']);
    }

    public function update_briefcase_content_data($data) {//print_r($data);die();
        $this->db->select('*');
        $this->db->where('briefcase_content_id', $data['briefcase_content_id']);
        $res = $this->db->get('briefcase_content');
        $briefcase = $res->row_array(); //print_r($briefcase);die();
        
        $this->db->where('content_id', $briefcase['content_id']);
        unset($data['briefcase_content_id']);
        $this->db->update('content', $data);
        return $briefcase_data = $this->briefcase_detail($briefcase['briefcase_id']);
    }

    public function set_sequence($data) {
        //$this->queries->select_query("");
        $sequence = 0;
        if ($data['from'] > $data['to']) { //echo 'from > to';
            $counter = 1;
            if($data['parent_id'] != "")
                $listofbriefcases = $this->queries->select_query("briefcase_content","*"," `briefcase_id`= '".$data['briefcase_id']."' and `parent_id`= '".$data['parent_id']."' and `sequence_no` >= '".$data['to']."' and `sequence_no`<= '".$data['from']."'  ");
            else
                $listofbriefcases = $this->queries->select_query("briefcase_content","*"," `briefcase_id`= '".$data['briefcase_id']."' and `sequence_no` >= '".$data['to']."' and `sequence_no`<= '".$data['from']."'  ");
        } else { //echo 'from < to';
            $counter = -1;
            if($data['parent_id'] != "")
                $listofbriefcases = $this->queries->select_query("briefcase_content","*"," `briefcase_id`= '".$data['briefcase_id']."' and `parent_id`= '".$data['parent_id']."' and `sequence_no` <= '".$data['to']."' and `sequence_no`>= '".$data['from']."'  ");
            else
                $listofbriefcases = $this->queries->select_query("briefcase_content","*"," `briefcase_id`= '".$data['briefcase_id']."' and `sequence_no` <= '".$data['to']."' and `sequence_no`>= '".$data['from']."'  ");
        }
       
       // print_r($this->db->last_query());die();
        foreach($listofbriefcases as $key => $value){
            if($value['briefcase_content_id']==$data['briefcase_content_id'])
                $update['sequence_no'] = $data['to'];
            else{
                $update['sequence_no'] = $value['sequence_no'] + ($counter);
            }
            $update['briefcase_content_id'] = $value['briefcase_content_id'];
            //echo $value['briefcase_content_id']."   ".$update['sequence_no']."<br/>";
            $this->queries->update_query('briefcase_content',$update,"`briefcase_content_id`= '".$value['briefcase_content_id']."' ");      
            
        }        
    }

    public function update_content($data) {//print_r($data);
        $this->db->where('content_id', $data['content_id']);
        $this->db->update('content', $data);
        $this->db->select('*');
        //  if ($id != 0) {
        $this->db->where('content_id', $data['content_id']);
        //}
        $result = $this->db->get('content');
        $content = $result->result_array(); // print_r($content);die();
        //********* select tag names******

        $this->db->select('name');
        $this->db->where_in('tag_id', explode(',', $content[0]['content_tags']));
        $tag_name = $this->db->get('tag');
        $content_tag = $tag_name->result_array(); //print_r($content_tag);
        $tag_array = array();
        foreach ($content_tag as $tag) {//print_r($tag);
            $tag_array[] = implode($tag); //print_r($tag_array);//die();
        }//print_r($tag_array);
        $content[0]['tag_names'] = $tag_array;
        //*********select views of content************
        $this->db->select('count(*) as view');
        $this->db->where('content_id', $content[0]['content_id']);
        $this->db->where('type', 'view');
        $view_result = $this->db->get('notification');
        $view = $view_result->row_array();
        $content[0]['views'] = $view['view'];
        // print_r($row);
        //*********select comments of content************
        $this->db->select('comment');
        //$this->db->select('count(*) as count_comment');
        $this->db->where('content_id', $content[0]['content_id']);
        $this->db->where('type', 'comment');
        // $this->db->order_by('time', 'asc');
        $comment_result = $this->db->get('notification'); //echo $this->db->last_query();
        $commment_count = $comment_result->num_rows();
        $comment = $comment_result->result_array(); // print_r($comment);
        $comment_array = array();
        foreach ($comment as $comment_data) {//print_r($tag);
            $comment_array[] = implode($comment_data); //print_r($comment_array);//die();
        }
        $content[0]['comments'] = $comment_array;
        $content[0]['comments_count'] = $commment_count;
        //print_r($content);die();
        return $content;
    }

}

?>
