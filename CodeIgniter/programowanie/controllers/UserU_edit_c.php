<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class UserU_edit_c extends CI_Controller {

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
	public function index($src,$src2)
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$this->load->model('menuUU_m');
				$menu = $this->menuUU_m->start($src);
				
			$this->load->model('editUU_m');
				$edit = $this->editUU_m->start($src,$src2);
			
			$data = array(
					'menu' => $menu,
					'edit' => $edit,
				);
				
			$this->load->view('headUU_v.php', $data);
			$this->load->view('userU_edit_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	public function edycja()
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$pytanie = 'UPDATE Uczestnicy SET id_uczestnicy = "' . $_POST["textinput0"] . '", Projekty_id_projektu = "' . $_POST["textinput6"] . '", Role_id_roli = "' . $_POST["rola"] . '", Uzytkownicy_identyfikator = "' . $_POST["textinput5"] . '" WHERE id_uczestnicy = "' . $_POST["selectbasic"] . '"';
			echo $pytanie;
			if ($this->db->simple_query($pytanie))
			{
				echo "<br/>Success!";
			}
			else
			{
				echo "<br/>Query failed!";
			}
			header ('Location: useru/'. $_POST["textinput10"] .'');
		}
	}
}
