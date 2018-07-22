<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends Member_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('showpad');
    }



    /**
     *
     * Controller of the migration part
     *
     */

	public function index() {

		// We check if the user is logged in. If not, we redirect him to the login page.

		$this->load->library('migration');

		if ( ! $this->migration->latest()) {
	     	show_error($this->migration->error_string());
	    }
	    else
	    	echo "ok";
	}
}

/* End of file ecorners.php */
/* Location: ./application/controllers/ecorners.php */