<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserO_c extends CI_Controller {

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
			$this->load->model('menuUO_m');
				$menu = $this->menuUO_m->start();
				
			$this->load->model('userO_m');
				$user = $this->userO_m->start($src,$src2);
				
				$look = '';
				
			$data = array(
					'menu' => $menu,
					'user' => $user,
					'look' => $look,
				);
			$this->load->view('headUO_v.php', $data);
			$this->load->view('userO_v.php', $data);
			$this->load->view('foot_v.php', $data);
		}
	}
}
