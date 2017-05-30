<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserU_del_c extends CI_Controller {

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
			$this->load->model('MenuUU_m');
				$menu = $this->MenuUU_m->start($src);
				
			$this->load->model('DelUU_m');
				$del = $this->DelUU_m->start($src);
				
			$data = array(
					'menu' => $menu,
					'del' => $del,
				);
				
			$this->load->view('headUU_v.php', $data);
			$this->load->view('userU_del_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function usun()
	{
		$pytanie = 'DELETE FROM Uczestnicy WHERE id_uczestnicy = "' . $_POST["selectbasic"] . '"';
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
