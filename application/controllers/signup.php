<?php
//ini_set("display_errors",1);
class Signup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user');
        $this->load->model('group');
        $this->load->model('announcement');
        $this->load->model('content');
        $this->load->model('queries');
    }

    public function index() { //Organization specific and with new database done
//        $mail_data['user_id'] = 1; 
//        
//        $this->send_confirm_mail($mail_data);
//        die();
        $post = $this->input->post(); 
        if (!empty($post['first_name'])) {
            $checkorganization = $this->queries->select_query("organization","organization_id"," `name`= '".$post['name']."' ");
            if(sizeof($checkorganization) > 0){
                $data['message1'] = "This organization name is not available.";
                $data['message2'] = "Please try something else.";
            } else{
                $organization = $post;
                unset($organization['first_name'],$organization['last_name'],$organization['email_id'],$organization['designation'],$organization['contact'],$organization['timezone']);
                //$this->db->set('creation_time', 'NOW()', FALSE);
                $time = time();
                $newtime=date("Y-m-d H:i:s",$time);
                $organization['creation_time']=$newtime;
                $post['organization_id'] = $this->queries->insert_query('organization',$organization);
                $post['name'] = $post['first_name']." ".$post['last_name'];
                unset($post['first_name'],$post['last_name']);
                //Checking timezone value
                $checktimezone = $this->queries->select_query("timezone","*"," `TimeZoneId`= '".$post['timezone']."' ");
                if(empty($checktimezone))
                    $post['timezone']="Europe/London";
                
                $post['user_type'] = "owner";
                $this->db->set('creation_time', 'NOW()', FALSE);
                $this->queries->insert_query('user',$post);
                $data['message1'] = "Thank you for requesting iSalesMate!";
                $data['message2'] = "Please check your mailbox for next steps.";
                $this->send_confirm_email($post);
            }            
            $data['div'] = 0;
        }
        else{
            $data['div'] = 1;
        }
       $this->load->view("pages/signup",$data);
    }    

    public function send_confirm_email($data) { //Organization specific and with new database done
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                   'Reply-To: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                   'X-Mailer: PHP/' . phpversion();
        $confirmEmailKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8).
        $data['organization_id'].substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        $time = time();
        $secreatKey = "72e2b162448aad66b2486966e9319ba3";
        $confirmEmailCompleteKey = substr_replace($time, $confirmEmailKey,strlen ($time)/2 , 0);
        $cipher = md5(substr_replace($secreatKey, $confirmEmailCompleteKey,strlen ($secreatKey)/2 , 0));
        $detail['code'] = substr_replace($cipher, $confirmEmailCompleteKey,strlen ($cipher)/2 , 0); 
        $detail['data'] = $data;
        $detail['email_id'] = $detail['data']['email_id'];
        
        $email = $this->load->view('pages/email/confirm_email_organization', $detail, true);
        mail($detail['data']['email_id'], "Welcome to iSalesMate!", $email, $headers);
    }
    
    public function registration() {
        $post = $this->input->post();
        $code =  $this->uri->segment(3);
        $data['div'] = 0;// To set view of forget password page
        $data['message'] = "default";
       
        $key = substr(@$code, 16, -16);
        
        if (substr($code, 0, 16) . substr($code, -16) !== md5("72e2b162448aad66" . $key . "b2486966e9319ba3"))
            $data['message'] = "Cipher mismatch";            
        elseif (time() - 24 * 60 * 60 > substr($key, 0, 5) . substr($key, -5))
            $data['message'] = "Sorry the link has expired";
        else {
            $organization = $this->queries->select_query("organization","*"," `organization_id` = '".substr($key, 13, -13)."' ");
            
//            echo $organization[0]["creation_time"]; echo "<br/>";
//            echo $substtimeval1=strtotime($organization[0]["creation_time"]); echo "<br/>";
//            echo date("Y-m-d H:i:s",$substtimeval1); echo "<br/>"; 
//            echo $substtimeval=substr($key, 0, 5) . substr($key, -5);echo "<br/>"; 
//            echo date("Y-m-d H:i:s",$substtimeval); echo "<br/>";
            
            if (empty($organization))
                $data['message'] = "Organization Does not exist";               
            else if (strtotime($organization[0]["creation_time"]) > substr($key, 0, 5) . substr($key, -5))
                $data['message'] = "Password has already been updated";
            else if (isset($post["confirm_password"])) {
                $user["organization_id"] = $organization[0]["organization_id"];
                $user["password"] = md5($_POST["confirm_password"]);
                $organ_detail["creation_time"] = time();
                $organ_detail["organization_id"] = $organization[0]["organization_id"];
                $this->queries->update_query('user',$user,"`organization_id`= '".$user["organization_id"]."' ");
                $this->queries->update_query('organization',$organ_detail,"`organization_id`= '".$organ_detail["organization_id"]."' ");
                redirect(base_url()."dashboard");
            } 
            else
                $data['div'] = 1;            
        }
        $this->load->view('pages/confirmemail',$data);

    }
     public function user_confirm_email() {
        $post = $this->input->post();
        $code =  $this->uri->segment(3);
        //$code = "21b3d7cbdd1a473414266JmhnV4MX6NZb5I83d61796798cb331f5016cfb";
        $data['div'] = 0;// To set view of forget password page
        $data['message'] = "default";
       
        $key = substr(@$code, 16, -16);
        //echo substr($key, 0, 5) . substr($key, -5); die();
        if (substr($code, 0, 16) . substr($code, -16) !== md5("72e2b162448aad66" . $key . "b2486966e9319ba3"))
            $data['message'] = "Cipher mismatch";            
        elseif (time() - 24 * 60 * 60 > substr($key, 0, 5) . substr($key, -5))
            $data['message'] = "Sorry the link has expired";
        else {
            $organization = $this->queries->select_query("user","*"," `user_id` = '".substr($key, 13, -13)."' ");
            if (empty($organization))
                $data['message'] = "User does not exist";               
            else if ($organization[0]["passwordUpdateTime"] > substr($key, 0, 5) . substr($key, -5))
                $data['message'] = "Password has already been updated";
            else if (isset($post["confirm_password"])) {
                $user_data = $this->queries->select_query('user','*',"`user_id`= '".substr($key, 13, -13)."' ");
                $user["password"] = md5($_POST["confirm_password"]);
                $user["passwordUpdateTime"] = time();
                $this->queries->update_query('user',$user,"`user_id`= '".substr($key, 13, -13)."' ");
                
                //**********Below code is used to send invitation mail to created user******
                $mail_data['user_id'] = substr($key, 13, -13);            
                $this->send_confirm_mail($mail_data);
                //**********End code********************
                 if($user_data[0]['user_type'] != 'tablet_user')
                redirect(base_url()); //for owner and admin
                else 
                    redirect(base_url()."thankyou"); //for tablet_user
                //redirect(base_url()."dashboard");
            } 
            else
                $data['div'] = 1;            
        }
        $this->load->view('pages/confirmemail',$data);
    }
    
    public function send_confirm_mail($data) {
        $users = $this->queries->select_query("user","*"," `user_id` = '".$data['user_id']."' ");
        $namearray = explode(" ",$users[0]['name']);
        $data['name'] = $namearray[0];
        $data['email_id'] = $users[0]['email_id'];
        $organization = $this->queries->select_query("organization","*"," `organization_id` = '".$users[0]['organization_id']."' ");
        $data['organization_name'] = $organization[0]['name'];
        $owner = $this->queries->select_query("user","*"," `organization_id` = '".$users[0]['organization_id']."' and `user_type` = 'owner' ");
        $data['admin_name'] = $owner[0]['name'];
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                   'Reply-To: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                   'X-Mailer: PHP/' . phpversion();
        
        $email = $this->load->view('pages/email/user_invitation_details', $data, true);
        mail($data['email_id'], "Welcome to iSalesMate!", $email, $headers);
       // mail("david.nester@me.com", "Welcome to iSalesMate!", $email, $headers);
    }
    public function forgotpassword(){
        $post = $this->input->post();
        $data['mailmatch'] = 0;
        if(isset($post['email_id'])){
            $data['mailmatch'] = 1;
            $checkorganization = $this->queries->select_query("organization","*"," `name`= '".$post['organization']."' ");
            if(!empty($checkorganization)){
                $users = $this->queries->select_query("user","*"," `email_id`= '".$post['email_id']."' and `organization_id`= '".$checkorganization[0]['organization_id']."'  ");
                if($users[0]['email_id'] == $post['email_id']){
                    $data['mailmatch'] = 2;
                    $forgetPasswordKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8).
                    $users[0]['user_id'].substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                    $time = time();
                    $secreatKey = "72e2b162448aad66b2486966e9319ba3";
                    $forgetPasswordCompleteKey = substr_replace($time, $forgetPasswordKey,strlen ($time)/2 , 0);
                    $cipher = md5(substr_replace($secreatKey, $forgetPasswordCompleteKey,strlen ($secreatKey)/2 , 0));
                    $code = substr_replace($cipher, $forgetPasswordCompleteKey,strlen ($cipher)/2 , 0); 
                    
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                               'Reply-To: iSalesMate <info@isalesmate.com>' . PHP_EOL .
                               'X-Mailer: PHP/' . phpversion();
                    
                    $data['code'] = $code;
                    $namearray = explode(" ", $users[0]['name']);
                    if(sizeof($namearray) > 1)
                        $data['name'] = $namearray[0];
                    else
                        $data['name'] = $users[0]['name'];
                     
                    $data['email_id'] = $post['email_id'];
                    $email = $this->load->view('pages/email/forgot_password', $data, true);
                    //print_r($email); die();
                    mail($post['email_id'],"Reset your iSalesMate password",$email,$headers);  
                    $data['message'] = "Email would be delivered shortly to provided email address for resetting password.";
                }
                else{
                    $data['message'] = "Invalid details.";                    
                }
            }
            else{                
                    $data['message'] = "Invalid details.";
            }
        }       
        $this->load->view('pages/forgotpassword_getemail',$data);
    }
    
    public function check_organization() {
        $post = $this->input->post();
        $organizations = $this->queries->select_query("organization","*"," `name`= '".$post['name']."' ");
        if(!empty($organizations))
            $mail_id['response'] = 'already exist';
        else
            $mail_id['response'] = 'new organization';
        $this->load->view('pages/responseview', $mail_id);
    }
    
    public function change_password() {
        $post = $this->input->post();
        $post['password'] = md5($post['password']);
        $this->queries->update_query('user',$post,"`user_id`= '".$post["user_id"]."' ");            }
    }
?>
