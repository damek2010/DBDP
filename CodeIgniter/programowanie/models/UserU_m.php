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
		$dane = '';
		$pytanie = 'SELECT * FROM Uzytkownicy WHERE identyfikator= "' . $this->src . '";';
		$query2 =$this->db->query($pytanie) ;
		
		foreach ($query2->result() as $row)
		{
			$dane .= '<h2> '.$row->imie .' '.$row->nazwisko.'  </h2>';
		}		
		
		$dane.='<h3>Lista projektów w których użytkownik uczestnicy</h3>
					
					<p>Wybierz interesujący projekt</p>';
		

		$zapytanie = 'SELECT * FROM Uczestnicy WHERE Uzytkownicy_identyfikator="' . $this->src . '";';
		$query = $this->db->query($zapytanie);
		
		$dane .= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
							<tr>
								<th>ID uczestnicwa</th>
								<th>Nazwa projektu</th>
								<th>Rola</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID uczestnicwa</th>
								<th>Nazwa projektu</th>
								<th>Rola</th>
							</tr>
						</tfoot><tbody>';
		foreach ($query->result() as $row)
		{
			$dane .= '<tr onclick="window.location=\'/ci/usero/'.$this->src.'/' . $row->id_uczestnicy . '\'" style="cursor:pointer;">
					<td>' . $row->id_uczestnicy . '</td>
					<td>' . $row->Projekty_id_projektu . '</td>
					<td>' . $row->Role_id_roli . '</td>
				</tr>';
		}
		$dane .= '</tbody></table>';
		return $dane;
	}
}
