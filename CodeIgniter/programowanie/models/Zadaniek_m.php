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
				$this->wynik.='<h4>Zadanie należy do projektu: <strong> ' . $row->Projekty_id_projektu . ' </strong></h4>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $row->procent_wykoanania . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $row->procent_wykoanania . '%">
							' . $row->procent_wykoanania . '% wykonania zadania
						</div>
					</div>';
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
