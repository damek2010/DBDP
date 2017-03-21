<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projekt_add_c extends CI_Controller {

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
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$this->load->model('menu_m');
				$menu = $this->menu_m->start();
				
			$this->load->model('add_m');
				$add = $this->add_m->start();
				
			$data = array(
					'menu' => $menu,
					'add' => $add,
				);
			$this->load->view('head_v.php', $data);
			$this->load->view('projekt_add_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function dodaj()
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$pytanie = 'INSERT INTO Projekty VALUES("'. $_POST["textinput0"] .'","'. $_POST["textinput"] .'",STR_TO_DATE("'. $_POST["textinput2"] .'","%Y-%m-%d"),STR_TO_DATE("'. $_POST["textinput3"] .'","%Y-%m-%d"))';
			echo $pytanie;
			if ($this->db->simple_query($pytanie))
			{
				echo "<br/>Success!";
			}
			else
			{
				echo "<br/>Query failed!";
			}
			header ('Location: projekt');
		}
	}
}
