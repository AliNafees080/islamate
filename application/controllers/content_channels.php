<?php

class Content_channels extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('content');
        $this->load->model('library');
        $this->load->model('channel');
        $this->load->model('queries');
        $this->load->model('user');
        $this->load->model('announcement');
    }

    public function index() {
        
    }

    //**************view calling***********
    public function library() {
        $data['content'] = $this->library->content_detail();
        $data['tag'] = $this->content->tag_detail();
        $data['detail'] = array('tag' => $data['tag'], 'content' => $data['content']); //print_r( $data['detail']);die();
        $sidebar['album_filter'] = $this->content->album_filter_detail(); //print_r($sidebar['album_filter']);die();
        $template_array = array('pages/contents_channels/library' => $data);
        $this->load->template($template_array, $sidebar);
    }
    
    public function channel(){
        $data['channel'] = $this->channel->channel_detail();
        $data['content'] = $this->library->content_detail();
        $data['user'] =  $this->user->user_detail();
        $data['group'] = $this->announcement->group_detail();
        $channel['detail'] = array('content_detail' => $data['content'], 'channel' => $data['channel'], 'user' => $data['user'], 'group' => $data['group']);
        $sidebar['album_filter'] = $this->content->album_filter_detail();
        $template_array = array('pages/contents_channels/channel' => $channel);
        $this->load->template($template_array,$sidebar);
    }

    public function trash() {
        $data['trash_content'] = $this->library->trash_detail();
        $data['tag'] = $this->content->tag_detail();
        $data['detail'] = array('tag' => $data['tag'], 'trash_content' => $data['trash_content']);
        $sidebar['album_filter'] = $this->content->album_filter_detail();
        $template_array = array('pages/contents_channels/trash' => $data);
        $this->load->template($template_array,$sidebar);
    }
    //****************tags add, update, delete****************
    public function insert_tag() {
        $post = $this->input->post(); //print_r($post);die();
        if (empty($post['tag_id'])) {
            $new_tag = $this->content->add_tag($post);
            $new_tag['response'] = json_encode($new_tag, JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $new_tag);
        } else {
            $update_tag = $this->content->update_tag($post);
            $update_tag['response'] = json_encode($update_tag, JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $update_tag);
        }
    }

    public function delete_tag() {
        $post = $this->input->post();
        $this->content->deletetags($post);
    }

    //***************album and filter add edit delete*************
    public function saved_album_filters($id) {
        $data['content'] = $this->content->saved_filter_detail($id); //print_r($data['content']);die();
        $data['tag'] = $this->content->tag_detail();
        $data['detail'] = array('tag' => $data['tag'], 'data' => $data['content']); //print_r($data['detail']);die();
        $sidebar['album_filter'] = $this->content->album_filter_detail(); //print_r($sidebar['album_filter']);die();
        $template_array = array('pages/contents_channels/filters' => $data);
        $this->load->template($template_array, $sidebar);
    }

    public function insert_album_filter() {
        $post = $this->input->post(); //print_r($post);die();
        if (empty($post['album_filter_id'])) {
            $post['tags'] = implode(',', $post['tags']);
            $new_album_filter = $this->content->add_album_filter($post);
            $new_album_filter['response'] = json_encode($new_album_filter, JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $new_album_filter);
        } else {
            $post['tags'] = implode(',', $post['tags']);
            $update_album_filter = $this->content->update_album_filter($post);
            $update_album_filter['response'] = json_encode($update_album_filter, JSON_HEX_APOS); //print_r($add_user['response']);die();
            $this->load->view('pages/responseview', $update_album_filter);
        }
    }

    public function delete_album_filter($id, $type) {
        $this->content->delete_albumfilter($id);
        if ($type == 'filter') {
            $result = $this->content->first_album_filter($type);
            redirect('content_channels/saved_album_filters/'.$result['album_filter_id']);
        } else {
            $result = $this->content->first_album_filter($type);
            redirect('content_channels/saved_album_filters/'.$result['album_filter_id']);
        }
        
    }

    //*******************upload file*******************
    public function insert_file() {
        $post = $this->input->post();        //print_r($post); die();
        unset($post['isWriteable']);
        $filename = explode('.',$post["filename"]);
        $name = current($filename);
        $extension = end($filename);
        $upload_file = $name.time(). '.' .$extension;
//        print_r($name);die();
        $file = file_get_contents($post["url"]);
        file_put_contents(dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/' . $upload_file, $file);
        unset($post['url']); //echo $post['url'];
        $post['filepath'] = $upload_file;
        $post['time_to_upload'] = $post['last_updated_version'] = date("Y-m-d h:i:s");
        $new_content = $this->library->add_content($post);
        $new_content['response'] = json_encode($new_content[0], JSON_HEX_APOS); //print_r($add_user['response']);die();
        $this->load->view('pages/responseview', $new_content);
    }

    public function update_file() {
        $post = $this->input->post(); // print_r($post);//die();
        rename(dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/' . $post['old_filename'], dirname($_SERVER['SCRIPT_FILENAME']) . '/assets/upload/' . $post["filename"]);
        unset($post['old_filename']);
        $post['last_updated_version'] = date("Y-m-d h:i:s");
        $post['content_tags'] = implode(',', $post['content_tags']);
        if (isset($post['security']))
            $post['security'] = implode(',', $post['security']);
        $update_content = $this->library->update_content($post);
        $update_content['response'] = json_encode($update_content[0], JSON_HEX_APOS); //print_r($update_content['response']);die();
        $this->load->view('pages/responseview', $update_content);
    }

    public function trash_file() {
        $post = $this->input->post();
        $this->library->update_status($post);
    }

    public function delete_file() {
        $post = $this->input->post(); //print_r($post);die();
        $this->library->delete_filecontent($post);
    }
  

}

?>
