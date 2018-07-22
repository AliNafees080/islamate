<?php

class Channel extends CI_Model {

    public function channel_detail($id = 0) {
        $this->db->select('*');
        if ($id != 0) {
            $this->db->where('channel_id', $id);
        }
        $channel = $this->db->get('channel'); //print_r($result);die();
        $channel_result = $channel->result_array(); // print_r($channel_result);die();
        $channel_detail = array();
        foreach ($channel_result as $val) {
            $val["data"] = array();
            $channel_detail[$val['channel_id']] = $val;
        }
        foreach ($channel_detail as $key => $value) {
            $this->db->select('*');
            $this->db->where('channel_id', $value['channel_id']);
            $this->db->order_by('parent_id','asc');
            $this->db->order_by('sequence_no','asc');
            $result = $this->db->get('channel_content'); //print_r($result);die();
            $data = $result->result_array(); //print_r($data);die();
            $channel_data = array();
            foreach ($data as $data_val) {
                $data_val['data'] = array();
                $channel_data[$data_val['channel_content_id']] = $data_val;
            }//print_r($channel_data);die();
            foreach ($channel_data as $index => $val) {//print_r($index);
                //********for files*************
//                $this->db->select('*');
//                $this->db->where('content_id', $val['content_id']);
//                $content = $this->db->get('content');
//                $row = $content->row_array();
//                $channel_data[$index]['content_detail'] = $row; //print_r($channel_data);die();
                if ($channel_data[$index]['parent_id'] == null) {
                    $channel_data[$index]['parent_id'] = 0;
                }//print_r($channel_data);die();
                $channel_detail[$key]['data'] = $this->buildChannelTree($channel_data, 'parent_id', 'channel_content_id'); //print_r($channel_detail[$key]['data']);die();
            }//print_r($channel_data);die();
        } //print_r(json_encode($channel_detail['channel_31']));die();
       //   print_r($channel_detail[32]);die();
        return $channel_detail;
    }

    public function buildChannelTree($channel, $pidKey, $idKey = null) { //print_R($channel);die();
        $grouped = array(); //print_r($pidKey);
        foreach ($channel as $sub) {//print_R($sub);//die();
            $grouped[$sub[$pidKey]][$sub['channel_content_id']] = $sub;
            //$grouped[$sub[$pidKey]][] = $sub;
        }//print_r($grouped);die();

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

        return $tree;
    }

    public function add_channel($data) {
        $response = $this->db->insert('channel', $data);
        $channel_id = $this->db->insert_id();

        if ($response) {
            $new_channel = $this->channel_detail($channel_id);
            return $new_channel;
        }
    }

    public function deletechannel($data) {
        $this->db->delete('channel', array('channel_id' => $data['channel_id']));
    }

    public function renamechannel($data) {
        $this->db->where('channel_id', $data['channel_id']);
        $this->db->update('channel', $data);
    }

    public function insert_duplicate_channel($data) {
        $this->db->insert('channel', $data);
        return $channel_id = $this->db->insert_id();
    }

    public function insert_channel_content_data($table_name, $data) {
        $str = $this->db->insert($table_name, $data);
        if ($str) {
            $channel_content_id = $this->db->insert_id(); //print_r($channel_content_id);
           // $updated_channel['current_inserted_id'] = $channel_content_id; //print_r(json_encode($updated_channel));die();
            return $channel_content_id;
        } else {
            return 0;
        }
    }

    public function delete_channel_content_data($data) {
        $this->db->select('*');
        $this->db->where('channel_content_id', $data['channel_content_id']);
        $res = $this->db->get('channel_content');
        $channel = $res->row_array();//print_r($channel);die();
        $this->db->delete('channel_content', array('channel_content_id' => $data['channel_content_id']));
        $sequence = array('channel_id' => $channel['channel_id'], 'parent_id' => $channel['parent_id'], 'sequence_no >' => $channel['sequence_no']);
        $this->db->where($sequence);
        $counter = 1;
        $this->db->set('sequence_no', 'sequence_no - ' . $counter, FALSE);
        $this->db->update('channel_content');//print_r($this->db->last_query());//die();
        
        return $channel_data = $this->channel_detail($channel['channel_id']);
    }

    public function update_channel_content_data($data) {//print_r($data);die();
        $this->db->select('channel_id');
        $this->db->where('channel_content_id', $data['channel_content_id']);
        $res = $this->db->get('channel_content');
        $channel = $res->row_array(); //print_r($channel);die();
        $this->db->where('channel_content_id', $data['channel_content_id']);
        unset($data['channel_content_id']);
        $this->db->update('channel_content', $data);
        return $channel_data = $this->channel_detail($channel['channel_id']);
    }

    public function set_sequence($data) {
//        print_r($data);
//         die();
//        $this->db->select('*');
//        $where_data = array('channel_id' => $data['channel_id'], 'parent_id' => ($data['parent_id']) ? $data['parent_id'] : null );
//        $this->db->where($where_data);
//        $seq_result = $this->db->get('channel_content');
//        $result = $seq_result->result_array();
        //print_r($result); 
        ///echo sizeof($result); die();
       // $data['from'] = (int) $data['from'];
        if ($data['from'] > $data['to']) { //echo 'from > to';
            $counter = 1;
        } else { //echo 'from < to';
            $counter = -1;
        }
        $where = array('channel_id' => $data['channel_id'],
            'parent_id' => ($data['parent_id']) ? $data['parent_id'] : null,
            'sequence_no <=' => max($data['to'], $data['from']),
            'sequence_no >=' => min($data['to'], $data['from']));//print_r($where);die();
        $this->db->where($where);
        $this->db->set('sequence_no', 'sequence_no + ' . $counter, FALSE);
        $this->db->update('channel_content');//print_r($this->db->last_query());
        $this->db->where('channel_content_id',$data['channel_content_id']);
        
        $this->db->set('sequence_no', $data['to']);
        $this->db->update('channel_content');//print_r($this->db->last_query());die();
        //**************
//         $this->db->select('*');
//        $where_final = array('channel_id' => $data['channel_id'], 'parent_id' => ($data['parent_id']) ? $data['parent_id'] : null);
//        $this->db->where($where_final);
//        $seq_result_data = $this->db->get('channel_content');
//        $results = $seq_result_data->result_array();
//        print_r($results); //die();    
      // die();
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
