<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_edit_c extends CI_Controller {

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
	public function index($src)
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$this->load->model('menuU_m');
				$menu = $this->menuU_m->start($src);
				
			$this->load->model('editU_m');
				$edit = $this->editU_m->start($src);
			
			$data = array(
					'menu' => $menu,
					'edit' => $edit,
				);
				
			$this->load->view('headU_v.php', $data);
			$this->load->view('user_edit_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	public function edycja()
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$pytanie = 'UPDATE Uzytkownicy SET identyfikator = "' . $_POST["textinput0"] . '", haslo = "' . $_POST["textinput7"] . '", imie = "'. $_POST["textinput1"] .'", nazwisko = "' . $_POST["textinput8"] .'", ranga = "'. $_POST["ranga"] .'" WHERE identyfikator = ' . $_POST["textinput0"] . ';';
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
