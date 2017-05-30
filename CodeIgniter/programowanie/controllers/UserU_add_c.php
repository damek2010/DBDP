<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserU_add_c extends CI_Controller {

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
			$this->load->model('menuUU_m');
				$menu = $this->menuUU_m->start($src);
				
			$this->load->model('addUU_m');
				$add = $this->addUU_m->start($src);
				
			$data = array(
					'menu' => $menu,
					'add' => $add,
				);
			$this->load->view('headUU_v.php', $data);
			$this->load->view('userU_add_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function dodaj()
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$pytanie = 'INSERT INTO Uczestnicy VALUES("'. $_POST["textinput0"] .'","' . $_POST["projekty"] . '","' . $_POST["textinput1"] . '","'. $_POST["rola"] .'");';
			echo $pytanie;
			if ($this->db->simple_query($pytanie))
			{
				echo "<br/>Success!";
			}
			else
			{
				echo "<br/>Query failed!";
			}
			header ('Location: useru/'. $_POST["textinput1"] .'');
		}
	}
	
	
}
