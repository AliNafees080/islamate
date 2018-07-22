<?php

class Content_briefcases extends Member_Controller {

    public function __construct() { // briefcase changed
        parent::__construct();
        $this->load->helper( array('url', 'function_helper') );
        $this->load->model('content');
        $this->load->model('library');
        $this->load->model('briefcase');
        $this->load->model('queries');
        $this->load->model('user');
        $this->load->model('announcement');
        $this->load->model('group');
    }

    public function index() { // briefcase changed
        ///echo 'hello';
    }

    //**************view calling***********
    public function library() { // briefcase changed
        $users_value = login_organization_detail();
        $data['contents'] = $this->library->content_detail();
        $data['content'] = array();
        foreach ($data['contents'] as $key => $val) { //This loop is applied to set id as key of array.
            $data['content']["content_".$key] =  $val;
        }
        $data['detail'] = array('content' => $data['content']); //print_r( $data['detail']);die();
        $header['group_detail'] = $this->queries->select_query('group','*',"`user_id` in (".$users_value.")");
        $header['briefcase_detail'] = $this->queries->select_query("briefcase", "*", "`user_id` in (" . $users_value . ")");
        $header['emails'] = $this->user->all_users_email();
        $header['timezone'] = $this->queries->select_query('timezone','TimeZoneId');
        $template_array = array('pages/contents_briefcases/library' => $data);
        $this->load->template($template_array,$header);
    }
    
    public function briefcase(){ // briefcase changed
        $users_value = login_organization_detail();
        $data['briefcase'] = $this->briefcase->briefcase_detail();
        $data['content'] = $this->library->content_detail();
        $data['user'] =  $this->user->user_detail();
        $data['group'] = $this->group->group_detail();
        $briefcase['detail'] = array('content_detail' => $data['content'], 'briefcase' => $data['briefcase'], 'user' => $data['user'],'group' => $data['group']);
        $header['group_detail'] = $this->queries->select_query('group','*',"`user_id` in (".$users_value.")");
        $header['briefcase_detail'] = $this->queries->select_query("briefcase", "*", "`user_id` in (" . $users_value . ")");
        $header['emails'] = $this->user->all_users_email();
        $header['timezone'] = $this->queries->select_query('timezone','TimeZoneId');
        $template_array = array('pages/contents_briefcases/briefcase' => $briefcase);
        $this->load->template($template_array,$header);
    }

    public function trash() {
        $users_value = login_organization_detail();
        $data['trash_content'] = $this->library->trash_detail();
        $data['detail'] = array('trash_content' => $data['trash_content']);
        //$sidebar['album_details'] = $this->content->album_detail();
        $header['group_detail'] = $this->queries->select_query('group','*',"`user_id` in (".$users_value.")");
        $header['briefcase_detail'] = $this->queries->select_query("briefcase", "*", "`user_id` in (" . $users_value . ")");
        $header['emails'] = $this->user->all_users_email();
        $header['timezone'] = $this->queries->select_query('timezone','TimeZoneId');
        $template_array = array('pages/contents_briefcases/trash' => $data);
        $this->load->template($template_array,$header);
    }
    
    
    
