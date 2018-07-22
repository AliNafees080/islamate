<?php

class MY_Loader extends CI_Loader {

    public function template($template_array = array(), $vars = array(), $return = FALSE) {
        
        $header = $this->view('template/header', $vars, $return);
        @$header .= $this->view('template/sidebar', $return);
        @$header .= $this->view('template/chatform', $return);
        foreach ($template_array as $template_key => $template_value) {
            @$header .= $this->view($template_key, $template_value, $return);
        }
        @$header .= $this->view('template/footer', $return);
        if ($return) {
            return $header;
        }
    }

}

?>
