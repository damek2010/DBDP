<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Zadanie_edit_c extends CI_Controller {

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
			$this->load->model('menuZ_m');
				$menu = $this->menuZ_m->start($src);
				
			$this->load->model('editZ_m');
				$edit = $this->editZ_m->start($src);
			
			$data = array(
					'menu' => $menu,
					'edit' => $edit,
				);
				
			$this->load->view('headZ_v.php', $data);
			$this->load->view('zadanie_edit_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	public function edycja()
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			if($_POST["selectbasic"] != "null" || !empty($_POST["selectbasic"]))
			{
				$pytanie = 'UPDATE Zadania SET uwagi = "' . $_POST["textinput8"] . '", opis = "' . $_POST["textinput7"] . '", procent_wykoanania = "'. $_POST["textinput0"] .'", czas_trwania = STR_TO_DATE("'. $_POST["textinput1"] .'","%Y-%m-%d"), kupka = "'. $_POST["kupka"] .'", Stany_id_stanu = "'.$_POST["textinput5"].'", Projekty_id_projektu= "'.$_POST["textinput6"].'" WHERE id_zadania = "' . $_POST["selectbasic"] . '"';
				echo $pytanie;
				if ($this->db->simple_query($pytanie))
				{
					echo "<br/>Success!";
				}
				else
				{
					echo "<br/>Query failed!";
				}
			}
			header ('Location: zadanie');
		}
	}
}
