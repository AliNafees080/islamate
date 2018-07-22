<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Queries extends CI_Model {

    public function insert_query($table_name,$data) {
        $str = $this->db->insert($table_name,$data);
        if($str)
        {
            return $this->db->insert_id();
        }
        else
        {
            return 0;
        }
    }
    
    public function delete_query($table_name,$where,$or_where='') {
        $this->db->where($where, NULL, FALSE);
        if($or_where!='')
            $this->db->or_where($or_where, NULL, FALSE);
        
        return $this->db->delete($table_name); 
    }
    
    public function update_query($table_name,$data,$wherecommand,$or_wherecommand = '') {
        $this->db->where($wherecommand, NULL, FALSE);
        if($or_wherecommand != '')
            $this->db->or_where($or_wherecommand, NULL, FALSE);
        $str = $this->db->update($table_name, $data);
        
        if($str)
        {
            return '1';
        }
        else
        {
            return 0;
        }
    }
    
    public function select_query($table_name, $fields = '*', $wherecommand = '',$orderby='',$order='') {
        
        $this->db->select($fields);
        if(is_array($wherecommand)){
            $this->db->where($wherecommand);
        } else {
            if($wherecommand){
                $this->db->where($wherecommand, NULL, FALSE);
            }
        }
        if($orderby!=''){
            $this->db->order_by($orderby, $order);
        }
        $query=$this->db->get($table_name);
        return $query->result_array();
    }
    
    public function run_query($dbquery)
    {
        return $query = $this->db->query($dbquery);
    }
    public function miscellaneous($data){
        $this->db->set('value',$data['json']);
        $this->db->where('key',$data['tab_name']);
        $result=$this->db->update('miscellaneous');
        return $result;
    }
}
