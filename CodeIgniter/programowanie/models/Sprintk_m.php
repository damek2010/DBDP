<?php
class Sprintk_m extends CI_Model {

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
			$pytanie = 'SELECT * FROM Sprinty WHERE id_sprintu = "' . $this->src . '";';
			foreach ($this->db->query($pytanie)->result() as $row) {
				$this->wynik.= '<h1>' . $row->id_sprintu . '</h1>
					<h4>Opis Sprintu</h4>
					<p>Opis naszego Sprintu o id ' . $row->id_sprintu . '!!!</p>
					<h4>Uwagi do Sprintu</h4>
					<p>Uwagi do naszego Sprintu o id ' . $row->id_sprintu . '!!!</p>';
			}
		} else {
			header ('Location: /ci/');
		}
	}
}
