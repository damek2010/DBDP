<?php
class LookZ_m extends CI_Model {

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
			$zapytanie = 'SELECT * FROM Zadania z JOIN Stany s ON z.Stany_id_stanu=s.id_stanu WHERE Projekty_id_projektu = "' . $this->src . '";';
		} else {
			$zapytanie = 'SELECT * FROM Zadania z JOIN Stany s ON z.Stany_id_stanu=s.id_stanu;';
		}
		
		$query = $this->db->query($zapytanie);
		$dane = '';

		foreach ($query->result() as $row)
		{
			$czas = abs(date("Y-m-d") - strtotime($row->czas_trwania));
			$years = floor($czas / (365*60*60*24));
			$months = floor(($czas - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($czas - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			
			$dane .= '<tr onclick="window.location=\'/ci/zadaniek/' . $row->id_zadania . '\'" style="cursor:pointer;">
					<td>' . $row->id_zadania . '</td>
					<td><div class="progress" style="margin-bottom: -5px;"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $row->procent_wykoanania . '"aria-valuemin="0" aria-valuemax="100" style="width:'. $row->procent_wykoanania .'%">'. $row->procent_wykoanania .'%
						</div></div></td>
					<td>' . $days . ' dni</td>
					<td>' . (($row->kupka==1)?"Duża":"Mała") . '</td>
					<td>' . $row->wartosc . '</td>
					<td>' . $row->Projekty_id_projektu . '</td>
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
								<th>Czas Trwania</th>
								<th>Kupka</th>
								<th>Stan</th>
								<th>ID Projektu</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Zadania</th>
								<th>Procent wykonania</th>
								<th>Czas Trwania</th>
								<th>Kupka</th>
								<th>Stan</th>
								<th>ID Projektu</th>
							</tr>
						</tfoot>
						<tbody>
							' . $this->uzupelnienie() . '
						</tbody>
					    </table>';
	}
}
