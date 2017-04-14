<?php
class LookS_m extends CI_Model {

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
			$zapytanie = 'SELECT * FROM Sprinty s JOIN Projekty p ON s.Projekty_id_projektu=p.id_projektu WHERE Projekty_id_projektu = "' . $this->src . '";';
		} else {
			$zapytanie = 'SELECT * FROM Sprinty s JOIN Projekty p ON s.Projekty_id_projektu=p.id_projektu;';
		}
		
		$query = $this->db->query($zapytanie);
		$dane = '';

		foreach ($query->result() as $row)
		{			
			$dane .= '<tr onclick="window.location=\'/ci/sprintk/' . $row->id_sprintu . '\'" style="cursor:pointer;">
					<td>' . $row->id_sprintu . '</td>
					<td>' . $row->poczatek . '</td>
					<td>' . $row->koniec . '</td>
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
								<th>ID Sprintu</th>
								<th>Początek</th>
								<th>Koniec</th>
								<th>Id Projektu</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Sprintu</th>
								<th>Początek</th>
								<th>Koniec</th>
								<th>Id Projektu</th>
							</tr>
						</tfoot>
						<tbody>
							' . $this->uzupelnienie() . '
						</tbody>
					    </table>';
	}
}
