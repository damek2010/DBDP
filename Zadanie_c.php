<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zadanie_c extends CI_Controller {

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
				
			$this->load->model('lookZC_m');
				$lookZC_m = $this->lookZC_m->start($src);
				
			$this->load->model('lookZ_m');
				$look = $this->lookZ_m->start($src);
				
			$data = array(
					'menu' => $menu,
					'look' => $look,
					'lookZC' => $lookZC_m,
				);
			$this->load->view('headZ_v.php', $data);
			$this->load->view('zadanie_v', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
}
