<?php

class Analytics_detail extends CI_Model {
    
    public function __construct() {
        $this->load->model('queries');
        $this->load->model('announcement');
        $this->load->helper( array('url', 'function_helper') );
    }
    
    public function contents_list(){
        $users_id = login_organization_detail();
        $this->db->select('*');
        $this->db->where_in('user_id', explode(",",$users_id ));
        $this->db->order_by("creation_time", "desc"); 
        $result = $this->db->get('notification');
        $content['latest_comment_list'] = $result->result_array();
        //print_r($content); die();
        $newcontent =array();
        $exist_content_id = array();
        foreach($content['latest_comment_list'] as $key => $value){
            if(!in_array($value['content_id'], $exist_content_id)){
                $newcontent[] = $value;
                $exist_content_id[] = $value['content_id'];
            }
        }
        $content_array= array();
        foreach($newcontent as $key => $value){
            $content = $this->queries->select_query("content","*","`content_id` = '".$value['content_id']."' ");//print_r($content);die();
            @$content_array[] = @$content[0];
//            $content_array[] = $content;
        }//print_r($content_array);die();
        foreach($content_array as $key => $value){
            $comments = $this->queries->select_query("notification","*","`content_id` = '".$value['content_id']."' and `type`= 'comment' ","`creation_time`","DESC",'5');
            $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']); 
            $time_from_db = strtotime($content_array[$key]["last_update"] ) + $timezone_result;       
            $content_array[$key]["last_update"] = date('Y-m-d H:i:s', $time_from_db); 
            foreach($comments as $commentkey => $commentvalue){
                $username = $this->queries->select_query("user","*","`user_id` = '".$commentvalue['user_id']."' ");
                $comments[$commentkey]['user_name'] = $username[0]['name'];
                $comments[$commentkey]['user_img'] = $username[0]['user_img'];
                if(!file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . "/" . 'assets/upload/'.$username[0]['user_img'])){
                    if($username[0]['user_type'] == "owner")
                        $comments[$commentkey]['user_img'] = "users/owner.png";
                    else if($username[0]['user_type'] == "administrat")
                        $comments[$commentkey]['user_img'] = "users/admin.png";
                    else
                        $comments[$commentkey]['user_img'] = "users/user.png";                    
                }
                $time_from_db = strtotime($commentvalue['activity_time']) + $timezone_result;       
                $comments[$commentkey]['activity_time'] = date('Y-m-d H:i:s', $time_from_db); 
            } $content_array[$key]['comments'] = array_reverse($comments);
        }
        return $content_array;       
    }
}
?>
