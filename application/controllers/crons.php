<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controllers
 *
 * @author Admin
 */
class Crons extends CI_Controller{
//class Announcements extends Member_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('announcement');
        $this->load->library('apn');
    }
    public function schedule() {
        array_map(function($announcement) {
            if ($announcement["type"] !== "manual" || time() > strtotime($announcement['time_to_send']) - $this->announcement->timezone_diff($announcement['timezone']) - $announcement['DST'] * 3600) {
                //var_dump($announcement);
                if ($announcement["user_id"]) {
//                    array_map(function($token) use ($announcement) {
//                        var_dump($token);
//                        $this->send_notifications($token, $announcement["message"]);
//                    }, $this->announcement->user_device($announcement["user_id"]));
                } $this->announcement->sent($announcement["announcement_id"]);
            } 
        }, $this->announcement->scheduled());
    }

    function send_notifications($token, $message) {
        $this->load->library('apn');
        $this->apn->payloadMethod = 'enhance';
        $this->apn->connectToPush();
        $this->apn->setData(array());
        $send_result = $this->apn->sendMessage($token, $message, 2, 'default');
        $this->apn->disconnectPush();
        return $send_result;
    }

}
