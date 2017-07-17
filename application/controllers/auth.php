<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Auth extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		
	}
	
	
	public function index() {
		$this->cek_login();	
	}
	
	
	public function cek_login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view


			$this->load->view('view_login');
			
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password'=> $this->input->post('password')
			);

			if ($this->user_model->cek_admin($data)->num_rows()==1) {
				foreach ($this->user_model->cek_admin($data)->result() as $sess) {
					$sess_data['logged_in'] = (bool)TRUE;
					 $sess_data['ID_ADM'] = $sess->ID_ADM;
					 $sess_data['USERNAME'] = $sess->USERNAME;
					$this->session->set_userdata($sess_data);
				}
				
				$this->load->view('dashboard_admin/main');
				
			} else if ($this->user_model->cek_sekolah($data)->num_rows()==1) {
				foreach ($this->user_model->cek_sekolah($data)->result() as $sess) {
					$sess_data['logged_in'] = (bool)TRUE;
					 $sess_data['NAMA_SEKOLAH'] = $sess->NAMA_SEKOLAH;
					 $sess_data['USERNAME'] = $sess->USERNAME;
					$this->session->set_userdata($sess_data);
				}
				
				$this->load->view('dashboard_kepsek/main');
				
			} else if ($this->user_model->cek_konsultan($data)->num_rows()==1) {
				foreach ($this->user_model->cek_konsultan($data)->result() as $sess) {
					$sess_data['logged_in'] = (bool)TRUE;
					 $sess_data['ID_KONSULTAN'] = $sess->ID_KONSULTAN;
					 $sess_data['USERNAME'] = $sess->USERNAME;
					$this->session->set_userdata($sess_data);
				}
				
				$this->load->view('dashboard_konsultan/main');
				
			} else if ($this->user_model->cek_surveyor($data)->num_rows()==1) {
				foreach ($this->user_model->cek_surveyor($data)->result() as $sess) {
					$sess_data['logged_in'] = (bool)TRUE;
					 $sess_data['ID_SURVEYOR'] = $sess->ID_SURVEYOR;
					 $sess_data['USERNAME'] = $sess->USERNAME;
					$this->session->set_userdata($sess_data);
				}
				
				$this->load->view('dashboard_surveyor/main');
				
			}else {
				
				// login failed
				$data->error = 'Wrong username or password.';

				$this->load->view('view_login');
				
			}
			
		}
		
	}
	
	public function logout() {
		
	 $this->session->sess_destroy();
		redirect('auth');
		
	}
	
}
