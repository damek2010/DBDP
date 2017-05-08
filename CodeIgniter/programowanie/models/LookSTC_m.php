<?php
class LookSTC_m extends CI_Model {

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
			$proj = 'AND Sprinty_ID = "' . $this->src . '"';
			$projekt = 'SELECT * FROM Sprinty WHERE id_sprintu = "' . $this->src . '";';
			$this->wynik .= '<h4>Zadania należące do sprintu: <strong> ' . $this->src . ' </strong></h4>';
		}
		$this->wynik .= '<div class="container col-md-12"><center>';
		foreach ($this->db->query($pytanie)->result() as $row) {
			$this->wynik .= '<div class="panel-group col-md-3">
					    <div class="panel panel-primary">
						<div class="panel-heading">' . $row->wartosc . '</div>';
			$tmp = 0;
			$pytanie2 = 'SELECT * FROM Zadania z JOIN Sprinty_Zadania sz ON z.id_zadania=sz.Zadania_ID WHERE Stany_id_stanu = "' . $row->id_stanu . '" ' . $proj . ';';
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
