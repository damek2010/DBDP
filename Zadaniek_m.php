<?php
class Zadaniek_m extends CI_Model {

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
			$pytanie = 'SELECT * FROM Zadania WHERE id_zadania = "' . $this->src . '";';
			foreach ($this->db->query($pytanie)->result() as $row) {
				$this->wynik.= '<h1>' . $row->id_zadania . '</h1>
					<h4>Opis Zadania</h4>
					<p>' . $row->opis . '</p>
					<h4>Uwagi do zadania</h4>
					<p>' . $row->uwagi . '</p>';
			}
		} else {
			header ('Location: /ci/');
		}
	}
}
