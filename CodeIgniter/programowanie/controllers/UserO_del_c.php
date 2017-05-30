<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserO_del_c extends CI_Controller {

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
			$this->load->model('MenuUO_m');
				$menu = $this->MenuUO_m->start($src,$src2);
				
			$this->load->model('DelO_m');
				$del = $this->DelO_m->start($src,$src2);
				
			$data = array(
					'menu' => $menu,
					'del' => $del,
				);
				
			$this->load->view('headUO_v.php', $data);
			$this->load->view('userO_del_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
	
	public function usun()
	{
		$pytanie = 'DELETE FROM Odpowiedzialny WHERE Id_odpowiedzlnosci = "'. $_POST["selectbasic"].'"';
		echo $pytanie;
		if ($this->db->simple_query($pytanie))
		{
			echo "<br/>Success!";
		}
		else
		{
			echo "<br/>Query failed!";
		}
		header ('Location: usero/'. $_POST["textinput10"] .'/'. $_POST["textinput11"] .'');
	}
}
