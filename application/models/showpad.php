<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Romain Biard
 * @copyright	Copyright (c) 2012 - 2013, Digital Lift
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://digitallift.fr
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

/**
 * This particular helper
 *
 * @package		User
 * @subpackage	Helpers
 * @category	Helpers
 */

// ------------------------------------------------------------------------

class Showpad extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();

        /**
        * 
        * Libraries to be loaded
        *
        */
        $this->load->database();
        $this->load->library('encrypt');
    }
    


    /**
    * _required method returns false if the $data array does not contain all of the keys assigned by the $required array.
    *
    * @param array $required
    * @param array $data
    * @return bool
    */

    function _required($required, $data){
        foreach($required as $field) if(!isset($data[$field])) return FALSE;
        return TRUE;
    }


    /**
     *
     * Method to log in a user.
     * 
     * Params:
     * email, password
     * 
     *
     */

    public function signin_admin($params = array()){
        
        // required values
        if((!$this->_required(array('email'), $params)) && (!$this->_required(array('password'), $params))) return FALSE;
        
        $query = $this->db->get_where(DBPREFIX.'users', array('email' => $params['email']));
        
        if($query->num_rows() > 0)
            $result = $query->result();
        else
            return FALSE;

        $date = $result[0]->{'signup_date'};

        $params['password'] = hash("sha512", $this->config->item('encryption_key').$params['password'].$date);
	

        $this->db->where($params);            
        $query = $this->db->get(DBPREFIX.'users');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }


    /**
     *
     * Method to create a new user.
     * 
     * Params:
     * firstname, lastname, email, password, status
     * 
     *
     */

    public function create_user($params = array()){
        
        // required values
        if((!$this->_required(array('firstname'), $params)) && (!$this->_required(array('lastname'), $params)) && (!$this->_required(array('email'), $params)) && (!$this->_required(array('password'), $params)) && (!$this->_required(array('status'), $params))) return FALSE;

        $date = date('Y-m-d H:i');
        $params['password'] = hash("sha512", $this->config->item('encryption_key').$params['password'].$date);

        $query = $this->db->get_where(DBPREFIX.'users', array('email' => $params['email']));
        
        if($query->num_rows() > 0)
            return array('error' => 'email');

        $data = array('firstname' => $params['firstname'], 'lastname' => $params['lastname'], 'email' => $params['email'], 'password' => $params['password'], 'status' => $params['status'], 'signup_date' => $date);
        $this->db->insert(DBPREFIX.'users', $data); 
            
        return TRUE;
    }


    /**
     *
     * Method to delete an user.
     * 
     * Params:
     * id
     * 
     *
     */

    public function delete_user($params = array()){
        
        // required values
        if(!$this->_required(array('id'), $params)) return FALSE;

        $id = $params['id'];

        $query = $this->db->where('id', $id);
        $this->db->delete(DBPREFIX.'users', $params); 
            
        return TRUE;
    }


    /**
     *
     * Method to get the list of users.
     * 
     * Params:
     * 
     * 
     *
     */

    public function get_users($params = array()){
                 
        if(isset($params['sort'])){
            $this->db->select('id, firstname, lastname, email');
            $this->db->order_by("firstname", $params['sort']);
        }
                 
        $query = $this->db->get(DBPREFIX.'users');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    /**
     *
     * Method to get the ID of the current user.
     * 
     * Params:
     * 
     * 
     *
     */

    public function get_id(){
                 
        $this->db->where(array('email' => $this->session->userdata('email')));
        $this->db->select('id');
        $query = $this->db->get(DBPREFIX.'users');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    /**
     *
     * Method to create a new domain.
     * 
     * Params:
     * name, tld, country, policy, languages, category, owner
     * 
     *
     */

    public function create_domain($params = array()){
        
        // required values
        if((!$this->_required(array('name'), $params)) && (!$this->_required(array('tld'), $params))
            && (!$this->_required(array('policy'), $params))) return FALSE;

        $this->db->insert(DBPREFIX.'domains', $params); 
            
        return TRUE;
    }


    /**
     *
     * Method to delete a domain.
     * 
     * Params:
     * id
     * 
     *
     */

    public function delete_domain($params = array()){
        
        // required values
        if(!$this->_required(array('id'), $params)) return FALSE;

        $id = $params['id'];

        $query = $this->db->where('id', $id);
        $this->db->delete(DBPREFIX.'domains', $params); 
            
        return TRUE;
    }


    /**
     *
     * Method to update a domain.
     * 
     * Params: id, tld, country, policy, languages, category, owner
     * 
     * 
     *
     */

    public function update_domain($params = array()){
        
        // required values
        if(!$this->_required(array('id'), $params) && !$this->_required(array('name'), $params)
            && !$this->_required(array('tld'), $params) && !$this->_required(array('policy'), $params)) return FALSE;
        
        $id = $params['id'];
        unset($params['id']);

        $this->db->where('id', $id);
        $this->db->update(DBPREFIX.'domains', $params);
            
        return TRUE;
    }


    /**
     *
     * Method to get the list of domains.
     * 
     * Params:
     * sort(optional): ASC / DESC
     * 
     *
     */

    public function get_domains($params = array()){

        $this->db->select('*');

        if(isset($params['sort'])){
            $this->db->order_by($params['sort']);
        }

        if(isset($params['limitLength']) && !isset($params['limitStart'])){
            $this->db->limit($params['limitLength']);
        }
        elseif(isset($params['limitLength']) && isset($params['limitStart'])){
            $this->db->limit($params['limitLength'], $params['limitStart']);
        }

        if(isset($params['where'])){
            $this->db->where($params['where']);
        }

        $query = $this->db->get(DBPREFIX.'domains');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }


    /**
     *
     * Method to get the number of domains.
     * 
     * Params:
     * 
     *
     */

    public function count_domains(){

        return $this->db->count_all(DBPREFIX.'domains');
    }


    /**
     *
     * Method to get the number of filtered domains.
     * 
     * Params:
     * 
     *
     */

    public function count_filtered_domains($params = array()){

        $this->db->select('id, name, tld, country, policy, languages, category, owner, associated_names');

        if(isset($params['sort'])){
            $this->db->order_by("name", $params['sort']);
        }

        if(isset($params['where'])){
            $this->db->where($params['where']);
        }

        $query = $this->db->get(DBPREFIX.'domains');// Test if there are results and return something
        return count($query->result());
    }


    /**
     *
     * Method to check if a domain is available or not
     * 
     * Params:
     * domain, tld (optional)
     * 
     *
     */

    public function check_domain_availability($params = array()){
        
        // required values
        if(!$this->_required(array('domain'), $params)) return FALSE;

        $this->db->select('*');

        $this->db->where('name', $params['domain']);

        if(isset($params['tld']))
            $this->db->where('tld', $params['tld']);

        return $this->db->count_all_results(DBPREFIX.'domains');
    }


    /**
     *
     * Method to check if domains are already associated to an email address
     * 
     * Params:
     * email_contact
     * 
     *
     */

    public function check_email_address($params = array()){
        
        // required values
        if(!$this->_required(array('email_contact'), $params)) return FALSE;

        $this->db->select('*');

        $this->db->where('email_contact', $params['email_contact']);

        $query = $this->db->get(DBPREFIX.'domains');

        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }


    /**
     *
     * Method to check if a domain is available or not
     * 
     * Params:
     * domain, tld (optional)
     * 
     *
     */

    public function check_secret_id_availability($params = array()){
        
        // required values
        if(!$this->_required(array('secret_id'), $params)) return FALSE;

        $this->db->select('*');

        $this->db->where('secret_id', $params['secret_id']);

        $availability = $this->db->count_all_results(DBPREFIX.'domains');

        if($availability == 0)
            return TRUE;
        else
            return FALSE;
    }


    /**
     *
     * Method to create a new category.
     * 
     * Params:
     * category
     * 
     *
     */

    public function create_category($params = array()){
        
        // required values
        if(!$this->_required(array('category'), $params)) return FALSE;

        $data = array('category' => $params['category']);
        $this->db->insert(DBPREFIX.'categories', $data); 
            
        return $this->db->insert_id();
    }


    /**
     *
     * Method to delete a category.
     * 
     * Params:
     * id
     * 
     *
     */

    public function delete_category($params = array()){
        
        // required values
        if(!$this->_required(array('id'), $params)) return FALSE;

        $id = $params['id'];

        $query = $this->db->where('id', $id);
        $this->db->delete(DBPREFIX.'categories', $params); 
            
        return TRUE;
    }


    /**
     *
     * Method to get the list of categories.
     * 
     * Params:
     * sort(optional): ASC / DESC
     * 
     *
     */

    public function get_categories($params = array()){
                 
        if(isset($params['sort'])){
            $this->db->select('id, category');
            $this->db->order_by("category", $params['sort']);
        }

        $query = $this->db->get(DBPREFIX.'categories');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    /**
     *
     * Method to create a new TLD.
     * 
     * Params:
     * tld
     * 
     *
     */

    public function create_tld($params = array()){
        
        // required values
        if(!$this->_required(array('tld'), $params)) return FALSE;

        $data = array('tld' => $params['tld']);
        $this->db->insert(DBPREFIX.'tlds', $data); 
            
        return TRUE;
    }


    /**
     *
     * Method to delete a TLD.
     * 
     * Params:
     * id
     * 
     *
     */

    public function delete_tld($params = array()){
        
        // required values
        if(!$this->_required(array('id'), $params)) return FALSE;

        $id = $params['id'];

        $query = $this->db->where('id', $id);
        $this->db->delete(DBPREFIX.'tlds', $params); 
            
        return TRUE;
    }


    /**
     *
     * Method to get the list of TLDs.
     * 
     * Params:
     * sort(optional): ASC / DESC
     * 
     *
     */

    public function get_tlds($params = array()){
                 
        if(isset($params['sort'])){
            $this->db->select('id, tld');
            $this->db->order_by("tld", $params['sort']);
        }

        $query = $this->db->get(DBPREFIX.'tlds');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    /**
     *
     * Method to get the name of a TLD by its ID.
     * 
     * Params:
     * id
     * 
     *
     */

    public function get_tld_name($params = array()){
        
        // required values
        if(!$this->_required(array('id'), $params)) return FALSE;
                 
        $this->db->select('tld');
        $query = $this->db->where('id', $params['id']);
        $query = $this->db->get(DBPREFIX.'tlds');
            
        // Test if there are results and return something
        if($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0]->{'tld'};
        }
        else
            return false;
    }


    /**
     *
     * Method to get the ID of a specific TLD.
     * 
     * Params:
     * id
     * 
     *
     */

    public function get_tld_by_id($params = array()){
                 
        // required values
        if(!$this->_required(array('id'), $params)) return FALSE;

        $id = $params['id'];

        $query = $this->db->where('id', $id);
        $query = $this->db->get(DBPREFIX.'tlds', $params); 
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    /**
     *
     * Method to get the list of countries.
     * 
     * Params:
     * none
     * 
     *
     */

    public function get_countries(){

        $this->db->select('iso-3166-1-alpha-2, iso-english-short-name-proper-reading');
        $query = $this->db->get(DBPREFIX.'countries');
        
        if($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }


    /**
     *
     * Method to get the list of languages.
     * 
     * Params:
     * none
     * 
     *
     */

    public function get_languages(){

        $this->db->select('ISO_639-1_alpha-2, ISO_639_English_name_of_language');
        $this->db->distinct();
        $this->db->where('ISO_639-1_alpha-2 <>', '');
        $this->db->order_by("ISO_639_English_name_of_language", 'ASC');
        $query = $this->db->get(DBPREFIX.'languages');
        
        if($query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }


    /**
     *
     * Method to get the list of registrars.
     * 
     * Params:
     * 
     *
     */

    public function get_registrars(){

        $this->db->select('*');

        $this->db->order_by('registrar_name', 'ASC');        
        $this->db->where('raa', 2013);

        $query = $this->db->get(DBPREFIX.'registrars');
            
        // Test if there are results and return something
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    /**
     *
     * Method to get the number of calls.
     * 
     * Params:
     * 
     *
     */

    public function count_calls(){

        return $this->db->count_all(DBPREFIX.'api_calls');
    }


    /**
     *
     * Method to get the number of calls for the last 24h.
     * 
     * Params:
     * ip, unix_time
     * 
     *
     */

    public function count_calls_last_day($params = array()){

        // required values
        if(!$this->_required(array('unix_time'), $params)) return FALSE;

        $this->db->select('id');
        $this->db->where('unix_time > ', $params['unix_time']);
        return $this->db->count_all_results(DBPREFIX.'api_calls');
    }

}
