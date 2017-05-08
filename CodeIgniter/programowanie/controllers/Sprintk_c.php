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
}
