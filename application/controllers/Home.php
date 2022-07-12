<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Website {
	
	protected $activePage = null;
	
	
	
	function __construct(){
		parent::__construct();
		$this->lang->load('meta', $this->language);
		$this->lang->load('global', $this->language);
	}
	
	
	
	public function index(){
		$this->lang->load('website/home', $this->language);
		$this->loadpage("home", array("title"=> lang("title-home") , "description"=> lang("description-home"), "image"=> $this->getSEOImage("home")));
	}
	
	
	
	public function routepage($a = "", $b = null, $c = null){
		$b = !is_null($b) ? "/".$b : "";
		$c = !is_null($c) ? "/".$c : "";
		
		$dir = $a.$b.$c;
		
		if( !is_file( APPPATH . 'views/website/pages/' . $dir . ".php" ) ){ show_404(); }
		
		$currentPage = explode("/", $dir); 
		if( $b == "" ){
			$currentPage = $a;
		}
		else{
			$currentPage = $a."-".$currentPage[ count($currentPage) - 1 ];
		}
		
		// CHARGEMENT DU FICHIER LANGUE
		$this->lang->load('website/'.str_replace("-", "/", $currentPage), $this->language);
		
		// MARQUONS COMME ACTIVE
		$this->activePage = $a;
		
		// CHARGEMENT DE LA VUE.
		$this->loadpage("pages/".$dir, $this->meta($currentPage) );
	}
	
	
	
	private function meta($pageID){
		$metas = array("brands", "about", "about-team", "contact", "company-invest", "company-career", "company-brand");

		if( array_search($pageID, $metas) > -1 ){
			$image = $this->getSEOImage($pageID);
			return array("title"=> lang("title-".$pageID), "description"=> lang("description-".$pageID), "image"=> $image);
		} else {
			return array("title"=> "", "description"=> "");
		}
	}
	
	
	private function getSEOImage($pageID = "home"){
		return is_file( FCPATH . 'public/assets/img/seo/preview-' . $pageID . '.jpg' ) ? 'preview-' . $pageID . '.jpg' : 'seo-main.jpg';
	}
	
	
	private function loadpage($pageDIR, $meta){
		$this->load->view("website/header/head", array("meta"=> $meta, "self"=> $this));
		$this->load->view("website/header/header", array("active"=> $this->activePage, "self"=> $this));
		
		$this->load->view("website/".$pageDIR, array("self"=> $this));
		
		$this->load->view("website/footer/footer", array("active"=> $this->activePage, "self"=> $this));
	}
	
	
	
	public function _include($content = null, $data = null, $langDIR = null){
		if( is_null($content) ) { return; }
		if( !is_file( APPPATH . 'views/website/include/' . $content . ".php" ) ){ return; }
		
		// CHARGEMENT DU FICHIER LANGUE
		$this->lang->load('website/include/'.$content, $this->language);
		
		$this->load->view("website/include/".$content, $data);
	}
	
	
	
	public function call($func = null){
		return $this->$func();
	}
	
	
	private function sendmessage(){
		
		echo $this->config->item("google-recaptcha-site-key");
		echo $this->config->item("google-recaptcha-private-key");
		
		$this->recaptcha("/contact");
		
		$data = array("name"=> _name($this->input->post("name"), 16), 
			"email"=> $this->input->post("email"), 
			"message"=> _textarea($this->input->post("message"), 500), 
			"topic"=> $this->input->post("topic"));
			
		$html = $this->email_template("contact_email", $data);
		
		$send = $this->sendmail($html, "New message from ".$data["name"], "lynnocheu@gmail.com");
		if( $send ){
			$this->alert->set("mail_sent", true);
		}
		redirect("/contact");
	}
}
