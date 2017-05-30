<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_add_c extends CI_Controller {

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
			$this->load->model('menuU_m');
				$menu = $this->menuU_m->start();
				
			$this->load->model('addU_m');
				$add = $this->addU_m->start();
				
			$data = array(
					'menu' => $menu,
					'add' => $add,
				);
			$this->load->view('headU_v.php', $data);
			$this->load->view('user_add_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function dodaj()
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$pytanie = 'INSERT INTO Uzytkownicy VALUES("'. $_POST["textinput0"] .'","'. $_POST["textinput1"] .'","'. $_POST["textinput2"] .'","'. $_POST["textinput3"] .'","'.$_POST["projekty"].'")';
			echo $pytanie;
			if ($this->db->simple_query($pytanie))
			{
				echo "<br/>Success!";
			}
			else
			{
				echo "<br/>Query failed!";
			}
			header ('Location: user');
		}
	}

}
