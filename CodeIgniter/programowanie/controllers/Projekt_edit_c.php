<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Projekt_edit_c extends CI_Controller {

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
			$this->load->model('menu_m');
				$menu = $this->menu_m->start();
				
			$this->load->model('edit_m');
				$edit = $this->edit_m->start($src);
			
			$data = array(
					'menu' => $menu,
					'edit' => $edit,
				);
				
			$this->load->view('head_v.php', $data);
			$this->load->view('projekt_edit_v', $data);
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
				$pytanie = 'UPDATE Projekty SET nazwa_projektu = "'. $_POST["textinput0"] .'", data_startu = STR_TO_DATE("'. $_POST["textinput1"] .'","%Y-%m-%d"), data_zakonczenia = STR_TO_DATE("'. $_POST["textinput2"] .'","%Y-%m-%d") WHERE id_projektu = "' . $_POST["selectbasic"] . '"';
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
			header ('Location: projekt');
		}
	}
}
