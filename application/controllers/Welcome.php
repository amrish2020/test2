<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function add_contact(){
		$data = '';
		$errors = array();
		foreach($this->input->post('contact') as $key=>$val){
			if (ctype_alpha(str_replace(' ', '', $val['usrname'])) === false) {
				$errors[$key][] = 'Name must contain letters and spaces only';
			}

			if (!filter_var($val['email'], FILTER_VALIDATE_EMAIL)) {
				$errors[$key][] = 'Please enter valid email';
			}	

			if(is_numeric($val['phone']) == FALSE){
				$errors[$key][] = 'Please enter valid phone number';
			}
			
			if(empty($errors)){
				$data .= $val['usrname'].','.$val['email'].','.$val['phone']."|\n";
			}
		}

		if(!empty($errors)){
			$this->session->set_flashdata('form_error',$errors);
			redirect('welcome');	
		}

		$fp = fopen(APPPATH.'/files/contact.txt', 'a');
		fwrite($fp, $data);  
		fclose($fp);

		$this->session->set_flashdata('form_success', 'Contact has been added');
		redirect('welcome');	
	}

	public function remove_contact(){
		$fp = file_get_contents(APPPATH.'/files/contact.txt');
		
		$data = explode('|',$fp);
		$search = $this->input->post('search_name');

		foreach($data as $key=>$val){
			$pos = strpos($val, $search);
			if ($pos !== false) {
				unset($data[$key]);
			} 
		}

		file_put_contents(APPPATH.'/files/contact.txt',$data);
		$this->session->set_flashdata('form_success', 'Contact has been deleted');
		redirect('welcome');
	}
}
