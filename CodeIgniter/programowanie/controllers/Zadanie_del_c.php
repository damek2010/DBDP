<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zadanie_del_c extends CI_Controller {

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
			$this->load->model('menuZ_m');
				$menu = $this->menuZ_m->start();
				
			$this->load->model('delZ_m');
				$del = $this->delZ_m->start();
				
			$data = array(
					'menu' => $menu,
					'del' => $del,
				);
				
			$this->load->view('headZ_v.php', $data);
			$this->load->view('zadanie_del_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function usun()
	{
		$pytanie = 'DELETE FROM Zadania WHERE id_zadania = "' . $_POST["selectbasic"] . '"';
		echo $pytanie;
		if ($this->db->simple_query($pytanie))
		{
			echo "<br/>Success!";
		}
		else
		{
			echo "<br/>Query failed!";
		}
		header ('Location: zadanie');
	}
}
