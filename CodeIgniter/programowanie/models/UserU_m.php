<?php
class UserU_m extends CI_Model {

	private $wynik;
	private $src;
 
        public function start($src)
        {
			$this->wynik = '';
			$this->src = $src;
			$this->wynik .= $this->look();
			return $this->wynik;
        }
	
	private function look()
	{
		$ranga = 'U';
		if(explode("-:-",$_SESSION['log_zal'])[1] == 'A') {
			$ranga = 'A';
		}
		$zapytanie = 'SELECT * FROM Uzytkownicy;';
		$query = $this->db->query($zapytanie);
		$dane = '';
		$dane .= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
							<tr>
								<th>ID uczestnicwa</th>
								<th>Nazwa projektu</th>
								<th>Data startu</th>
								<th>Data zakończenia</th>
								<th>Rola</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID uczestnicwa</th>
								<th>Nazwa projektu</th>
								<th>Data startu</th>
								<th>Data zakończenia</th>
								<th>Rola</th>
							</tr>
						</tfoot><tbody>';
		foreach ($query->result() as $row)
		{
			$dane .= '<tr>
					<td>' . $row->identyfikator . '</td>
					<td>' . ($ranga=="A"?$row->haslo:str_repeat("*", strlen($row->haslo))) . '</td>
					<td>' . $row->imie . '</td>
					<td>' . $row->nazwisko . '</td>
					<td>' . ($row->ranga=="A"?"Administrator":"Użytkownik") . '</td>
				</tr>';
		}
		$dane .= '</tbody></table>';
		return $dane;
	}
}