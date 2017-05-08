<?php
class LookST_m extends CI_Model {

	private $wynik;
	private $src;
 
        public function start($src)
        {
			$this->wynik = '';
			$this->src = $src;
			$this->look();
			return $this->wynik;
        }
	
	private function uzupelnienie()
	{
		$zapytanie = '';
		if(!empty($this->src)) {
			$zapytanie = 'SELECT * FROM Sprinty s JOIN Sprinty_Zadania sz ON s.id_sprintu=sz.Sprinty_ID JOIN Zadania z ON z.id_zadania=sz.Zadania_ID  JOIN Stany st ON st.id_stanu=z.Stany_id_stanu WHERE s.id_sprintu = "' . $this->src . '";';
		} else {
			$zapytanie = 'SELECT * FROM Sprinty s JOIN Sprinty_Zadania sz ON s.id_sprintu=sz.Sprinty_ID JOIN Zadania z ON z.id_zadania=sz.Zadania_ID;';
		}
		
		$query = $this->db->query($zapytanie);
		$dane = '';

		foreach ($query->result() as $row)
		{		
			$czas = abs(date("Y-m-d") - strtotime($row->czas_trwania));
			$years = floor($czas / (365*60*60*24));
			$months = floor(($czas - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($czas - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$d = $months*30 + $days;
			
			$dane .= '<tr onclick="window.location=\'/ci/zadaniek/' . $row->id_zadania . '\'" style="cursor:pointer;">
					<td>' . $row->id_zadania . '</td>
					<td><div class="progress" style="margin-bottom: -5px;"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $row->procent_wykoanania . '"aria-valuemin="0" aria-valuemax="100" style="width:'. $row->procent_wykoanania .'%">'. $row->procent_wykoanania .'%
						</div></div></td>
					<td>' . $d . ' dni</td>
					<td>' . $row->wartosc . '</td>
				</tr>';
		}
		
		return $dane;
	}
	
	private function look()
	{
		$this->wynik.= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID Zadania</th>
								<th>Procent wykonania</th>
								<th>Czas trwania</th>
								<th>Stan</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Zadania</th>
								<th>Procent wykonania</th>
								<th>Czas trwania</th>
								<th>Stan</th>
							</tr>
						</tfoot>
						<tbody>
							' . $this->uzupelnienie() . '
						</tbody>
					    </table>';
	}
}