    //*******************upload file*******************
    public function insert_file() { 
        $post = $_FILES["uploadfile"];
        $post['filepath'] = time().$post['name'];
//        $file = file_get_contents($_FILES["tmp_name"]);
        move_uploaded_file($post["tmp_name"], dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/' . $post['filepath']);
        $post['creation_time'] = date("Y-m-d h:i:s");
        $post['user_id'] = $this->session->userdata('userid');
        $type = explode('/',$post['type']);
        if(current($type) == 'text'){
            $post['type'] = 'application';
        } else {
        $post['type'] = current($type);
        }
        unset($post['tmp_name'],$post['error'],$post['size'],$post['url'],$post['last_updated_version'],$post['filename']);
        $new_content = $this->library->add_content($post);        
        $key = current(array_keys($new_content));
        $new_content['response'] = json_encode($new_content[$key], JSON_HEX_APOS); //print_r($add_user['response']);die();
        $this->load->helper('url');
        redirect('content_briefcases/library', 'refresh');
        //$this->load->view('pages/responseview', $new_content); 
    }

    public function update_file() { 
        $post = $this->input->post();  //print_r($post);die();
        $oldname_array = explode(".",$post['old_filename']);
        $post['name'] = $post['name'] .".".end($oldname_array);
        unset($post['old_filename']);
        $update_content = $this->library->update_content($post);
        $this->library->user_update($notification = null,$post['content_id']);
        $update_content['response'] = json_encode($update_content[0], JSON_HEX_APOS); //print_r($update_content['response']);die();
        $this->load->view('pages/responseview', $update_content);
    }

    public function trash_file() { //done organization
        $post = $this->input->post();//print_r($post);die();
        $this->library->update_status($post);
    }

    public function delete_file() { //done organization
        $post = $this->input->post(); //print_r($post);die();
        $image = $this->queries->select_query('content','filepath','content_id ='.$post['content_id']);//print_r($image);die();
        $path = dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/'.$image[0]['filepath']; 
        unlink($path);
        $this->library->delete_filecontent($post);
    }
    
    public function check_file() { //done organization
        $post = $this->input->post(); //print_r($post);die();
        $filename = $post['filelink'];
        if (!file_exists(FCPATH."assets/file/".$filename)){
            $data['status'] = "Failure";
        }else{
            $data['status'] = "Success";
        }
      $briefcase_updates['response'] = json_encode($data, JSON_HEX_APOS); //print_r($briefcase_updates['response']);die();
      $this->load->view('pages/responseview', $briefcase_updates);         
    }
    
    public function insert_comment(){    //done organization 
        $post =  $this->input->post();
        $post['user_id'] = $this->session->userdata['userid'];
        $post['activity_time'] = gmdate("Y-m-d H:i:s", time());      
        $comment_id = $this->library->add_comment($post);
      
      
        $data['contents'] = $this->library->content_detail();
        $data['content'] = array();
        foreach ($data['contents'] as $key => $val) { //This loop is applied to set id as key of array.
            $data['content']["content_".$key] =  $val;
        }
        $data['detail'] = array('content' => $data['content']); //print_r( $data['detail']);die();
        
      
        $data['current_inserted_id'] = $comment_id;
        $complete_last_record = $this->queries->select_query("notification","*"," `notification_id`= '".$comment_id."' ");      
        
        //$data['activity_time'] = $complete_last_record[0]['activity_time'];
        
        $timezone_result = $this->announcement->timezone_diff($this->session->userdata['timezone']); 
        $time_from_db = strtotime($complete_last_record[0]['activity_time']);
        $time_from_db = $time_from_db + ($timezone_result);       
        //$comments[$commentkey]['activity_time'] = date('Y-m-d H:i:s', $time_from_db); 
      
        $data['activity_time'] = date('Y-m-d H:i:s', $time_from_db); 
        
        $userimage = $this->queries->select_query("user","*"," `user_id`= '".$post['user_id']."' ");      
        $data['user_image'] = $userimage[0]['user_img'];
      
        if(!file_exists(dirname($_SERVER['SCRIPT_FILENAME']) . "/" . 'assets/upload/'.$userimage[0]['user_img'])){
            if($userimage[0]['user_type'] == "owner")
                $data['user_image'] = base_url() . "/" . 'assets/upload/users/owner.png';
            else if($userimage[0]['user_type'] == "administrat")
                $data['user_image'] = base_url() . "/" . 'assets/upload/users/admin.png';
            else
                $data['user_image'] = base_url() . "/" . 'assets/upload/users/user.png';                
        }else{
            $data['user_image'] = base_url() . "/" . 'assets/upload/'.$userimage[0]['user_img'];                
        }
        $response['response'] = json_encode($data, JSON_HEX_APOS);
        $this->load->view('pages/responseview',$response);
    }
   public function delete_comment(){   //done organization   
      $post =  $this->input->post();
      $comment = $this->library->delete_comment($post);
         
       $data['contents'] = $this->library->content_detail();
        $data['content'] = array();
        foreach ($data['contents'] as $key => $val) { //This loop is applied to set id as key of array.
            $data['content']["content_".$key] =  $val;
        }
        $data['detail'] = array('content' => $data['content']); //print_r( $data['detail']);die();
      
    $response['response'] = json_encode($data, JSON_HEX_APOS);
    $this->load->view('pages/responseview',$response);
    }
}
?>
