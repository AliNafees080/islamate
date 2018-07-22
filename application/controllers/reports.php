<?php

class Reports extends Member_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('content');
        $this->load->model('report');
        $this->load->model('queries');
        $this->load->helper( array('url', 'function_helper') );
    }
    
    public function index(){
        
        $users_value = login_organization_detail();
        //*************Code for bar chart*************        
            //This code is for base line values of graph
            $date_string = "";
            for($i=-31;$i<-1;$i = $i+5){
                $date =  date('d M Y',strtotime($i." days"));
                $date_string .= "'".$date."','','','','',";
            }
            $date = date('d M Y',strtotime("-1 days"));
            $date_string .= "'".$date."',''";
            $data['date_string'] = $date_string;
            //End code
        
            //This code is for values of graph as per day.
            $value_string = "";
            for($i=-31;$i<1;$i++){
                $date =  date('Y-m-d',strtotime($i." days"));
                $startdate = $date." 00:00:00";
                $enddate = $date." 23:59:59";
                $numberlogin = $this->queries->select_query("login_view","*","`user_id` in (".$users_value.") and `login_time` BETWEEN '".$startdate."' AND '".$enddate."' ");                
                if(sizeof($numberlogin) > 0)
                    $value_string .= sizeof($numberlogin).",";
                else
                    $value_string .= '0'.",";            
            }
            $data['barchart'] = rtrim($value_string, ",");  
            //End code
        //************End code*******
            
        $data['assets'] = $this->report->popular_assets();
        $sidebar['album_filter'] = $this->content->album_filter_detail();
        $template_array = array('pages/reports'=> $data);
        $this->load->template($template_array,$sidebar);
    }
    
  
}
?>
