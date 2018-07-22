<?php

class Channels extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('content');
        $this->load->model('library');
        $this->load->model('channel');
        $this->load->model('queries');
    }

    public function index() {
//        $data = array('channel_id' => 35, 'parent_id' => NULL, 'channel_content_id' => 229, 'from' => 0, 'to' => 2);
//       
//        $this->channel->set_sequence($data);
        // $this->duplicate_channel();
    }

    public function insert_channel() {
         $this->method = 'insert_channel';
        $post = $this->input->post(); //print_r($post);
        $post_data = json_decode($post['channel'], true); //print_r($post_data);  die();
        unset($post_data['data']);
        $new_channel = $this->channel->add_channel($post_data);
        $new_channel['response'] = json_encode($new_channel, JSON_HEX_APOS); //print_r($new_channel['response']);die();
        $this->load->view('pages/responseview', $new_channel);
    }

    public function delete_channel() {
        $post = $this->input->post();
        $this->channel->deletechannel($post);
    }

    public function rename_channel() {
        $post = $this->input->post();
        $this->channel->renamechannel($post);
    }
    public $method = '';
    public function duplicate_channel() {
        $this->method = 'duplicate_channel';
        $post = $this->input->post();
        $old_channel = $post['channel_id'];
        unset($post['channel_id']); //  print_r($post);die();
        $duplicate = $this->channel->insert_duplicate_channel($post);
        //$post['channel_id'] = 35;
        $channel = $this->channel->channel_detail($old_channel); //print_r($channel);
        $channel_data = array_shift($channel);
//        print_r($channel_data);print_r($duplicate);
//        die();
        $this->insert_channel_content($channel_data, $duplicate);
    }

    public function update_channel_content() {
        $post = $this->input->post();
        $update = $this->channel->update_channel_content_data($post);
        $channel_updates['response'] = json_encode($update, JSON_HEX_APOS); //print_r($channel_updates['response']);die();
        $this->load->view('pages/responseview', $channel_updates);
    }

    public function insert_channel_content($data = null, $channel_id = null) {
        if ($data == null) {
            $post = $this->input->post(); //print_R($post);//die();
            $post_json = $post['content'];
            //print_r($post_json); die();
            
          //  $post_json = '{"channel_id":"31","name":"astha","groups":"","users":"","is_lock":"0","last_update":"2015-01-22 17:01:23","data":{"0":{"type":"file","content_id":"13","name":" wordpress-presentation.odp","details":"DEFAULT.png","from": null ,"to":"1"}}}';//print_r($post_json);die();            
            $post_data = json_decode($post_json, true); //print_r($post_data);
            if($post_data['parent_id'] == ""){ // run a query where pchannel id = post['channelid']
              $alldata['total_content']= $this->queries->select_query("channel_content","*","`channel_id` = '".$post_data['channel_id']."'  ");              
            } 
            else{ // run a query where parent_id = post['parent_id']
              $alldata['total_content']= $this->queries->select_query("channel_content","*","`parent_id` = '".$post_data['parent_id']."'  ");              
            }
            
            
            $post_data['data'][0]['sequence_no'] =  sizeof($alldata['total_content']);
            
            $channel = $post_data['channel_id'];
            if (empty($post_data['parent_id'])) {
                $parent_id = NULL;
            } else {
                $parent = explode('_', $post_data['parent_id']);
                $parent_id = end($parent);
            }
        } else {//print_r($data); print_r($channel_id);die();
            $post_data = $data;
            $channel = $channel_id;
            if (empty($post_data['parent_id'])) {
                $parent_id = NULL;
            } else {
                $parent = explode('_', $post_data['parent_id']);
                $parent_id = end($parent);
            }
        }
        //print_r($post_data['data']) ; die();
        $content_channel_id =  $this->set_channel_data($post_data['data'], $channel, $parent_id);
        $channel_data = $this->channel->channel_detail($channel);//print_r($channel_data);die();
      //  $channel_data['current_inserted_id'] = $content_channel_id;
        $channel_updates['response'] = json_encode($channel_data, JSON_HEX_APOS); //print_r($channel_updates['response']);die();
        $this->load->view('pages/responseview', $channel_updates);
    }

    private function set_channel_data($array, $channel_id, $parent_id) {
        foreach ($array as $value) {   //print_r($value);     die();
            unset($value['channel_content_id']);
            switch ($value['type']) {
                case "folder": //echo 'folder';  
                    //$last_insert_id = '';
                    $data['channel_id'] = $channel_id;
                    $data['type'] = $value['type'];
                    $data['details'] = '';
                    $data['parent_id'] = $parent_id;
                    $data['content_id'] = null;
                    $data['name'] = $value['name'];
                    $data['sequence_no'] = $value['sequence_no'];
                      $last_insert_id = $this->channel->insert_channel_content_data('channel_content', $data); //print_r($last_insert_id);//die();
                    if($this->method == __FUNCTION__){echo $this->method;}
                      if (!empty($value["data"])) {
                        $this->set_channel_data($value["data"], $channel_id, $last_insert_id);
                    }
                    break;
                case "link":   //echo 'link';//echo $last_insert_id;
                    $data['channel_id'] = $channel_id;
                    $data['type'] = $value['type'];
                    $data['details'] = $value['details'];
                    $data['parent_id'] = $parent_id;
                    $data['name'] = $value['name'];
                    $data['content_id'] = null;
                    $data['sequence_no'] = $value['sequence_no'];
                    $last_inserted_id = $this->channel->insert_channel_content_data('channel_content', $data); //print_r($last_insert_id);
                     $last_inserted_id;
                    break;
                default: //echo 'file';//echo $last_insert_id;
                    $data['channel_id'] = $channel_id;
                    $data['type'] = $value['type'];
                    $data['details'] = $value['details'];
                    $data['parent_id'] = $parent_id;
                    $data['name'] = $value['name'];
                    $data['content_id'] = $value['content_id'];
                    $data['sequence_no'] = $value['sequence_no'];
                    $last_insert_id = $this->channel->insert_channel_content_data('channel_content', $data); //print_r($last_insert_id);
                    break;
            }
            
        }
    }

    //****************delete chanel content****************
    public function delete_channel_content() {
        $post = $this->input->post(); //print_r($post);die();
        $delete = $this->channel->delete_channel_content_data($post);
        $channel_updates['response'] = json_encode($delete, JSON_HEX_APOS); //print_r($channel_updates['response']);die();
        $this->load->view('pages/responseview', $channel_updates);
    }
    
    public function element_move(){
        $post = $this->input->post();//print_r($post);die();
        $this->channel->set_sequence($post);
        $channel = $this->channel->channel_detail($post['channel_id']);//print_r($channel);die();
        $data['response'] = json_encode($channel, JSON_HEX_APOS); //print_r($datas['response']);die();
        $this->load->view('pages/responseview', $data);
    }
    

}

?>
