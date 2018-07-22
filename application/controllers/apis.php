<?php

class Apis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('api');
        $this->load->model('queries');
        $this->load->model('update');
    }

    public function index() {
        
        $post = $this->input->post();
        log_message('error', json_encode($post));
        $method = array('organization', 'login', 'logout', 'update', 'get_notifications', 'set_notifications', 'forgot_password');
        //***********check method is selected or not**********
        if (empty($post['method'])) {
            $this->set_header(404, 'Method is missing');
        }
        //************check method allowed or not***************
        else {
            if (!(in_array($post['method'], $method))) {
                $this->set_header(405, 'Method not allowed');
            } else if (empty($post['cipher'])) {
                $this->set_header(404, 'Cipher is missing');
            }
            //***********check cipher*****************
            else {
                $cipher = $post['cipher'];
                unset($post['cipher']);
                $key = 'D1A124268D72AF770FF83989B340A548';
                $arr = array_diff($post, array());
                $cipher_post = md5(implode("", $arr) . $key);
                if (!($cipher_post == $cipher)) {
                    $this->set_header(405, 'Invalid Cipher');
                } else {
                    $mehtod = $post['method'];
                    $this->$mehtod();
                }
            }
        }
    }

    public function test_api() {
        $this->load->view('test_api');
    }

    public function organization() {
        $post = $this->input->post();
        //***************check required fields**************
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        } else {
            $org = $this->api->check_organization($post['organization_name']);
            //***********check user's organization***********
            if (!empty($org)) {
                $this->set_header(200, 'Success');
                // $json = json_encode($org, JSON_FORCE_OBJECT);
                $json = json_encode($org, JSON_FORCE_OBJECT);
                $data['response'] = $json;
                $this->load->view('response', $data);
                //echo $json;
            } else {
                $this->set_header(405, 'Invalid Organization');
            }
        }
    }

    public function login() {
        $post = $this->input->post();
        $password = md5($post['password']);
        //***************check required fields**************
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        } else {
            //********fetch row from database according to user_id**********
            $result = $this->api->check_user_info($post['email_id'], $password, $post['organization_id']);
            if (!empty($result)) {
                $update = $this->update($result['user_id'], $post['last_update']);
                $login_update = array('login_info' => $result, 'update_info' => $update);
                $login_info = array('user_id' => $result['user_id'], 'login_time' => date('Y-m-d H:i:s', time()));
                log_message('error', json_encode($login_info));
                $this->api->insert_user_login_info($login_info);
                if (isset($post['device_token'])) {
                    //******unset all device token if exist in database
                    $this->queries->delete_query('device', 'device_token = ' . "'" . $post['device_token'] . "'");
                    //******Set device token for current user
                    $this->queries->insert_query('device', array('device_token' => $post['device_token'], 'user_id' => $result['user_id']));
                }
                $this->set_header(200, 'Success');
                $json = json_encode($login_update, JSON_FORCE_OBJECT);
                $data['response'] = $json;
                $this->load->view('response', $data);
            } else {
                log_message('error', "invalid user");
                $this->set_header(405, 'Invalid User');
            }
        }
    }

    public function logout() {
        $post = $this->input->post();
        //***************check required fields**************
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        } else {
            $data = array('user_id' => $post['user_id'], 'device_token' => $post['device_token']);
            $select = $this->queries->select_query('device', '*', 'user_id= ' . "'" . $data['user_id'] . "'");
            $result = $this->api->change_device_info($data);
            if (!empty($select)) {
                $this->set_header(200, 'Success');
            } else {
                $this->set_header(500, 'Internal server error');
            }
        }
    }

    public function update($user_id = null, $last_update = null) {
        $server_time = $this->api->get_last_update_time();
        $post = $this->input->post();
        $flag = 0;
        if ($last_update == null) {
            $last_update = $post['last_update'];
            $flag = 1;
        }
        //***************check required fields**************
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        }
        //***************update data*************
        else {
            //****************new approach****************
            if ($user_id == null) {
                $user_id = $post['user_id'];
            }
            //***********check user update*******************    
            $user_last_update = $this->queries->select_query('user', 'last_update', 'user_id = ' . $user_id);
            if ($last_update < $user_last_update[0]['last_update']) {
                //***********check user update*******************    

                $update_global_array = array();
                //***********user table data********************************
                $result_user = $this->update->user_data($user_id, $last_update);
                if (!empty($result_user['user_query'])) {
                    $update_global_array[] = $result_user['user_query'];
                }
                //*********user_group and group table data***************************
                $result_user_group = $this->update->user_group_data($user_id, $last_update);
                if (!empty($result_user_group['group_query'])) {
                    $update_global_array[] = $result_user_group['group_query'];
                }
                if (!empty($result_user_group['user_group_query'])) {
                    $update_global_array[] = $result_user_group['user_group_query'];
                }
                //***********briefcase_group table data*************************
                if (!empty($result_user_group['groups'])) {
                    $result_user_group_briefcase = $this->update->group_briefcase_data($last_update, $result_user_group['groups']);
                    if (!empty($result_user_group_briefcase['briefcase_group_query'])) {
                        $update_global_array[] = $result_user_group_briefcase['briefcase_group_query'];
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `briefcase_group`; ';
                }
                $briefcase = array();
                if (!empty($result_user_group_briefcase['briefcase_id'])) {
                    $briefcase = $result_user_group_briefcase['briefcase_id'];
                }
                //***********briefcase, briefcase_user table data*************************
                if (!empty($user_id)) {
                    $result_user_briefcase = $this->update->user_briefcase_data($user_id, $last_update);
                    if (!empty($result_user_briefcase['briefcase_user_query'])) {
                        $update_global_array[] = $result_user_briefcase['briefcase_user_query'];
                    }
                    if (!empty($result_user_briefcase['briefcase_id'])) {
                        $briefcase = array_merge($briefcase, $result_user_briefcase['briefcase_id']);
                    }
                }
                //**********briefcase table data********************
                if (!empty($briefcase)) {
                    $result_briefcase = $this->update->create_queries('briefcase', $last_update, $briefcase);
                    if (!empty($result_briefcase)) {
                        $update_global_array[] = $result_briefcase;
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `briefcase`; ';
                }
                //*************briefcase_content and content table data************************
                if (!empty($briefcase)) {
                    $result_briefcase_content = $this->update->briefcase_content_data($last_update, $briefcase);
                    if (!empty($result_briefcase_content['briefcase_content_query'])) {
                        $update_global_array[] = $result_briefcase_content['briefcase_content_query'];
                    } else {
                        $update_global_array[] = 'DELETE FROM `briefcase_content`; ';
                    }
                    if (!empty($result_briefcase_content['content_query'])) {
                        $update_global_array[] = $result_briefcase_content['content_query'];
                    } else {
                        $update_global_array[] = 'DELETE FROM `content`; ';
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `briefcase_content`; ';
                    $update_global_array[] = 'DELETE FROM `content`; ';
                }
                //*************notification table data**************
                if (!empty($result_briefcase_content['content'])) {
                    $result_notification = $this->update->notification_data($user_id, $last_update, $result_briefcase_content['content']);
                    if (!empty($result_notification['notification_query'])) {
                        $update_global_array[] = $result_notification['notification_query'];
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `notification`; ';
                }
                //************shared_content table data*****************
                if (!empty($user_id)) {
                    $result_shared_content = $this->update->shared_content_data($last_update, $user_id);
                    if (!empty($result_shared_content['shared_content_query'])) {
                        $update_global_array[] = $result_shared_content['shared_content_query'];
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `shared_content`; ';
                }
                //*************announcement_briefcase table data**********
                if (!empty($briefcase)) {
                    $result_ann_briefcase = $this->update->ann_briefcase_data($briefcase, $last_update);
                    if (!empty($result_ann_briefcase['announcement_briefcase_query'])) {
                        $update_global_array[] = $result_ann_briefcase['announcement_briefcase_query'];
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `announcement_briefcase`; ';
                }
                //*************announcement_group table data**********
                if (!empty($result_user_group['groups'])) {
                    $result_ann_group = $this->update->ann_group_data($result_user_group['groups'], $last_update);
                    if (!empty($result_ann_group['announcement_group_query'])) {
                        $update_global_array[] = $result_ann_group['announcement_group_query'];
                    }
                } else {
                    $update_global_array[] = 'DELETE FROM `announcement_group`; ';
                }
                //****************announcement table data**********************
                $all_announcement = array();
                if (!empty($result_ann_briefcase['announcement'])) {
                    foreach ($result_ann_briefcase['announcement'] as $ann_brief) {
                        $all_announcement[] = $ann_brief;
                    }
                }
                if (!empty($result_ann_group['announcement'])) {
                    foreach ($result_ann_group['announcement'] as $ann_gr) {
                        $all_announcement[] = $ann_gr;
                    }
                }
                $result_announcement_automated = $this->update->automated_announcement_data($user_id); //print_R($result_announcement);//die();
                if (!empty($result_announcement_automated['announcement'])) {
                    foreach ($result_announcement_automated['announcement'] as $ann) {
                        $all_announcement[] = $ann;
                    }
                    $all_announcement = array_unique($all_announcement);
                }

                if (!empty($all_announcement)) {
                    $result_announcement = $this->update->insert('announcement', $last_update, $all_announcement);
                    $update_global_array[] = $result_announcement;
                } else {
                    $update_global_array[] = 'DELETE FROM `announcement`; ';
                }
                $update_array = implode($update_global_array);
                //*******************//////////////////////////////////////////////////////***********************************
            }
            @$update_result['query'] = (empty($update_array)) ? '' : $update_array;
            $update_result['last_update'] = $server_time;
            if ($flag == 0) {
                return $update_result;
            }
            //echo '**********************************************************JSON*******************************************<br>';
            if (!empty($update_result['query'])) {
                $this->set_header(200, 'Success');
            } else {
                $this->set_header(200, 'No updated results');
            }
            $json = json_encode($update_result, JSON_FORCE_OBJECT);

            $data['response'] = $json;
            $this->load->view('response', $data);
        }
    }

    public function get_notifications($last_update = null, $content = false, $user_id = null) {
        $post = $this->input->post();
        $server_time = $this->api->get_last_update_time();

        //***************check required fields**************
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        }
        //*************invoke update_notification method****************
        else {
            if ($last_update == null) {
                $last_update = $post['last_update'];
            }
            //******************************new approach******************************************************
            if ($user_id == null) {
                $user_id = $post['user_id'];
            }
            //***********check user update*******************    
            $user_last_update = $this->queries->select_query('user', 'last_update', 'user_id = ' . $post['user_id']);
            if ($last_update < $user_last_update[0]['last_update']) {
                //***********check user update*******************    
                $update_global_notification_array = array();
                //*********user_group and group table data***************************
                $result_user_group = $this->update->user_group_data($user_id, $last_update);
                //***********briefcase, briefcase_group and briefcase_user table data*************************
                //***********briefcase_group table data*************************
                if (!empty($result_user_group['groups'])) {
                    $result_user_group_briefcase = $this->update->group_briefcase_data($last_update, $result_user_group['groups']);
                }
                $briefcase = array();
                if (!empty($result_user_group_briefcase['briefcase_id'])) {
                    $briefcase = $result_user_group_briefcase['briefcase_id'];
                }
                //***********briefcase, briefcase_user table data*************************

                $result_user_briefcase = $this->update->user_briefcase_data($user_id, $last_update);
                if (!empty($result_user_briefcase['briefcase_id'])) {
                    $briefcase = array_merge($briefcase, $result_user_briefcase['briefcase_id']);
                    $briefcase = array_unique($briefcase);
                }
                //*************briefcase_content and content table data************************
                if (!empty($briefcase)) {
                    $result_briefcase_content = $this->update->briefcase_content_data($last_update, $briefcase); //print_R($result_briefcase_content);
                }
                //*************notification table data**************
                if (!empty($result_briefcase_content['content'])) {
                    $result_notification = $this->update->notification_data($user_id, $last_update, $result_briefcase_content['content']);
                    if (!empty($result_notification['notification_query'])) {
                        $update_global_notification_array[] = $result_notification['notification_query'];
                    }
                } else {
                    $update_global_notification_array[] = 'DELETE FROM `notification`; ';
                }
                //************shared_content table data*****************
                if (!empty($user_id)) {
                    $result_shared_content = $this->update->shared_content_data($last_update, $user_id);
                    if (!empty($result_shared_content['shared_content_query'])) {
                        $update_global_notification_array[] = $result_shared_content['shared_content_query'];
                    }
                } else {
                    $update_global_notification_array[] = 'DELETE FROM `shared_content`; ';
                }
                //*************announcement_briefcase table data**********
                if (!empty($briefcase)) {
                    $result_ann_briefcase = $this->update->ann_briefcase_data($briefcase, $last_update);
                    if (!empty($result_ann_briefcase['announcement_briefcase_query'])) {
                        $update_global_notification_array[] = $result_ann_briefcase['announcement_briefcase_query'];
                    }
                } else {
                    $update_global_notification_array[] = 'DELETE FROM `announcement_briefcase`; ';
                }
                //*************announcement_group table data**********
                if (!empty($result_user_group['groups'])) {
                    $result_ann_group = $this->update->ann_group_data($result_user_group['groups'], $last_update);
                    if (!empty($result_ann_group['announcement_group_query'])) {
                        $update_global_notification_array[] = $result_ann_group['announcement_group_query'];
                    }
                } else {
                    $update_global_notification_array[] = 'DELETE FROM `announcement_group`; ';
                }
                $all_announcement = array();
                if (!empty($result_ann_briefcase['announcement'])) {
                    foreach ($result_ann_briefcase['announcement'] as $ann_brief) {
                        $all_announcement[] = $ann_brief;
                    }
                }
                if (!empty($result_ann_group['announcement'])) {
                    foreach ($result_ann_group['announcement'] as $ann_gr) {
                        $all_announcement[] = $ann_gr;
                    }
                }
                $result_announcement_automated = $this->update->automated_announcement_data($user_id);
                if (!empty($result_announcement_automated['announcement'])) {
                    foreach ($result_announcement_automated['announcement'] as $ann) {
                        $all_announcement[] = $ann;
                    }
                    $all_announcement = array_unique($all_announcement);
                }
                if (!empty($all_announcement)) {
                    $result_announcement = $this->update->insert('announcement', $last_update, $all_announcement); //print_r($result_announcement);die();
                    $update_global_notification_array[] = $result_announcement;
                } else {
                    $update_global_notification_array[] = 'DELETE FROM `announcement`; ';
                }
                foreach ($update_global_notification_array as $not_query) {//print_R($query);die();
                    $query_array[] = $not_query;
                }
                $update_array = implode($query_array);
            }
            $notification_result = array();
            @$notification_result['query'] = (empty($update_array)) ? '' : $update_array;
            $notification_result['last_update'] = $server_time;
            if ($content == true) {
                $notification_result['current_content'] = 'Content not available.';
            }
            if (!empty($notification_result['query'])) {
                $this->set_header(200, 'Success');
            } else {
                $this->set_header(200, 'No updated results');
            }
            $json = json_encode($notification_result, JSON_FORCE_OBJECT);
            $data['response'] = $json;
            $this->load->view('response', $data);
        }
    }

    public function set_notifications() {
        $post = $this->input->post();
        //***************check required fields**************
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        }
        //********notification method***********
        else {
            $json = json_decode(addcslashes($post['notification_json'], '\\'), true);
            $avl_content = $this->queries->select_query('content', 'content_id', 'content_id IN (' . $json['content_id'] . ')');
            if (!empty($avl_content)) {
                if ($post['type'] == 'share') {
                    $content = explode(',', $json['content_id']);
                    $email = (!empty($json['type_value'])) ? explode(',', $json['type_value']) : array();
                    $data = array('user_id' => $post['user_id'], 'content_id' => NULL, 'type' => $post['type'], 'type_value' => NULL, 'activity_time' => $json['activity_time']);
                    $notification_id = $this->api->notification($data);
                    foreach ($content as $content_id) {
                        if (!empty($email)) {
                            foreach ($email as $email_id) {
                                $shared_content = array('notification_id' => $notification_id, 'content_id' => $content_id, 'email_id' => $email_id);
                                $result = $this->queries->insert_query('shared_content', $shared_content);
                            }
                        } else {
                            $shared_content = array('notification_id' => $notification_id, 'content_id' => $content_id, 'email_id' => NULL);
                            $result = $this->queries->insert_query('shared_content', $shared_content);
                        }
                    }
                    $this->library->user_update($notification_id, $content_id = null);
                } else {
                    $data = array('user_id' => $post['user_id'], 'content_id' => $json['content_id'], 'type' => $post['type'], 'type_value' => (isset($json['type_value'])) ? $json['type_value'] : NULL, 'activity_time' => $json['activity_time']);
                    $result = $this->api->notification($data);
                    $this->library->user_update($result, $content_id = null);
                }
                if (!empty($result)) {
                    $this->set_header(200, 'Success');
                } else {
                    $this->set_header(500, 'Internal server error');
                }
                $content = false;
            } else {
                $content = true;
            }
            $this->get_notifications($post['last_update'], $content, $post['user_id']);
        }
    }

    public function forgot_password() {

        $post = $this->input->post();
        $required = $this->required_field($post);
        if ($required) {
            $this->set_header(417, 'Expectation failed');
        }
        //*************invoke update_notification method****************
        else {
            $data['organization'] = $this->queries->select_query("organization", "*", " `organization_id` = '" . $post['organization_id'] . "' ");
            if (sizeof($data['organization']) > 0) {
                $data['user_id'] = $this->queries->select_query("user", "*", " `email_id` = '" . $post['email_id'] . "' and `organization_id` = '" . $post['organization_id'] . "' ");
                if (sizeof($data['user_id']) > 0) {
                    $forgetPasswordKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8) .
                            $data['user_id'][0]['user_id'] . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                    $time = time();
                    $secreatKey = "72e2b162448aad66b2486966e9319ba3";
                    $forgetPasswordCompleteKey = substr_replace($time, $forgetPasswordKey, strlen($time) / 2, 0);
                    $cipher = md5(substr_replace($secreatKey, $forgetPasswordCompleteKey, strlen($secreatKey) / 2, 0));
                    $code = substr_replace($cipher, $forgetPasswordCompleteKey, strlen($cipher) / 2, 0);

                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: Salesbean <info@salesbean.com>' . PHP_EOL .
                            'Reply-To: Salesbean <info@salesbean.com>' . PHP_EOL .
                            'X-Mailer: PHP/' . phpversion();

                    $data['code'] = $code;
                    $namearray = explode(" ", $data['user_id'][0]['name']);
                    if (sizeof($namearray) > 1)
                        $data['name'] = $namearray[0];
                    else
                        $data['name'] = $users[0]['name'];

                    $data['email_id'] = $post['email_id'];
                    $email = $this->load->view('pages/email/forgot_password', $data, true);

                    mail($post['email_id'], "Reset your salesbean password", $email, $headers);
                    $this->set_header(200, 'Email would be delivered shortly to provided email address for resetting password.');
                }
                else {
                    $this->set_header(405, 'Invalid user');
                }
            } else {
                $this->set_header(405, 'Invalid organization');
            }
        }
    }

    private function set_header($res_code, $res_message) {
        $this->output->set_content_type('application/json');
        $this->output->set_header("response-code:" . $res_code);
        $this->output->set_header("response-message:" . $res_message);
    }

    private function required_field($post) {
        $error = false;
        switch ($post['method']) {
            case "organization":
                $method = array('organization_name');
                break;
            case "login":
                $method = array('organization_id', 'email_id', 'password', 'login_time', 'last_update');
                break;
            case "logout":
                $method = array('user_id');
                break;
            case "update":
                $method = array('user_id', 'last_update');
                break;
            case "get_notifications":
                $method = array('user_id', 'last_update');
                break;
            case "set_notifications":
                $method = array('user_id', 'notification_json', 'type', 'last_update');
                break;
            case "forgot_password":
                $method = array('email_id', 'organization_id');
                break;
            default:
                break;
        }
        foreach ($method as $fields) {
            $post[$fields] = trim($post[$fields], " ");
            if (is_null($post[$fields]) || $post[$fields] == "") {
                return $error = 'parameter empty or not matched ' . $fields;
            }
        }
    }

}
