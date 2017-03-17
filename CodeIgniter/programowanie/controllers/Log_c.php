<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_c extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();
		$this->form_validation->set_rules('login','Login','trim|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|callback_check['.$this->input->post('login').']');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('log_v');
		}
		else
		{
			$this->session->set_userdata('log_zal', $this->input->post('login'));
			header ('Location: glowna');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header ('Location: /ci/');
	}

	public function check($password,$login)
	{
		$this->db->where('identyfikator',$login);
		$this->db->where('haslo',$password);
		$zapytanie = $this->db->get('Uzytkownicy');

		if ($zapytanie->num_rows()!=1)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
