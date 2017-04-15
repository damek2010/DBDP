<?php
class LookZC_m extends CI_Model {

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
		$pytanie = 'SELECT * FROM Stany;';
		$proj = '';
		if(!empty($this->src)) {
			$proj = 'AND Projekty_id_projektu = "' . $this->src . '"';
			$projekt = 'SELECT * FROM Projekty WHERE id_projektu = "' . $this->src . '";';
			$this->wynik .= '<h4>Zadania należące do projektu: <strong> ' . $this->src . ' </strong></h4>
					 <h4>Data realizacji projektu: <strong> ' . $this->db->query($projekt)->result()[0]->data_startu . ' - ' . $this->db->query($projekt)->result()[0]->data_zakonczenia . ' </strong></h4>';
		}
		$this->wynik .= '<div class="container col-md-12"><center>';
		foreach ($this->db->query($pytanie)->result() as $row) {
			$this->wynik .= '<div class="panel-group col-md-3">
					    <div class="panel panel-primary">
						<div class="panel-heading">' . $row->wartosc . '</div>';
			$tmp = 0;
			$pytanie2 = 'SELECT * FROM Zadania WHERE Stany_id_stanu = "' . $row->id_stanu . '" ' . $proj . ';';
			foreach ($this->db->query($pytanie2)->result() as $row2) {
				$tmp++;
			}
			$this->wynik .= '<div class="panel-body">' . $tmp . '</div>
					    </div>
					</div>';
		}
		$this->wynik .='</center></div>';
	}
}
