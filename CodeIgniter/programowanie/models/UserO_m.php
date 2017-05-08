<?php 
class UserO_m extends CI_Model {

	private $wynik;
	private $src;
	private $src2;
	
        public function start($src,$src2)
        {
			$this->wynik = '';
			$this->src = $src;
			$this->src2 = $src2;
			$this->wynik .= $this->look();
			return $this->wynik;
        }
	
	private function look()
	{
		$dane = '';
		$ranga = 'U';
		if(explode("-:-",$_SESSION['log_zal'])[1] == 'A') {
			$ranga = 'A';
		}
		$pytanie = 'SELECT * FROM Uzytkownicy WHERE identyfikator= "' . $this->src . '";';
		$query2 =$this->db->query($pytanie) ;
		
		foreach ($query2->result() as $row)
		{
			$dane .= '<h2> '.$row->imie .' '.$row->nazwisko.'  </h2>';
		}		
		
		$dane.= '<h3>Lista odpowiedzialności w projekcie</h3>
			 <p>Wybierz interesujace zadanie</p>'; 
		$zapytanie = 'SELECT * FROM Odpowiedzialny o JOIN Zadania z ON o.Zadania_id_zadania = z.id_zadania JOIN Stany st ON st.id_stanu=z.Stany_id_stanu WHERE Uczestnicy_id_uczestnicy="' . $this->src2 . '";';
		$query = $this->db->query($zapytanie);
		
		$dane .= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
							<tr>
								<th>ID odpowiedzialności</th>
								<th>Data przydzielenia</th>
								<th>ID zadania</th>
								<th>Procent wykonania</th>
								<th>Czas trwania</th>
								<th>Stan</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID odpowiedzialności</th>
								<th>Data przydzielenia</th>
								<th>ID zadania</th>
								<th>Procent wykonania</th>
								<th>Czas trwania</th>
								<th>Stan</th>
							</tr>
						</tfoot><tbody>';
		foreach ($query->result() as $row)
		{
			$czas = abs(date("Y-m-d") - strtotime($row->czas_trwania));
			$years = floor($czas / (365*60*60*24));
			$months = floor(($czas - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($czas - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$d = $months*30 + $days;
			
			$dane .= '<tr onclick="window.location=\'/ci/zadaniek/' . $row->Zadania_id_zadania . '\'" style="cursor:pointer;">
					<td>' . $row->Id_odpowiedzlnosci . '</td>
					<td>' . $row->data . '</td>
					<td>' . $row->Zadania_id_zadania . '</td>
					<td><div class="progress" style="margin-bottom: -5px;"><div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $row->procent_wykoanania . '"aria-valuemin="0" aria-valuemax="100" style="width:'. $row->procent_wykoanania .'%">'. $row->procent_wykoanania .'%
						</div></div></td>
					<td>' . $d . ' dni</td>
					<td>' . $row->wartosc . '</td>
				</tr>';
		}
		$dane .= '</tbody></table>';
		return $dane;
	}
}
