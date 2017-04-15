<?php
class LookSC_m extends CI_Model {

	private $wynik;
	private $src;
 
        public function start($src)
        {
			$this->wynik = '';
			$this->src = $src;
			$this->look();
			return $this->wynik;
        }
	
	private function look()
	{
		if(!empty($this->src)) {
			$projekt = 'SELECT * FROM Projekty WHERE id_projektu = "' . $this->src . '";';
			$this->wynik.= '<h4>Sprinty należące do projektu: <strong> ' . $this->src . ' </strong></h4>
					<h4>Data realizacji projektu: <strong> ' . $this->db->query($projekt)->result()[0]->data_startu . ' - ' . $this->db->query($projekt)->result()[0]->data_zakonczenia . ' </strong></h4>';
		}
	}
}
