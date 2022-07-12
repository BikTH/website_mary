<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Controller {

	protected $maintenance = false;
		

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * CI_Loader
	 *
	 * @var	CI_Loader
	 */
	public $load;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		
		foreach (is_loaded() as $var => $class){
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
		
		if( $this->maintenance  ){
			if( !in_array( $this->input->ip_address(), array("129.0.205.161" ) ) ){
				$page = $this->load->view("comingsoon", null, true);
				exit( $page );
			}	
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance(){ return self::$instance; }
}



class Website extends CI_Controller{
	
	public $defaultLanguage = 'en';
	public $language = null;
	
	function __construct(){
		parent::__construct();
		
		//$this->load->model("Base_model", "Base", true);
		
		if( $this->input->get("lang") != "" && in_array($this->input->get("lang"), array("en", "fr")) ){
            $_SESSION['lang'] = $this->input->get("lang");
        }
        
        $lang = ( array_key_exists("lang", $_SESSION) && $_SESSION['lang'] ) ? $_SESSION['lang'] : $this->defaultLanguage;
        $this->language = $lang;
        
        
        // Définition du timezone
        date_default_timezone_set($this->config->item("default_timezone"));
	}
	
	
	
	private function setbasics(){
		
	}
	
	
	
	public function lang($index, $vars = null){
		$this->load->library('parser');
		$translation = $this->lang->line($index);
		if( !is_null($vars) && gettype($vars) == "array" ){
			$string = $this->parser->parse_string($translation, $vars, TRUE);
			return $string;
		}
		else{
			return $translation;
		}
	}
	
	
	
	protected function recaptcha($redirect = ""){
        $this->load->helper("recaptcha");
        $reCAPTCHA = new reCAPTCHA($this->config->item("google-recaptcha-site-key"), $this->config->item("google-recaptcha-secret-key"));
        if( !$reCAPTCHA->isValid( $this->input->post('g-recaptcha-response') ) ){
            $this->alert->set("security", true);  redirect($redirect); return false;
        }
        
        return true;
    }
	
	
	
	protected function sendmail($message, $obj, $to, $app_sender_name = null, $app_sender_email = null){
        $app_sender_email = is_null( $app_sender_email ) ? $this->config->item("app_email") : $app_sender_email;
        $app_sender_name = is_null( $app_sender_name ) ? $this->config->item("app") : $app_sender_name;

        
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['priority'] = 1;
        $config['mailtype'] = "html";
        
        $this->load->library("email");
        $this->email->initialize($config);
        
        $this->email->from($app_sender_email, $app_sender_name);
        $this->email->to($to);
        $this->email->subject($obj);
        $this->email->message($message);
        
        if( $this->email->send() ){
            return true;
        }
        return false;
    }
    
    
	protected function email_template($file, $data){
		$header = $this->load->view("email/include/email_header.php", array("headline"=> ""), true);
	    $body = $this->load->view("email/{$file}", array("data"=> $data), true);
	    $footer = $this->load->view("email/include/email_footer", null, true);
	    $html = $header.$body.$footer;	
	    
	    return $html;
	}
}







