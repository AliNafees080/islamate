<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function login_organization_detail(){
    $CI = get_instance();
    $user_id = $CI->session->userdata['userid'];
    
    $CI->db->select('organization_id');
    $CI->db->where('user_id',$user_id);
    $organization = $CI->db->get('user');
    $organization = $organization->result_array(); 
    
    $CI = get_instance();
    
    $CI->db->select('user_id');
    $CI->db->where('organization_id',$organization[0]['organization_id']);
    $user_id = $CI->db->get('user');
    $user_id_array = $user_id->result_array(); 
    
    $users_value = "";
    if(sizeof($user_id_array)>0){
        foreach($user_id_array as $key => $value){
            $users_value .= $value['user_id'].",";
        }
        $users_value = rtrim($users_value, ",");
    }
    return $users_value;    
}   


