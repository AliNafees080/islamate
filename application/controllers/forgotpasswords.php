<?php

class Forgotpasswords extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('api');
        $this->load->model('queries');
    }
    
    public function _remap($method)
    {
        if (method_exists($this, $method))
            $this->$method();
        else 
            $this->index($method);        
    }
    
    public function index(){
        $code =  $this->uri->segment(2);
        $post = $this->input->post();
        $data['view'] = 0;// To set view of forget password page
        $data['message'] = "default";
        
        $key = substr(@$code, 16, -16);
        
        if (substr($code, 0, 16) . substr($code, -16) !== md5("72e2b162448aad66" . $key . "b2486966e9319ba3")){
           $data['message'] = "Cipher mismatch";            
        }           
        elseif (time() - 24 * 60 * 60 > substr($key, 0, 5) . substr($key, -5)){
           $data['message'] = "Sorry the link has expired";
        }
        else {
            $user = $this->queries->select_query("user","*"," `user_id` = '".substr($key, 13, -13)."' ");
            if (empty($user))
                $data['message'] = "User Does not exist";
            else if ($user[0]["passwordUpdateTime"] > substr($key, 0, 5) . substr($key, -5))
                $data['message'] = "Password has already been updated";
            else if (isset($post["confirmpassword"])) {
                $parameters["user_id"] = $post["user_id"];
                $parameters["password"] = md5($_POST["confirmpassword"]);
                $parameters["passwordUpdateTime"] = time();
                $this->queries->update_query('user',$parameters,"`user_id`= '".$post['user_id']."' ");
                $data['message'] = "Your Password has been updated sucessfully";
            } 
            else{
                $data['view'] = 1;
            }
        }
        $data['user_id'] = substr($key, 13, -13);
        $this->load->view('pages/forgotpassword',$data);        
    }    
}
?>
