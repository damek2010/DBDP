<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sprintk_c extends CI_Controller {

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
			$this->load->model('menuS_m');
				$menu = $this->menuS_m->start();
				
			$this->load->model('sprintk_m');
				$sprintk = $this->sprintk_m->start($src);
				
			$this->load->model('LookST_m');
				$lookst = $this->LookST_m->start($src);
			
			$this->load->model('LookSTC_m');
				$lookstc = $this->LookSTC_m->start($src);
				
			$data = array(
					'menu' => $menu,
					'sprintk' => $sprintk,
					'lookst' => $lookst,
					'lookstc' => $lookstc,
				);
			$this->load->view('headSK_v.php', $data);
			$this->load->view('sprintk_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	public function dodajZadanie($src) 
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$this->load->model('menuS_m');
				$menu = $this->menuS_m->start();
				
			$this->load->model('addSZ_m');
				$add = $this->addSZ_m->start($src);
				
			$data = array(
					'menu' => $menu,
					'add' => $add,
				);
			$this->load->view('headS_v.php', $data);
			$this->load->view('sprint_add_zadanie_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function dodajZadanieAction() 
	{
		if(!$this->session->userdata('log_zal'))
		{
			header ('Location: /ci/');
		} else {
			$pytanie = 'INSERT INTO Sprinty_Zadania (Sprinty_ID,Zadania_ID) VALUES("'. $_POST["textinput0"] .'","' . $_POST["optradio"] . '");';
			echo $pytanie;
			if ($this->db->simple_query($pytanie))
			{
				echo "<br/>Success!";
			}
			else
			{
				echo "<br/>Query failed!";
			}
			header ('Location: sprint');
		}
	}
}
