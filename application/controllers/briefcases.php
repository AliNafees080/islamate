<?php

class Briefcases extends Member_Controller {

    public $method = '';

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'function_helper'));
        $this->load->model('content');
        $this->load->model('library');
        $this->load->model('briefcase');
        $this->load->model('queries');
    }

    public function index() {
        
    }

    public function insert_briefcase() { //done organization
        $this->method = 'insert_briefcase';
        $post = $this->input->post();
        //print_r($post);        die();
        $post_data = json_decode($post['briefcase'], true); //print_r($post_data);  die();
        unset($post_data['data']);
        //print_r($post_data);        die();
        $post_data['user_id'] = $this->session->userdata('userid');
        $new_briefcase = $this->briefcase->add_briefcase($post_data);
        $new_briefcase['response'] = json_encode($new_briefcase, JSON_HEX_APOS); //print_r($new_briefcase['response']);die();
        $this->load->view('pages/responseview', $new_briefcase);
    }

    public function delete_briefcase() { //done organization
        $post = $this->input->post();//print_r($post);die();
        $this->update_briefcases_user($post['briefcase_id']);
        $this->briefcase->deletebriefcase($post);
    }

    public function rename_briefcase() { //done organization
        $post = $this->input->post();//print_r($post);die();
        $this->update_briefcases_user($post['briefcase_id']);
        $this->briefcase->renamebriefcase($post);
    }

    public function manage_briefcase() {
        $post = $this->input->post();//print_R($post);die();
        $this->briefcase->managebriefcase($post);
    }

    public function duplicate_briefcase() { //done organization
        $this->method = 'duplicate_briefcase';
        $post = $this->input->post();
        $old_briefcase = $post['briefcase_id'];
        unset($post['briefcase_id']);
        $post['user_id'] = $this->session->userdata('userid');
        $duplicate = $this->briefcase->insert_duplicate_briefcase($post);
        $briefcase = $this->briefcase->briefcase_detail($old_briefcase); //print_r($briefcase);
        $briefcase_data = array_shift($briefcase);
        $this->insert_briefcase_content($briefcase_data, $duplicate);
    }

    public function update_briefcase_content() {
        $post = $this->input->post();
        $update = $this->briefcase->update_briefcase_content_data($post);
        $this->update_briefcases_user(key($update));
        $briefcase_updates['response'] = json_encode($update, JSON_HEX_APOS); //print_r($briefcase_updates['response']);die();
        $this->load->view('pages/responseview', $briefcase_updates);
    }

    public function insert_briefcase_content($data = null, $briefcase_id = null) {//print_R($data);die();
        if ($data == null) {
            $post = $this->input->post();
            $content['data'] = json_decode($post['content'], TRUE);//print_r($content);
            //******
            $briefcase_id = $content['data']['briefcase_id'];
            if (empty($content['data']['parent_id'])) {
//                unset($content['parent_id']);
                $parent_id = NULL;
            } else {
                $parent = explode('_', $content['data']['parent_id']);
                $parent_id = end($parent);
            }
        } else {
            $content = $data['data'];
            $briefcase_id = $briefcase_id;
            if (empty($content['parent_id'])) {
                $parent_id = NULL;
            } else {
                $parent = explode('_', $content['parent_id']);
                $parent_id = end($parent);
            }
        }
        $current_inserted_id = $this->set_briefcase_data($content, $briefcase_id, $parent_id);
        $briefcase_data = $this->briefcase->briefcase_detail($briefcase_id); //print_r($briefcase_data);die();
        $this->update_briefcases_user($briefcase_id);
        if (!is_null($current_inserted_id)) {
            $briefcase_data['current_inserted_id'] = 'briefcase_content_' . $current_inserted_id;
        }
        $briefcase_updates['response'] = json_encode($briefcase_data, JSON_HEX_APOS); //print_r($briefcase_updates['response']);die();
        $this->load->view('pages/responseview', $briefcase_updates);
    }

    private function set_briefcase_data($array, $briefcase_id, $parent_id) {//print_r($array);print_r($briefcase_id);print_r($parent_id);die();
        foreach ($array as $value) {           // print_r($value);   //  die();
            unset($value['briefcase_content_id']);
            switch ($value['type']) {
                case "folder": //echo 'folder';  
                    //$last_insert_id = '';
                    $content_folder = $value;
                    $value['user_id'] = $this->session->userdata('userid');
                    if ($this->method == 'duplicate_briefcase') {
                    $content_folder_data = $value['data'];
                    unset($value['briefcase_id'], $value['parent_id'], $value['sequence_no'], $value['creation_time'], $value['content_id'], $value['last_update'],$value['data']);
                    //print_r($value);
                    $this->db->set('creation_time', 'NOW()', FALSE);
                    $content_folder['content_id'] = $this->queries->insert_query("content", $value); //folder insertion on content
                    unset($content_folder['name'], $content_folder['type'], $content_folder['parent_id'], $content_folder['data'], $content_folder['creation_time'], $content_folder['filepath'], $content_folder['description'], $content_folder['last_update']);
                    $content_folder['parent_id'] = $parent_id;
                    $content_folder['briefcase_id'] = $briefcase_id;
                    //print_r($content_folder);
                    $this->db->set('creation_time', 'NOW()', FALSE);
                    $current_inserted_id = $this->queries->insert_query("briefcase_content", $content_folder); //folder insertion on briefcase_content
                        if (!empty($content_folder_data)) {
                            $this->set_briefcase_data($content_folder_data, $briefcase_id, $current_inserted_id);
                        }
//                        $last_insert_id = $this->channel->insert_channel_content_data('channel_content', $data);
                    } else {
                        unset($value['briefcase_id'], $value['parent_id'], $value['sequence_no'], $value['creation_time'],$value['last_update'],$value['data']);
                    $this->db->set('creation_time', 'NOW()', FALSE);
                    $content_folder['content_id'] = $this->queries->insert_query("content", $value); //folder insertion on content
                    unset($content_folder['name'], $content_folder['type'], $content_folder['parent_id'], $content_folder['creation_time'], $content_folder['data'], $content_folder['creation_time'], $content_folder['filepath'], $content_folder['description'], $content_folder['last_update']);
                    $content_folder['parent_id'] = $parent_id;
                    $this->db->set('creation_time', 'NOW()', FALSE);
                    $current_inserted_id = $this->queries->insert_query("briefcase_content", $content_folder); //folder insertion on briefcase_content
//                      $last_insert_id = $this->channel->insert_channel_content_data('channel_content', $data); //print_r($last_insert_id);//die();
                        return $current_inserted_id;
                    }

                    break;
                case "link":   //echo 'link';//echo $last_insert_id;
                    $content_link = $value;
                    $value['user_id'] = $this->session->userdata('userid');
                    if ($this->method == 'duplicate_briefcase') {//echo 'duplicate_briefcase';//die();
                        unset($value['briefcase_id'], $value['parent_id'], $value['sequence_no'], $value['creation_time'], $value['last_update'], $value['content_id'], $value['data']);
                        $this->db->set('creation_time', 'NOW()', FALSE);
                        $content_link['content_id'] = $this->queries->insert_query("content", $value); //folder insertion on content
                        unset($content_link['name'], $content_link['type'], $content_link['parent_id'], $content_link['data'], $content_link['creation_time'], $content_link['filepath'], $content_link['description'], $content_link['last_update']);
                        $content_link['parent_id'] = $parent_id;
                        $content_link['briefcase_id'] = $briefcase_id;
                        $this->db->set('creation_time', 'NOW()', FALSE);
                        $current_inserted_id = $this->queries->insert_query("briefcase_content", $content_link);
                        
                    } else { //echo 'simple';die();
                        unset($value['briefcase_id'], $value['parent_id'], $value['sequence_no'], $value['creation_time'], $value['last_update']);
                        $this->db->set('creation_time', 'NOW()', FALSE);
                        $content_link['content_id'] = $this->queries->insert_query("content", $value); //folder insertion on content
                        unset($content_link['name'], $content_link['type'], $content_link['parent_id'], $content_link['creation_time'], $content_link['description'], $content_link['last_update']);
                        $content_link['parent_id'] = $parent_id;
                        $content_link['briefcase_id'] = $briefcase_id;
                        $this->db->set('creation_time', 'NOW()', FALSE);
                        return $current_inserted_id = $this->queries->insert_query("briefcase_content", $content_link); //folder insertion on briefcase_content
                    }

                    break;
                default: //echo 'file';//echo $last_insert_id;
                    unset($value['creation_time'], $value['type'], $value['parent_id'], $value['briefcase_id'], $value['last_update']);
                    $value['briefcase_id'] = $briefcase_id;
                    $value['parent_id'] = $parent_id;
                    $this->db->set('creation_time', 'NOW()', FALSE);
                    if ($this->method == 'duplicate_briefcase') {
                        unset($value['data'], $value['name'], $value['description'], $value['filepath']);
                        $this->db->set('creation_time', 'NOW()', FALSE);
                        $current_inserted_id = $this->queries->insert_query("briefcase_content", $value); //print_r($current_inserted_id);die();
                    } else {
                        $this->db->set('creation_time', 'NOW()', FALSE);
                        $current_inserted_id = $this->queries->insert_query("briefcase_content", $value); // print_r($current_inserted_id);die();
                        return $current_inserted_id;
                    }
                    break;
            }
        }
    }

    //****************delete chanel content****************
    public function delete_briefcase_content() {
        $post = $this->input->post(); //print_r($post);die();
        $delete = $this->briefcase->delete_briefcase_content_data($post);//print_r(key($delete));die();
        $this->update_briefcases_user(key($delete));
        $briefcase_updates['response'] = json_encode($delete, JSON_HEX_APOS); //print_r($briefcase_updates['response']);die();
        $this->load->view('pages/responseview', $briefcase_updates);
    }

    public function element_move() {
        $post = $this->input->post(); //print_r($post);die();
        $this->briefcase->set_sequence($post);
        $briefcase = $this->briefcase->briefcase_detail($post['briefcase_id']); //print_r($briefcase);die();
        $this->update_briefcases_user($post['briefcase_id']);
        $data['response'] = json_encode($briefcase, JSON_HEX_APOS); //print_r($datas['response']);die();
        $this->load->view('pages/responseview', $data);
    }
    
    public function update_briefcases_user($briefcase_id){
        $br_user = $this->queries->select_query('briefcase_user','user_id','briefcase_id = '.$briefcase_id);
        $br_group = $this->queries->select_query('briefcase_group','group_id','briefcase_id = '.$briefcase_id);
        $total_user = array();
        $users = array();
        $user_group = array();
        //*********briefcase user***************
        if(!empty($br_user)){
        $user = array();
        foreach($br_user as $br_u){
            $user[] = $br_u['user_id'];
        }
        $users = array_unique($user);
        }
        //**********briefcase group with group users***********
        if(!empty($br_group)){
            $groups = array();
            foreach($br_group as $gr){
                $groups[] = $gr['group_id'];
            }
            $group = implode(',',$groups);
            $gr_user = $this->queries->select_query('user_group','user_id','group_id IN ('.$group.')');
            $user_group = array();
            if(!empty($gr_user)){
                foreach($gr_user as $gr_u){
                    $user_group[] = $gr_u['user_id'];
                }
                 $user_group = array_unique($user_group);
            }
            
        }
        //*********merge briefcase and groups user**************
        $total_user = array_merge($users,$user_group);
        if(!empty($total_user)){
            $update_user = implode(',',$total_user);//print_R($update_user);die();
            $this->db->set('last_update', 'NOW()', FALSE);
            $this->db->where('user_id IN ('.$update_user.')');
            $this->db->update('user');
        }
    }

}

?>
